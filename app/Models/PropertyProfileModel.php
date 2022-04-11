<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyProfileModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'property_profile';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['property_id', 'appartment_is', 'no_of_room', 'no_of_bedroom', 'no_of_balconies', 'carpet_area', 'carpet_area_unit', 'build_up_area', 'build_up_area_unit', 'super_build_up_area', 'super_build_up_area_unit', 'shop_facade_size', 'other_rooms', 'furnishing', 'furnishing_app', 'peserved_parking', 'cover_parking', 'open_parking', 'total_no_of_floors', 'property_on_floor', 'availability_status', 'possession_year', 'possession_month', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by', 'property_age'];

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
}
