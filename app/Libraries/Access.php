<?php

namespace App\Libraries;
use App\Models\User;
use App\Models\Modules;
use App\Models\SubModules;
use App\Models\SubSubmodules;
use App\Models\RoleModel;

class Access{

    protected $module;
    protected $sub_module;
    protected $sub_sub_module;
    protected $role_model;

    public function __construct()
    {
        $this->module         = new Modules();
        $this->sub_module     = new SubModules();
        $this->sub_sub_module = new SubSubmodules();
        $this->model          = new User();
        $this->role_model     = new RoleModel();
    }
    

    public function check_user_access_page($id=null, $url=null){
        return true;
        if(!empty($id) && !empty($url)){
            $user           = $this->model->get_access_info($id);
            $access_right   = $user->access_right;
            $access_right   = json_decode($access_right);
            $sub_sub        = $user->uap_sub_sub_modules;
            $sub_sub_module = "";
            if(!empty($sub_sub)){
                $sub_sub_module = json_decode($sub_sub);
            }

            // echo "<pre>";
            // print_r($access_right);
            // echo "<pre>";
            // print_r($sub_sub_module);
            // exit;
           
            $allow_url  = ['dashboard'];
            $allow_role = [];
            foreach($access_right as $value){
                $model_id = $value->module_id;
                $module_data = $this->module->where(['mod_status' => 1, 'mod_id' => $model_id])->first();
                if(!empty($module_data['mod_url'])){
                    array_push($allow_url, $module_data['mod_url']);
                }
                
                if($value->submodule){
                    foreach($value->submodule as $v){
                        $sub_module_data = $this->sub_module->where(['sm_status' => 1, 'sm_id' => $v->id])->first();
                        if(!empty($sub_module_data['sm_url'])){
                            $sm_url = $sub_module_data['sm_url'];
                            array_push($allow_url, $sm_url);
                            $allow_role[$sm_url] = $v->role_id;
                        }                        
                    }
                }
            }

            if(!empty($sub_sub_module)){
                foreach($sub_sub_module as $value){
                    if(count($value->sub_submodule)>0){
                        foreach($value->sub_submodule as $v){
                            $sub_sub_module_data = $this->sub_sub_module->where(['ssm_status' => 1, 'ssm_id' => $v->id])->first();
                            if(!empty($sub_sub_module_data['ssm_url'])){
                                $ssm_url = $sub_sub_module_data['ssm_url'];
                                array_push($allow_url, $ssm_url);
                                $allow_role[$ssm_url] = $v->role_id;
                            }
                        }
                    }
                }
            }
            
            if(count($allow_url)>0){
                $allow_url = array_unique($allow_url);
                $allow_url = array_values($allow_url);
                $url = str_replace("/","", $url);
                
                if (in_array($url, $allow_url)){
                    return true;
                }
                return false;
            }
            return false;
        }else{
            return false;
        }
    }

    public function check_user_access_page_type($id=null, $url=null){
        if(!empty($id) && !empty($url)){
            $user           = $this->model->get_access_info($id);
            $access_right   = $user->access_right;
            $access_right   = json_decode($access_right);
            $sub_sub        = $user->uap_sub_sub_modules;
            $sub_sub_module = "";
            if(!empty($sub_sub)){
                $sub_sub_module = json_decode($sub_sub);
            }

            $allow_url  = ['dashboard'];
            $allow_role = [];
            foreach($access_right as $value){
                $model_id = $value->module_id;
                $module_data = $this->module->where(['mod_status' => 1, 'mod_id' => $model_id])->first();
                if(!empty($module_data['mod_url'])){
                    array_push($allow_url, $module_data['mod_url']);
                }
                
                if($value->submodule){
                    foreach($value->submodule as $v){
                        $sub_module_data = $this->sub_module->where(['sm_status' => 1, 'sm_id' => $v->id])->first();
                        if(!empty($sub_module_data['sm_url'])){
                            $sm_url = $sub_module_data['sm_url'];
                            $allow_role[$sm_url] = $v->role_id;
                        }                        
                    }
                }
            }

            if(!empty($sub_sub_module)){
                foreach($sub_sub_module as $value){
                    if(count($value->sub_submodule)>0){
                        foreach($value->sub_submodule as $v){
                            $sub_sub_module_data = $this->sub_sub_module->where(['ssm_status' => 1, 'ssm_id' => $v->id])->first();
                            if(!empty($sub_sub_module_data['ssm_url'])){
                                $ssm_url = $sub_sub_module_data['ssm_url'];
                                $allow_role[$ssm_url] = $v->role_id;
                            }
                        }
                    }
                }
            }
            
            if(count($allow_role)>0){
                // echo "<pre>";
                // print_r($allow_role);
                // exit;
                $url = str_replace("/","", $url);
                $role_type_id = $allow_role[$url];
                if(is_numeric($role_type_id)){
                    $role = $this->role_model->select('role_permission')->find($role_type_id);

                    //print_r();
                    $data     = $role['role_permission'];
                    $arr_roles   = unserialize($data);
                    $final_roles = str_split($arr_roles[0]);
                    $session = session();
                    $session->set('action_type', $final_roles);
                    return true;
                }                
                return false;
            }
            return false;
        }else{
            return false;
        }            
    }
    
}