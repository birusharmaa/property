<?php

namespace App\Models;

use CodeIgniter\Model;

class QuestionModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'questions';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'class', 'status', 'created_at', 'created_by', 'update_at', 'update_by', 'deleted_at', 'deleted_by','belongs_to_prop_category'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getQuestionlist()
    {
        $id = [7];
        $questionoptionsTable = $this->db->prefixTable('questionoptions');
        $builder = $this->db->table($this->table);
        $builder->select('questionoptions.id,questionoptions.title,questionoptions.class,questionoptions.value,questionoptions.ques_id,questions.title as qes_title,questions.class as que_class,questions.belongs_to_prop_category as blng_id');
        $builder->join($questionoptionsTable, 'questions.id=questionoptions.ques_id', 'left');
        $builder->where(['questions.status' => true]);
        $builder->whereNotIn('ques_id',$id);
        $builder->groupBy('ques_id');
        $query   = $builder->get();
        if ($query->getResult() > 0) {
            return $query->getResult();
        } else {
            return false;
        }
    }
}
