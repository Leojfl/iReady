@php
/**
* @var $route array
* attributes:
*   name  = it is el name of the route
*   label =  it is el text show in el view
*   icon_class = it is the class for load icon of font awesome
*/
@endphp

<div class="d-flex-inline sidebar-item
    {{ $route['name'] != null?
    ($current == $route['name']?'active':'')
    :''}}
    pl-4">
    <a href="{{ $route['name'] != null?
        route($route['name']):
        '/#' }}">
        <span class="mr-1">
            <i class="text-center {{isset($route['icon_class'])?$route['icon_class']:'far fa-square'}}"
               style="font-size: 20px; width: 30px"> </i>
        </span>
        <span>{{ $route['label'] }}</span>
    </a>
</div>
