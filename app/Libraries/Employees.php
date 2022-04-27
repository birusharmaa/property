<?php

namespace App\Libraries;

use CodeIgniter\HTTP\IncomingRequest;
use App\Models\User;
use App\Models\UserAccessPermissions;

// use CodeIgniter\HTTP\RequestInterface;

class Employees
{
    protected $request;
    protected $empId;
    protected $timestamp;
    protected $userId;
    protected $security;
    protected $empDoc;
    protected $empInfo;
    protected $empAddress;
    protected $empSalary;
    protected $reportingManager;

    function __construct()
    {
        $session = session();
        $this->request = \Config\Services::request();
        $this->timestamp  = date('Y-m-d H:i:s');
        $data = $session->get('loginInfo');
        $this->userId = $data['user_id'];
        helper('general');
        /**
         * This is used for model initilization
         */
        $models_array = $this->get_models_array();
        foreach ($models_array as $model) {
            $this->$model = model("App\Models\\" . $model);
        }
    }

    /**
     * This function is used to initilize all the requred model for properties
     *
     * @return array
     */
    private function get_models_array()
    {
        return [
            'DocumentModel',
            'EmployeeAddress',
            'EmployeesModel',
            'SalaryModel',
            'ReportingManagerModel'
        ];
    }

    /**
     * This function is used to save property information in to the data base.
     *
     * @param array $data
     * @return boolean
     */
    public function saveEmployee($data = [])
    {
        $formData = $this->request->getPost();
        if ($formData) {
            $this->prepareFormData($formData);
            if ($this->saveInfo($formData)) {                
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * This function is used to save property basic info.
     * And return inserted property id
     * 
     * @return void
     */
    protected function saveInfo($data = null)
    {
        try {
            $this->EmployeesModel->insert($this->empInfo);
            $this->empId = $this->EmployeesModel->insertID();

            if ($this->empId) {
                $this->saveAddress($this->empAddress);
                $this->saveSalary($this->empSalary);
                $this->saveDocs($this->empDocs);
                $this->saveReportingManager($this->reportingManager);

                //My code
               
                    $name         = $data['firstname']." ".$data['lastname'];
                    $email        = $data['email'];
                    $user_role_id = $data['role'];
                    $designation  = $data['designation'];
                    
                    $created_at = date('y-m-d H:i:s');
                    $emp_id    = $this->empId;

                    $password = generateRandomString(8);

                    $message  = "Hi <b>".$name.",</b> <br/><br/>";
                    $message .= "Welcome to our web family.<br/><br/>";
                    $message .= "This is login login credential.<br/><br/>";
                    $message .= "<b>Email:</b> ".$email."<br/>";
                    $message .= "<b>Password:</b> ".$password."<br/>";


                    //$res = static_email_send($email, 'Login credential', $message);
                    $enc_password = password_hash($password, PASSWORD_DEFAULT);
                    
                    $model = new User();
                    $data = [
                        'name'         => $name, 
                        'email'        => $email,
                        'password'     => $enc_password,
                        'user_role_id' => $user_role_id,
                        'created_at'   => $created_at,
                        'emp_id'       => $emp_id,
                        'pass'         => $password,
                    ];
                    
                    $abc = $model->save($data);
                    
                    $last_id = $model->getInsertID();
                    $session = session();
                    $this->user_access = new UserAccessPermissions();
                    if(!empty($last_id)){
                        $user_role = $this->user_access->where('user_role_id', $designation)->first();
                        if(empty($user_role['uap_user_id'])){
                            $new_data = [
                                "uap_user_id"        => $last_id,
                                "updated_at"         => date("y-m-d H:i:s"),
                                "uap_update_by"      => $session->loginInfo['user_id'],
                            ];
                            $this->user_access->update($user_role['uap_id'], $new_data);
                        }else{
                            $new_data = [
                                "uap_user_id"        => $last_id,
                                "user_role_id"       => $user_role['user_role_id'],
                                "uap_permission"     => $user_role['uap_permission'],
                                "uap_full_access"    => $user_role['uap_full_access'],
                                "uap_status"         => $user_role['uap_status'],
                                "uap_sub_sub_modules"=> $user_role['uap_sub_sub_modules'],
                                "created_at"         => date("y-m-d H:i:s"),
                                "uap_created_by"     => $session->loginInfo['user_id'],
                            ];
                            $this->user_access->save($new_data);
                        }
                        
                    }
                //End
                return true;
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }

    /**
     * This function is used to save property address.
     *
     * @param array $data
     * @return void
     */
    protected function saveDocs($data = [])
    {
        try {
            $data['emp_doc_emp_id'] = $this->empId;
            $this->DocumentModel->insert($data);
        } catch (\Exception $e) {
            die($e->getMessage());
            log_message('error', $e->getMessage());
        }
    }

    protected function saveSalary($data = [])
    {
        try {
            $data['emps_emp_id'] = $this->empId;
            $this->SalaryModel->insert($data);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }

    protected function saveAddress($data = [])
    {
        try {
            $data['empadd_emp_id'] = $this->empId;
            $this->EmployeeAddress->insert($data);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }

    protected function saveReportingManager($data = [])
    {
        try {
            $data['emr_emp_id'] = $this->empId;
            $this->ReportingManagerModel->insert($data);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }
    /**
     *This method is used to prepare data for proerty
     *
     * @param array $formData
     * @return void
     */

    private function prepareFormData($formData = [])
    {
        if ($formData) {
            /**
             * Form data for Employee info
             */
            $empId = !empty($formData['emp_id']) ?? "";
            $this->empInfo = [
                'emp_first_name' => xss_clean($formData['firstname']) ?? '',
                'emp_last_name' => xss_clean($formData['lastname']) ?? '',
                'father_name' => xss_clean($formData['father-name']) ?? '',
                'mother_name' => xss_clean($formData['mother-name']) ?? '',
                'married_staus' => xss_clean($formData['marital-status']) ?? '',
                'emp_phone' => xss_clean($formData['phone']) ?? '',
                'emp_email' => xss_clean($formData['email']) ?? '',
                'emp_date_of_hire' => xss_clean($formData['Joinning']) ?? '',
                'emp_date_of_joining' => xss_clean($formData['Joinning']) ?? '',
                'emp_date_of_birth' => xss_clean($formData['birthdate']) ?? '',
                'emp_gender' => xss_clean($formData['gender']) ?? '',
                'emp_experience' => xss_clean($formData['firstname']) ?? '',
                'worklocation' => xss_clean($formData['worklocation']) ?? '',
                'emp_designation' => xss_clean($formData['designation']) ?? '',
                'emp_department' => xss_clean($formData['department']) ?? '',
                'emp_status' => 1,
            ];

            $this->empAddress = [
                'empadd_address' => xss_clean($formData['address']) ?? '',
                'empadd_city' => xss_clean($formData['city']) ?? '',
                'alt_number' => xss_clean($formData['alternate']) ?? '',
                'empadd_state' => xss_clean($formData['state']) ?? '',
                'empadd_country' => xss_clean($formData['country']) ?? '',
                'empadd_zipcode' => xss_clean($formData['pincode']) ?? '',
                'empadd_address_type' => 'CA',
                'empadd_status' => true,
            ];
            $docs = xss_clean($formData['paths']) ?? '';

            $this->empDocs = [
                'emp_doc_title' => 'Employee Documents',
                'emp_doc_path' => json_encode($docs),
                'emp_doc_status' => true,
            ];

            $this->empSalary = [
                'emps_bank_name' => xss_clean($formData['bank-name']) ?? '',
                'emps_account_number' => xss_clean($formData['bankaccountnumber']) ?? '',
                'emps_ifsc_code' => xss_clean($formData['bankifsccode']) ?? '',
                'emps_epf_number' => xss_clean($formData['uan']) ?? '',
                'emps_salary' => xss_clean($formData['salary']) ?? '',
                'emps_status' => true
            ];

            $this->reportingManager = [
                'emr_manager_id' => xss_clean($formData['supervisor']) ?? '',
                'emr_status' => true,
            ];

            /**
             * Form data for property ownerInfo
             */
            if (!$empId) {

                $this->empInfo['emp_created_at'] = $this->timestamp;
                $this->empInfo['emp_created_by'] = $this->userId;

                $this->empAddress['empadd_created_at'] = $this->timestamp;
                $this->empAddress['empadd_created_by'] = $this->userId;

                $this->empSalary['emps_created_at'] = $this->timestamp;
                $this->empSalary['emps_created_by'] = $this->userId;

                $this->empDocs['emp_doc_created_at'] = $this->timestamp;
                $this->empDocs['emp_doc_created_by'] = $this->userId;

                $this->reportingManager['emr_created_at'] = $this->timestamp;
                $this->reportingManager['emr_created_by'] = $this->userId;
            } else {

                $this->empInfo['emp_update_at'] = $this->timestamp;
                $this->empInfo['emp_update_by'] = $this->userId;

                $this->empAddress['empadd_update_at'] = $this->timestamp;
                $this->empAddress['empadd_update_by'] = $this->userId;

                $this->empSalary['emps_update_at'] = $this->timestamp;
                $this->empSalary['emps_update_by'] = $this->userId;

                $this->empDocs['emp_doc_update_at'] = $this->timestamp;
                $this->empDocs['emp_doc_update_by'] = $this->userId;

                $this->reportingManager['emr_update_at'] = $this->timestamp;
                $this->reportingManager['emr_update_by'] = $this->userId;
            }
        }
    }

    /**
     * This method is used to upload images file into the data base.
     *
     * @param array $files
     * @return void
     */
    public function uploadEmployeeDoc($files = [])
    {
        $path = [];
        if ($files) {
            foreach ($files['files'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $path[] =  '/uploads/employees/' . $newName;
                    $img->move('./uploads/employees/', $newName);
                }
            }
        }
        return $path;
    }


    /**
     * Function is used to load list of all the employees
     */

    public function getEmployees()
    {
        return $this->EmployeesModel->getEmployeeInfo();
    }

    public function deleteEmployee($id = null)
    {
        return $this->EmployeesModel->update($id, ['emp_status' => false]);
    }

    public function getEmployee($id = null)
    {
        return $this->EmployeesModel->getEmployee($id);
    }

    public function updateEmployee($id = null)
    {
        $formData = $this->request->getPost();
        
        if ($formData) {
            
            $this->prepareFormData($formData);
            
            if ($this->updateEmpInfo()) {
                return true;
            } else {
                return false;
            }
        }

        // return $this->EmployeesModel->getEmployee($id);
    }

    public function updateEmpInfo()
    {
        try {

            $formData = $this->request->getPost();
            $empId = $this->request->getPost('emp_id');
            $empAddress_id = $this->request->getPost('empadd_id');
            $empSal_id = $this->request->getPost('emps_id');
            $empRelation_id = $this->request->getPost('emr_id');
            $empDoc_id = $this->request->getPost('emp_doc_id');
            $this->prepareFormData($formData);
            $res = $this->EmployeesModel->update($empId, $this->empInfo);

            if ($res) {
                // echo '<pre>';
                // print_r($this->empAddress);
                // echo '<pre>';
                // // print_r($this->empDoc);
                // // echo '<pre>';
                // print_r($this->empSalary);
                // echo '<pre>';
                // print_r($this->reportingManager);
                // die('asdf');
                $this->EmployeeAddress->update($empAddress_id, $this->empAddress);
                // $this->DocumentModel->update($empDoc_id, $this->empDoc);
                $this->SalaryModel->update($empSal_id, $this->empSalary);
                $this->ReportingManagerModel->update($empRelation_id, $this->reportingManager);
                return true;
            }
            return false;
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }
}
