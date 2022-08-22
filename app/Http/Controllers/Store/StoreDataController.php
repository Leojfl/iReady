<?php


namespace App\Http\Controllers\Store;


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

class StoreDataController extends Controller
{
    public function index()
    {
        $stores = Store::orderBy('id', 'DESC')->get();
        return view('store.storedata.index', ['stores' => $stores]);
    }

    public function show()
    {
        $store = $this->storeInSesion();
        return view('store.storedata.show', ['store' => $store] );
    }

    public function update()
    {
        $store = $this->storeInSesion();
        return view('store.storedata.update', ['store' => $store] );
    }

    public function updatePost(UpsertStoreRequest $request)
    {
        try{
            DB::beginTransaction();
            $store = $this->storeInSesion();
            $store->fill($request->all());
            if ($request->file("img_url") != null) {
                $store->img_url = $this->storeImage($request->file("img_url"), "store", $store->id);
            }
            $store->saveOrfail();
            $address = ($store->address == null)? new StoreAddress():$store->address;
            $address->fill($request->all());
            $address->fk_id_store = $store->id;
            $address->saveOrfail();
            DB::commit();
            return redirect()->route('store_data_show');
        } catch(\Exception $e) {
            DB::rollback();
            return back()
            ->withErrors([ 'generic_error' => ['Algo salio mal']])
            ->withInput($request->all());
        }
    }
}
