<?php

namespace App\Controllers;

class Signin extends BaseController
{
    public function index()
    {
        $result = $this->validateUser($_POST['email'],$_POST['password']);
        if($result)
        return view('Dashboard/index');
        else
        return "Invalid User.";
    }
    public function my_profile()
    {
        return view('Dashboard/my_profile');
    }
}
