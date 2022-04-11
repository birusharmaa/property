<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\Modules;

class ModulesSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents("data/modules.json");
		$modules = json_decode($json);

		foreach ($modules->modules as $key => $value) {
			$object = new Modules;
			$object->insert([
				"mod_name" => $value->mod_name,
                                "mod_class" => $value->mod_class,
                                "mod_url" => $value->mod_url,
                                "mod_status" => true,
                                "mod_created_at" => date('Y-m-d H:i:s'),
                                "mod_update_at" => date('Y-m-d H:i:s'),
			]);
		}
    }
}
