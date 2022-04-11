<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new User;
        $faker = \Faker\Factory::create();
        
        $data = array(
            [
                'name'        =>  "Super Admin",
                'email'       =>   "superadmin@gmail.com",
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'user_role_id'=> 1
            ],
            [
                'name'        =>  "Admin",
                'email'       =>   "admin@gmail.com",
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'user_role_id'=> 2
            ],
            [
                'name'        =>  "User",
                'email'       =>   "user@gmail.com",
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'user_role_id'=> 3
            ],
            [
                'name'        =>  "Staff",
                'email'       =>   "staff@gmail.com",
                'password'   => password_hash('12345678', PASSWORD_DEFAULT),
                'user_role_id'=> 4
            ]
        );
        
        $user->insertBatch($data);
    }
}
