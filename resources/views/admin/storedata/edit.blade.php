@extends('store.template.main')
@section('content')
<div>
    <form method="POST" action="{{ route('store_data_update', $storedata->id) }}">
        {{ csrf_field() }}
        <div class="form-group">
           
            @include('commons.input',[
                'name' => 'name',
                'label' => 'Nombre del restaurante',
                'placeholder' => 'Nombre del restaurante',
                'type' => 'text',
                'value' => $storedata->name,
            ])
        </div>
        <div class="form-group">
    
            @include('commons.input',[
                'name' => 'owner',
                'label' => 'Dueño del restaurante',
                'placeholder' => 'Dueño del restaurante',
                'type' => 'text',
                'value' => $storedata->owner,
            ])
        </div>
       
            @include('commons.input',[
                'name' => 'phone',
                'label' => 'Numero de telefono del restaurante',
                'placeholder' => 'Numero de telefono del restaurante',
                'type' => 'number',
                'value' => $storedata->phone,
            ])
        </div>
        <div class="form-group">
          
            @include('commons.input',[
                'name' => 'rfc',
                'label' => 'RFC del restaurante',
                'placeholder' => 'RFC del restaurante',
                'type' => 'text',
                'value' => $storedata->rfc,
            ])
        </div>
        <div class="form-group">
          
            @include('commons.input',[
                'name' => 'description',
                'label' => 'Descripcion del restaurante',
                'placeholder' => 'Descripcion del restaurante',
                'type' => 'text',
                'value' => $storedata->description,
            ])
        </div>
        <div class="form-group">
          
            @include('commons.input',[
                'name' => 'img_url',
                'label' => 'URL de la imagen del restaurante',
                'placeholder' => 'URL de la imagen del restaurante',
                'type' => 'text',
                'value' => $storedata->img_url,
            ])
        </div>
        <div class="form-group">
          
            @include('commons.input',[
                'name' => 'city',
                'label' => 'Ciudad donde se ubica',
                'placeholder' => 'Ciudad donde se ubica',
                'type' => 'text',
                'value' => $storedata->city,
            ])
        </div>
        <div class="form-group">
          
            @include('commons.input',[
                'name' => 'colony',
                'label' => 'Colonia donde se ubica',
                'placeholder' => 'Colonia donde se ubica',
                'type' => 'text',
                'value' => $storedata->colony,
            ])
        </div>
        <div class="form-group">
          
            @include('commons.input',[
                'name' => 'zip_code',
                'label' => 'Codigo postal',
                'placeholder' => 'Codigo postal',
                'type' => 'number',
                'value' => $storedata->zip_code,
            ])
        </div>
        <div class="form-group">
          
            @include('commons.input',[
                'name' => 'street',
                'label' => 'Calle donde se ubica',
                'placeholder' => 'Calle donde se ubica',
                'type' => 'text',
                'value' => $storedata->street,
            ])
        </div>
        <div class="form-group">
          
            @include('commons.input',[
                'name' => 'ext_num',
                'label' => 'Numero exterior',
                'placeholder' => 'Numero exterior',
                'type' => 'number',
                'value' => $storedata->ext_num,
            ])
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            &nbsp;
            <a href="{{route('store_data_index')}}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>
@endsection