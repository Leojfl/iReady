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
use App\Models\Material;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{
    public function index()
    {

        $user = Auth::User();
        $store = Store::whereHas('employees', function (Builder $query) use ($user) {
            $query->where('fk_id_user', $user->id);
        })->first();
        $products = Product::where('fk_id_store', $store->id)->orderBy('id', 'DESC')->get();
        $combos = Combo::whereHas('products', function (Builder $query) use ($store) {
            $query->where('fk_id_store', $store->id)->orderBy('combo.id', 'DESC');
        })->get();
        return view('store.product.index', ['products' => $products, 'combos' => $combos]);
    }

    public function upsert($productId = 0){

        $user = Auth::User();
        $store = Store::whereHas('employees', function (Builder $query) use ($user) {
            $query->where('fk_id_user', $user->id);
        })->first();
        $product = Product::find($productId);
        if ($product != null && $product->fk_id_store != $store->id){
            return back();
        }
        $ingredients = $store->materials;
        return view('store.product.upsert', ['product' => $product, 'ingredients' => $ingredients]);

    }

    public function upsertPost($productId = 0){

        $user = Auth::User();
        $store = Store::whereHas('employees', function (Builder $query) use ($user) {
            $query->where('fk_id_user', $user->id);
        })->first();
        $product = Product::find($productId);
        if ($product != null && $product->fk_id_store != $store->id){
            return back();
        }
        //return view('store.product.upsert', ['product' => $product]);

    }





}
