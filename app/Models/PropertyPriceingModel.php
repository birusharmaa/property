<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyPriceingModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'property_priceing';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'property_id', 'ownership', 'price', 'price_pr_sqft', 'all_Inclusive_price', 'govt_charges_excluded', 'price_negotiable', 'maintenance', 'maintenance_tenyour', 'expected_rental', 'booking_amount', 'annual_dues_payable', 'membership_charge', 'is_pre_leased', 'is_pre_leased_or_rent', 'current_rent_pr_month', 'less_tiy', 'a_r_i_percent', 'lease_tobusiness_type', 'fire_noc_certified', 'occupancy_certificate', 'office_pre_used', 'desciption', 'status', 'created_by', 'updated_by', 'deleted_by'
    ];

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
