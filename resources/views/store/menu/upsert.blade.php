@extends('store.template.main')
@section('content')
<div class="row">
    <div class="col-12">
        <h3>{{isset($menu)?"Modificar": "Agregar"}} Menus</h3>
    </div>
    <div class="col-12 col-md-8 mx-auto">
        <form method="POST" action="{{ route('store_menu_upsert_post', isset($menu)?$menu->id:"") }}">
            {{ csrf_field() }}
            <div class="form-group">
               
                @include('commons.input',[
                    'name' => 'name',
                    'label' => 'Nombre del menu',
                    'placeholder' => 'Nombre del menu',
                    'type' => 'text',
                    'value' => isset($menu)?$menu->name:"",
                ])
            </div>
            <div class="form-group">
        
                @include('commons.input',[
                    'name' => 'description',
                    'label' => 'Descripcion del menu',
                    'placeholder' => 'Descripcion del menu',
                    'type' => 'text',
                    'value' => isset($menu)?$menu->description:"",
                ])
            </div>
            <br>
            <div style="text-align: initial">
                <h5 >Activo</h5>
                    <input  value={{ isset($menu)?$menu->active:"" }} label="Activo" placeholder="Activo" type="checkbox"/>
                </div>
               
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                &nbsp;
            </div>
        </form>
    </div>
            
    </div>
@endsection