@extends('store.template.main')
@push('scripts')
@endpush
@push('css')

@endpush
@section('content')
<div class="row">
    <div class="offset-md-2 col-8 text-center">
        <h3 class="page-title">Materia prima</h3>
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
            <th scope="col">Precio</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @forelse($rawMaterials as $rawMaterial)
            <tr>
                <td>{{$rawMaterial->id}}</td>
                <td>
                    <div class="card">
                        <img src="{{asset($rawMaterial->img_url)}}" style="height: 100px; width: 100px;
                        object-fit: scale-down"/>
                    </div>
                </td>
                <td>{{$rawMaterial->name}}</td>
                <td>{{$rawMaterial->unit->value}}</td>
                <td>{{$rawMaterial->quantity}}</td>
                <td>{{$rawMaterial->price}}</td>
                <td>
                    <a href="{{route("store_raw_material_upsert",['rawMaterialId'=> $rawMaterial->id])}}"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="Editar"
                    class="btn-upsert">
                     <i class="fas fa-edit "></i>
                 </a>
                 <a href="{{route("store_raw_material_show",['rawMaterialId'=> $rawMaterial->id])}}"

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
                    <i>Sin materia prima</i>
                </th>
            </tr>
        @endforelse
        </tbody>
        </table>
    </div>
</div>
@endsection
