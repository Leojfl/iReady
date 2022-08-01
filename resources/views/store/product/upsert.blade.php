@php
    $productId = isset($product)?$product->id:"";
@endphp
@extends('store.template.main')
@push('scripts')
<script src="{{ asset('/js/vue-config.js?v=1') }}"></script>
<script src="{{ asset('/js/store/product/startForm.js?v=1') }}"></script>
@endpush
@push('css')
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <h3>{{isset($product)?"Modificar":"Agregar"}} producto </h3>
    </div>
    <div class="col-12">
        <form id="form-upsert"
            action="{{route('store_product_upsert_post',['productId'=>$productId])}}"
            method="POST"
            enctype="multipart/form-data"
            >
            @csrf

            <div class="col-12 col-md-9 mx-auto mb-4">
                @include('commons.select', [
                    'label' => 'Categoria',
                    'name' => 'fk_id_category',
                    'selected' => isset($product) ? $product->fk_id_category : null,
                    'options' => $categories
                ])
            </div>

            <div id="app" class="col-12 col-md-9 mx-auto ">
                <vue-form is-new="{{($product)?0:1}}" ingredients='@json($ingredients)'>
                </vue-form>
            </div>
            <div class="col-12 text-center mt-5 mb-5">
                <button class="btn btn-primary">Guardar</button>
            </div>

        </form>
    </div>
</div>
@endsection
