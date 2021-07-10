<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'      =>  'Hasibul Hasan',
            'role_id'      =>  1,
            'email'         =>  'mdhasibulhasan.dev@gmail.com',
            'password'      =>  password_hash('admin', PASSWORD_DEFAULT)
        ]);

        User::create([
            'name'      =>  'Afia Rahman',
            'role_id'      =>  rand(1,5),
            'email'         =>  'dola@gmail.com',
            'password'      =>  password_hash('admin', PASSWORD_DEFAULT)
        ]);

        User::create([
            'name'      =>  'Tithi Ghosh',
            'role_id'      =>  rand(1,5),
            'email'         =>  'tithighosh@gmail.com',
            'password'      =>  password_hash('admin', PASSWORD_DEFAULT)
        ]);

        User::create([
            'name'      =>  'Dipto Mondol',
            'role_id'      =>   rand(1,5),
            'email'         =>  'dipto@gmail.com',
            'password'      =>  password_hash('admin', PASSWORD_DEFAULT)
        ]);
    }
}
