@extends('store.template.main')
@section('content')
    <div>
        <form method="POST" action="{{ route('employee_update', $employee->id) }}">
            {{ csrf_field() }}
            <div class="form-group">

                @include('commons.input', [
                    'name' => 'username',
                    'label' => 'Nombre de Usuario',
                    'placeholder' => 'Nombre de Usuario',
                    'type' => 'text',
                    'value' => $employee->username,
                ])
            </div>
            <br>

            <div class="form-group">

                @include('commons.input', [
                    'name' => 'name',
                    'label' => 'Nombre',
                    'placeholder' => 'Nombre',
                    'type' => 'text',
                    'value' => $employee->name,
                ])
            </div>
            <br>

            <div class="form-group">

                @include('commons.input', [
                    'name' => 'last_name',
                    'label' => 'Apedillo',
                    'placeholder' => 'Apedillo',
                    'type' => 'text',
                    'value' => $employee->last_name,
                ])
            </div>
            <br>

            <div class="form-group">

                @include('commons.input', [
                    'name' => 'second_last_name',
                    'label' => 'Segundo Apedillo',
                    'placeholder' => 'Segundo Apedillo',
                    'type' => 'text',
                    'value' => isset($employee) ? $employee->second_last_name,
                ])
            </div>
            <br>

            <div class="form-group">
                @include('commons.input', [
                    'name' => 'url_image',
                    'label' => 'Imagen',
                    'placeholder' => 'Imagen',
                    'type' => 'img',
                    'value' => isset($employee) ? $employee->url_image : '',
                ])
            </div>
            <br>

            <div class="form-group">
                @include('commons.input', [
                    'name' => 'rfc',
                    'label' => 'RFC',
                    'placeholder' => 'RFC',
                    'type' => 'text',
                    'value' => isset($employee) ? $employee->rfc : '',
                ])
            </div>
            <br>

            <div class="form-group">
                @include('commons.input', [
                    'name' => 'curp',
                    'label' => 'CURP',
                    'placeholder' => 'CURP',
                    'type' => 'text',
                    'value' => isset($employee) ? $employee->curp : '',
                ])
            </div>
            <br>

            <div class="form-group">
                @include('commons.input', [
                    'name' => 'phone',
                    'label' => 'Telefono',
                    'placeholder' => 'Telefono',
                    'type' => 'number',
                    'value' => isset($employee) ? $employee->phone : '',
                ])
            </div>
            <br>

            <div class="form-group">
                @include('commons.input', [
                    'name' => 'email',
                    'label' => 'Correo Electronico',
                    'placeholder' => 'Correo Electronico',
                    'type' => 'text',
                    'value' => isset($employee) ? $employee->email : '',
                ])
            </div>
            <br>

            <div class="form-group">
                @include('commons.input', [
                    'name' => 'cell_phone',
                    'label' => 'Celular',
                    'placeholder' => 'Celular',
                    'type' => 'number',
                    'value' => isset($employee) ? $employee->cell_phone : '',
                ])
            </div>
            <br>

            <div class="form-group">
                @include('commons.input', [
                    'name' => 'social_security',
                    'label' => 'Seguro Social',
                    'placeholder' => 'Seguro Social',
                    'type' => 'number',
                    'value' => isset($employee) ? $employee->social_security : '',
                ])
            </div>
            <br>

            <div class="form-group">
                @include('commons.input', [
                    'name' => 'recidence',
                    'label' => 'Recidencia',
                    'placeholder' => 'Recidencia',
                    'type' => 'text',
                    'value' => isset($employee) ? $employee->cell_phone : '',
                ])
            </div>
            <br>

            <div class="form-group">
                @include('commons.input', [
                    'name' => 'outdoor_number',
                    'label' => 'Numero Exterior',
                    'placeholder' => 'Numero Exterior',
                    'type' => 'number',
                    'value' => isset($employee) ? $employee->outdoor_number : '',
                ])
            </div>
            <br>

            <div class="form-group">
                @include('commons.input', [
                    'name' => 'cp',
                    'label' => 'CP',
                    'placeholder' => 'CP',
                    'type' => 'number',
                    'value' => isset($employee) ? $employee->cp : '',
                ])
            </div>
            <br>

            <div class="form-group">
                @include('commons.input', [
                    'name' => 'city',
                    'label' => 'ciudad',
                    'placeholder' => 'Ciudad',
                    'type' => 'text',
                    'value' => isset($employee) ? $employee->city : '',
                ])
            </div>
            <br>

            <div class="form-group">
                @include('commons.input', [
                    'name' => 'salary',
                    'label' => 'Salario',
                    'placeholder' => 'Salario',
                    'type' => 'number',
                    'value' => isset($employee) ? $employee->salary : '',
                ])
            </div>
            <br>

            <div class="form-group">

                @include('commons.input', [
                    'name' => 'password',
                    'label' => 'Contraseña',
                    'placeholder' => 'Contraseña',
                    'type' => 'number', 'text',
                    'value' => isset($employee) ? $employee->password,
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
                    'selected' => isset($employee) ? $employee->active,
                    'label' => 'Status',
                ])
            </div>


            <div class="form-group">

                @include('commons.input', [
                    'name' => 'fk_id_user',
                    'label' => 'Usuario',
                    'placeholder' => 'Fk id de usuario',
                    'type' => 'number',
                    'value' => isset($employee) ? $employee->fk_id_user,
                ])
            </div>

            @include('commons.input', [
                'name' => 'fk_id_store',
                'label' => 'Tienda',
                'placeholder' => 'Fk id de tienda',
                'type' => 'number',
                'value' => isset($employee) ? $employee->fk_id_store,
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
