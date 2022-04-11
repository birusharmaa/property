<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyUserRelationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'property_user_relation';
    protected $primaryKey       = 'pur_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['pur_user_id', 'pur_prop_id', 'pur_allot_status_id', 'pur_status', 'pur_created_at', 'pur_update_at', 'pur_update_by', 'pur_created_by'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'pur_created_at';
    protected $updatedField  = 'pur_updated_at';
    protected $deletedField  = 'pur_deleted_at';

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


    public function getAssignedList($limit = 10, $offset = 1)
    {

        $builder = $this->db->table($this->table);
        $builder->select('property_user_relation.*,users.name,property_basic_details.property_title,propertiesavailablefors.title as allot_title');
        $builder->join('propertiesavailablefors', 'propertiesavailablefors.id = property_user_relation.pur_user_id', 'left');
        $builder->join('users', 'users.id=property_user_relation.pur_user_id', 'left');
        $builder->join('property_basic_details', 'property_basic_details.id=property_user_relation.pur_prop_id', 'left');
        $query   = $builder->get();
        if ($query->getResult() > 0) {
            return $query->getResult();
        } else {
            return false;
        }
    }

    public function getAssignedAllList()
    {
        $builder = $this->db->table($this->table);
        $builder->select('property_user_relation.*,users.name,property_basic_details.property_title,propertiesavailablefors.title as allot_title');
        $builder->join('propertiesavailablefors', 'propertiesavailablefors.id = property_user_relation.pur_user_id', 'left');
        $builder->join('users', 'users.id=property_user_relation.pur_user_id', 'left');
        $builder->join('property_basic_details', 'property_basic_details.id=property_user_relation.pur_prop_id', 'left');
        $res = $builder->where(['pur_status' => true]);
        $query   = $builder->get();
        if ($query->getResult() > 0) {
            return $query->getResult();
        } else {
            return false;
        }
    }

    public function getAssignedbyId($id =null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('property_user_relation.*,users.name,property_basic_details.property_title,propertiesavailablefors.title as allot_title');
        $builder->join('propertiesavailablefors', 'propertiesavailablefors.id = property_user_relation.pur_user_id', 'left');
        $builder->join('users', 'users.id=property_user_relation.pur_user_id', 'left');
        $builder->join('property_basic_details', 'property_basic_details.id=property_user_relation.pur_prop_id', 'left');
        $res = $builder->getWhere(['pur_id' => $id]);
        if ($res->getResultArray() > 0) {
            return $res->getRow();
        } else {
            return false;
        }
    }
}
