@extends('store.template.main')
@push('scripts')
@endpush
@push('css')
    
@endpush
@section('content')
    <div class="row">
        <div class="offset-md-2 col-8 text-center">
            <h3 class="page-title">Mesas</h3>
        </div>
        <div class="col-2 text-center">
            <a href="{{ route('store_board_upsert') }}" 
               class="btn btn-secondary btn-upsert">Agregar</a>
        </div>
        <div class="col-md-12 mt-3">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Activo</th>
                    <th scope="col">Disponible</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @forelse($boards as $board)
                    <tr>
                        <td>{{$board->id}}</td>
                        <td>{{$board->name}}</td>
                        <td>{{$board->description}}</td>
                        <td>{{$board->active}}</td>
                        <td>{{$board->available}}</td>
                        <td>
                            <a href="{{ route('store_board_upsert', $board->id) }}"
                               
                               data-toggle="tooltip"
                               data-placement="top"
                               title="Editar"
                               class="btn-upsert">
                                <i class="fas fa-edit "></i>
                            </a>
                            <a href="{{ route('store_board_profile', $board->id) }}"
                               
                               data-toggle="tooltip"
                               class="btn-upsert"
                               title="Ver">
                                <i class="far fa-eye "></i>
                            </a>
                            <a href="{{ route('store_board_delete', $board->id) }}"
                               
                                data-toggle="tooltip"
                                class="btn-upsert"
                                title="Ver">
                                 <i class="far fa-trash-alt "></i>
                             </a>

                            <a 
                               class="btn-update-status">
                                <i class="fas {{$board->active?'fa-toggle-on':'fa-toggle-off'}}"></i>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th class="text-center" colspan="6">
                            <i>Sin mesas registradas</i>
                        </th>
                    </tr>

                @endforelse
                </tbody>
            </table>

        </div>
    </div>
    

    @include('commons.modal',['modalId'=> 'modal-upsert'])

@endsection