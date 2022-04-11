<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyAmenitiesModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'properties_amenities';
    protected $primaryKey       = 'pa_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['pa_amenities','pa_prop_id','pa_status','pa_created_at','pa_update_at','pa_update_by','pa_created_by'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'pa_created_at';
    protected $updatedField  = 'pa_updated_at';
    protected $deletedField  = 'pa_deleted_at';

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
}
