@php
    /**
    * @var $client \App\Models\Client
    */

@endphp
@extends('store.template.main')
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"
integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA=="
crossorigin="anonymous"
referrerpolicy="no-referrer"></script>
<script>
    var url = @json(route('chart_test'));
</script>
<script src="{{asset('js/web/menu.js')}}">
</script>

@endpush
@push('css')

@endpush
@section('content')
<input id="inp-url" value="{{route('chart_test')}}">
    <div class="row">
        <div class="col-12">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
    </div>

@endsection
