@extends('store.template.main')
@push('scripts')
@endpush
@push('css')
@endpush
@section('content')
<div class="row text-left">
    <div class="col-12 text-center">
        <h3>Producto {{$product->name}} </h3>
    </div>
    <div class="col-7 col-md-7 mx-auto px-md-5">
        <img src="{{asset($product->absolute_image_url)}}" class="w-100">
    </div>
    <div class="col-6">
        <b>Categoria:</b> {{$product->category->name}}
    </div>
    <div class="col-6">
        <b>Precio:</b> ${{$product->price}}
    </div>
    <div class="col-12">
        <b> Descripción </b> <br>
        {{$product->description}}
    </div>
    <div class="col-12 mt-4">
        <h4>Ingredientes</h4>
        <div class="row">
            @foreach ($product->materials as $ingredient)
            <div class="col-12">
                {{$ingredient->name}}
                <b>(
                    {{$ingredient->pivot->quantity}}
                    <i>{{$ingredient->unit->value}}</i>
                    )</b>
            </div>

            @endforeach
        </div>
    </div>
</div>
@endsection
