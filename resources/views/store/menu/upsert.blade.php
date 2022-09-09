@extends('store.template.main')
@push('scripts')
<script src="{{ asset('/js/store/menu/startMenu.js?v=1') }}"></script>
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <h3>{{isset($menu)?"Modificar": "Agregar"}} Menus</h3>
    </div>
    <div class="col-12 col-md-8 mx-auto">
        <form id="form-update" method="POST" class="row" action="{{ route('store_menu_upsert_post', isset($menu)?$menu->id:"") }}">
            {{ csrf_field() }}
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'name',
                    'label' => 'Nombre del menu',
                    'placeholder' => 'Nombre del menu',
                    'type' => 'text',
                    'value' => isset($menu)?$menu->name:"",
                ])
            </div>
            <div class="col-md-6">
                @include('commons.input',[
                    'name' => 'description',
                    'label' => 'Descripcion del menu',
                    'placeholder' => 'Descripcion del menu',
                    'type' => 'text',
                    'value' => isset($menu)?$menu->description:"",
                ])
            </div>

            <div id="app" class="col-12">
                <vue-menu
                url='{{route('store_menu_upsert_post', isset($menu)?$menu->id:"")}}'
                redirec-to='{{route('store_menus_index')}}'
                :categories-in-menu='@json(isset($menu)?$menu->menuCategories:[])'
                :all-categories='@json($categories)'
                :all-products='@json($products)'
                 />
            </div>
        </form>
    </div>

    </div>
@endsection
