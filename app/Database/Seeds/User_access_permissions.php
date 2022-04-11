<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserAccessPermissions;

class User_access_permissions extends Seeder
{
    public function run()
    {
        $json = file_get_contents('data/user-access-permission.json');
        $access_permissions_data = json_decode($json);

        foreach ($access_permissions_data as $value) {
            $access_permissions = new UserAccessPermissions();
            
            $access_permissions->insert([
                'uap_user_id'     => $value->user_id,
                'uap_permission'  => json_encode($value->permission),
                'uap_full_access' => $value->full_access,
                'user_role_id'    => $value->user_role_id,
                "uap_status" => true
            ]);
            
            // echo $access_permissions->getLastQuery();
            // exit;
        }
    }
}
