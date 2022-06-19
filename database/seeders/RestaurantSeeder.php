<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        if(env('APP_DEBUG', true)){
            DB::table('restaurant')->insert([
            'name' =>  'Sushison',
            'owner' =>  'Gonzalo',
            'phone' =>  '5556963026',
            'active' =>  true,
            'primary_color' =>  '#000',
            'second_color' =>  '#000',
            'rfc' =>  'RFC000000',
            'description' =>  '¡Como a ti te gusta!',
            'img_url' => 'https://sushigon.com/wp-content/uploads/2020/07/logo_in.png',
            ]);

            DB::table('restaurant')->insert([
                'name' =>  'Test test',
                'owner' =>  'Propietario',
                'phone' =>  '7222119546',
                'active' =>  true,
                'primary_color' =>  '#000',
                'second_color' =>  '#000',
                'rfc' =>  'RFC00000000',
                'description' =>  'EPOWOIQROEI JFKLDJFSKDJKFHD HDJKFSGH FJKF S DFKUGS',
                'img_url' =>  'https://media-cdn.tripadvisor.com/media/photo-o/14/0a/9c/02/bar.jpg',
                ]);
        }

    }

}
