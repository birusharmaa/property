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
        //return true;
        if(!empty($id) && !empty($url)){

            $this->module->select('mod_url');
            $all_module_url = $this->module->findAll();

            $this->sub_module->select('sm_url');
            $all_sub_module_url = $this->sub_module->findAll();

            $this->sub_sub_module->select('ssm_url');
            $all_sub_sub_module_url = $this->sub_sub_module->findAll();
            $final_all_module_url = [];;
            if(count($all_module_url)>0){
                foreach($all_module_url as $value){
                    if(!empty($value['mod_url'])){
                        $final_all_module_url[] = $value['mod_url'];
                    }
                }
            }
            

            if(count($all_sub_module_url)>0){
                foreach($all_sub_module_url as $value){
                    if(!empty($value['sm_url'])){
                        $final_all_module_url[] = $value['sm_url'];
                    }
                }
            }
           

            if(count($all_sub_sub_module_url)>0){
                foreach($all_sub_sub_module_url as $value){
                    if(!empty($value['ssm_url'])){
                        $final_all_module_url[] = $value['ssm_url'];
                    }
                }
            }
            
            
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
                $res = false;
                if (in_array($url, $allow_url)){
                    $res = true;
                }               

                if (!in_array($url, $final_all_module_url) ){
                    $res = true;
                }
                if($res){
                    return $res;
                }
                //echo $url."<br/>";
                
                return false;
            }
            return false;
        }else{
            return false;
        }
    }

    // public function check_user_access_page_type($id=null, $url=null){
        
    //     if(!empty($id)){
           
    //         $role = $this->model->getUserAccessPermission($id);
            
    //         $data     = $role['role_permission'];
    //         $arr_roles   = unserialize($data);
    //         $final_roles = str_split($arr_roles[0]);
    //         $session = session();
    //         $session->set('create_action_type', "No");
    //         $session->set('read_action_type', "No");
    //         $session->set('update_action_type', "No");
    //         $session->set('delete_action_type', "No");

    //         for($i=0; $i<count($final_roles); $i++){
    //             if($final_roles[$i]=="c"){
    //                 $final_roles[$i]=="c"?$session->set('create_action_type', "Yes"):$session->set('create_action_type', "No");
    //             }

    //             if($final_roles[$i]=="r"){
    //                 $final_roles[$i]=="r"?$session->set('read_action_type', "Yes"):$session->set('create_action_type', "No");
    //             }

    //             if($final_roles[$i]=="u"){
    //                 $final_roles[$i]=="u"?$session->set('update_action_type', "Yes"):$session->set('update_action_type', "No");
    //             }

    //             if($final_roles[$i]=="d"){
    //                 $final_roles[$i]=="d"?$session->set('delete_action_type', "Yes"):$session->set('delete_action_type', "No");
    //             }
    //         }
    //         // echo $session->get('create_action_type');
    //         // echo $session->get('read_action_type');
    //         // echo $session->get('update_action_type');
    //         // echo $session->get('delete_action_type');
            
    //         // exit;
            
    //         $session->set('action_type', $final_roles);
    //         return true;
    //     }                
    //     return false;
    // }

    public function check_access_permission($id=null, $url=null){
        // $this->module         = new Modules();
        // $this->sub_module     = new SubModules();
        // $this->sub_sub_module = new SubSubmodules();
        // $this->model          = new User();
        // $this->role_model     = new RoleModel();
        if($url=="/dashboard"){
            return true;
        }
        if(!empty($id) && !empty($url)){
           
            $this->module->select('mod_url');
            $all_module_url = $this->module->findAll();

            $this->sub_module->select('sm_url');
            $all_sub_module_url = $this->sub_module->findAll();

            $this->sub_sub_module->select('ssm_url');
            $all_sub_sub_module_url = $this->sub_sub_module->findAll();
            $final_all_module_url = [];;
            if(count($all_module_url)>0){
                foreach($all_module_url as $value){
                    if(!empty($value['mod_url'])){
                        $final_all_module_url[] = $value['mod_url'];
                    }
                }
            }
            

            if(count($all_sub_module_url)>0){
                foreach($all_sub_module_url as $value){
                    if(!empty($value['sm_url'])){
                        $final_all_module_url[] = $value['sm_url'];
                    }
                }
            }
           

            if(count($all_sub_sub_module_url)>0){
                foreach($all_sub_sub_module_url as $value){
                    if(!empty($value['ssm_url'])){
                        $final_all_module_url[] = $value['ssm_url'];
                    }
                }
            }
            
            
            $user           = $this->model->get_access_info($id);
            $access_right   = $user->access_right;
            $access_right   = json_decode($access_right);
            $sub_sub        = $user->uap_sub_sub_modules;
            $sub_sub_module = "";
            if(!empty($sub_sub)){
                $sub_sub_module = json_decode($sub_sub);
            }
            $url = str_replace("/","", $url);
            
            if(in_array($url, $final_all_module_url) ){
                
                $this->module->select('mod_id');
                $all_module_id = $this->module->where('mod_url', $url)->first();
                
                if(!empty($all_module_id['mod_id'])){
                    foreach($access_right as $module_value){
                        if($all_module_id['mod_id']==$module_value->module_id){
                            if(count($module_value->submodule)>0){
                                foreach($module_value->submodule as $sub_module_value){
                                    if(count($sub_module_value)>0){
                                        $this->sub_module->select('sm_url');
                                        $sub_module_url = $this->sub_module->find($sub_module_value->id);
                                        if($sub_module_url['sm_url']==$url){
                                            $role_id=$sub_module_value->role_id;
                                        }
                                    }
                                    //$sub_module_value->id;
                                    if($sub_sub_module>0){
                                        foreach($sub_sub_module as $sb_sb_v){
                                            if($sb_sb_v->submodule_id==$sub_module_value->id){
                                                foreach($sb_sb_v->sub_submodule as $v){
                                                    $this->sub_sub_module->select('ssm_url');
                                                    $sub_sub_url = $this->sub_sub_module->find($v->id);
                                                    if($sub_sub_url['ssm_url']==$url){
                                                        $role_id=$v->role_id;
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    
                                }
                            }else{
                                $role_id = $module_value->role_id;
                            }
                        }
                    }
                    return $role_id;
                }
                


                $this->sub_module->select('sm_id');
                $s_module_id = $this->sub_module->where('sm_url', $url)->first();
                
                if(!empty($s_module_id['sm_id'])){
                    foreach($access_right as $module_value){
                        if(count($module_value->submodule)>0){
                            foreach($module_value->submodule as $sub_module_value){
                                if(count($sub_module_value)>0){
                                    $this->sub_module->select('sm_url');
                                    $sub_module_url = $this->sub_module->find($sub_module_value->id);
                                    if($sub_module_url['sm_url']==$url){
                                        $role_id=$sub_module_value->role_id;
                                    }
                                }
                                //$sub_module_value->id;
                                if($sub_sub_module>0){
                                    foreach($sub_sub_module as $sb_sb_v){
                                        if($sb_sb_v->submodule_id==$sub_module_value->id){
                                            foreach($sb_sb_v->sub_submodule as $v){
                                                $this->sub_sub_module->select('ssm_url');
                                                $sub_sub_url = $this->sub_sub_module->find($v->id);
                                                if($sub_sub_url['ssm_url']==$url){
                                                    $role_id=$v->role_id;
                                                }
                                            }
                                        }
                                    }
                                }
                                
                            }
                        }else{
                            $role_id = $module_value->role_id;
                        }
                    }
                    return $role_id;
                }
                
            }
        }
       
        return false;
    }

    public function check_user_access_page_type($id=null){     
       
        if(!empty($id)){
            $role = $this->model->getUserAccessPermission($id);
            $data     = $role['role_permission'];
            $arr_roles   = unserialize($data);
            $final_roles = str_split($arr_roles[0]);
            $session = session();
            $session->set('create_action_type', "No");
            $session->set('read_action_type', "No");
            $session->set('update_action_type', "No");
            $session->set('delete_action_type', "No");

            for($i=0; $i<count($final_roles); $i++){
                if($final_roles[$i]=="c"){
                    $final_roles[$i]=="c"?$session->set('create_action_type', "Yes"):$session->set('create_action_type', "No");
                }

                if($final_roles[$i]=="r"){
                    $final_roles[$i]=="r"?$session->set('read_action_type', "Yes"):$session->set('create_action_type', "No");
                }

                if($final_roles[$i]=="u"){
                    $final_roles[$i]=="u"?$session->set('update_action_type', "Yes"):$session->set('update_action_type', "No");
                }

                if($final_roles[$i]=="d"){
                    $final_roles[$i]=="d"?$session->set('delete_action_type', "Yes"):$session->set('delete_action_type', "No");
                }
            }
            // echo $session->get('create_action_type')."<br/>";
            // echo $session->get('read_action_type')."<br/>";
            // echo $session->get('update_action_type')."<br/>";
            // echo $session->get('delete_action_type')."<br/>";
            
            // exit;
            
            $session->set('action_type', $final_roles);
            return true;
        }                
        return false;
    }
    
}