@extends('store.template.main')
@push('scripts')
@endpush
@push('css')
    
@endpush
@section('content')

        <div class="modal-body">
          <div class="p-2 bg-ligth border" style="border-radius: 45px; background-color: darkred">

                        <h1 style="color: white">Codigo :{{isset($rawmaterial)?$rawmaterial->code:""}}</h1>
                        
                    </div> 
                    <div class="p-2 bg-ligth border" style="border-radius: 100px">
                        <div>
                            <img style="width: 300px" src={{isset($rawmaterial)?$rawmaterial->img_url:""}}>
                            </div>
                    <br>
                    <br>
                    <div class="p-2 bg-ligth border" style="border-radius: 45px">
                    <h2>Descripcion :{{isset($rawmaterial)?$rawmaterial->description:""}}</h2>
                    <br>
                    <h2>Grupo :{{isset($rawmaterial)?$rawmaterial->group:""}}</h2>
                    <br>
                    <h2>Unidad :{{isset($rawmaterial)?$rawmaterial->unit:""}}</h2>
                    <br>
                    <h2>Proovedor :{{isset($rawmaterial)?$rawmaterial->provider:""}}</h2>
                    <br>
                    <h2>Precio :{{isset($rawmaterial)?$rawmaterial->price:""}}</h2>
                    <br>
            </div>
        </div>
@endsection
