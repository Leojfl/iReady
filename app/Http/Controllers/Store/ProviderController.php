<?php


namespace App\Http\Controllers\Store;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertClientRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Store;
use App\Models\Combo;
use App\Models\RawMaterial;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\UpserProductRequest;
use App\Http\Requests\UpsertRawMaterialRequest;
use App\Models\Provider;

class ProviderController extends Controller
{
    public function index()
    {
        $store = $this->storeInSesion();
        $providers = $store->providers;
        return view('store.provider.index', ['providers' => $providers]);
    }

    public function upsert($providerId = 0)
    {
        $store = $this->storeInSesion();
        $provider = Provider::find($providerId);
        if ($provider != null && $provider->fk_id_store != $store->id){
            return back()->withErrors([ 'generic_error' => ['Datos no encontrados']]);
        }
        return view('store.provider.upsert', ['provider' => $provider]);
    }

    public function upsertPost(UpsertRawMaterialRequest $request, $providerId = 0)
    {
        $store = $this->storeInSesion();
        if ($providerId == 0){
            $provider = new Provider();
            $provider->fk_id_store = $store->id;
        } else {
            $provider = Provider::find($providerId);
            if ($provider != null && $provider->fk_id_store != $store->id){
                return back()->withErrors([ 'generic_error' => ['Datos no encontrados']]);
            }
        }
        $provider->fill($request->all());
        $provider->saveOrFail();
        return redirect(route('store_provider_index'));
    }


}
