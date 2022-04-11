<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Employees as EMPLIB;

class Employees extends Security_Controller
{
    protected $Emplib;

    function __construct()
    {
        $this->Emplib = new EMPLIB();
    }

    public function index()
    {
        $data = $this->Emplib->getEmployees();
        if ($data) {
            return $this->respond(['message' => 'Successfully saved', 'data' => $data], 200);
        } else {
            return $this->respond(['message' => 'Not found', 'data' => $data], 404);
        }
    }

    public function create()
    {
        $data = $this->Emplib->saveEmployee();
        if ($data) {
            return $this->respond(['message' => 'Successfully saved', 'data' => $data], 200);
        } else {
            return $this->respond(['message' => 'Not found', 'data' => $data], 404);
        }
    }

    public function show($id = null)
    {
    }

    public function update()
    {
   
        $data = $this->Emplib->updateEmployee();
        if ($data) {
            return $this->respond(['message' => 'Successfully saved', 'data' => $data], 200);
        } else {
            return $this->respond(['message' => 'Not found', 'data' => $data], 404);
        }
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $res = $this->Emplib->deleteEmployee($id);

        if ($res) {
            return $this->respond(['message' => 'Successfully deleted', 'data' => $res], 200);
        } else {
            return $this->respond(['message' => 'Failure delete, Internal server error, Please contact your service provider', 'data' => $res], 404);
        }
    }

    public function uploadFiles()
    {
        $data = $this->Emplib->uploadEmployeeDoc($this->request->getFiles());
        if ($data) {
            return $this->respond(['message' => 'Successfully uploaded', 'data' => $data], 200);
        } else {
            return $this->respond(['message' => 'Failure upload, Internal server error, Please contact your service provider', 'data' => $data], 404);
        }
    }
}
