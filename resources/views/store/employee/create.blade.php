@extends('store.template.main')
@section('content')
    <div>
        <form method="POST" action="{{ route('employee_store') }}">
            {{ csrf_field() }}
            <div class="form-group">

                @include('commons.select', [
                    'name' => 'active',
                    'placeholder' => 'Activo',
                    'options' => [
                        '1' => 'Activo',
                        '0' => 'Inactivo',
                    ],
                    'selected' => '1',
                    'label' => 'Activo',
                ])
            </div>
            <br>
            <div class="form-group">

                @include('commons.input', [
                    'name' => 'fk_id_user',
                    'label' => 'Fk_id_usuario',
                    'placeholder' => 'Fk_id_usuario',
                    'type' => 'number',
                ])
            </div>
            <br>
            <div class="form-group">

                @include('commons.input', [
                    'name' => 'fk_id_store',
                    'label' => 'Fk_id_tienda',
                    'placeholder' => 'Fk_id_tienda',
                    'type' => 'number',
                ])
            </div>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                &nbsp;
                <a href="{{ route('employee_index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>
@endsection

