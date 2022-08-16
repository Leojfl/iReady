@extends('store.template.main')

@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Lista de Empleados</h3>
                    </div>
                    <a href="{{ route('store_employee_upsert') }}" class="btn btn-primary pull-right create">Nuevo
                        Empleado</a>
                    <br>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre de Usuario</th>
                                            <th>Nombre</th>
                                            <th>Apedillo</th>
                                            <th>Segundo Apedillo</th>
                                            <th>Imagen</th>
                                            <th>Area</th>
                                            <th>Puesto</th>
                                            <th>RFC</th>
                                            <th>CURP</th>
                                            <th>Telefono</th>
                                            <th>Email</th>
                                            <th>Celular</th>
                                            <th>Seguro Social</th>
                                            <th>Domicilio</th>
                                            <th>Numero exterior</th>
                                            <th>CP</th>
                                            <th>Ciudad</th>
                                            <th>Sueldo</th>
                                            <th>Contraseña</th>
                                            <th>Activo</th>
                                            <th>Fk_id_user</th>
                                            <th>Fk_id_stor</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->username }}</td>
                                                <td>{{ $employee->name }}</td>
                                                <td>{{ $employee->last_name }}</td>
                                                <td>{{ $employee->second_last_name }}</td>
                                                <td>{{ $employee->url_image }}</td>
                                                <td>{{ $employee->rfc }}</td>
                                                <td>{{ $employee->curp }}</td>
                                                <td>{{ $employee->phone }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->cell_phone }}</td>
                                                <td>{{ $employee->social_security }}</td>
                                                <td>{{ $employee->recidence }}</td>
                                                <td>{{ $employee->outdoor_number }}</td>
                                                <td>{{ $employee->cp }}</td>
                                                <td>{{ $employee->city }}</td>
                                                <td>{{ $employee->salary }}</td>
                                                <td>{{ $employee->password }}</td>
                                                <td>{{ $employee->id }}</td>
                                                @if ($employee->active == 1)
                                                    <td>Activo</td>
                                                @else
                                                    <td>Inactivo</td>
                                                @endif
                                                <td>{{ $employee->fk_id_user }}</td>
                                                <td>{{ $employee->fk_id_store }}</td>
                                                <td>
                                                <td>
                                                <td>
                                                    <a href="{{ route('store_employee_upsert', $employee->id) }}"
                                                        class="btn btn-warning btn-sm">Editar</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        @endsection
