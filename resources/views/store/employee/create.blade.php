@php
$address = null;
if ($employee != null && $employee->address != null) {
    $address = $employee->address;
}
@endphp
@extends('store.template.main')
@section('content')
    <div class="row">
        <div class="col-12">
            <h3>{{ isset($product) ? 'Modificar' : 'Agregar' }} empleado </h3>
        </div>
        <form method="POST" action="{{ route('store_employee_update') }}" class="col-10 mx-auto" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <h6>Datos personales</h6>
                </div>
                <div class="col-6">
                    @include('commons.input', [
                        'name' => 'name',
                        'label' => 'Nombre',
                        'placeholder' => 'Nombre',
                        'type' => 'text',
                        'value' => isset($employee) ? $employee->user->name : '',
                    ])
                </div>
                <div class="col-6">
                    @include('commons.input', [
                        'name' => 'last_name',
                        'label' => 'Apedillo paterno',
                        'placeholder' => 'Apedillo',
                        'type' => 'text',
                        'value' => isset($employee) ? $employee->user->last_name : '',
                    ])
                </div>
                <div class="col-6">
                    @include('commons.input', [
                        'name' => 'second_last_name',
                        'label' => 'Apedillo materno',
                        'placeholder' => 'Segundo Apedillo',
                        'type' => 'text',
                        'value' => isset($employee) ? $employee->user->second_last_name : '',
                    ])
                </div>
                <div class="col-6">
                    @include('commons.input', [
                        'name' => 'rfc',
                        'label' => 'RFC',
                        'placeholder' => 'RFC',
                        'type' => 'text',
                        'value' => isset($employee) ? $employee->rfc : '',
                    ])
                </div>
                <div class="col-6">
                    @include('commons.input', [
                        'name' => 'curp',
                        'label' => 'CURP',
                        'placeholder' => 'CURP',
                        'type' => 'text',
                        'value' => isset($employee) ? $employee->curp : '',
                    ])
                </div>
                <div class="col-6">
                    @include('commons.input', [
                        'name' => 'social_security',
                        'label' => 'Seguro Social',
                        'placeholder' => 'Seguro Social',
                        'type' => 'number',
                        'value' => isset($employee) ? $employee->social_security : '',
                    ])
                </div>

                <div class="col-6">
                    @include('commons.input', [
                        'name' => 'salary',
                        'label' => 'Salario',
                        'placeholder' => 'Salario',
                        'type' => 'number',
                        'value' => isset($employee) ? $employee->salary : '',
                    ])
                </div>

                <div class="col-6">
                    @include('commons.input', [
                        'name' => 'img_url',
                        'label' => 'Imagen',
                        'placeholder' => 'Imagen',
                        'type' => 'file',
                        'value' => isset($employee) ? $employee->img_url : '',
                        'inputClass' => 'show-image-file',
                        'properties' => ['data-for=img_show_image'],
                    ])
                </div>
                <div class="col-md-7 mx-auto">
                    <img class="w-100" id="img_show_image" src="{{ asset(isset($employee) ? $employee->img_url : '') }}">
                </div>
                <div class="col-12 my-4">
                    <h6>Datos de contacto</h6>
                </div>
                <div class="col-6">
                    @include('commons.input', [
                        'name' => 'phone',
                        'label' => 'Telefono',
                        'placeholder' => 'Telefono',
                        'type' => 'number',
                        'value' => isset($employee) ? $employee->phone : '',
                    ])
                </div>
                <div class="col-6">
                    @include('commons.input', [
                        'name' => 'email',
                        'label' => 'Correo Electronico',
                        'placeholder' => 'Correo Electronico',
                        'type' => 'text',
                        'value' => isset($employee) ? $employee->email : '',
                    ])
                </div>
                <div class="col-6">
                    @include('commons.input', [
                        'name' => 'cell_phone',
                        'label' => 'Celular',
                        'placeholder' => 'Celular',
                        'type' => 'number',
                        'value' => isset($employee) ? $employee->cell_phone : '',
                    ])
                </div>

                <div class="col-12 my-4">
                    <h6>Dirección</h6>
                </div>

                <div class="col-md-6 mx-auto">
                    @include('commons.input', [
                        'name' => 'street',
                        'label' => 'Calle',
                        'value' => isset($address) ? $address->street : '',
                    ])
                </div>
                <div class="col-md-3 mx-auto">
                    @include('commons.input', [
                        'name' => 'ext_num',
                        'label' => 'Número exterior',
                        'value' => isset($address) ? $address->ext_num : '',
                    ])
                </div>

                <div class="col-md-3 mx-auto">
                    @include('commons.input', [
                        'name' => 'int_num',
                        'label' => 'Número interior',
                        'value' => isset($address) ? $address->int_num : '',
                    ])
                </div>
                <div class="col-md-6 mx-auto">
                    @include('commons.input', [
                        'name' => 'colony',
                        'label' => 'Colonia',
                        'value' => isset($address) ? $address->colony : '',
                    ])
                </div>
                <div class="col-md-6 mx-auto">
                    @include('commons.input', [
                        'name' => 'zip_code',
                        'label' => 'Código postal',
                        'value' => isset($address) ? $address->zip_code : '',
                    ])
                </div>
                <div class="col-md-6 mx-auto">
                    @include('commons.input', [
                        'name' => 'city',
                        'label' => 'Ciudad',
                        'value' => isset($address) ? $address->city : '',
                    ])
                </div>
                <div class="col-md-6 ">
                    @include('commons.input', [
                        'name' => 'township',
                        'label' => 'Municipio',
                        'value' => isset($address) ? $address->township : '',
                    ])
                </div>

                <div class="col-12 my-4">
                    <h6>Usuario</h6>
                </div>

                <div class="col-6">
                    @include('commons.input', [
                        'name' => 'username',
                        'label' => 'Nombre de Usuario',
                        'placeholder' => 'Nombre de Usuario',
                        'type' => 'text',
                        'value' => isset($employee) ? $employee->user->username : '',
                    ])
                </div>
                <div class="col-6">
                    @include('commons.input', [
                        'name' => 'password',
                        'label' => 'Contraseña',
                        'placeholder' => 'Contraseña',
                        'type' => 'password',
                    ])
                </div>
                <div class="col-12 my-4">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    &nbsp;
                </div>
            </div>
        </form>
    </div>
@endsection
