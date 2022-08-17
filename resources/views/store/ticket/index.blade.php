@extends('store.template.main')
@push('scripts')
@endpush
@push('css')
    
@endpush
@section('content')
    <div class="row">
        <div class="offset-md-2 col-8 text-center">
            <h3 class="page-title">Tickets</h3>
        </div>
        <div class="col-2 text-center">
            <a href="{{ route('store_ticket_upsert') }}" 
               class="btn btn-secondary btn-upsert">Agregar</a>
        </div>
        <div class="input-group mb-3">
            @forelse($tickets as $ticket)
                
                    
                <div class="modal-body" >
                   
                    <div class="p-2 bg-ligth border" style="border-radius: 45px ">
                        
                        <h5>ID: {{$ticket->id}}</h5>
                        
                        <h1>{{$ticket->head}}</h1>
                     
                    
                        <br>
                        
                        <h2>{{$ticket->footnote1}}</h2>
                        <br>
                        <h2>{{$ticket->footnote2}}</h2>
                        <br>
                        
                        <pre>               </pre>
             
                    
                            <a href="{{ route('store_ticket_upsert', $ticket->id) }}"
                               
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Editar"
                               class="btn-upsert">
                                <i class="fas fa-edit "></i>
                            </a>
                    
                            <a href="{{ route('store_ticket_delete', $ticket->id) }}"
                               
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
                            <h3>Sin tickets registrados</h3>
                        </th>
                    </tr>

                @endforelse
            </div>
            </div>

        </div>
    </div>
    

    @include('commons.modal',['modalId'=> 'modal-upsert'])

            
@endsection