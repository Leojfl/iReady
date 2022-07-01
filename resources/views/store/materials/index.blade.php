@extends('store.template.main')

@section('content')
    <div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Lista de Materiales</h3>
                    </div>
                    <a href="{{ route('raw_material_create') }}" class="btn btn-primary pull-right create">Nuevo
                        Material</a>
                    <br>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Stok Minimo</th>
                                            <th>Stok Maximo</th>
                                            <th>Tienda</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($raw as $material)
                                            <tr>
                                                <td>{{ $material->id }}</td>
                                                <td>{{ $material->name }}</td>
                                                <td>{{ $material->quantity }}</td>
                                                <td>{{ $material->min_stok }}</td>
                                                <td>{{ $material->max_stok }}</td>
                                                <td>{{ $material->fk_id_store }}</td>
                                                <td>
                                                    <a href="{{ route('raw_material_edit', $material->id) }}"
                                                        class="btn btn-warning btn-sm">Editar</a>
                                                    <form action="{{ route('raw_material_delete', $material->id) }}"
                                                        method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type='submit' class="btn btn-sm btn-danger"
                                                            onClick="return confirm('estas seguro  a eliminar el registro?')">
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
