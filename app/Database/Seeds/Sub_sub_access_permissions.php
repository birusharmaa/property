<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UserAccessPermissions;

class Sub_sub_access_permissions extends Seeder
{
    public function run()
    {
        $json = file_get_contents('data/Sub-sub-access-permission.json');
        $access_permissions_data = json_decode($json);
        $user_id = "";
        foreach ($access_permissions_data as $value) {
            
            $access_permissions = new UserAccessPermissions();
            $user_id = $value->user_id;
            $data[] = [
                'submodule_id'  => $value->submodule_id,
                'role_id'       => $value->role_id,
                'sub_mod_name'  => $value->sub_mod_name,
                'sub_submodule' => json_encode($value->sub_submodule)
            ];
            // $builder->where('id', $id);
            // $access_permissions->update();
            
            // echo $access_permissions->getLastQuery();
            // exit;
        }
        if(!empty($user_id)){
            $data = json_encode($data);
        }
        
        $final = [
            "uap_sub_sub_modules" => $data
        ];
        echo $data;
        exit;
        // echo "<pre>";
        // print_r($final);
        // exit;
        $access_permissions->where('uap_user_id', $user_id);
        $access_permissions->update($final);
        echo $access_permissions->getLastQuery();
    }
}
