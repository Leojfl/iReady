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
        $this->categories();
        if(env('APP_DEBUG', true)){
            DB::table('store')->insert([
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

            DB::table('store')->insert([
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
            $this->unit();
            $this->stores();

        }

    }

    public function unit(){
        DB::table('unit')->insert([
            'value' => "Mililitros"
        ]);
        DB::table('unit')->insert([
            'value' => "Litros"
        ]);
        DB::table('unit')->insert([
            'value' => "Gramos"
        ]);
        DB::table('unit')->insert([
            'value' => "Kilogramos"
        ]);
        DB::table('unit')->insert([
            'value' => "Piesa(s)"
        ]);
    }

    public function categories(){
        DB::table('category')->insert([
            'name' => "Bebidas"
        ]);
        DB::table('category')->insert([
            'name' => "Sopas"
        ]);
        DB::table('category')->insert([
            'name' => "Ensaladas"
        ]);
        DB::table('category')->insert([
            'name' => "Postres"
        ]);
    }

   public function stores(){
    for($x = 0; $x <= 10; $x++) {
        $id = DB::table('user')->insertGetId([
            'username' => 'tienda'.$x,
            'name' => 'tienda '.$x,
            'last_name' => 'tienda '.$x,
            'second_last_name' => 'tienda '.$x,
            'password' => bcrypt("prueba"),
            'fk_id_role' => \App\Models\Role::STORE
        ]);

        $storeId = DB::table('store')->insertGetId([
            'name' =>  'Prueba '.$x,
            'owner' =>  'prueba '.$x,
            'phone' =>  '5556963026'.$x,
            'active' =>  true,
            'primary_color' =>  '#000'.$x,
            'second_color' =>  '#000'.$x,
            'rfc' =>  'RFC000000'.$x,
            'description' =>  '¡alksdhf jd sdfds!'.$x,
            'img_url' => '',
            ]);

        DB::table('material')->insertGetId([
                'name' =>  'Ingrediente 1',
                'quantity' =>  '4',
                'min_stok' =>  '20',
                'max_stok' =>  '50',
                'fk_id_store' =>  $storeId,
                'fk_id_unit' =>  1,
                ]);


        DB::table('material')->insertGetId([
            'name' =>  'Ingrediente 2',
            'quantity' =>  '4',
            'min_stok' =>  '20',
            'max_stok' =>  '50',
            'fk_id_store' =>  $storeId,
            'fk_id_unit' =>  2,
            ]);


        DB::table('material')->insertGetId([
            'name' =>  'Ingrediente 3',
            'quantity' =>  '4',
            'min_stok' =>  '20',
            'max_stok' =>  '50',
            'fk_id_store' =>  $storeId,
            'fk_id_unit' =>  3,
            ]);

        DB::table('employee')->insert([
            'active' => true,
            'fk_id_store' => $storeId,
            'fk_id_user' => $id,
        ]);

        for($i = 0; $i <= 10; $i++) {
            $productId = DB::table('product')->insertGetId([
                "name" => "Producto ".$i." tienda ".$x,
                "description" => "K DSJFHKJFDHGSKJ FHDJKGHFDKJHG JDFHjdsa khfdsh",
                "price" => $i,
                "show" => $i%2,
                "fk_id_store" => $storeId,
                "fk_id_category" => 1,
            ]);
        }


        $comboId = DB::table('combo')->insertGetId([
            "name" => "combo  tienda ".$x,
            "description" => "K DSJFHKJFDHGSKJ FHDJKGHFDKJHG JDFHjdsa khfdsh",
            "price" => $i,
            "active" => true,
            "url_image" => ""
        ]);
        DB::table('product_combo')->insertGetId([
            "quantity" => 2,
            "fk_id_combo" => $comboId,
            "fk_id_product" => $productId,
        ]);


    }
   }


    public function products(){

        /*
        DB::table('product')->insert([
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

*/


    }

}
