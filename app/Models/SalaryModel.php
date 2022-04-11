<?php

namespace App\Models;

use CodeIgniter\Model;

class SalaryModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'emp_salary';
    protected $primaryKey       = 'emps_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'emps_bank_name',
        'emps_account_number',
        'emps_ifsc_code',
        'emps_epf_number',
        'emps_salary',
        'emps_annual_salary',
        'emps_emp_id', 'emps_status',
        'emps_created_at',
        'emps_update_at',
        'emps_update_by',
        'emps_created_by'
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
