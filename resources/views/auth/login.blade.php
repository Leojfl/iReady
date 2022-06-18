@extends('admin.template.main')
@section('content')
    <div class="row " style="height: calc(100vh - 100px)">
        <div class="col-md-6 col-lg-4 mx-auto align-self-center">
            <div class="card shadow ">
                <div class="card-body">
                    <form method="POST" action="{{route('login_post')}}">
                        @csrf
                        <div class="row m-0">
                            <div class="col-md-12 text-center">
                                <img src="{{asset('img/logo.png')}}" height="70"/>
                            </div>
                            <div class="col-md-12 text-center mt-3">
                                <h3>Iniciar sesión</h3>
                            </div>

                            <div class="col-md-12 mt-2">
                                @include('commons.input',[
                                    'name' => 'username',
                                    'label' => 'Usuario',
                                    'properties' => ['formnovalidate']
                                ])
                            </div>
                            <div class="col-md-12 mt-2">
                                @include('commons.input',[
                                    'name' => 'password',
                                    'label' => 'Contraseña',
                                    'type' => 'password',
                                    'properties' => ['formnovalidate']
                                ])
                            </div>
                            <div class="col-md-12 text-center mt-3">
                                <button class="btn btn-primary">
                                    Iniciar sesión
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
