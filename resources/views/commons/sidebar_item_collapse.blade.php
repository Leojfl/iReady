<div class="d-flex-inline sidebar-item">
    <a href="#"
    class="w-100"
    data-bs-toggle="collapse"
    href="#collapseExample"
    role="button"
    aria-expanded="false"
    data-bs-target="#collapseExample"
    aria-controls="collapseExample">
        <span class="mr-1">
            <i class="text-center {{isset($route['icon_class'])?$route['icon_class']:'far fa-square'}}"
               style="font-size: 20px; width: 30px"> </i>
        </span>
        <span>{{ $route['label'] }}</span>
        <span class="margin-start"><i class="fas fa-caret-down"></i></span>
    </a>
    <div class="collapse fs-6" id="collapseExample">
        @foreach($route['submenus'] as $subRoute)
            @include('commons.sidebar_item', ['route' => $subRoute, 'isSubmenu' => true])
        @endforeach
    </div>
</div>


