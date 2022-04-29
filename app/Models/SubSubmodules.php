<?php

namespace App\Models;

use CodeIgniter\Model;

class SubSubmodules extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sub_sub_modules';
    protected $primaryKey       = 'ssm_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['ssm_name', 'ssm_class', 'ssm_url', 'sm_id', 'ssm_status', 'ssm_created_at', 
                'ssm_created_at', 'sm_id',
                'sm_status', 'ssm_update_by', 'ssm_created_by' ];
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
}
