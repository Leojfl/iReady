@extends('store.template.main')
@section('content')
<div class="row">
    <div class="col-12">
        <h3>{{isset($ticket)?"Modificar": "Agregar"}} Tickets</h3>
    </div>
    <div class="col-12 col-md-8 mx-auto">
        <form method="POST" action="{{ route('store_ticket_upsert_post', isset($ticket)?$ticket->id:"") }}">
            {{ csrf_field() }}
            <div class="form-group">
               
                @include('commons.input',[
                    'name' => 'head',
                    'label' => 'Encabezado del ticket',
                    'placeholder' => 'Encabezado del ticket',
                    'type' => 'text',
                    'value' => isset($ticket)?$ticket->head:"",
                    
                ])
            </div>
            <div class="form-group">
        
                @include('commons.input',[
                    'name' => 'footnote1',
                    'label' => 'Pie de nota 1',
                    'placeholder' => 'Pie de nota 1',
                    'type' => 'text',
                    'value' => isset($ticket)?$ticket->footnote1:"",
                ])
            </div>
            <div class="form-group">
        
                @include('commons.input',[
                    'name' => 'footnote2',
                    'label' => 'Pie de nota 2',
                    'placeholder' => 'Pie de nota 2',
                    'type' => 'text',
                    'value' => isset($ticket)?$ticket->footnote2:"",
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