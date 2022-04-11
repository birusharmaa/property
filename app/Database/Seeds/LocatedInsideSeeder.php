<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\LocatedInsidesModel;

class LocatedInsideSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents("data/locate-inside.json");
        $modules = json_decode($json);

        foreach ($modules->locateinside as $key => $value) {
            $object = new LocatedInsidesModel;
            $object->insert([
                "title" => $value->title,
                "status" => true,
                "created_at" => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
