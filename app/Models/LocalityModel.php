<?php

namespace App\Models;

use CodeIgniter\Model;

class LocalityModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'localities';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['locality_title', 'city_id', 'status', 'created_at', 'created_by', 'update_at', 'update_by', 'deleted_at', 'deleted_by'];

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


    public function getInsertedId($data = [])
    {
        $db = db_connect('default');
        $builder = $db->table('localities');
        $builder = $this->table();
        $id = $builder->insert($data);
        print_r($id->$id());
        die;
    }
}
