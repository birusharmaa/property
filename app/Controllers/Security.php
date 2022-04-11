<?php

namespace App\Controllers;

class Security extends Security_Controller
{
    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->template->rander('Security/index');
    }
    
    public function data_storage()
    {
        $this->template->rander('Security/data_storage');
    }
    public function data_backup()
    {
        $this->template->rander('Security/data_backup');
    }
 
    public function data_extraction()
    {
        $this->template->rander('Security/data_extraction');
    }
 
 
 
}