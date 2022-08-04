@extends('store.template.main')
@push('scripts')
@endpush
@push('css')
    
@endpush
@section('content')

  
        <div class="modal-body">
          <div class="p-2 bg-ligth border" style="border-radius: 100px">

                        <h1>{{isset($store)?$store->name:""}}</h1>
                    </div> 
                    <br>
                    <br>
                    <div class="p-2 bg-ligth border" style="border-radius: 100px">
                        <div>
                            <img style="width: 300px" src={{isset($store)?$store->img_url:""}}>
                            </div>
                            <h2>Descripcion :{{isset($store)?$store->description:""}}</h2>
                    <br>
                    <h2>Dueño :{{isset($store)?$store->owner:""}}</h2>
                    <br>
                    <h2>Telefono :{{isset($store)?$store->phone:""}}</h2>
                    <br>
                    <h2>RFC :{{isset($store)?$store->rfc:""}}</h2>
                    <br>
                    <h2>Ciudad :{{isset($store)?$store->address->city:""}}</h2>
                    <br>
                    <h2>Colonia :{{isset($store)?$store->address->colony:""}}</h2>
                    <br>
                    <h2>Codigo Postal :{{isset($store)?$store->address->zip_code:""}}</h2>
                    <br>
                    <h2>Calle :{{isset($store)?$store->address->street:""}}</h2>
                    <br>
                    <h2>N.exterior :{{isset($store)?$store->address->ext_num:""}}</h2>
                    <br>
            </div>
        </div>
        
      </div>
    </div>
  </div>


@endsection
