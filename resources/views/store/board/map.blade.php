@extends('store.template.main')
@push('scripts')
<script src="{{ asset('/js/store/boart/startBoart.js?v=1') }}"></script>
@endpush
@push('css')
@endpush
@section('content')
    <div class="row">
        <div class="offset-md-2 col-8 text-center">
            <h3 class="page-title">Mapa de Mesas</h3>
        </div>
        <div class="col-12" id="app">
            <vue-boart :boards='@json($boards)' url="{{route('store_board_map_update')}}" csrf='{{csrf_token()}}'/>
        </div>
    </div>
    @include('commons.modal',['modalId'=> 'modal-upsert'])
@endsection
