<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\QuestionOptionModel;

class QuestionListSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents('data/questions-option.json');
        $questionslist = json_decode($json);

        foreach ($questionslist->questionsoptions as $key => $value) {
            $model = new QuestionOptionModel();
            $model->insert([
                'title' => $value->title,
                'class' => $value->class,
                'value' => $value->value,
                'ques_id' => $value->ques_id,
                "status" => true,
                "created_at" => date('Y-m-d H:i:s'),
            ]);
        }
    }
}
