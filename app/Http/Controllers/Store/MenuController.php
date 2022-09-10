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
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\UpsertMenuRequest;
use App\Models\MenuCategory;
use App\Models\ProductMenuCategory;

class MenuController extends Controller
{
    public function index()
    {
        $store = $this->storeInSesion();
        $menus = Menu::where('fk_id_store', $store->id)
        ->orderBy('id')->get();
        return view('store.menu.index', ['menus' => $menus]);
    }

    public function upsert($menuId = 0){
        $store = $this->storeInSesion();
        $menu = Menu::with(['menuCategories.products', 'menuCategories.category'])->find($menuId);
        $products = $store->products;
        if ($menu != null && $menu->fk_id_store != $store->id){
            return back();
        }
        return view('store.menu.upsert', [
            'menu' => $menu,
            'categories' => Category::all(),
            'products' => $products
        ]);
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
            $menuCategories = $menu->menuCategories;
            foreach($menuCategories as $menuCategory){
                $menuCategory->products()->sync([]);
            }
            $menu->menuCategories()->delete();
            $menuCategories = $request->get('categories', []);
            foreach($menuCategories as $menuCategory) {
                $menuCategoryDB = new MenuCategory();
                $menuCategoryDB->fk_id_category = $menuCategory["id"];
                $menuCategoryDB->fk_id_menu = $menu->id;
                $menuCategoryDB->alias = $menuCategory["alias"] ?? "";
                $menuCategoryDB->saveOrFail();
                $products = $menuCategory["products"] ?? null;
                foreach($products as $product){
                    $productMenu = new ProductMenuCategory();
                    $productMenu->fk_id_product = $product["producutId"];
                    $productMenu->fk_id_menu_category = $menuCategoryDB->id;
                    $productMenu->saveOrFail();
                }
            }
            DB::commit();
            if($request->ajax()){
                return response()->json(['success' => true]);
            }
            return redirect(route('store_menus_index'));
        } catch(Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            if($request->ajax()){
                return response()->json(['success' => false, 'message' => 'Algo salio mal, intente más tarde']);
            }
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
        return view('web.menu', ['menu' => $menu, 'store' => $store]);
    }
}
