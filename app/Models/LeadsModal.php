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
    protected $allowedFields    = ['first_name', 'last_name', 'email', 'phone', 'no_of_beds', 'no_of_bathroom', 
                                     'property_type', 'price_range', 'city', 'state', 'square_feet', 'property_in_location',
                                     'facing', 'floor', 'commercial', 'posted_by', 'category', 'sub_category',
                                      'looking_for', 'lead_action_status', 'lead_status_id', 'owner_id', 'lead_assigned_to', 
                                      'created_by', 'updated_by' ];

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
