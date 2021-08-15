<?php

namespace Database\Seeders;

use App\Models\Franchise;
use App\Models\Product;
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
        Product::factory(5)->create();
        Franchise::factory(5)->create();
        $this->call([
            ProfileSeeder::class,
        ]);
        $this->call(
            [
                RegionSeeder::class
            ]
        );

        $this->call([
            UserSeeder::class
        ]);
    }
}
