<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\SubSubmodules;

class SubSubModuleSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents('data/sub-sub-modules.json');
        $subsubmodules = json_decode($json);
        
        foreach ($subsubmodules->subsubmodules as $key => $value) {
            $SubSubmodules = new SubSubmodules();
            $SubSubmodules->insert([
                'ssm_name' => $value->ssm_name,
                'ssm_class' => $value->ssm_class,
                'ssm_url' => $value->ssm_url,
                'sm_id' => $value->sm_id,
                "ssm_status" => true
            ]);
        }
    }
}
