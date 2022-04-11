<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\SubModules;

class SubModulesSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents('data/sub-modules.json');
        $subModules = json_decode($json);
        
        foreach ($subModules->submodules as $key => $value) {
            $subModuleObj = new SubModules();
            $subModuleObj->insert([
                'sm_name' => $value->sm_name,
                'sm_class' => $value->sm_class,
                'sm_url' => $value->sm_url,
                'sm_mod_id' => $value->sm_mod_id,
                "sm_status" => true
            ]);
        }
    }
}


