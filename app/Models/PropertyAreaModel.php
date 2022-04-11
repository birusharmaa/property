<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyAreaModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'properties_area';
    protected $primaryKey       = 'ptar_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['ptar_square_feet','ptar_carpet_area','ptar_build_up_area','ptar_yard','ptar_meter','ptar_super_carpet_area','ptar_prop_id','ptar_status','ptar_created_at','ptar_update_at','ptar_update_by','ptar_created_by'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'ptar_created_at';
    protected $updatedField  = 'ptar_updated_at';
    protected $deletedField  = 'ptar_deleted_at';

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
