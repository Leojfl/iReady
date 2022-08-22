@extends('store.template.main')
@section('content')
<div class="row">
    <div class="col-12">
        <h3>{{isset($store)?"Modificar": "Agregar"}} Restaurantes</h3>
    </div>
    <div class="col-12 col-md-8 mx-auto">
        <form method="POST" action="{{ route('store_update_data_post') }}" class="row mt-4" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'name',
                    'label' => 'Nombre',
                    'placeholder' => 'Nombre del restaurante',
                    'type' => 'text',
                    'value' => isset($store)?$store->name:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'owner',
                    'label' => 'Dueño',
                    'placeholder' => 'Dueño del restaurante',
                    'type' => 'text',
                    'value' => isset($store)?$store->owner:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'phone',
                    'label' => 'Número de teléfono',
                    'placeholder' => 'Numero de telefono del restaurante',
                    'type' => 'number',
                    'value' => isset($store)?$store->phone:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'rfc',
                    'label' => 'RFC del restaurante',
                    'placeholder' => 'RFC del restaurante',
                    'type' => 'text',
                    'value' => isset($store)?$store->rfc:"",
                ])
            </div>
            <div class="col-md-12">
                @include('commons.input',[
                    'name' => 'description',
                    'label' => 'Descripción',
                    'placeholder' => 'Descripcion del restaurante',
                    'type' => 'text',
                    'value' => isset($store)?$store->description:"",
                ])
            </div>
            <div class="col-md-12">
                @include('commons.input',[
                    'name' => 'img_url',
                    'label' => 'URL de imagen',
                    'placeholder' => 'URL de la imagen del restaurante',
                    'type' => 'file',
                    'inputClass' => 'show-image-file',
                    'properties' => ["data-for=img_show_image"]
                ])
            </div>
            <div class="col-md-7 mx-auto">
                <img class="w-100" id="img_show_image" src="{{asset($store->img_url)}}">
            </div>
            <div class="col-md-12">
                <h4>Dirección</h4>
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'city',
                    'label' => 'Ciudad',
                    'placeholder' => 'Ciudad donde se ubica',
                    'type' => 'text',
                    'value' => isset($store->address)?$store->address->city:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'colony',
                    'label' => 'Colonia',
                    'placeholder' => 'Colonia donde se ubica',
                    'type' => 'text',
                    'value' => isset($store->address)?$store->address->colony:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'zip_code',
                    'label' => 'Código postal',
                    'placeholder' => 'Codigo postal',
                    'type' => 'number',
                    'value' => isset($store->address)?$store->address->zip_code:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'street',
                    'label' => 'Calle',
                    'placeholder' => 'Calle donde se ubica',
                    'type' => 'text',
                    'value' => isset($store->address)?$store->address->street:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'ext_num',
                    'label' => 'Número exterior',
                    'placeholder' => 'Numero exterior',
                    'type' => 'text',
                    'value' => isset($store->address)?$store->address->ext_num:"",
                ])
            </div>
            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                &nbsp;
            </div>
        </form>
    </div>
</div>
@endsection
