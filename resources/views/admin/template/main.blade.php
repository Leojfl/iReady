<!doctype html>
<html lang="es">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- Styles -->
        @include('admin.template.global_css')
        @stack('css')

        <title>{{ env('APP_NAME') }} @yield('title')</title>
    </head>
    <body>
        <div class="container-main">
            @auth
                <div class="d-inline-flex bg-primary">
                    @include('admin.components.sidebar')
                </div>
            @endauth
                <div class="row w-100 m-0">
                    <div class="col-12 px-0 px-md-2 text-center">
                        <div class="card-main m-4" style="overflow-y: scroll">
                            <div class="card-body" style="height: 90vh; max-height: 90vh">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <!-- JavaScript -->
        @include('admin.template.global_js')
        @stack('scripts')
    </body>
</html>
