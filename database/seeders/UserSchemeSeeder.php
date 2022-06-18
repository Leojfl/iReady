<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSchemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = env('APP_DEBUG', true) ?
            'prueba' :
            'Prueba123';

        $this->catalogs();
        DB::table('user')->insert([
            'username' => 'Admin',
            'name' => 'Admin',
            'last_name' => 'Mendoza',
            'second_last_name' => 'Iñiguez',
            'password' => bcrypt($password),
            'fk_id_role' => \App\Models\Role::ADMIN
        ]);

    }

    public function catalogs()
    {

        DB::table('role')->insert([
            [
                'id' => \App\Models\Role::ADMIN,
                'name' => 'Admin'
            ],
            [
                'id' => \App\Models\Role::STORE,
                'name' => 'Tienda'
            ],
            [
                'id' => \App\Models\Role::MANAGER,
                'name' => 'Gerente'
            ],
            [
                'id' => \App\Models\Role::WAITER,
                'name' => 'Mesero'
            ],
            [
                'id' => \App\Models\Role::DELIVERY,
                'name' => 'Repartidor'
            ]
        ]);
    }
}
