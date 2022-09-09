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

        <div class="ms-auto col-2 text-end">
            <a href="{{ route('store_board_map') }}"
               class="btn btn-secondary btn-upsert">Mapa</a>
        </div>
        <div class="input-group mb-3">
                @forelse($boards as $board)
                <div class="modal-body">

                    <div class="p-2 bg-ligth border" style="border-radius: 45px">

                        <h5>ID: {{$board->id}}</h5>

                        <h1>{{$board->name}}</h1>
                    </div>

                        <br>
                        <div class="p-2 bg-ligth border" style="border-radius: 45px">
                        <h2>Descripcion :{{$board->description}}</h2>
                        <br>
                        <h2>Activo :{{$board->active}}</h2>
                        <br>
                        <h2>Disponible :{{$board->available}}</h2>
                        <br>

                        <pre>               </pre>


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

                        </div>

                </div>
                @empty
                    <tr>
                        <th class="text-center" colspan="6">
                            <i>Sin mesas registradas</i>
                        </th>
                    </tr>
                @endforelse
            </div>
        </div>
    </div>
    @include('commons.modal',['modalId'=> 'modal-upsert'])
@endsection
