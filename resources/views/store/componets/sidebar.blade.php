@php
    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\Facades\Auth;
    use App\Models\Role;
    // Get route name current
    $current = Route::currentRouteName();
    $user = \App\Models\User::find(Auth::id());

    // $routes is an array with all sidebar routes
    // The 'name' attribute is as it's named in admin.php
    // The 'label' attribute is as it's shown in view
    $routes = [
        [
            'name' => 'store_data_show',
            'actives_routes' => ['store_data_show', 'store_update_data'],
            'label' => 'Mis datos',
            'icon_class' => 'fas fa-address-card',
            'roles' => [Role::STORE]
        ],
        [
            'name' => 'admin_users_index',
            'label' => 'Ordenes',
            'icon_class' => 'fas fa-clipboard-list',
            'roles' => [Role::STORE]
        ],
        [
            'name' => 'store_raw_material_index',
            'label' => 'Materia prima',
            'actives_routes' => ['store_raw_material_index', 'store_raw_material_upsert', 'store_raw_material_show'],
            'icon_class' => 'fas fa-boxes',
            'roles' => [Role::STORE]
        ],
        [
            'name' => 'store_products_index',
            'actives_routes' => ['store_products_index', 'store_product_upsert', 'store_product_show'],
            'label' => 'Productos',
            'icon_class' => 'fas fa-hamburger',
            'roles' => [Role::STORE]
        ],

        [
            'name' => 'admin_users_index',
            'label' => 'Menu',
            'icon_class' => 'fas fa-utensils',
            'roles' => [Role::STORE]
        ],
        [
            'name' => 'admin_users_index',
            'label' => 'Empleados',
            'icon_class' => 'fas fa-users',
            'roles' => [Role::STORE]
        ],
        [
            'name' => 'store_board_index',
            'label' => 'Mesas',
            'icon_class' => 'fas fa-square',
            'roles' => [Role::STORE]
        ],
        [
            'name' => 'admin_users_index',
            'label' => 'Graficas',
            'icon_class' => 'fas fa-chart-area',
            'roles' => [Role::STORE]
        ],
        [
            'name' => 'store_ticket_index',
            'label' => 'Tickets',
            'icon_class' => 'fa-solid fa-ticket-simple',
            'roles' => [Role::STORE]
        ]
    ];
@endphp
<div class="d-flex flex-column align-self-center" style="min-width: 182px">
    <div class="d-inline-flex d-flex-row bg-primary color-white px-4 pb-5" style="z-index: 1; margin-bottom: -3px;">
        <i class=" fas fa-store-alt" style="font-size: 28px"></i>
        <span class="text-bold ml-2">{{ $user->name }}</span>
    </div>
    <div class="d-inline-flex flex-column bg-white" style="z-index: 0">
        @for($i = 0; $i < sizeof($routes); $i++)
            @foreach($routes[$i]['roles'] as $rol)
                @if($rol == $user->role->id)
                    @include('commons.sidebar_item', ['route' => $routes[$i]])
                @endif
            @endforeach
        @endfor
    </div>
    <div class="d-inline-flex sidebar-item d-flex-row color-white px-4 pt-5">
        <a href="{{route('logout')}}">
            <i class="fas fa-door-open" style="font-size: 18px"></i>
            <span class="cursor-pointer">Cerrar sesión</span>
        </a>
    </div>
</div>
