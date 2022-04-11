<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeeAddress extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'emp_address';
    protected $primaryKey       = 'empadd_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'empadd_address',
        'empadd_city',
        'empadd_state',
        'empadd_country',
        'empadd_zipcode',
        'empadd_address_type',
        'empadd_status',
        'empadd_created_at',
        'empadd_update_at',
        'empadd_update_by',
        'empadd_created_by',
        'empadd_emp_id'
    ];

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
