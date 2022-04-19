<?php

namespace App\Controllers;
use App\Libraries\Common;
use App\Libraries\Employees;

class HR extends Security_Controller
{
    protected $common;
    protected $employee;
    public function __construct()
    {
        parent::__construct();
        $this->common = new Common();
        $this->employee = new Employees();
    }

    public function index()
    {
        return $this->template->rander('HR/index');
    }

    public function add_employees()
    {
        $pageData['countries'] = $this->common->getCountries();
        $pageData['states'] = $this->common->getStates();
        $pageData['cities'] = $this->common->getCitiesList();
        $pageData['departments'] = $this->DepartmentModel->where(['status' => true])->findAll();
        $pageData['designations'] = $this->DesignationModel->where(['status' => true])->findAll();
        $pageData['superwisers'] = $this->DesignationModel->where(['status' => true])->findAll();
        return $this->template->rander('HR/add_employees',$pageData);
    }

    public function edit_employees($id = null)
    {
        $pageData['employee'] = $this->employee->getEmployee($id);

     
        $pageData['countries'] = $this->common->getCountries();
        $pageData['states'] = $this->common->getStates();
        $pageData['cities'] = $this->common->getCitiesList();
        $pageData['departments'] = $this->DepartmentModel->where(['status' => true])->findAll();
        $pageData['designations'] = $this->DesignationModel->where(['status' => true])->findAll();
        $pageData['superwisers'] = $this->DesignationModel->where(['status' => true])->findAll();
        return $this->template->rander('HR/add_employees',$pageData);
    }

    public function all_departments()
    {
        return $this->template->rander('HR/all_departments');
    }

    public function all_designation()
    {
        return $this->template->rander('HR/all_designation');
    }

    public function all_roles()
    {
        $pageData['roles'] = $this->RoleModel->findAll();
        return $this->template->rander('HR/all_roles',$pageData);
    }
    public function attandance()
    {
        return $this->template->rander('HR/attandance');
    }
    public function all_teams()
    {
        return $this->template->rander('HR/all_teams');
    }
    public function add_teams()
    {
        return $this->template->rander('HR/add_teams');
    }
    public function payrol()
    {
        return $this->template->rander('HR/payrol');
    }
    public function leaves()
    {
        return $this->template->rander('HR/leaves');
    }


    /**
     * ____________________Designation APIs______________________________
     */

    public function designationList()
    {
        $data = $this->DesignationModel->where(['status' => true])->findAll();
        if ($data) {
            return $this->respond(['message' => 'Success', 'data' => $data], 200);
        } else {
            return $this->respond(['message' => 'Not found', 'data' => $data], 404);
        }
    }

    /**
     * This function is used to get single designation by id.
     *
     * @param integer|null $id
     * @return array
     */
    public function showDesignation($id = null)
    {
        $data = $this->DesignationModel->where(['status' => true, 'id' => $id])->findAll();
        if ($data) {
            return $this->respond(['message' => 'Success', 'data' => $data], 200);
        } else {
            return $this->respond(['message' => 'Not found', 'data' => $data], 404);
        }
    }

    /**
     * This Function is used to update designation
     *
     * @return array
     */
    public function updateDesignation()
    {
        $id = $this->request->getVar('rowid');
        $formData = [
            'title' => xss_clean($this->request->getVar('designationname')),
            'update_at' => $this->timestamp,
            'created_by' => $this->userid,
        ];
        $data = $this->DesignationModel->update($id, $formData);
        if ($data) {
            return $this->respond(['message' => 'Successfully updated', 'data' => $data], 202);
        } else {
            return $this->respond(['message' => 'Not found', 'data' => false], 404);
        }
    }

    /**
     * This function is used to save department data
     *
     * @return array
     */
    public function saveDesignation()
    {
        $formData = [
            'title' => xss_clean($this->request->getVar('designationname')),
            'status' => true,
            'created_at' => $this->timestamp,
            'created_by' => $this->userid,
        ];
        $data = $this->DesignationModel->save($formData);
        if ($data) {
            return $this->respond(['message' => 'Successfully Added', 'data' => $data], 201);
        } else {
            return $this->respond(['message' => 'Not found', 'data' => $data], 500);
        }
    }

    /**
     * This function is used to delete designation. 
     *
     * @return void
     */
    public function deleteDesignation()
    {
        $id = $this->request->getVar('id');
        $data = $this->DesignationModel->update($id, ['status' => false, 'deleted_at' => $this->timestamp, 'deleted_by' => $this->userid]);
        if ($data) {
            return $this->respond(['message' => 'Successfully deleted', 'data' => true], 200);
        } else {
            return $this->respond(['message' => 'Internal server error! Please contact your service provider', 'data' => false], 500);
        }
    }


    /**
     * ____________________Department APIs______________________________
     */

    public function departmentList()
    {
        $data = $this->DepartmentModel->where(['status' => true])->findAll();

        if ($data) {
            return $this->respond(['message' => 'Success', 'data' => $data], 200);
        } else {
            return $this->respond(['message' => 'Not found', 'data' => $data], 404);
        }
    }

    /**
     * This function is used to get single Department by id.
     *
     * @param integer|null $id
     * @return array
     */
    public function showDepartment($id = null)
    {
        $data = $this->DepartmentModel->where(['status' => true, 'id' => $id])->findAll();
        if ($data) {
            return $this->respond(['message' => 'Success', 'data' => $data], 200);
        } else {
            return $this->respond(['message' => 'Not found', 'data' => $data], 404);
        }
    }

    /**
     * This Function is used to update Department
     *
     * @return array
     */
    public function updateDepartment()
    {

        $val = $this->validate([
            'department-name' => 'required',
            'department-head' => 'required',
        ]);
        if (!$val) {
            $res = ['message' => 'validation error', 'data' => [], 'validation' => [
                'departmentname_error' => $this->validator->getError('department-name'),
                'department_head_error' => $this->validator->getError('department-head'),
            ]];
            return $this->respond($res, 400);
        } else {
            $id = $this->request->getVar('rowid');
            $formData = [
                'title' => xss_clean($this->request->getVar('department-name')),
                'superwiser_id' => xss_clean($this->request->getVar('department-head')),
                'update_at' => $this->timestamp,
                'update_by' => $this->userid,
            ];
            $data = $this->DepartmentModel->update($id, $formData);
            if ($data) {
                return $this->respond(['message' => 'Successfully updated', 'data' => $data], 202);
            } else {
                return $this->respond(['message' => 'Not found', 'data' => false], 404);
            }
        }
    }

    /**
     * This function is used to save department data
     *
     * @return array
     */
    public function saveDepartment()
    {
        $val = $this->validate([
            'department-name' => 'required',
            'department-head' => 'required',
        ]);
        if (!$val) {
            $res = ['message' => 'validation error', 'data' => [], 'validation' => [
                'departmentname_error' => $this->validator->getError('department-name'),
                'department_head_error' => $this->validator->getError('department-head'),
            ]];
            return $this->respond($res, 400);
        } else {
            $formData = [
                'title' => xss_clean($this->request->getVar('department-name')),
                'superwiser_id' => xss_clean($this->request->getVar('department-head')),
                'status' => true,
                'created_at' => $this->timestamp,
                'created_by' => $this->userid,
            ];
            $data = $this->DepartmentModel->save($formData);
            if ($data) {
                return $this->respond(['message' => 'Successfully Added', 'data' => $data], 201);
            } else {
                return $this->respond(['message' => 'Not found', 'data' => $data], 500);
            }
        }
    }

    /**
     * This function is used to delete designation. 
     *
     * @return void
     */
    public function deleteDepartment()
    {
        $id = $this->request->getVar('id');
        $data = $this->DepartmentModel->update($id, ['status' => false, 'deleted_at' => $this->timestamp, 'deleted_by' => $this->userid]);
        if ($data) {
            return $this->respond(['message' => 'Successfully deleted', 'data' => true], 200);
        } else {
            return $this->respond(['message' => 'Internal server error! Please contact your service provider', 'data' => false], 500);
        }
    }
}
