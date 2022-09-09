@extends('store.template.main')
@section('content')
<div class="row">
    <div class="col-12">
        <h3>{{isset($board)?"Modificar": "Agregar"}} Mesas</h3>
    </div>
    <div class="col-12 col-md-8 mx-auto">
        <form method="POST" action="{{ route('store_board_upsert_post', isset($board)?$board->id:"") }}" class="row">
            {{ csrf_field() }}
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'name',
                    'label' => 'Nombre de la mesa',
                    'placeholder' => 'Nombre de la mesa',
                    'type' => 'text',
                    'value' => isset($board)?$board->name:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'description',
                    'label' => 'Descripcion de la mesa',
                    'placeholder' => 'Descripcion de la mesa',
                    'type' => 'text',
                    'value' => isset($board)?$board->description:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'capacity',
                    'label' => 'Capacidad',
                    'placeholder' => 'Capacidad',
                    'type' => 'text',
                    'value' => isset($board)?$board->capacity:"",
                ])
            </div>
            <div class="col-md-12 my-4">
                <button type="submit" class="btn btn-primary">Guardar</button>
                &nbsp;
            </div>
        </form>
    </div>

    </div>
@endsection
