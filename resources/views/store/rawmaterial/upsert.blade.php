@extends('store.template.main')
@section('content')
<div class="row">
    <div class="col-12">
        <h3>{{isset($rawMaterial)?"Modificar": "Agregar"}} Mareriales</h3>
    </div>
    <div class="col-12 col-md-8 mx-auto">
        <form method="POST"
        enctype="multipart/form-data"
        class="row"
        action="{{ route('store_raw_material_upsert_post', isset($rawMaterial)?$rawMaterial->id:"") }}">
            @csrf
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'code',
                    'label' => 'Código',
                    'placeholder' => 'Código',
                    'value' => isset($rawMaterial)?$rawMaterial->code:"",
                ])
            </div>
            <div class="col-md-6 mt-1 text-start">
                @include('commons.select', [
                    'label' => 'Unidad',
                    'name' => 'fk_id_unit',
                    'selected' => isset($rawMaterial) ? $rawMaterial->fk_id_unit : null,
                    'options' => $units
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'name',
                    'label' => 'Nombre',
                    'placeholder' => 'Nombre',
                    'type' => 'text',
                    'value' => isset($rawMaterial)?$rawMaterial->description:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'group',
                    'label' => 'Grupo',
                    'placeholder' => 'Grupo',
                    'type' => 'text',
                    'value' => isset($rawMaterial)?$rawMaterial->group:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'quantity',
                    'label' => 'Cantidad',
                    'placeholder' => 'Cantidad',
                    'value' => isset($rawMaterial)?$rawMaterial->quantity:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'price',
                    'label' => 'Precio',
                    'placeholder' => 'Precio',
                    'value' => isset($rawMaterial)?$rawMaterial->price:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'min_stok',
                    'label' => 'Minimo en stock',
                    'placeholder' => 'Minimo en stock',
                    'value' => isset($rawMaterial)?$rawMaterial->price:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'max_stok',
                    'label' => 'Maximo en stock',
                    'placeholder' => 'Maximo en stock',
                    'value' => isset($rawMaterial)?$rawMaterial->price:"",
                ])
            </div>
            <div class="col-md-12">
                @include('commons.input',[
                    'name' => 'img_url',
                    'label' => 'Imagen',
                    'placeholder' => 'Imagen',
                    'type' => 'file',
                    'inputClass' => 'show-image-file',
                    'properties' => ["data-for=img_show_image"]
                ])
            </div>
            <div class="col-md-7 mx-auto">
                <img class="w-100" id="img_show_image" src="{{asset(isset($rawMaterial)?$rawMaterial->img_url:"")}}">
            </div>
            <br>
            <div class="col-md-12 my-4">
                <button type="submit" class="btn btn-primary">Guardar</button>
                &nbsp;
            </div>
        </form>
    </div>

    </div>
@endsection
