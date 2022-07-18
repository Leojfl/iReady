@extends('store.template.main')
@section('content')
    <div>
        <form method="POST" action="{{ route('employee_update', $employee->id) }}">
            {{ csrf_field() }}
            <div class="form-group">

                @include('commons.input', [
                    'active' => 'active',
                    'label' => 'Activo',
                    'placeholder' => ' Estatus Activo',
                    'type' => 'text',
                    'value' => $employee->active,
                ])
            </div>
            <div class="form-group">

                @include('commons.input', [
                    'name' => 'fk_id_user',
                    'label' => 'Fk_id_usuario',
                    'placeholder' => 'Fk id de usuario',
                    'type' => 'number',
                    'value' => $employee->fk_id_user,
                ])
            </div>

            @include('commons.input', [
                'name' => 'fk_id_stor',
                'label' => 'Fk_id_tienda',
                'placeholder' => 'Fk id de tienda',
                'type' => 'number',
                'value' => $employee->min_stok,
            ])
    </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Guardar</button>
        &nbsp;
        <a href="{{ route('employee_index') }}" class="btn btn-danger">Cancelar</a>
    </div>
    </form>
    </div>
@endsection
