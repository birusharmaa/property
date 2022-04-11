<?php

namespace App\Controllers;

class Reports extends Security_Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    public function lead_status_report()
    {
        $this->template->rander('Reports/lead_status_report');
    }
    public function agent_commission_report()
    {
        $this->template->rander('Reports/agent_commission_report');
    }
    public function employee_sales_report()
    {
        $this->template->rander('Reports/employee_sales_report');
    }
    public function sales_report()
    {
        $this->template->rander('Reports/sales_report');
    }
    public function visit_report()
    {
        $this->template->rander('Reports/visit_report');
    }
 
}