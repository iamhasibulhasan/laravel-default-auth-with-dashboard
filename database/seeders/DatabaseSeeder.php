<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Post;
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
        Post::factory(100)->create();
        Customer::factory(15)->create();
        Product::factory(50)->create();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class
        ]);
    }
}
