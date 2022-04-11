<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyAddressModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'properties_address';
    protected $primaryKey       = 'ptadd_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ptadd_state',
        'ptadd_latitude',
        'ptadd_longitude',
        'ptadd_city',
        'ptadd_zip_code',
        'ptadd_near_by',
        'ptadd_locality',
        'ptadd_tower_name',
        'ptadd_block',
        'ptadd_pocket',
        'ptadd_township',
        'ptadd_society_name',
        'ptadd_builder_name',
        'ptadd_building',
        'ptadd_floor',
        'ptadd_facing',
        'ptadd_house_unit_no',
        'ptadd_property_id',
        'ptadd_status',
        'ptadd_created_at',
        'ptadd_update_at',
        'ptadd_update_by',
        'ptadd_created_by'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'ptadd_created_at';
    protected $updatedField  = 'ptadd_updated_at';
    protected $deletedField  = 'ptadd_deleted_at';

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

    public function getPropertyAddress($id = null)
    {
        $city = $this->db->prefixTable('city');
        $state = $this->db->prefixTable('state');
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join($city,  'city.ct_id = properties_address.ptadd_state', 'left');
        $builder->join($state, 'state.st_id = properties_address.ptadd_city', 'left');
        $query   = $builder->getWhere(['ptadd_property_id'=>$id]);
        if ($query->getResult() > 0) {
            return $query->getResult();
        } else {
            return false;
        }
    }
}
