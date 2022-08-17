@extends('store.template.main')
@section('content')

<div class="row">
    <div class="col-12">
        <h3>{{isset($store)?"Modificar": "Agregar"}} Restaurantes</h3>
    </div>
    <div class="col-12 col-md-8 mx-auto">
        <form method="POST" action="{{ route('admin_store_upsert_post', isset($store)?$store->id:"") }}">
            {{ csrf_field() }}
            <div class="input-group mb-3">
               <pre>        </pre>
                @include('commons.input',[
                    'name' => 'name',
                    'label' => 'Nombre del restaurante',
                    'placeholder' => 'Nombre del restaurante',
                    'type' => 'text',
                    'value' => isset($store)?$store->name:"",
                ])
                <pre>                            </pre>
                
                @include('commons.input',[
                    'name' => 'owner',
                    'label' => 'Dueño del restaurante',
                    'placeholder' => 'Dueño del restaurante',
                    'type' => 'text',
                    'value' => isset($store)?$store->owner:"",
                ])

            </div>
            <div class="input-group mb-3">
                <pre>        </pre>
                @include('commons.input',[
                    'name' => 'owner',
                    'label' => 'Dueño del restaurante',
                    'placeholder' => 'Dueño del restaurante',
                    'type' => 'text',
                    'value' => isset($store)?$store->owner:"",
                ])
                <pre>                            </pre>
           
                @include('commons.input',[
                    'name' => 'phone',
                    'label' => 'Numero de telefono del restaurante',
                    'placeholder' => 'Numero de telefono del restaurante',
                    'type' => 'number',
                    'value' => isset($store)?$store->phone:"",
                ])
            <div class="input-group mb-3">
                <pre>        </pre>
                @include('commons.input',[
                    'name' => 'rfc',
                    'label' => 'RFC del restaurante',
                    'placeholder' => 'RFC del restaurante',
                    'type' => 'text',
                    'value' => isset($store)?$store->rfc:"",
                ])
              <pre>                            </pre>
                @include('commons.input',[
                    'name' => 'description',
                    'label' => 'Descripcion del restaurante',
                    'placeholder' => 'Descripcion del restaurante',
                    'type' => 'text',
                    'value' => isset($store)?$store->description:"",
                ])
            </div>
            <div class="input-group mb-3">
              <pre>                            </pre>
                @include('commons.input',[
                    'name' => 'img_url',
                    'label' => 'URL de la imagen del restaurante',
                    'placeholder' => 'URL de la imagen del restaurante',
                    'type' => 'text',
                    'value' => isset($store)?$store->img_url:"",
                ])
            </div>
            <div class="input-group mb-3">
                <pre>                                    </pre>
            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                  <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                     <h5> Agregar Direccion</h5>
                    </button>
                  </h2>
                </div>
                  <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        
                        <div class="input-group mb-3">
                            <pre>        </pre>
                        @include('commons.input',[
                            'name' => 'city',
                            'label' => 'Ciudad donde se ubica',
                            'placeholder' => 'Ciudad donde se ubica',
                            'type' => 'text',
                            'value' => isset($store)?$store->address->city:"",
                        ])
                      <pre>                            </pre>
                        @include('commons.input',[
                            'name' => 'colony',
                            'label' => 'Colonia donde se ubica',
                            'placeholder' => 'Colonia donde se ubica',
                            'type' => 'text',
                            'value' => isset($store)?$store->address->colony:"",
                        ])
                    </div>
                    <div class="input-group mb-3">
                        <pre>        </pre>
                        @include('commons.input',[
                            'name' => 'zip_code',
                            'label' => 'Codigo postal',
                            'placeholder' => 'Codigo postal',
                            'type' => 'number',
                            'value' => isset($store)?$store->address->zip_code:"",
                        ])
                    
                    <pre>                            </pre>
                        @include('commons.input',[
                            'name' => 'street',
                            'label' => 'Calle donde se ubica',
                            'placeholder' => 'Calle donde se ubica',
                            'type' => 'text',
                            'value' => isset($store)?$store->address->street:"",
                        ])
                    </div>
                    <div class="input-group mb-3">
                        <pre>                                  </pre>
                        @include('commons.input',[
                            'name' => 'ext_num',
                            'label' => 'Numero exterior',
                            'placeholder' => 'Numero exterior',
                            'type' => 'number',
                            'value' => isset($store)?$store->address->ext_num:"",
                        ])
                    </div>
            
            <br>
            <div class="input-group mb-3">
                <pre>                                       </pre>
                <button type="submit" class="btn btn-primary" style="border-radius: 50px">Guardar</button>
                &nbsp;
            </div>
        </form>
    
</div>
    </div>
            
    </div>
@endsection