<?php

namespace App\Models;

use CodeIgniter\Model;

class StateModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'state';
    protected $primaryKey       = 'st_id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'st_created_at';
    protected $updatedField  = 'st_updated_at';
    protected $deletedField  = 'st_deleted_at';

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


    public function getCountry()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('countries');
        $res = $builder->get();
        if ($res->getResultArray() > 0) {
            return $res->getResult();
        } else {
            return false;
        }
    }

    public function getStates($countryid = null)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('states');
        if ($countryid) {
            $res = $builder->getWhere(['country_id' => $countryid]);
        } else {
            $res = $builder->getWhere(['country_id' => 101]);
        }
        if ($res->getResultArray() > 0) {
            return $res->getResult();
        } else {
            return false;
        }
    }

    public function getCities($stateId = null)
    {
    
        $db      = \Config\Database::connect();
        $builder = $db->table('cities');
    
        if ($stateId) {
            $res = $builder->getWhere(['state_id' => $stateId]);
        } else {
            $res = $builder->getWhere(['state_id' =>38]);
        }
        if ($res->getResultArray() > 0) {
            return $res->getResult();
        } else {
            return false;
        }
    }
}
