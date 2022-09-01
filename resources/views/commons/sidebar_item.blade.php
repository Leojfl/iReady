@php
/**
* @var $route array
* attributes:
*   name  = it is el name of the route
*   label =  it is el text show in el view
*   icon_class = it is the class for load icon of font awesome
*/
$isActive = false;
$isSubmenu = $isSubmenu ?? false;
$routers = $route['actives_routes'] ?? $route['name'];
if (is_array($routers)){
    foreach ($routers as $value) {
        if(!$isActive && $current == $value){
            $isActive = true;
            break;
        }
    }
} else {
    $isActive = $current == $route['name'];
}
@endphp

<div class="d-flex-inline sidebar-item
    {{ $route['name'] != null?
    ($isActive ?'active':'')
    :''}}
    {{$isSubmenu?"py-2 pl-4 ":"pl-4" }}">
    <a href="{{ $route['name'] != null?
        route($route['name']):
        '/#' }}">
        <span class="mr-1">
            <i class="text-center {{isset($route['icon_class'])?$route['icon_class']:''}}"
               style="font-size: {{$isSubmenu?"8px":"20px" }} ; width: 30px"> </i>
        </span>
        <span>{{ $route['label'] }}</span>
    </a>
</div>
