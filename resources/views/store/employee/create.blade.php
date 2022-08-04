@extends('store.template.main')
@section('content')
    <div>
        <form method="POST" action="{{ route('store_employee_update') }}">
            {{ csrf_field() }}
            <div class="form-group">
                @include('commons.input', [
                    'name' => 'username',
                    'label' => 'Nombre de Usuario',
                    'placeholder' => 'Nombre de Usuario',
                    'type' => 'text',
                    'value' => isset($employee) ? $employee->user->username : '',
                ])
            </div>
            <br>

            <div class="form-group">

                @include('commons.input', [
                    'name' => 'name',
                    'label' => 'Nombre',
                    'placeholder' => 'Nombre',
                    'type' => 'text',
                    'value' => isset($employee) ? $employee->user->name : '',
                ])
            </div>
            <br>

            <div class="form-group">

                @include('commons.input', [
                    'name' => 'last_name',
                    'label' => 'Apedillo',
                    'placeholder' => 'Apedillo',
                    'type' => 'text',
                    'value' => isset($employee) ? $employee->user->last_name : '',
                ])
            </div>
            <br>

            <div class="form-group">

                @include('commons.input', [
                    'name' => 'second_last_name',
                    'label' => 'Segundo Apedillo',
                    'placeholder' => 'Segundo Apedillo',
                    'type' => 'text',
                    'value' => isset($employee) ? $employee->user->second_last_name : '',
                ])
            </div>
            <br>

            <div class="form-group">

                @include('commons.input', [
                    'name' => 'password',
                    'label' => 'Contraseña',
                    'placeholder' => 'Contraseña',
                    'type' => 'password',
                    'value' => isset($employee) ? $employee->user->password : '',
                ])
            </div>
            <br>

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

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                &nbsp;
            </div>
        </form>
    </div>
@endsection
