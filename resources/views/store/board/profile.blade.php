@extends('store.template.main')
@push('scripts')
@endpush
@push('css')
    
@endpush
@section('content')

        <div class="modal-body">
          <div class="p-2 bg-ligth border" style="border-radius: 45px">

                        <h1>{{isset($board)?$board->name:""}}</h1>
                    </div> 
                    <br>
                    <br>
                    <div class="p-2 bg-ligth border" style="border-radius: 45px">
                    <h2>Descripcion :{{isset($board)?$board->description:""}}</h2>
                    <br>
                    <h2>Activo :{{isset($board)?$board->active:""}}</h2>
                    <br>
                    <h2>Disponible :{{isset($board)?$board->available:""}}</h2>
                    <br>
            </div>
        </div>
@endsection

