<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PropertyMasterValue;
class PropertyMasterValueSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents("data/property-value.json");
        $propertyValue = json_decode($json);
        foreach ($propertyValue->propertyvalues as $key => $value) {
            $object = new PropertyMasterValue;
            $object->insert([
                "title" => $value->title,
                "short_name" => $value->short_name,
                "status" => true,
                "key_id"=>$value->key_id,
                "created_at" => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
