<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'              =>      'Super Admin',
            'slug'              =>      Str::slug('Super Admin'),
            'permission'        =>      '',
        ]);

        Role::create([
            'name'              =>      'Admin',
            'slug'              =>      Str::slug('Admin'),
            'permission'        =>      '',
        ]);

        Role::create([
            'name'              =>      'Student',
            'slug'              =>      Str::slug('Student'),
            'permission'        =>      '',
        ]);

        Role::create([
            'name'              =>      'Teacher',
            'slug'              =>      Str::slug('Teacher'),
            'permission'        =>      '',
        ]);
    }
}
