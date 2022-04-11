<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\PropertyMasterKeyModel;

class PropertyMasterKeySeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents("data/property-keys.json");
        $propertykeys = json_decode($json);
        foreach ($propertykeys->propertykeys as $key => $value) {
            $object = new PropertyMasterKeyModel;
            $object->insert([
                "title" => $value->title,
                "key_for" => $value->key_for,
                "status" => true,
                "created_at" => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
