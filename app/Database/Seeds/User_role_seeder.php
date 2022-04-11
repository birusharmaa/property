<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserRole;


class User_role_seeder extends Seeder
{
    public function run()
    {
        $user_role = new UserRole;
        $faker = \Faker\Factory::create();
        
        $data = array(
            [
                'name'        =>  "Super Admin",
                'type'       =>   "Super Admin",
                'status'   => true,
            ],
            [
                'name'        =>  "Admin",
                'type'       =>   "Admin",
                'status'   => true,
            ],
            [
                'name'        =>  "User",
                'type'       =>   "User",
                'status'   => true,
            ],
            [
                'name'        =>  "Staff",
                'type'       =>   "Staff",
                'status'   => true,
            ]
        );
        $user_role->insertBatch($data);
    }
}
