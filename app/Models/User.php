<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'users';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $protectFields        = true;
    protected $allowedFields        = ['emp_id', 'pass', 'name', 'email', 'password', 'user_role_id', 'updated_at', 'created_at'];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';

    function login_user_id()
    {
        $session = \Config\Services::session();
        return $session->has("loginInfo") ? $session->get('loginInfo')['user_id'] : "";
    }

    function get_user_type($id)
    {
        //$session = \Config\Services::session();
        //return $session->has("loginInfo") ? $session->get('loginInfo')['user_id'] : "";
        $users_table = 'users';
        $roles_table = 'user_roles';

        if (!$id) {
            $id = 0;
        }

        // $sql = "SELECT * FROM `kk_users` WHERE user_id=$user_id";

        $builder = $this->db->table('users');
        $builder->select('user_roles.type');
        $builder->join('user_roles', 'user_roles.r_id = users.user_role_id', 'left');
        $builder->where('users.id', $id);
        $query = $builder->get();
        return $query->getRow();
    }

    function get_access_info($user_id = 0)
    {

        $users_table = 'users';
        $roles_table = 'user_roles';
        $employee_table = 'employees';
        $access_permissions = 'user_access_permissions';

        if (!$user_id) {
            $user_id = 0;
        }
        if($user_id=='1'){
            $builder = $this->db->table('users');
            $builder->select('users.id, users.name,users.email,
            users.user_role_id,user_roles.type, user_roles.role_permission, user_access_permissions.uap_permission as access_right, user_access_permissions.uap_full_access, user_access_permissions.uap_sub_sub_modules');
            $builder->join('user_roles', 'user_roles.r_id = users.user_role_id', 'left');
            $builder->join('user_access_permissions', 'user_access_permissions.user_role_id = user_roles.r_id', 'left');
            $builder->where('users.id', $user_id);
            $query = $builder->get();
        }else{
            // $builder->select('users.id, users.name, users.email,
            // users.user_role_id,user_roles.type, 
            // user_roles.role_permission, 
            // user_access_permissions.uap_permission as access_right, 
            // user_access_permissions.uap_full_access, 
            // user_access_permissions.uap_sub_sub_modules');
            // $builder->join('user_roles', 'user_roles.r_id = users.user_role_id', 'left');
            // $builder->join('user_access_permissions', 'user_access_permissions.user_role_id = user_roles.r_id', 'left');
            // $builder->join('designations', 'designations.id = user_access_permissions.user_role_id', 'left');
            $builder = $this->db->table('users');
            $builder->select('users.id, users.name, users.email,
                                users.user_role_id, user_access_permissions.uap_id, 
                                user_access_permissions.uap_permission as access_right, 
                                user_access_permissions.uap_sub_sub_modules, user_roles.type, user_roles.role_permission');
            $builder->join('user_access_permissions', 'user_access_permissions.uap_user_id=users.id');
            $builder->join('user_roles', 'user_roles.r_id=users.user_role_id');
            $builder->where('users.id', $user_id);
            $query = $builder->get();
            
        }
        return $query->getRow();
    }

    public function getUsersNotAdmin()
    {
        try {
            $ids = [1, 2];
            $builder = $this->db->table('users');
            $builder->select('users.id, users.name,users.email,
        users.user_role_id');
            $builder->whereNotIn('id', $ids);
            $query =  $builder->get();
            if ($query->getResultArray() > 0) {
                return $query->getResult();
            } else {
                return false;
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }

    public function getUserAccessPermission($id= null){
        if(!empty($id)){
            $builder = $this->db->table('user_roles');
            $builder->select('user_roles.role_permission');
            $builder->join('users', 'user_roles.r_id=users.user_role_id');
            $builder->where('users.id', $id);
            $query = $builder->get();
            return $query->getRowArray();
        }else{
            return '0';
        }

    }
}
