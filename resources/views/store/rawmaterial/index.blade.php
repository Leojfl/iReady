@extends('store.template.main')
@push('scripts')
@endpush
@push('css')
    
@endpush
@section('content')
    <div class="row">
        <div class="offset-md-2 col-8 text-center">
            <h3 class="page-title">Materia Prima</h3>
        </div>
        <div class="col-2 text-center">
            <a href="{{ route('store_rawmaterial_upsert') }}" 
               class="btn btn-secondary btn-upsert">Agregar</a>
        </div>
        <div class="input-group mb-3">
                @forelse($rawmaterials as $rawmaterial)
                
                    
                <div class="modal-body">
                   
                    <div class="p-2 bg-ligth border" style="border-radius: 45px">
                        
                        <h3>{{$rawmaterial->code}}</h3>
                        
                        
                            <img src="{{$rawmaterial->img_url}}" style="height: 150px"/>
                        
                    </div> 
                    
                        <br>
                        <div class="p-2 bg-ligth border" style="border-radius: 45px">
                        <h2>{{$rawmaterial->description}}</h2>
                        
                        <pre>                                          </pre>
             
                    
                            <a href="{{ route('store_rawmaterial_upsert', $rawmaterial->id) }}"
                               
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Editar"
                               class="btn-upsert">
                                <i class="fas fa-edit "></i>
                            </a>
                            <a href="{{ route('store_rawmaterial_profile', $rawmaterial->id) }}"
                               
                               data-toggle="tooltip"
                               class="btn-upsert"
                               title="Ver">
                                <i class="far fa-eye "></i>
                            </a>
                            <a href="{{ route('store_rawmaterial_delete', $rawmaterial->id) }}"
                               
                                data-toggle="tooltip"
                                class="btn-upsert"
                                title="Ver">
                                 <i class="far fa-trash-alt "></i>
                             </a>

                            
                           
                        </div>
                        
                </div>
                
                    
                @empty
                    <tr>
                        <th class="text-center" colspan="6">
                            <h4>Sin materiales registrados</h4>
                        </th>
                    </tr>

                @endforelse
            </div>
            </div>

        </div>
    </div>
    

    @include('commons.modal',['modalId'=> 'modal-upsert'])

@endsection