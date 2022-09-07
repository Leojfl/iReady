@extends('store.template.main')
@section('content')
<div class="row">
    <div class="col-12">
        <h3>{{isset($provider)?"Modificar": "Agregar"}} Proveedor</h3>
    </div>
    <div class="col-12 col-md-8 mx-auto">
        <form method="POST" action="{{ route('store_provider_upsert_post',["providerId" => (isset($provider)?$provider->id:"")] ) }}" class="row mt-4">
            @csrf
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'name',
                    'label' => 'Nombre',
                    'placeholder' => 'Nombre del restaurante',
                    'type' => 'text',
                    'value' => isset($provider)?$provider->name:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'last_name',
                    'label' => 'Apellido paterno',
                    'placeholder' => 'Apellido paterno',
                    'type' => 'text',
                    'value' => isset($provider)?$provider->last_name:"",
                ])
            </div>

            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'second_last_name',
                    'label' => 'Apellido materno',
                    'placeholder' => 'Apellido materno',
                    'type' => 'text',
                    'value' => isset($provider)?$provider->second_last_name:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'phone',
                    'label' => 'Télefono',
                    'placeholder' => 'Télefono',
                    'type' => 'text',
                    'value' => isset($provider)?$provider->phone:"",
                ])
            </div>

            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'email',
                    'label' => 'Correo',
                    'placeholder' => 'Correo',
                    'type' => 'text',
                    'value' => isset($provider)?$provider->email:"",
                ])
            </div>

            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'company',
                    'label' => 'Empresa',
                    'placeholder' => 'Nombre del la empresa',
                    'type' => 'text',
                    'value' => isset($provider)?$provider->company:"",
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
