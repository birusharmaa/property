<?php

namespace App\Models;

use CodeIgniter\Model;

class LeadsModal extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'leads';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'first_name', 'last_name', 'email', 'phone', 'no_of_beds', 'no_of_bathroom',
        'property_type', 'price_range', 'city', 'state', 'square_feet', 'property_in_location',
        'facing', 'floor', 'subproperty_type', 'posted_by', 'category', 'sub_category',
        'looking_for', 'lead_action_status', 'lead_status_id', 'owner_id', 'lead_assigned_to',
        'created_by', 'updated_by'
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

    public function getLeadId($id = null)
    {
        $id = trim($id);
        $builder = $this->db->table($this->table);
        $builder->select('id');
        $builder->limit(1);
        $data = $builder->getWhere(['phone' => $id]);
        if ($data->getResult() > 0) {
            return $data->getRow();
        } else {
            return false;
        }
    }

    /**
     * 
     */
    public function getLeadDetails($id = null)
    {
        $id = trim($id);
        $builder = $this->db->table($this->table);
        $builder->limit(1);
        $data = $builder->getWhere(['phone' => $id]);
        if ($data->getResult() > 0) {
            return $data->getRow();
        } else {
            return false;
        }
    }

    public function getLeadsById($id = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('users.name AS posted_by_name, cities.city AS city_name, states.name AS state_name,property_category.cat_title,lead_categories.title as looking_for_title');
        $builder->select('leads.*');
        $builder->join('cities', 'leads.city=cities.id', 'LEFT');
        $builder->join('states', 'leads.state=states.id', 'LEFT');
        $builder->join('users', 'leads.posted_by=users.id', 'LEFT');
        $builder->join('lead_categories', 'lead_categories.id=leads.looking_for', 'LEFT');
        $builder->join('property_category', 'property_category.cat_id=leads.property_type', 'LEFT');
        
        $builder->where(['leads.id' => $id]);
        $res = $builder->get();
        if ($res->getResultArray() > 0) {
            return $res->getRowArray();
        } else {
            return false;
        }
    }
}
