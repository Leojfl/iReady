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

class ProductController extends Controller
{
    public function index()
    {
        $store = $this->storeInSesion();
        $products = Product::where('fk_id_store', $store->id)->orderBy('id', 'DESC')->get();
        $combos = Combo::whereHas('products', function (Builder $query) use ($store) {
            $query->where('fk_id_store', $store->id)->orderBy('combo.id', 'DESC');
        })->get();
        return view('store.product.index', ['products' => $products, 'combos' => $combos]);
    }

    public function upsert($productId = 0){
        $store = $this->storeInSesion();
        $product = Product::find($productId);
        if ($product != null && $product->fk_id_store != $store->id){
            return back();
        }
        $ingredients = $store->materials;
        $categories = Category::asMap();
        return view('store.product.upsert', ['product' => $product, 'ingredients' => $ingredients, 'categories' => $categories]);
    }

    public function upsertPost(UpserProductRequest $request, $productId = 0){
        $store = $this->storeInSesion();
        try {
            DB::beginTransaction();
            $product = Product::findOrNew($productId);
            $product->fill($request->all());
            $product->fk_id_store = $store->id;
            $product->show = $request->get('show') == "true";
            $product->saveOrFail();
            $product->materials()->sync([]);
            $ingredients = $request->get('ingredinets');
            if ($ingredients != null) {
                foreach($ingredients as $ingredient){
                    $product->materials()->attach([
                        [
                        "fk_id_material" =>  $ingredient["fk_id_material"],
                        "quantity" => $ingredient["quantity"],
                        ]
                    ]);
                }
            }
            if ($request->file("image_product") != null) {
                $product->image_url = $this->storeImage($request->file("image_product"), "product", $product->id);
            }
            $product->saveOrFail();
            DB::commit();
            return redirect(route('store_products_index'));
        } catch(Exception $e) {
            DB::rollBack();
            return back()
            ->withErrors([ 'generic_error' => ['Algo salio mal, intente más tarde']])
            ->withInput($request->all());
       }
    }

    public function upsertStatus($productId)
    {
        $product  = Product::find($productId);
        $product->show = !$product->show;
        $success = $product->save();
        return response()->json(['success' => $success]);
    }

    public function show($productId){
        $store = $this->storeInSesion();
        $product = Product::find($productId);
        if ($product != null && $product->fk_id_store != $store->id){
            return back()->withErrors([ 'generic_error' => ['Datos no encontrados']]);
        }
        return view('store.product.show', ['product' => $product]);
    }
}
