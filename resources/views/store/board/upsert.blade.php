@extends('store.template.main')
@section('content')
<div class="row">
    <div class="col-12">
        <h3>{{isset($board)?"Modificar": "Agregar"}} Mesas</h3>
    </div>
    <div class="col-12 col-md-8 mx-auto">
        <form method="POST" action="{{ route('store_board_upsert_post', isset($board)?$board->id:"") }}">
            {{ csrf_field() }}
            <div class="form-group">
               
                @include('commons.input',[
                    'name' => 'name',
                    'label' => 'Nombre de la mesa',
                    'placeholder' => 'Nombre de la mesa',
                    'type' => 'text',
                    'value' => isset($board)?$board->name:"",
                ])
            </div>
            <div class="form-group">
        
                @include('commons.input',[
                    'name' => 'description',
                    'label' => 'Descripcion de la mesa',
                    'placeholder' => 'Descripcion de la mesa',
                    'type' => 'text',
                    'value' => isset($board)?$board->description:"",
                ])
            </div>
            <div class="form-group">
        
                @include('commons.input',[
                    'name' => 'active',
                    'label' => 'Mesa activa o inactiva',
                    'placeholder' => 'Mesa activa o inactiva',
                    'type' => 'checkbox',
                    'value' => isset($board)?$board->active:"",
                ])
            </div>
            <div class="form-group">
        
                @include('commons.input',[
                    'name' => 'available',
                    'label' => 'Disponibilidad de la mesa',
                    'placeholder' => 'Disponibilidad de la mesa',
                    'type' => 'checkbox',
                    'value' => isset($board)?$board->available:"",
                ])
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                &nbsp;
            </div>
        </form>
    </div>
            
    </div>
@endsection