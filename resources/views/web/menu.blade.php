@php
    /**
    * @var $client \App\Models\Client
    */

@endphp
@extends('store.template.main')
@push('scripts')
@endpush
@push('css')

@endpush
@section('content')
    <div class="row m-0 pb-4">
        @if(empty($store) ||  empty($menu))

        @else
        <div class="col-md-11 mx-auto">
            <h2>{{$store->name}}</h3>
        </div>
        <div class="col-md-2 mx-auto">
            <img src="{{asset($store->img_url)}}" class="rounded-circle w-100"  alt="{{$store->name}}">
        </div>

            @foreach ($menu->menuCategories as  $menuCategory)
                <div class="col-md-12 mx-auto mt-3 ">
                    <h4 class="border-bottom pb-4">
                        @if ($menuCategory->alias == "")
                        {{$menuCategory->category->name}}
                        @else
                        {{$menuCategory->alias}}
                        @endif
                    </h4>
                    <div class="row m-0">
                    @foreach ($menuCategory->products as $product)
                    @if ($product->show)
                    <div class="col-md-4 mx-auto mt-4">
                        <div class="card-main shadow rounded-5" style="overflow: hidden;">
                            <img class="w-100 card-img-top" src="{{$product->absolute_image_url}}">
                            <div class="row p-4 ">
                                <div class="col-12">
                                    <b>{{$product->name}}</b>
                                </div>
                                <div class="col-12">
                                    <b>$@money($product->price)</b>
                                </div>
                                <div class="col-12">
                                    {{$product->description}}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    </div>
                </div>
            @endforeach
        @endempty

    </div>
@endsection
