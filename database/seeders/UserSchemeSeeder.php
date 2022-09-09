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
        $this->users();
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
            ],
            [
                'id' => \App\Models\Role::CLIENT,
                'name' => 'Repartidor'
            ]
        ]);

        DB::table('status')->insert([
            [
                'id' => \App\Models\Status::PENDING,
                'name' => 'Pendiente'
            ],
            [
                'id' => \App\Models\Status::IN_PREPARATION,
                'name' => 'En preparación'
            ],
            [
                'id' => \App\Models\Status::COMPLETE,
                'name' => 'Completada'
            ],
            [
                'id' => \App\Models\Status::CANCEL,
                'name' => 'Cancelada'
            ],
        ]);
    }

    public function users() {

        $password = "prueba";
        if (env('APP_DEBUG', true)) {
            DB::table('user')->insert([
                'username' => 'client',
                'name' => 'Client',
                'last_name' => 'client l',
                'second_last_name' => 'client s',
                'password' => bcrypt($password),
                'fk_id_role' => \App\Models\Role::CLIENT
            ]);

            DB::table('user')->insert([
                'username' => 'Gerente',
                'name' => 'Gerente',
                'last_name' => 'Gerente',
                'second_last_name' => 'Gerente',
                'password' => bcrypt($password),
                'fk_id_role' => \App\Models\Role::MANAGER
            ]);
        }
    }
}
