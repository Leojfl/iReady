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
            'name' => 'admin_store_index',
            'label' => 'Restaurantes',
            'icon_class' => 'fas fa-store-alt',
            'roles' => [Role::ADMIN]
        ],
        [
            'name' => 'admin_users_index',
            'label' => 'Graficas',
            'icon_class' => 'fas fa-chart-bar ',
            'roles' => [Role::ADMIN]
        ],
        [
            'name' => 'admin_users_index',
            'label' => 'Usuarios',
            'icon_class' => 'fas fa-users',
            'roles' => [Role::ADMIN]
         ]
    ];
@endphp
<div class="d-flex flex-column align-self-center" style="min-width: 182px">
    <div class="d-inline-flex d-flex-row bg-primary color-white px-4 pb-5" style="z-index: 1; margin-bottom: -3px;">
        <i class=" fas fa-user-circle" style="font-size: 30px"></i>
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
