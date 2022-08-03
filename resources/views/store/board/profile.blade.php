@extends('store.template.main')
@push('scripts')
@endpush
@push('css')
    
@endpush
@section('content')
<!-- Button trigger modal -->
  <a class="far fa-eye " class="btn-upsert" data-bs-toggle="modal"  data-bs-target="#exampleModal"></a>
  
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>


@endsection

