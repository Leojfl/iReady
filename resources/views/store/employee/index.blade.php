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
                                            <th>Telefono</th>
                                            <th>Email</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            <tr>
                                                <td>{{ $employee->user->id }}</td>
                                                <td>{{ $employee->user->username }}</td>
                                                <td>{{ $employee->user->name }}</td>
                                                <td>{{ $employee->user->last_name }}</td>
                                                <td>{{ $employee->phone }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>


                                                    <a href="{{ route('store_employee_upsert', $employee->id) }}"
                                                        data-toggle="tooltip" data-placement="top" title="Editar"
                                                        class="btn-upsert">
                                                        <i class="fas fa-edit "></i>
                                                    </a>
                                                    <a href="{{route('store_employee_show', ['id' => $employee->id])}}"
                                                        data-toggle="tooltip"
                                                        class="btn-upsert"
                                                        title="Ver">
                                                            <i class="far fa-eye "></i>
                                                        </a>
                                                    </a>
                                                    <a href="{{ route('store_employee_delete', $employee->id) }}"
                                                        data-toggle="tooltip" class="btn-upsert" title="Ver">
                                                        <i class="far fa-trash-alt "></i>
                                                    </a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        @endsection
