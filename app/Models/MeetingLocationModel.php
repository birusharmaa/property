<?php

namespace App\Models;

use CodeIgniter\Model;

class MeetingLocationModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'meetinglocations';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['meeting_id', 'property_id', 'is_visited', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by'];

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

    public function getLocationList(int $meetingId = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('meetinglocations.*');
        $builder->select('property_basic_details.property_title,property_basic_details.looking_for,property_basic_details.property_type,property_basic_details.propertySubType');
        $builder->select('propertiesavailablefors.title as lookingfor_title');
        $builder->select('property_category.cat_title as property_type_title');
        $builder->select('cities.city as city_title');
        $builder->join('property_basic_details', 'property_basic_details.id=meetinglocations.property_id', 'left');
        $builder->join('propertiesavailablefors', 'propertiesavailablefors.id = property_basic_details.looking_for', 'left');
        $builder->join('property_category', 'property_category.cat_id=property_basic_details.property_type', 'left');
        $builder->join('property_location_details', 'property_location_details.property_id=meetinglocations.property_id', 'left');
        $builder->select('cities.city as city_title');
        $builder->join('cities', 'cities.id=property_location_details.city', 'left');
        $builder->select('`localities`.`locality_title`');
        $builder->join('localities', 'localities.id=property_location_details.locality', 'left');
        $builder->where(['meetinglocations.meeting_id' => $meetingId]);
        $query = $builder->get();
        if ($query->getResultArray() > 0) {
            return $query->getResult();
        } else {
            return false;
        }
    }
}
