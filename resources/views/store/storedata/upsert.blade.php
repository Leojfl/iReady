@extends('store.template.main')
@section('content')
<div class="row">
    <div class="col-12">
        <h3>{{isset($store)?"Modificar": "Agregar"}} Restaurantes</h3>
    </div>
    <div class="col-12 col-md-8 mx-auto">
        <form method="POST" action="{{ route('store_storedata_upsert_post', isset($store)?$store->id:"") }}">
            {{ csrf_field() }}
            <div class="form-group">
               
                @include('commons.input',[
                    'name' => 'name',
                    'label' => 'Nombre del restaurante',
                    'placeholder' => 'Nombre del restaurante',
                    'type' => 'text',
                    'value' => isset($store)?$store->name:"",
                ])
            </div>
            <div class="form-group">
        
                @include('commons.input',[
                    'name' => 'owner',
                    'label' => 'Dueño del restaurante',
                    'placeholder' => 'Dueño del restaurante',
                    'type' => 'text',
                    'value' => isset($store)?$store->owner:"",
                ])
            </div>
           
                @include('commons.input',[
                    'name' => 'phone',
                    'label' => 'Numero de telefono del restaurante',
                    'placeholder' => 'Numero de telefono del restaurante',
                    'type' => 'number',
                    'value' => isset($store)?$store->phone:"",
                ])
            <div class="form-group">
              
                @include('commons.input',[
                    'name' => 'rfc',
                    'label' => 'RFC del restaurante',
                    'placeholder' => 'RFC del restaurante',
                    'type' => 'text',
                    'value' => isset($store)?$store->rfc:"",
                ])
            </div>
            <div class="form-group">
              
                @include('commons.input',[
                    'name' => 'description',
                    'label' => 'Descripcion del restaurante',
                    'placeholder' => 'Descripcion del restaurante',
                    'type' => 'text',
                    'value' => isset($store)?$store->description:"",
                ])
            </div>
            <div class="form-group">
              
                @include('commons.input',[
                    'name' => 'img_url',
                    'label' => 'URL de la imagen del restaurante',
                    'placeholder' => 'URL de la imagen del restaurante',
                    'type' => 'text',
                    'value' => isset($store)?$store->img_url:"",
                ])
            </div>
            <div class="form-group">
                @include('commons.input',[
                    'name' => 'city',
                    'label' => 'Ciudad donde se ubica',
                    'placeholder' => 'Ciudad donde se ubica',
                    'type' => 'text',
                    'value' => isset($store)?$store->address->city:"",
                ])
            </div>
            <div class="form-group">
              
                @include('commons.input',[
                    'name' => 'colony',
                    'label' => 'Colonia donde se ubica',
                    'placeholder' => 'Colonia donde se ubica',
                    'type' => 'text',
                    'value' => isset($store)?$store->address->colony:"",
                ])
            </div>
            <div class="form-group">
              
                @include('commons.input',[
                    'name' => 'zip_code',
                    'label' => 'Codigo postal',
                    'placeholder' => 'Codigo postal',
                    'type' => 'number',
                    'value' => isset($store)?$store->address->zip_code:"",
                ])
            </div>
            <div class="form-group">
              
                @include('commons.input',[
                    'name' => 'street',
                    'label' => 'Calle donde se ubica',
                    'placeholder' => 'Calle donde se ubica',
                    'type' => 'text',
                    'value' => isset($store)?$store->address->street:"",
                ])
            </div>
            <div class="form-group">
              
                @include('commons.input',[
                    'name' => 'ext_num',
                    'label' => 'Numero exterior',
                    'placeholder' => 'Numero exterior',
                    'type' => 'number',
                    'value' => isset($store)?$store->address->ext_num:"",
                ])
            </div>
        </form>
    </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                &nbsp;
            </div>
    </div>
@endsection