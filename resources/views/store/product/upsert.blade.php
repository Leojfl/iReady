@php
    $productId = isset($product)?$product->id:"";
    $ingredientsInProduct = isset($product)?$product->materials:[];
    $productUpdate = $product;
    $productErrors = [];
    if ($errors->any()) {
        $productUpdate =  [
            "name" => old('name')??"",
            "price" => old('price')??"",
            "description" => old('description')??"",
            "show" => old('show') == "true"? 1 : 0
        ];
        $ingredientsInProduct = old('ingredinets');
        $productErrors = $errors->messages();
    }
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
                <vue-form is-new="{{($product)?0:1}}"
                :ingredients='@json($ingredients)'
                :product-update='@json($productUpdate)'
                :ingredients-in-product-update='@json($ingredientsInProduct)'
                :errors='@json($productErrors)'>
                </vue-form>
            </div>
            <div class="col-12 text-center mt-5 mb-5">
                <button class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
</div>
@endsection
