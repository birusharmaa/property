<?php

namespace App\Models;

use CodeIgniter\Model;

class VisitorBookModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'visitorbooks';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'phone', 'email', 'meeting_with', 'purpose', 'visitor_id_title', 'visitor_id_no', 'in_time', 'created_at', 'updated_at', 'deleted_at','deleted_by','status','out_time'];

    // Dates
    protected $useTimestamps = true;
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


    public function getListOfVisitors()
    {
        $builder = $this->db->table($this->table);
        $builder->select('visitorbooks.*, concat(employees.emp_first_name," ",employees.emp_last_name) as meeting_with_name');
        $builder->join('employees', 'employees.id = visitorbooks.meeting_with', 'left');
        $builder->where(['visitorbooks.status' => true]);
        $query   = $builder->get();
        if ($query->getResultArray() > 0) {
            return $query->getResult();
        } else {
            return false;
        }
    }
}
