<?php

namespace App\Models;

use CodeIgniter\Model;

class EmployeesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'employees';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'emp_id',
        'emp_first_name',
        'emp_last_name',
        'father_name',
        'mother_name',
        'married_staus',
        'emp_phone',
        'emp_email',
        'emp_date_of_hire',
        'emp_date_of_joining',
        'emp_date_of_birth',
        'emp_gender',
        'worklocation',
        'emp_experience',
        'emp_designation',
        'emp_department',
        'emp_status',
        'emp_created_at',
        'emp_update_at',
        'emp_update_by',
        'emp_created_by'
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


    public function getEmployeeInfo($limit = null, $offset = null)
    {

        //         SELECT employees.id, concat(employees.emp_first_name,' ',employees.emp_last_name) as name, emp_email,emp_phone, emp_designation,designations.title as designations, emp_department, departments.title as departments, emp_date_of_joining FROM `employees`
        // LEFT JOIN designations on designations.id= employees.emp_designation
        // LEFT JOIN departments on departments.id= employees.emp_department
        // ORDER BY `emp_department` ASC;

        $designations = $this->db->prefixTable('designations');
        $department = $this->db->prefixTable('departments');

        $builder = $this->db->table($this->table);
        $builder->select('employees.id, concat(employees.emp_first_name," ",employees.emp_last_name) as name, emp_email,emp_phone, emp_designation,designations.title as designations, emp_department, departments.title as departments, emp_date_of_joining');
        $builder->join($designations, 'designations.id = employees.emp_designation', 'left');
        $builder->join($department, 'departments.id = employees.emp_department', 'left');
        $builder->where(['employees.emp_status' => true]);
        if ($limit && $offset) {
            $query   = $builder->get($limit, $offset);
        } else {
            $query   = $builder->get();
        }
        if ($query->getResult() > 0) {
            return $query->getResult();
        } else {
            return false;
        }
    }

    public function getEmployee($id = null)
    {

        $designations = $this->db->prefixTable('designations');
        $department = $this->db->prefixTable('departments');
        $documents = $this->db->prefixTable('emp_documents');
        $salary = $this->db->prefixTable('emp_salary');
        $address = $this->db->prefixTable('emp_address');
        $empManager = $this->db->prefixTable('employee_manger_relation');

        $builder = $this->db->table($this->table);
        $builder->select('employees.*,
        emp_address.empadd_id,emp_address.empadd_address,emp_address.empadd_city,emp_address.empadd_state,emp_address.empadd_country,emp_address.alt_number,emp_address.empadd_zipcode,
        emp_documents.emp_doc_id,emp_doc_path,
        emp_salary.emps_id,emp_salary.emps_bank_name,emp_salary.emps_account_number,emp_salary.emps_ifsc_code,emp_salary.emps_epf_number,emp_salary.emps_salary,employee_manger_relation.emr_id,
        employee_manger_relation.emr_manager_id');

        $builder->join($designations, 'designations.id = employees.emp_designation', 'left');
        $builder->join($department, 'departments.id = employees.emp_department', 'left');

        $builder->join($documents, 'emp_documents.emp_doc_emp_id = employees.id', 'left');
        $builder->join($salary, 'emp_salary.emps_emp_id = employees.id', 'left');
        $builder->join( $address, 'emp_address.empadd_emp_id  = employees.id', 'left');
        $builder->join($empManager, 'employee_manger_relation.emr_emp_id = employees.id', 'left');

        $builder->where(['employees.emp_status' => true, 'employees.id' => $id]);

        // $sql = $builder->getCompiledSelect();
        // echo $sql;

        $query   = $builder->get();
       
        if ($query->getResult() > 0) {
            return $query->getRow();
        } else {
            return false;
        }
    }
}
