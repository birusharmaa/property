<?php

namespace App\Models;

use CodeIgniter\Model;

class BaseModel extends Model
{
  protected $table = 'prop_users';
  protected $primaryKey = 'id';
//   protected $allowedFields = [
//     'setting_name',
//     'setting_value',
//     'type',
//     'deleted'
//   ];

  public function getUser($email)
  {
    $db = \Config\Database::connect();
    $builder = $db->table($this->table);
    return $builder->where('email', $email)->get();
  }
}
