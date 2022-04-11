<?php

namespace App\Models;

use CodeIgniter\Model;

class SubPropertyTypes extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'subpropertytypes';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'value', 'class', 'cat_id', 'data_for', 'status', 'created_at', 'created_by', 'update_at', 'update_by', 'deleted_at', 'deleted_by'];

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


    public function getSubPropertyCategories($limit = null, $offset = null)
    {
        $propCatTable = $this->db->prefixTable('property_category');
        $builder = $this->db->table($this->table);
        $builder->select('subpropertytypes.title,subpropertytypes.value,subpropertytypes.class,property_category.cat_title,subpropertytypes.data_for');
        $builder->join($propCatTable, 'property_category.cat_id = subpropertytypes.cat_id', 'left');
        $builder->where(['subpropertytypes.status' => true]);
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
}
