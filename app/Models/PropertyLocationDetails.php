<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyLocationDetails extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'property_location_details';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['property_id', 'city', 'appartment', 'project', 'house_number', 'locality', 'sub_locality', 'located_inside', 'zone', 'address', 'status', 'created_by', 'updated_by', 'deleted_by'];

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


    public function getPropertyDetailsById($id = null)
    {

        $builder = $this->db->table($this->table);
        $builder->select('property_location_details.id, property_location_details.city, propertycities.ct_title, property_location_details.appartment, apartments.ap_title, property_location_details.house_number, property_location_details.project, projects.project_title, property_location_details.locality, localities.locality_title, property_location_details.sub_locality, sublocalities.sublocality_title, property_location_details.address, property_location_details.located_inside, locatedinsides.title as located_inside_title, property_location_details.zone, zonetypes.title as zone_title, property_location_details.property_id, property_location_details.status');
        $builder->join('propertycities', 'propertycities.id = property_location_details.city', 'left');
        $builder->join('apartments', 'apartments.id = property_location_details.appartment', 'left');
        $builder->join('projects', 'projects.id = property_location_details.project', 'left');
        $builder->join('localities', 'localities.id = property_location_details.locality', 'left');
        $builder->join('sublocalities', 'sublocalities.id = property_location_details.sub_locality', 'left');
        $builder->join('locatedinsides', 'locatedinsides.id = property_location_details.located_inside', 'left');
        $builder->join('zonetypes', 'zonetypes.id = property_location_details.zone', 'left');
        $builder->where(['property_location_details.property_id' => $id]);
        $query   = $builder->get();
        if ($query->getResult() > 0) {
            return $query->getRow();
        } else {
            return false;
        }
    }
}
