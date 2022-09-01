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
            <th scope="col" style="width: 100px">Imagen</th>
            <th scope="col">Nombre</th>
            <th scope="col">Unidad</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Ultimo Precio</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($shoppings as $shopping)
            <tr>
                <td>{{$shopping->id}}</td>
                <td>
                </td>
                <td>{{$shopping->name}}</td>
                <td>{{$shopping->unit->value}}</td>
                <td>{{$shopping->quantity}}</td>
                <td>{{$shopping->last_price}}</td>
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
