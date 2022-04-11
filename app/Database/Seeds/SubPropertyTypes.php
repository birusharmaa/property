<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\SubPropertyTypes as SPM;

class SubPropertyTypes extends Seeder
{
    public function run()
    {
        $json = file_get_contents("data/subpropertypes.json");
        $SPMOBJ = json_decode($json);

        foreach ($SPMOBJ->subpropertypes as $key => $value) {
            $object = new SPM();
            $object->insert([
                "title" => $value->title,
                "value" => $value->value,
                "class" => $value->class,
                "cat_id" => $value->cat_id,
                "data_for" => $value->data_for,
                "status" => true,
                "created_at" => date('Y-m-d H:i:s'),
                "update_at" => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
