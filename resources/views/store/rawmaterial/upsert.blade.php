@extends('store.template.main')
@section('content')
<div class="row">
    <div class="col-12">
        <h3>{{isset($rawmaterial)?"Modificar": "Agregar"}} Mareriales</h3>
    </div>
    <div class="col-12 col-md-8 mx-auto">
        <form method="POST" action="{{ route('store_rawmaterial_upsert_post', isset($rawmaterial)?$rawmaterial->id:"") }}">
            {{ csrf_field() }}

            <div class="form-group">
               
                @include('commons.input',[
                    'name' => 'code',
                    'label' => 'Codigo',
                    'placeholder' => 'Codigo',
                    'type' => 'number',
                    'value' => isset($rawmaterial)?$rawmaterial->code:"",
                    
                ])
            </div>
            <div class="form-group">
        
                @include('commons.input',[
                    'name' => 'description',
                    'label' => 'Nombre',
                    'placeholder' => 'Nombre',
                    'type' => 'text',
                    'value' => isset($rawmaterial)?$rawmaterial->description:"",
                ])
            </div>
            <div class="form-group">
        
                @include('commons.input',[
                    'name' => 'group',
                    'label' => 'Grupo',
                    'placeholder' => 'Grupo',
                    'type' => 'text',
                    'value' => isset($rawmaterial)?$rawmaterial->group:"",
                ])
            </div>
            <div class="form-group">
        
                @include('commons.input',[
                    'name' => 'unit',
                    'label' => 'Unidad',
                    'placeholder' => 'Unidad',
                    'type' => 'text',
                    'value' => isset($rawmaterial)?$rawmaterial->unit:"",
                ])
            </div>
            <div class="form-group">
        
                @include('commons.input',[
                    'name' => 'provider',
                    'label' => 'Proovedor',
                    'placeholder' => 'Proovedor',
                    'type' => 'text',
                    'value' => isset($rawmaterial)?$rawmaterial->provider:"",
                ])
            </div>
            <div class="form-group">
        
                @include('commons.input',[
                    'name' => 'price',
                    'label' => 'Precio',
                    'placeholder' => 'Precio',
                    'type' => 'number',
                    'value' => isset($rawmaterial)?$rawmaterial->price:"",
                ])
            </div>
            <div class="form-group">
        
                @include('commons.input',[
                    'name' => 'img_url',
                    'label' => 'Imagen',
                    'placeholder' => 'Imagen',
                    'type' => 'text',
                    'value' => isset($rawmaterial)?$rawmaterial->img_url:"",
                ])
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                &nbsp;
            </div>
        </form>
    </div>
            
    </div>
@endsection