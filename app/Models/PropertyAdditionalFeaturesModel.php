<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyAdditionalFeaturesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'property_additional_features';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['property_id', 'property_features', 'amenities', 'soc_building_features', 'additional_features', 'water_source', 'overlooking', 'other_features', 'power_back_up', 'property_facing', 'type_of_flooring', 'w_facing_road', 'w_facing_road_unit', 'location_adv', 'ups', 'status', 'created_by', 'updated_by', 'deleted_by'];

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



    public function getPropertyAdditionalDetails($prop_id = null)
    {


        $builder = $this->db->table($this->table);
        $builder->select(' property_additional_features.*,propertymastervalues.title as type_of_flooring_title');
        $builder->join('propertymastervalues', 'propertymastervalues.id = property_additional_features.type_of_flooring', 'left');
        $builder->where(['property_id' => $prop_id]);
        $query   = $builder->get();
        if ($query->getResult() > 0) {
            return $query->getRowArray();
        } else {
            return false;
        }
    }
}
