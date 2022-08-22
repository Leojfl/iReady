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
            <h3 class="page-title">Productos</h3>
        </div>
        <div class="col-2 text-center">
            <a href="{{route("store_product_upsert",['productId'=> 0])}}"
               class="btn btn-secondary btn-upsert">Agregar</a>
        </div>
        <div class="col-md-12 mt-3">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <button class="nav-link active"
                  id="nav-product-tab"
                  data-bs-toggle="tab"
                  data-bs-target="#nav-product"
                  type="button" role="tab"
                  aria-controls="nav-product"
                  aria-selected="true">Productos</button>

                  <button class="nav-link"
                   id="nav-combo-tab"
                   data-bs-toggle="tab"
                   data-bs-target="#nav-combo"
                   type="button"
                   role="tab"
                   aria-controls="nav-combo"
                   aria-selected="false">Combos</button>
                </div>
            </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab" tabindex="0">

                    <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col" style="width: 100px">Imagen</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>
                                <div class="card">
                                    <img src="{{asset($product->image_url)}}" style="height: 100px; width: 100px;
                                    object-fit: scale-down"/>
                                </div>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->price}}</td>
                            <td>
                                <a href="{{route("store_product_upsert",['productId'=> $product->id])}}"

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
                                <a data-url="{{route('store_product_upsert_status', ['productId' => $product->id])}}"
                                class="btn-update-status">
                                    <i class="fas {{$product->show?'fa-toggle-on':'fa-toggle-off'}}  cursor-pointer"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <th class="text-center" colspan="6">
                                <i>Sin producto registrados</i>
                            </th>
                        </tr>
                    @endforelse
                    </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="nav-combo" role="tabpanel" aria-labelledby="nav-combo-tab" tabindex="0">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col" style="width: 100px">Imagen</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Ingredientes</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($combos as $combo)
                            <tr>
                                <td>{{$combo->id}}</td>
                                <td>
                                    <div class="card">
                                        <img src="{{$combo->img_url}}" style="height: 100px; width: 100px;
                                        object-fit: scale-down"/>
                                    </div>
                                <td>{{$combo->name}}</td>
                                <td>{{$combo->description}}</td>
                                <td>{{$combo->price}}</td>
                                <td>
                                    @foreach ( $combo->products as $product )
                                    {{$product->name.' '.$product->quantity}} <br>
                                    @endforeach
                                </td>
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
                                        <i class="fas {{$combo->active?'fa-toggle-on':'fa-toggle-off'}}"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <th class="text-center" colspan="6">
                                    <i>Sin combos registrados</i>
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
