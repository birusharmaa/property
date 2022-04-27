<?php

namespace App\Libraries;

use App\Libraries\Left_menu;
use App\Controllers\Security_Controller;

class Template
{

    //render with predefined contents
    public function rander($view, $data = []){
    
        $session = session();
        if($session->get('loginInfo')){

            $view_data['content_view'] = $view;
            $view_data['topbar'] = "Layout/header";
            
            if (!isset($data["left_menu"])) {  
                $left_menu = new Left_menu();
                $view_data['left_menu'] = $left_menu->rander_left_menu();
            }

            $view_data = array_merge($view_data, $data);
            return $this->view('Layout/index', $view_data);
        }else{
            return redirect()->to(base_url());
        }
    }

    //use this method instead of default view() to pass necessary variables
    public function view($view, $data = array())
    {
        $view_data = array();
        $users_model = model("App\Models\User", false);
        
        if ($users_model->login_user_id()) {
            //user logged in, prepare login user data
            $Security_Controller = new Security_Controller(false);
            $view_data["login_user"] = $Security_Controller->login_user;
        } 

        $view_data = array_merge($view_data, $data);
        
        return view($view, $view_data);
    }
}
