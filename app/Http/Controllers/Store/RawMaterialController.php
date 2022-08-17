<?php


namespace App\Http\Controllers\Store;


use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertRawMaterialRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use App\Models\RawMaterial;
use Illuminate\Database\Eloquent\Builder;

class RawMaterialController extends Controller
{
    public function index()
    {
        $rawmaterials = RawMaterial::orderBy('id')->get();
        return view('store.rawmaterial.index', ['rawmaterials' => $rawmaterials]);
    }

    public function upsert($rawmaterialId = 0)
    {
        $rawmaterial = RawMaterial::find($rawmaterialId);
        return view('store.rawmaterial.upsert', ['rawmaterial' => $rawmaterial]);
    }

    public function show(UpsertRawMaterialRequest $request, $rawmaterialId = 0)
    {
        $rawmaterial = RawMaterial::find($rawmaterialId);
        return view('store.rawmaterial.profiles', ['rawmaterial' => $rawmaterial]);
        
    }

    

    public function upsertPost(UpsertRawMaterialRequest $request ,$rawmaterialId = 0)
    {
        try{
            DB::beginTransaction();
            $rawmaterial = RawMaterial::findOrNew($rawmaterialId);
            $rawmaterial->fill($request->all());
            $rawmaterial->saveOrfail();
            DB::commit();
            return redirect()->route('store_rawmaterial_index');
        } catch(\Exception $e) {
            DB::rollback();
            return back()
            ->withErrors([ 'generic_error' => ['Algo salio mal']])
            ->withInput($request->all());
        }
    }

    public function destroy($rawmaterialId)
    {
        $rawmaterial = RawMaterial::find($rawmaterialId);
        $rawmaterial->delete();
        return redirect()->route('store_rawmaterial_delete');
    }
}