@extends('store.template.main')
@push('scripts')
@endpush
@push('css')

@endpush
@section('content')
<div class="row">
    <div class="offset-md-2 col-8 text-center">
        <h3 class="page-title">Compras</h3>
    </div>
    <div class="col-2 text-center">
        <a href="{{route("store_raw_material_upsert",['productId'=> 0])}}"
           class="btn btn-secondary btn-upsert">Agregar</a>
    </div>
    <div class="col-md-12 mt-3">
        <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col" style="width: 100px">Material</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Fecha</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($shoppings as $shopping)

            <tr>
                <td>{{$shopping->id}}</td>
                <td>{{$shopping->material->name.' ('.$shopping->material->unit->value.')'}}</td>
                <td>
                   {{$shopping->quantity.'('.$shopping->material->unit->value.')'}}
                </td>
                <td>{{$shopping->price}}</td>
                <td>{{$shopping->provider->full_name}}</td>
                <td>{{$shopping->date}}</td>
                <td>
                    <a href="{{route("store_raw_material_upsert",['rawMaterialId'=> $shopping->id])}}"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Editar"
                    class="btn-upsert">
                     <i class="fas fa-edit "></i>
                 </a>
                 <a href="{{route("store_raw_material_show",['rawMaterialId'=> $shopping->id])}}"

                    data-toggle="tooltip"
                    class="btn-upsert"
                    title="Ver">
                     <i class="far fa-eye "></i>
                 </a>

                </td>
            </tr>
        @empty
            <tr>
                <th class="text-center" colspan="6">
                    <i>Sin compras</i>
                </th>
            </tr>
        @endforelse
        </tbody>
        </table>
    </div>
</div>
@endsection
