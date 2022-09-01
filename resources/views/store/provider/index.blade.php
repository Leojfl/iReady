@php
    /**
    * @var $client \App\Models\Client
    */

@endphp
@extends('store.template.main')
@push('scripts')
    <script src="{{asset('js/store/product/index.js')}}"></script>
@endpush
@push('css')

@endpush
@section('content')
    <div class="row">
        <div class="offset-md-2 col-8 text-center">
            <h3 class="page-title">Proveedor</h3>
        </div>
        <div class="col-2 text-center">
            <a href="{{route("store_provider_upsert")}}"
               class="btn btn-secondary btn-upsert">Agregar</a>
        </div>
        <div class="col-md-12 mt-3">
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab" tabindex="0">

                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Télefono</th>
                        <th scope="col">Corrreo</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($providers as $provider)
                        <tr>
                            <td>{{$provider->id}}</td>
                            <td>{{$provider->name.' '.$provider->last_name.' '.$provider->second_last_name}}</td>
                            <td>{{$provider->phone}}</td>
                            <td>{{$provider->email}}</td>
                            <td>
                                <a href="{{route("store_provider_upsert",['providerId'=> $provider->id])}}"

                                data-toggle="tooltip"
                                data-placement="top"
                                title="Editar"
                                class="btn-upsert">
                                    <i class="fas fa-edit "></i>
                                </a>
                                <a href="{{route('store_shopping_provider', ['providerId' => $provider->id])}}"
                                data-toggle="tooltip"
                                class="btn-upsert"
                                title="Ver">
                                <i class="fas fa-list-alt"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th class="text-center" colspan="6">
                                <i>Sin proveedores registrados</i>
                            </th>
                        </tr>
                    @endforelse
                    </tbody>
                    </table>
                </div>
              </div>
        </div>
    </div>

    @include('commons.modal',['modalId'=> 'modal-upsert'])

@endsection
