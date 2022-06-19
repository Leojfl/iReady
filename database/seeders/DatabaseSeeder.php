<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([UserSchemeSeeder::class]);
        $this->call([RestaurantSeeder::class]);
    }
}
https://media-cdn.tripadvisor.com/media/photo-o/14/0a/9c/02/bar.jpg