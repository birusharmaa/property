<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyBasicDetailsModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'property_basic_details';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['property_title', 'looking_for', 'property_type', 'propertySubType', 'question_data', 'status', 'created_by', 'updated_by',  'deleted_by', 'isDeleted', 'isPublished'];

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

    public function getPropertyBasicInfo($limit = null, $offset = null)
    {
        $propertyForTable = $this->db->prefixTable('propertiesavailablefors');
        $propertiesavailablefors = $this->db->prefixTable('property_category');
        $propertyOwner = $this->db->prefixTable('properties_owner_info');
        $builder = $this->db->table($this->table);
        $builder->select(' property_basic_details.id,property_basic_details.property_title,property_basic_details.looking_for,propertiesavailablefors.title as lookingfor_title,property_basic_details.isDeleted, property_basic_details.property_type,property_category.cat_title as property_type_title, property_basic_details.status,properties_owner_info.name as owner_name,isPublished');
        $builder->join($propertyForTable, 'propertiesavailablefors.id = property_basic_details.looking_for', 'left');
        $builder->join($propertiesavailablefors, 'property_category.cat_id=property_basic_details.property_type', 'left');
        $builder->join($propertyOwner, 'properties_owner_info.property_id=property_basic_details.id', 'left');
        $builder->where(['property_basic_details.isDeleted' => false]);
        $builder->orderBy('property_basic_details.created_at', 'DESC');
        if ($limit && $offset)
            $query   = $builder->get($limit, $offset);
        else
            $query   = $builder->get();
        if ($query->getResult() > 0) {
            return $query->getResult();
        } else {
            return false;
        }
    }


    public function getPropertyBasicInfoById($id = null)
    {
        $propertyForTable = $this->db->prefixTable('propertiesavailablefors');
        $propertiesavailablefors = $this->db->prefixTable('property_category');
        $propertyOwner = $this->db->prefixTable('properties_owner_info');
        $builder = $this->db->table($this->table);
        $builder->select('property_basic_details.*,propertiesavailablefors.title as lookingfor_title, property_category.cat_title as property_type_title');
        $builder->join($propertyForTable, 'propertiesavailablefors.id = property_basic_details.looking_for', 'left');
        $builder->join($propertiesavailablefors, 'property_category.cat_id=property_basic_details.property_type', 'left');
        $builder->join($propertyOwner, 'properties_owner_info.property_id=property_basic_details.id', 'left');
        $builder->where(['property_basic_details.id' => $id]);

        $query   = $builder->get();
        if ($query->getResult() > 0) {
            return $query->getRow();
        } else {
            return false;
        }
    }


    public function getRecommendedPropertyForMeetings($conditions = [])
    {

        $builder = $this->db->table($this->table);

        $builder->select('property_basic_details.*,propertiesavailablefors.title as lookingfor_title, property_category.cat_title as property_type_title');
        $builder->join('propertiesavailablefors', 'propertiesavailablefors.id = property_basic_details.looking_for', 'left');
        $builder->join('property_category', 'property_category.cat_id=property_basic_details.property_type', 'left');
        $builder->select('property_location_details.*');
        $builder->join('property_location_details', 'property_location_details.property_id=property_basic_details.id', 'left');
        $builder->select('cities.city as city_title');
        $builder->join('cities', 'cities.id=property_location_details.city', 'left');
        $builder->select('`localities`.`locality_title`');
        $builder->join('localities', 'localities.id=property_location_details.locality', 'left');

        $builder->where(['looking_for' => $conditions['looking_for'], 'property_type' => $conditions['property_type'],'cities.city'=>$conditions['city'],'localities.locality_title'=>$conditions['property_in_location']]);

      
        // $builder->where(['looking_for' => $conditions['looking_for'], 'property_type' => $conditions['property_type']]);

        $query   = $builder->get();
        if ($query->getResult() > 0) {
            return $query->getResult();
        } else {
            return false;
        }
    }
}
