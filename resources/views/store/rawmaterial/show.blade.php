@extends('store.template.main')
@push('scripts')
@endpush
@push('css')
@endpush
@section('content')
<div class="row text-left">
    <div class="col-12 text-center">
        <h3>Material {{$rawMaterial->name}} </h3>
    </div>
    <div class="col-7 col-md-7 mx-auto px-md-5">
        <img src="{{asset($rawMaterial->img_url)}}" class="w-100">
    </div>
    <div class="col-6">
        <b>Unidad:</b> {{$rawMaterial->unit->value}}
    </div>
    <div class="col-6">
        <b>Precio:</b> ${{$rawMaterial->price}}
    </div>
    <div class="col-6">
        <b>Código:</b> {{$rawMaterial->code}}
    </div>
    <div class="col-6">
        <b>Cantidad:</b> {{$rawMaterial->quantity}}
    </div>
    <div class="col-6">
        <b>Min stock:</b> {{$rawMaterial->min_stok}}
    </div>
    <div class="col-6">
        <b>Max stock:</b> {{$rawMaterial->max_stok}}
    </div>
    <div class="col-6">
        <b> Ultimo precio: </b>
        {{$rawMaterial->last_price}}
    </div>
    <div class="col-12">
        <b> Descripción </b> <br>
        {{$rawMaterial->description}}
    </div>
</div>
@endsection

