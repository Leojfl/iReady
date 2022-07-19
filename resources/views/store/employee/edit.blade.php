@extends('store.template.main')
@section('content')
    <div>
        <form method="POST" action="{{ route('employee_update', $employee->id) }}">
            {{ csrf_field() }}
            <div class="form-group">

                @include('commons.select', [
                    'name' => 'active',
                    'placeholder' => 'Activo',
                    'options' => [
                        '1' => 'Activo',
                        '0' => 'Inactivo',
                    ],
                    'selected' => $employee->active,
                    'label' => 'Status',
                ])
            </div>
            <div class="form-group">

                @include('commons.input', [
                    'name' => 'fk_id_user',
                    'label' => 'Usuario',
                    'placeholder' => 'Fk id de usuario',
                    'type' => 'number',
                    'value' => $employee->fk_id_user,
                ])
            </div>

            @include('commons.input', [
                'name' => 'fk_id_store',
                'label' => 'Tienda',
                'placeholder' => 'Fk id de tienda',
                'type' => 'number',
                'value' => $employee->fk_id_store,
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
