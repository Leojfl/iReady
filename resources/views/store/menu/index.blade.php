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
            <h3 class="page-title">Menus</h3>
        </div>
        <div class="col-2 text-center">
            <a href="{{route("store_menu_upsert",['menuId'=> 0])}}"
               class="btn btn-secondary btn-upsert">Agregar</a>
        </div>
        <div class="col-md-12 mt-3">
            
              <div class="table">
                
                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                       
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($menus as $menu)
                        <tr>
                            <td>{{$menu->id}}</td>
                            <td>{{$menu->name}}</td>
                            <td>{{$menu->description}}</td>
                            <td>
                                <a href="{{route("store_menu_upsert",['menuId'=> $menu->id])}}"

                                data-toggle="tooltip"
                                data-placement="top"
                                title="Editar"
                                class="btn-upsert">
                                    <i class="fas fa-edit "></i>
                                </a>
                                <a href="{{route('store_menu_show', ['menuId' => $menu->id])}}"
                                data-toggle="tooltip"
                                class="btn-upsert"
                                title="Ver">
                                    <i class="far fa-eye "></i>
                                </a>
                                <a data-url="{{route('store_menu_upsert_status', ['menuId' => $menu->id])}}"
                                class="btn-update-status">
                                    <i class="fas {{$menu->active?'fa-toggle-on':'fa-toggle-off'}}  cursor-pointer"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th class="text-center" colspan="6">
                                <i>Sin menus registrados</i>
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