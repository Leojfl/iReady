@extends('store.template.main')

@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Lista de Empleados</h3>
                    </div>
                    <a href="{{ route('employee_create') }}" class="btn btn-primary pull-right create">Nuevo
                        Empleado</a>
                    <br>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Activo</th>
                                            <th>Fk_id_user</th>
                                            <th>Fk_id_stor</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($raw as $employee)
                                            <tr>
                                                <td>{{ $employee->Activo }}</td>
                                                <td>{{ $employee->Fk_id_user }}</td>
                                                <td>{{ $employee->Fk_id_stor }}</td>
                                                <td>
                                                <td>
                                                    <a href="{{ route('employee_edit', $employee->id) }}"
                                                        class="btn btn-warning btn-sm">Editar</a>
                                                    <form action="{{ route('employee_delete', $employee->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type='submit' class="btn btn-sm btn-danger"
                                                            onClick="return confirm('estas seguro de eliminar el empleado?')">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        @endsection
