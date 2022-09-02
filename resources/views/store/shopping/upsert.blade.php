@extends('store.template.main')
@push('scripts')
    <script src="{{asset('js/generic/datapicker.js')}}"></script>
    <script src="{{asset('js/generic/datapicker_es.js')}}"></script>
    <script src="{{asset('js/store/shopping/upsert.js')}}"></script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('/css/datepicker.css') }}">
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <h3>{{isset($providerMaterial)?"Modificar": "Agregar"}} Compra</h3>
    </div>
    <div class="col-12 col-md-8 mx-auto">
        <form method="POST"
        class="row"
        action="{{ route('store_shopping_upsert_post', ['providerMaterialId' => isset($providerMaterial)?$providerMaterial->id:"0"]) }}">
            @csrf
            <div class="col-md-6">
                @include('commons.select', [
                    'label' => 'Material',
                    'name' => 'fk_id_raw_material',
                    'selected' => isset($providerMaterial) ? $providerMaterial->fk_id_raw_material : null,
                    'options' => $materials
                ])
            </div>
            <div class="col-md-6">
                @include('commons.select', [
                    'label' => 'Proveedor',
                    'name' => 'fk_id_provider',
                    'selected' => isset($providerMaterial) ? $providerMaterial->fk_id_provider : null,
                    'options' => $providers
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'quantity',
                    'label' => 'Cantidad',
                    'placeholder' => 'Cantidad',
                    'value' => isset($providerMaterial)?$providerMaterial->quantity:"",
                ])
            </div>

            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'price',
                    'label' => 'Precio',
                    'placeholder' => 'Precio',
                    'value' => isset($providerMaterial)?$providerMaterial->provider:"",
                ])
            </div>
            <div class="col-md-12">
                @include('commons.input',[
                    'name' => 'description',
                    'label' => 'Descripción',
                    'placeholder' => 'Descripción',
                    'type' => 'text',
                    'value' => isset($providerMaterial)?$providerMaterial->description:"",
                ])
            </div>
            <div class="col-md-12">
                @include('commons.input',[
                    'inputClass' => 'datepicker-here',
                    'name' => 'date',
                    'label' => 'Fecha',
                    'placeholder' => 'Fecha',
                    'type' => 'text',
                    'value' => isset($providerMaterial)?$providerMaterial->description:"",
                ])
            </div>
            <div class="col-md-12 my-4">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>

        </form>
    </div>

    </div>
@endsection
