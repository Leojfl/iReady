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
                                                    <a href="{{ route('store_employee_upsert', $employee->id) }}"
                                                        class="btn btn-warning btn-sm">Editar</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        @endsection
