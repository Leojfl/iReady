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
use App\Http\Requests\UpsertShoppingRequest;
use App\Models\Provider;
use App\Models\ProviderMaterial;
use Carbon\Carbon;

class ShoppingController extends Controller
{

    public function index()
    {
        $store = $this->storeInSesion();
        $shoppings = $store->providerMaterials;
        return view('store.shopping.index', ['shoppings' => $shoppings]);
    }

    public function upsert($providerMaterialId = 0)
    {
        $store = $this->storeInSesion();
        $providerMaterial = ProviderMaterial::find($providerMaterialId);
        if ($providerMaterial != null && $providerMaterial->fk_id_store != $store->id) {
            return back()->withErrors([ 'generic_error' => ['Datos no encontrados']]);
        }
        $providers = $store->providers->pluck('full_name', 'id');
        $materials = $store->materials->pluck('name_with_unit', 'id');

        return view('store.shopping.upsert',
        [
            'providerMaterial' => $providerMaterial,
            'providers' => $providers,
            'materials' => $materials
        ]);
    }

    public function upsertPost(UpsertShoppingRequest $request, $providerMaterialId = 0)
    {
        $store = $this->storeInSesion();
        $providerMaterial = ProviderMaterial::findOrNew($providerMaterialId);
        if ($providerMaterialId != 0 && $providerMaterial->fk_id_store != $store->id) {
            return back()->withErrors([ 'generic_error' => ['Datos no encontrados']]);
        }
        try {
            DB::beginTransaction();
            $providerMaterial->fk_id_store = $store->id;
            $providerMaterial->fill($request->all());
            $providerMaterial->date = Carbon::createFromFormat("d/m/Y", $request->post('date'));
            $providerMaterial->save();
            $material = RawMaterial::find($providerMaterial->fk_id_raw_material);
            $material->quantity = $material->quantity + $providerMaterial->quantity;
            $material->save();
            DB::commit();
            return redirect(route('store_shopping_index'));
        }catch(Exception $e) {
            DB::rollBack();
            return back()
            ->withErrors([ 'generic_error' => ['Algo salio mal, intente más tarde']])
            ->withInput($request->all());
        }
    }

    public function show()
    {
        $store = $this->storeInSesion();
        $shoppings = $store->providerMaterials;
        return view('store.shopping.index', ['shoppings' => $shoppings]);
    }
}
