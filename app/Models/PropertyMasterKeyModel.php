<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyMasterKeyModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'propertymasterkeys';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title','status','key_for','created_at','updated_at'];

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

    public function getQuestionlist($ids)
    {
        
        $builder = $this->db->table($this->table);
        $builder->select('id,title,key_for,status');
        $builder->where(['status' => true]);
        $builder->whereNotIn('id',$ids);
        $query   = $builder->get();
        if ($query->getResult() > 0) {
            return $query->getResult();
        } else {
            return false;
        }
    }
}
