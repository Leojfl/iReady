@php
    /**
    * @var $client \App\Models\Client
    */

@endphp
@extends('admin.template.main')
@push('scripts')
@endpush
@push('css')
    
@endpush
@section('content')
    <div class="row">
        <div class="offset-md-2 col-8 text-center">
            <h3 class="page-title">Restaurantes</h3>
        </div>
        <div class="col-2 text-center">
            <a href="#" data-url="{{route("admin_store_upsert",['storeId'=> 0])}}"
               class="btn btn-secondary btn-upsert">Agregar</a>
        </div>
        <div class="col-md-12 mt-3">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col" style="width: 100px">Logo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Propietario</th>
                    <th scope="col">Dirección</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($stores as $store)
                    <tr>
                        <td>{{$store->id}}</td>
                        <td>
                            <div class="card">
                                <img src="{{$store->img_url}}" style="height: 100px; width: 100px;
                                object-fit: scale-down"/>
                            </div>
                        <td>{{$store->name}}</td>
                        <td>{{$store->owner}}</td>
                        <td>Direccion</td>
                        <td>
                            <a href="#"
                               
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Editar"
                               class="btn-upsert">
                                <i class="fas fa-edit "></i>
                            </a>
                            <a href="#"
                               
                               data-toggle="tooltip"
                               class="btn-upsert"
                               title="Ver">
                                <i class="far fa-eye "></i>
                            </a>
                            <a 
                               class="btn-update-status">
                                <i class="fas {{$store->active?'fa-toggle-on':'fa-toggle-off'}}"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th class="text-center" colspan="6">
                            <i>Sin restaurantes registrados</i>
                        </th>
                    </tr>

                @endforelse
                </tbody>
            </table>

        </div>
    </div>

    @include('commons.modal',['modalId'=> 'modal-upsert'])

@endsection
