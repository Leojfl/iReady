<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Requests\RawMaterialRequest as RequestsRawMaterialRequest;
use Illuminate\Http\Request;
use App\Models\RawMaterial;
use App\Request\RawMaterialRequest;
use App\Models\Store;


class RawMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raw = RawMaterial::all();
        return view('store.materials.index', compact('raw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $store = Store::all();
        return view('store.materials.create', compact('store'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestsRawMaterialRequest $request)
    {
        $raw = RawMaterial::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'min_stok' => $request->min_stok,
            'max_stok' => $request->max_stok,
            'fk_id_store' => $request->fk_id_store,
        ]);

        return redirect()->route('raw_material_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id = RawMaterial::find($id);
        return view('store.materials.show', compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($material)
    {
        $material = RawMaterial::find($material);
        $store = Store::all();
        return view('store.materials.edit', compact('material', 'store'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestsRawMaterialRequest $request, $material)
    {
        $material = RawMaterial::find($material);
        $material->update($request->all());

        return redirect()->route('raw_material_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = RawMaterial::find($id);
        $id->delete();
        return redirect()->route('raw_material_index');
    }
}
