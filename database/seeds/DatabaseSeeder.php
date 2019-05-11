<?php

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
        $this->call(AdminSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(BrandsSeeder::class);
        $this->call(ItemContainersSeeder::class);
        $this->call(ItemsSeeder::class);
    }
}
