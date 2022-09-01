@extends('store.template.main')
@push('scripts')
@endpush
@push('css')
@endpush
@section('content')
<div class="row text-left">
    <div class="col-12 text-center">
        <h3>{{$menu->name}} </h3>
    </div>
    <div class="col-12">
        <b> Descripción </b> <br>
        {{$menu->description}}
    </div>
        </div>
    </div>
</div>
@endsection