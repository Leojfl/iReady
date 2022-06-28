@extends('store.template.main')

@section('content')
<div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista de Restaurantes</h3>
                </div>
                <style>
                    a.create {
                     align-content: 'right';
                     align-items: 'right';
                    }
                </style>
                <a href="{{ route('store_data_create') }}" class="btn btn-success pull-right create">Nuevo Restaurante</a>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Nombre</th>
                                        <th>Dueño</th>
                                        <th>Telefono</th>
                                        <th>RFC</th>
                                        <th>Descripcion</th>
                                        <th>URL de imagen</th>
                                        <th>Ciudad</th>
                                        <th>Colonia</th>
                                        <th>Codigo postal</th>
                                        <th>Calle</th>
                                        <th>Numero exterior</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($raw as $storedata)
                                    <tr>
                                        <td>{{ $storedata->id }}</td>
                                        <td>{{ $storedata->name }}</td>
                                        <td>{{ $storedata->owner }}</td>
                                        <td>{{ $storedata->phone }}</td>
                                        <td>{{ $storedata->rfc }}</td>
                                        <td>{{ $storedata->description }}</td>
                                        <td>{{ $storedata->img_url }}</td>
                                        <td>{{ $storedata->city }}</td>
                                        <td>{{ $storedata->colony }}</td>
                                        <td>{{ $storedata->zip_code }}</td>
                                        <td>{{ $storedata->street }}</td>
                                        <td>{{ $storedata->ext_num }}</td>
                                        <td>
                                            <a href="{{ route('store_data_edit', $storedata->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form
                                            action="{{ route('store_data_delete', $storedata->id) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type='submit'
                                                class="btn btn-sm btn-danger"
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