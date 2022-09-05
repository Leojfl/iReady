@extends('store.template.main')
@push('scripts')
@endpush
@push('css')
@endpush
@section('content')
    <div class="row text-left">
        <div class="col-12 text-center">
            <h3>{{ $employee->user->username }} </h3>
        </div>

        <div class="col-7 col-md-7 mx-auto px-md-5">
            <img src="{{asset($employee->img_url)}}" class="w-100">
        </div>

        <div class="col-12">
            <b> Nombre </b> <br>
            {{ $employee->user->name }}

            <b> Apellido </b> <br>
            {{ $employee->user->last_name }}

            <b> Telefono </b> <br>
            {{ $employee->phone }}

            <b> Email </b> <br>
            {{ $employee->email }}

            <b> url_image</b> <br>
            {{ $employee->url_image }}

            <b> rfc </b> <br>
            {{ $employee->rfc }}

            <b> curp </b> <br>
            {{ $employee->curp }}

            <b> phone </b> <br>
            {{ $employee->phone }}

            <b> email </b> <br>
            {{ $employee->email }}

            <b> cell_phone </b> <br>
            {{ $employee->cell_phone }}

            <b> social_security </b> <br>
            {{ $employee->social_security }}

            <b> recidence </b> <br>
            {{ $employee->recidence }}

            <b> outdoor_number </b> <br>
            {{ $employee->outdoor_number }}

            <b> cp </b> <br>
            {{ $employee->cp }}

            <b> city </b> <br>
            {{ $employee->city }}

            <b> salary </b> <br>
            {{ $employee->salary }}

            <b> area </b> <br>
            {{ $employee->area }}

            <b> workstation </b> <br>
            {{ $employee->workstation }}

            <b> password </b> <br>
            {{ $employee->password }}

            <b> active </b> <br>
            {{ $employee->active }}

            <b> fk_id_user </b> <br>
            {{ $employee->fk_id_user }}

            <b> fk_id_store </b> <br>
            {{ $employee->fk_id_store }}
        </div>
    </div>
    </div>
    </div>
@endsection
