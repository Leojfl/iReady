@extends('store.template.main')
@push('scripts')
@endpush
@push('css')
@endpush
@section('content')

<div class="row text-left">
    <div class="offset-md-2 col-8 text-center">
        <h3 class="page-title">Mis datos</h3>
    </div>
    <div class="col-2 text-center">
        <a href="{{route("store_update_data")}}"
           class="btn btn-secondary btn-upsert">Actualizar datos</a>
    </div>

    <div class="col-7 col-md-7 mx-auto px-md-5">
        <img src="{{asset($store->img_url)}}" class="w-100">
    </div>
    <div class="col-md-6">
        <b>Nombre:</b> {{$store->name}}
    </div>
    <div class="col-md-6">
        <b>Dueño:</b> {{$store->owner}}
    </div>
    <div class="col-md-6">
        <b>Número de teléfono:</b> {{$store->phone}}
    </div>
    <div class="col-md-6">
        <b>RFC:</b> {{$store->phone}}
    </div>
    <div class="col-md-6">
        <b>Descripción:</b> {{$store->description}}
    </div>
    @isset($store->address)
        <div class="col-md-12">
            <h4>Dirección</h4>
        </div>
        <div class="col-md-6">
            <b>Ciudad:</b> {{$store->address->city}}
        </div>
        <div class="col-md-6">
            <b>Colonia:</b> {{$store->address->colony}}
        </div>
        <div class="col-md-6">
            <b>Código postal:</b> {{$store->address->zip_code}}
        </div>
        <div class="col-md-6">
            <b>Calle:</b> {{$store->address->street}}
        </div>
        <div class="col-md-6">
            <b>Número:</b> {{$store->address->ext_num}}
        </div>
    @endif
</div>

@endsection
