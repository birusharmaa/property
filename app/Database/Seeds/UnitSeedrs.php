<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\UnitsModel;
class UnitSeedrs extends Seeder
{
    public function run()
    {
        $json = file_get_contents("data/units.json");
        $modules = json_decode($json);

        foreach ($modules->units as $key => $value) {
            $object = new UnitsModel;
            $object->insert([
                "title" => $value->title,
                "status" => true,
                "created_at" => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
