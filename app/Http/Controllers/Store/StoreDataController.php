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
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class StoreDataController extends Controller
{


    
    public function index()
    {
        $raw = Store::all();
        $raw = Store_Address::all();
        return view('store.storedata.index', compact('raw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('store.storedata.create');
    }

    /**
    
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $raw=Store::create([
            'name'=>$request->name,
            'owner'=>$request->owner,
            'phone'=>$request->phone,
            'rfc'=>$request->rfc,
            'description'=>$request->description,
            'img_url'=>$request->img_url,
        ]);

        $raw=Store_Address::create([
            'city'=>$request->city,
            'colony'=>$request->colony,
            'zip_code'=>$request->zip_code,
            'street'=>$request->street,
            'ext_num'=>$request->ext_num,
        ]);

        return redirect()->route('store_data_index');
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = Store::find($id);
        $id = Store_Address::find($id);
        return view('store.storedata.show', compact('id'));
    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($storedata)
    {
        $storedata = Store::find($storedata);
        $storedata = Store_Address::find($storedata);
        return view('store.storedata.edit', compact('storedata'));

    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $storedata)
    {
        $storedata = Store::find($storedata);
        $storedata->update($request->all());
        $storedata = Store_Address::find($storedata);
        $storedata->update($request->all());

        return redirect()->route('store_data_index');

    }

    /**
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Store::find($id);
        $id = Store_Address::find($id);
        $id->delete();
        return redirect()->route('store_data_index');
    }




}