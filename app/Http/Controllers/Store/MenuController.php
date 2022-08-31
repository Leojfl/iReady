<?php


namespace App\Http\Controllers\Store;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Store;
use App\Models\Menu;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\UpsertMenuRequest;

class MenuController extends Controller
{
    public function index()
    {
        $store = $this->storeInSesion();
        $menus = Menu::where('fk_id_store', $store->id)->orderBy('id')->get();
        return view('store.menu.index', ['menus' => $menus]);
    }

    public function upsert($menuId = 0){
        $store = $this->storeInSesion();
        $menu = Menu::find($menuId);
        if ($menu != null && $menu->fk_id_store != $store->id){
            return back();
        }
        return view('store.menu.upsert', ['menu' => $menu]);
    }

    public function upsertPost(UpsertMenuRequest $request, $menuId = 0){
        $store = $this->storeInSesion();
        try {
            DB::beginTransaction();
            $menu = Menu::findOrNew($menuId);
            $menu->fill($request->all());
            $menu->fk_id_store = $store->id;
            $menu->active = $request->get('active') == "true";
            $menu->saveOrFail();
            DB::commit();
            return redirect(route('store_menus_index'));
        } catch(Exception $e) {
            DB::rollBack();
            return back()
            ->withErrors([ 'generic' => ['Algo salio mal, intente más tarde']])
            ->withInput($request->all());
       }
    }

    public function upsertStatus($menuId)
    {
        $menu  = Menu::find($menuId);
        $menu->active = !$menu->active;
        $success = $menu->save();
        return response()->json(['success' => $success]);
    }

    public function show($menuId){
        $store = $this->storeInSesion();
        $menu = Menu::find($menuId);
        if ($menu != null && $menu->fk_id_store != $store->id){
            return back()->withErrors([ 'generic' => ['Datos no encontrados']]);
        }
        return view('store.menu.show', ['menu' => $menu]);
    }
}
