@extends('store.template.main')
@section('content')
<div>
    <form method="POST" action="{{ route('raw_material_store') }}">
        {{ csrf_field() }}
        <div class="form-group">
        
            @include('commons.input',[
                'name' => 'name',
                'label' => 'Nombre del material',
                'placeholder' => 'Nombre del material',
                'type' => 'text',
            ])
        </div>
        <br>
        <div class="form-group">
        
            @include('commons.input',[
                'name' => 'quantity',
                'label' => 'Cantidad del material',
                'placeholder' => 'Cantidad del material',
                'type' => 'number',
            ])
        </div>
        <br>
        <div class="form-group">
          
            @include('commons.input',[
                'name' => 'min_stok',
                'label' => 'Stok minimo del material',
                'placeholder' => 'Stok minimo del material',
                'type' => 'number',
            ])
        </div>
        <br>
        <div class="form-group">
            
            @include('commons.input',[
                'name' => 'max_stok',
                'label' => 'Stok maximo del material',
                'placeholder' => 'Stok maximo del material',
                'type' => 'number',
            ])
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            &nbsp;
            <a href="{{ route('raw_material_index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
@endsection
