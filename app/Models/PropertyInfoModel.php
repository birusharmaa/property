<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyInfoModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'properties_info';
    protected $primaryKey       = 'prpt_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'prpt_title',
        'prpt_no_of_bedrooms',
        'prpt_no_of_bathrooms',
        'prpt_no_of_balconies',
        'prpt_kitechen_size',
        'prpt_property_type',
        'property_available_for',
        'prpt_bathroom_style',
        'prpt_drawing_hall',
        'prpt_dining_hall',
        'prpt_no_of_sittings',
        'prpt_no_of_cabins',
        'prpt_property_cate',
        'prpt_no_of_lifts',
        'prpt_no_of_entry_gates',
        'prpt_drawing_hall_size',
        'prpt_dining_hall_size',
        'prpt_room_size',
        'prpt_washroomsize',
        'prpt_servant_room',
        'prpt_images_link',
        'prpt_video_link',
        'prpt_status',
        'prpt_created_at',
        'prpt_update_at',
        'prpt_update_by',
        'prpt_created_by',
        'prpt_isdelete'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'prpt_created_at';
    protected $updatedField  = 'prpt_updated_at';
    protected $deletedField  = 'prpt_deleted_at';

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


    /**
     * This function is used to get list of all the property 
     *
     * @return void
     */
    public function getPropertyInfo($limit = 10, $offset = null)
    {
        $ownerTable = $this->db->prefixTable('properties_owner_info');
        $propertiesavailablefors = $this->db->prefixTable('propertiesavailablefors');
        $builder = $this->db->table($this->table);
        $builder->select('prpt_id,prpt_title,prpt_status,`properties_owner_info`.`poi_prop_owner_name`,`propertiesavailablefors`.`title`');
        $builder->join($ownerTable, 'properties_owner_info.poi_prop_id = properties_info.prpt_id', 'left');
        $builder->join($propertiesavailablefors, 'propertiesavailablefors.id = properties_info.property_available_for', 'left');
        $builder->where(['prpt_isdelete'=>false]);
        $query   = $builder->get($limit, $offset);
        if ($query->getResult() > 0) {
            return $query->getResult();
        } else {
            return false;
        }
    }
    
    public function getPropertyDetailedInfo($id = null)
    {
        $propCate = $this->db->prefixTable('property_category');
        $propertiesavailablefors = $this->db->prefixTable('propertiesavailablefors');
        $propertyType = $this->db->prefixTable('property_type');
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join($propCate,  'property_category.cat_id = properties_info.prpt_property_cate', 'left');
        $builder->join($propertiesavailablefors, 'propertiesavailablefors.id = properties_info.property_available_for', 'left');
        $builder->join($propertyType, 'property_type.pt_id = properties_info.prpt_property_type', 'left');
        $query   = $builder->getWhere(['prpt_id'=>$id]);
        if ($query->getResult() > 0) {
            return $query->getResult();
        } else {
            return false;
        }
    }

    
}
