<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Styles -->
        @include('store.template.global_css')
        @stack('css')

        <title>{{ env('APP_NAME') }} @yield('title')</title>
    </head>
    <body>
        <div class="container-main">
            @auth
                <div class="d-inline-flex bg-primary">
                    @include('store.componets.sidebar')
                </div>
            @endauth
                <div class="row w-100 m-0">
                    <div class="col-12 px-0 px-md-2 text-center">
                        <div class="card-main m-4" style="overflow-y: scroll">
                            <div class="card-body" style="height: 90vh; max-height: 90vh">
                                @if ($errors->has("generic_error"))
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="alert alert-danger" role="alert">
                                                {{$errors->first("generic_error")}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- JavaScript -->
        @include('store.template.global_js')
        @stack('scripts')
    </body>
</html>
