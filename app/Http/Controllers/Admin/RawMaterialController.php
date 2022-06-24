<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RawMaterial;  


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
        return view('admin.materials.index', compact('raw'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.materials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $raw=RawMaterial::create([
            'name'=>$request->name,
            'quantity'=>$request->quantity,
            'min_stok'=>$request->min_stok,
            'max_stok'=>$request->max_stok,
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
        return view('admin.materials.show', compact('id'));
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
        return view('admin.materials.edit', compact('material'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $material)
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