<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\QuestionModel;

class QuestionSeeder extends Seeder
{
    public function run()
    {
     
        $json = file_get_contents('data/questions.json');
        $questions = json_decode($json);
        
        foreach ($questions->questions as $key => $value) {
            $model = new QuestionModel();
            $model->insert([
                'title' => $value->title,
                'class' => $value->class,
                "status" => true,
                "created_at" => date('Y-m-d H:i:s'),
                "update_at" => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
