<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Models\Store;
use App\Models\StoreAddress;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::orderBy('id', 'DESC')->get();
        return view('admin.store.index', ['stores' => $stores]);
    }

    public function upsert($storeId = 0)
    {
        $store = Store::find($storeId);
        return view('admin.store.upsert', ['store' => $store]);
    }

    public function show(UpsertStoreRequest $request, $storeId = 0)
    {
        $store = Store::find($storeId);
        return view('admin.store.profile', ['store' => $store]);
        
    }

    public function upsertPost(UpsertStoreRequest $request ,$storeId = 0)
    {
        try{
            DB::beginTransaction();
            $store = Store::findOrNew($storeId);
            $store->fill($request->all());
            $store->saveOrfail();
            $address = ($storeId == 0)? new StoreAddress():$store->storeAddress;
            $address->fill($request->all());
            $address->fk_id_store = $store->id;
            $address->saveOrfail();
            DB::commit();
            return redirect()->route('admin_store_index');
        } catch(\Exception $e) {
            DB::rollback();
            return back()
            ->withErrors([ 'generic_error' => ['Algo salio mal']])
            ->withInput($request->all());
        }
    }
}