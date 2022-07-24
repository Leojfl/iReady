@extends('store.template.main')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="badge bg-primary text-wrap" style="width: 13rem;">
            <h1>{{isset($store)?$store->name:""}}</h1>
        </div> 
        <br>
        <br>
        
        <div class="text-start">
        <div class="badge bg-primary text-wrap" style="width: 77rem;">
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
        <h2>Ciudad :{{isset($store)?$store->city:""}}</h2>
        <br>
        <h2>Colonia :{{isset($store)?$store->colony:""}}</h2>
        <br>
        <h2>Codigo Postal :{{isset($store)?$store->zip_code:""}}</h2>
        <br>
        <h2>Calle :{{isset($store)?$store->street:""}}</h2>
        <br>
        <h2>N.exterior :{{isset($store)?$store->ext_num:""}}</h2>
        <br>
        </div>
        </div>
        
    </div>
</div>
@endsection

