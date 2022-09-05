@extends('store.template.main')
@section('content')
    <div class="row">
        <div class="offset-md-2 col-8 text-center">
            <h3 class="page-title">Empleados</h3>
        </div>
        <div class="col-2 text-center">
            <a href="{{ route('store_employee_upsert') }}" class="btn btn-secondary btn-upsert">Agregar</a>
        </div>
        <div class="col-12">
            <table id="datatable" class="table">
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
                                <a href="{{ route('store_employee_upsert', $employee->id) }}" data-toggle="tooltip"
                                    data-placement="top" title="Editar" class="btn-upsert">
                                    <i class="fas fa-edit "></i>
                                </a>
                                <a href="{{ route('store_employee_show', ['id' => $employee->id]) }}" data-toggle="tooltip"
                                    class="btn-upsert" title="Ver">
                                    <i class="far fa-eye "></i>
                                </a>
                                </a>
                                <a href="{{ route('store_employee_delete', $employee->id) }}" data-toggle="tooltip"
                                    class="btn-upsert" title="Ver">
                                    <i class="far fa-trash-alt "></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
