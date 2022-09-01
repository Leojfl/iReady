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

class ShoppingController extends Controller
{

    public function index()
    {
        $store = $this->storeInSesion();
        $shoppings = $store->providerMaterials;
        return view('store.shopping.index', ['shoppings' => $shoppings]);
    }

}
