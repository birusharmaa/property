<?php

namespace App\Controllers;

class Meetings extends Security_Controller
{
    public function __construct() {
        parent::__construct();
    }
    public function index()
    {
        $this->template->rander('Meetings/index');
    }
 
}