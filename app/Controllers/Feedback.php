<?php

namespace App\Controllers;

class Feedback extends Security_Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function index()
    {
         return $this->template->rander('Feedback/index');
    }
 
}