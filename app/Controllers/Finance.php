<?php

namespace App\Controllers;

class Finance extends Security_Controller
{
    public function __construct() {
        parent::__construct();
    }

    public function all_expenses()
    {
        $this->template->rander('Finance/all_expenses');
    }
    public function add_expense()
    {
        $this->template->rander('Finance/add_expense');
    }
    public function expense_type()
    {
        $this->template->rander('Finance/expense_type');
    }
    public function expense_report()
    {
        $this->template->rander('Finance/expense_report');
    }
    public function all_income()
    {
        $this->template->rander('Finance/all_income');
    }
    public function add_income()
    {
        $this->template->rander('Finance/add_income');
    }
    public function income_report()
    {
        $this->template->rander('Finance/income_report');
    }
    public function all_profit_loss()
    {
        $this->template->rander('Finance/all_profit_loss');
    }
    public function add_profit_loss()
    {
        $this->template->rander('Finance/add_profit_loss');
    }
    public function profile_loss_report()
    {
        $this->template->rander('Finance/profile_loss_report');
    }
}
