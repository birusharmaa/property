<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\ZoneTypeModel;
class ZoneTypeSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents("data/zone-type.json");
        $modules = json_decode($json);

        foreach ($modules->zonetypes as $key => $value) {
            $object = new ZoneTypeModel;
            $object->insert([
                "title" => $value->title,
                "status" => true,
                "created_at" => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
