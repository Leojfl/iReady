<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertClientRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Models\Store;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::orderBy('id', 'DESC')->get();
        return view('admin.store.index', ['stores' => $stores]);
    }

    public function upsert($clientId = 0)
    {
        $client = Store::find($clientId);
        return view('admin.store.upsert', ['client' => $client]);
    }
}