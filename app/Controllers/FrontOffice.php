<?php

namespace App\Controllers;

use phpDocumentor\Reflection\Types\This;

class FrontOffice extends Security_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $pageData['employees'] = $this->EmployeesModel->select('id,emp_id,concat(emp_first_name," ",emp_last_name) as name, emp_status')->where(['emp_status' => true])->findAll();
        $pageData['visitorList'] = $this->VisitorBookModel->getListOfVisitors();

        $this->template->rander('FrontOffice/index', $pageData);
    }

    public function getVisitorList()
    {
        $visitorList = $this->VisitorBookModel->getListOfVisitors();
        return $this->respond(['message' => 'success', 'data' =>  $visitorList, 'status' => true,], 200);
    }

    public function insert()
    {

        if (!$this->validate([
            'visitor-name' => 'required',
            'visitor-phone' => 'required|min_length[10]|max_length[10]',
            'meeting-with' => 'required',
            'visitor-meeting-purpose' => 'required|max_length[255]',
        ])) {

            $errors = $this->validator->getErrors();
            return $this->respond(['message' => 'errorslist', 'validation' => $errors, 'status' => false,], 400);
        } else {

            $formData = [
                'name' => xss_clean($this->request->getVar('visitor-name')) ?? "",
                'phone' => xss_clean($this->request->getVar('visitor-phone')) ?? "",
                'email' => xss_clean($this->request->getVar('visitor-email')) ?? "",
                'meeting_with' => xss_clean($this->request->getVar('meeting-with')) ?? 1,
                'purpose' => xss_clean($this->request->getVar('visitor-meeting-purpose')) ?? "",
                'visitor_id_title' => xss_clean($this->request->getVar('visitor-doc-name')) ?? "",
                'visitor_id_no' => xss_clean($this->request->getVar('visitor-doc-id-number')) ?? "",
                'in_time' => $this->timestamp,
                'created_by' => $this->userid,
            ];
            $res = $this->VisitorBookModel->insert($formData);
            if ($res) {
                return $this->respond(['message' => 'Successfully inserted', 'status' => true], 200);
            } else {
                return $this->respond(['message' => 'Not found', 'status' => false], 404);
            }
        }
    }

    public function show($id = null)
    {
        $fromData = $this->request->getVar();

        $res = $this->VisitorBookModel->where(['id' => $id])->first();

        if ($res) {
            return $this->respond(['message' => 'Successfully', 'status' => true, 'data' => $res], 200);
        } else {
            return $this->respond(['message' => 'Not found', 'status' => false], 404);
        }
    }

    public function update()
    {
        if (!$this->validate([
            'visitor-name' => 'required',
            'visitor-phone' => 'required|min_length[10]|max_length[10]',
            'visitor-email' => 'required',
            'meeting-with' => 'required',
            'visitor-meeting-purpose' => 'required|max_length[255]',
        ])) {

            $errors = $this->validator->getErrors();
            return $this->respond(['message' => 'errorslist', 'validation' => $errors, 'status' => false,], 400);
        } else {
            $id = $this->request->getVar('rowid');
            $formData = [
                'name' => xss_clean($this->request->getVar('visitor-name')) ?? "",
                'phone' => xss_clean($this->request->getVar('visitor-phone')) ?? "",
                'email' => xss_clean($this->request->getVar('visitor-email')) ?? "",
                'meeting_with' => xss_clean($this->request->getVar('meeting-with')) ?? 1,
                'purpose' => xss_clean($this->request->getVar('visitor-meeting-purpose')) ?? "",
                'visitor_id_title' => xss_clean($this->request->getVar('visitor-doc-name')) ?? "",
                'visitor_id_no' => xss_clean($this->request->getVar('visitor-doc-id-number')) ?? "",
                'updated_by' => $this->userid,
                'updated_at' => $this->timestamp
            ];
            $res = $this->VisitorBookModel->update($id, $formData);
            if ($res) {
                return $this->respond(['message' => 'Successfully updated', 'status' => true], 200);
            } else {
                return $this->respond(['message' => 'Not found', 'status' => false], 404);
            }
        }
    }

    public function delete($id = null)
    {
        $formData = ['status' => false, 'deleted_by' => $this->userid, 'deleted_at' => $this->timestamp];
        $res = $this->VisitorBookModel->update($id, $formData);
        if ($res) {
            return $this->respond(['message' => 'Successfully deleted', 'status' => true], 200);
        } else {
            return $this->respond(['message' => 'Not found', 'status' => false], 404);
        }
    }

    public function updateOutTime($id = null)
    {
        $formData = ['updated_at' => $this->timestamp, 'update_by' => $this->userid, 'out_time' => $this->timestamp];
        $res = $this->VisitorBookModel->update($id, $formData);
        if ($res) {
            return $this->respond(['message' => 'Successfully updated', 'status' => true], 200);
        } else {
            return $this->respond(['message' => 'Not found', 'status' => false], 404);
        }
    }
}
