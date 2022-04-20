<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\SubCategoryModel;
use App\Models\LeadsModal;
use App\Models\User;
use App\Models\StatesModel;
use App\Models\CitiesModel;
use App\Libraries\Properties;

class Leads extends Security_Controller
{

    public $session    = "";
    public $validation = "";
    protected $category = "";
    protected $sub_category = "";
    protected $leads = "";
    protected $user  = "";
    protected $property;
    public function __construct()
    {
        parent::__construct();
        $this->request = service('request');
        $this->category       = new CategoryModel();
        $this->sub_category   = new SubCategoryModel();
        $this->leads   = new LeadsModal();
        $this->session    = session();
        $this->validation = \Config\Services::validation();
        $this->property = new Properties();
    }

    public function index()
    {
        $this->category       = new CategoryModel();
        $data['categories'] = $this->category->findAll();
        return $this->template->rander('Leads/index', $data);
    }

    public function lead_details()
    {
        return $this->template->rander('Leads/lead_details');
    }

    public function add_leads()
    {
        $data['category'] = $this->category->findAll();
        $this->Users = new User();

        $this->Users->select(['id', 'name']);
        $pageData['user_lists'] = $this->Users->findAll();

        $this->StatesModel->select(['id', 'name']);
        $pageData['states'] = $this->StatesModel->orderBy('name', 'ASC')->findAll();

        $pageData['category'] = $this->category->findAll();
        $pageData['propertyType'] =   $this->property->getPropertyCategories();

        $pageData['localitieslist'] = $this->LocalityModel->where(['status' => 1])->findAll();
        return $this->template->rander('Leads/add_leads', $pageData);
    }

    public function leads_status()
    {
        return $this->template->rander('Leads/leads_status');
    }

    public function leads_category()
    {
        return $this->template->rander('Leads/leads_category');
    }

    public function leads_sub_category()
    {
        $data['category'] = $this->category->findAll();
        return $this->template->rander('Leads/leads_sub_category', $data);
    }

    public function leads_duplicate()
    {
        return $this->template->rander('Leads/leads_duplicate');
    }

    public function assign_leads()
    {
        return $this->template->rander('Leads/assign_leads');
    }

    public function agent_lead_commission()
    {
        return $this->template->rander('Leads/agent_lead_commission');
    }

    public function allCategory($value = '')
    {

        $data = $this->category->findAll();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->respond('No record found.');
        }
    }

    public function saveCategory()
    {
        $created_by   = '';
        if ($this->session->has('loginInfo')) {
            $created_by = $this->session->get('loginInfo')['user_id'];
        }
        $this->validation->setRules([
            'category'     => ['label' => 'category', 'rules' => 'required|is_unique[lead_categories.title]'],
        ]);
        if ($this->validation->withRequest($this->request)->run()) {
            $data = array(
                "title"    => $this->request->getPost('category'),
            );
            if ($this->category->insert($data)) {
                $msg = [
                    'success' => true,
                    'message' => "Category saved successfully",
                ];
                return $this->respond($msg, 201);
            } else {
                return $this->fail($data, false);
            }
        } else {
            return $this->fail($this->validation->getErrors(), 400);
        }
    }

    public function saveSubCategory()
    {
        $created_by   = '';
        if ($this->session->has('loginInfo')) {
            $created_by = $this->session->get('loginInfo')['user_id'];
        }

        $title = $this->request->getPost('subCategory');
        $cat_id = $this->request->getPost('category');

        $this->validation->setRules([
            'category'     => ['label' => 'category', 'rules' => 'trim|required'],
            'subCategory'  => ['label' => 'sub category', 'rules' => 'trim|required'],
        ]);

        if ($this->validation->withRequest($this->request)->run()) {
            $data = array(
                "title"    => $this->request->getPost('subCategory'),
                'category_id' => $this->request->getPost('category'),
            );
            if ($this->sub_category->insert($data)) {
                $msg = [
                    'success' => true,
                    'message' => "Sub category saved successfully",
                ];
                return $this->respond($msg, 201);
            } else {
                return $this->fail($data, false);
            }
        } else {
            return $this->fail($this->validation->getErrors(), 400);
        }
    }

    public function changeStatus()
    {
        $id = $this->request->getPost('id');
        $this->category->select('status');
        $data = $this->category->find($id);

        if ($data['status'] == '1') {
            $status = 0;
        } else {
            $status = 1;
        }

        $data = array('status' => $status);
        if ($this->category->update($id, $data)) {
            $msg = [
                'success' => true,
                'message' => "Category status updated successfully",
            ];
            return $this->respond($msg, 201);
        } else {
            $msg = [
                'success' => false,
                'message' => "Category status update unsuccessfull",
            ];
            return $this->fail($msg, false);
        }
    }


    public function allSubCategory($value = '')
    {
        $this->sub_category->select('lead_categories.title AS cat_name');
        $this->sub_category->select('lead_sub_categories.*');
        $this->sub_category->join('lead_categories', 'lead_sub_categories.category_id=lead_categories.id', 'LEFT');
        $data = $this->sub_category->findAll();

        if ($data) {
            return $this->respond($data);
        } else {
            return $this->respond('No record found.');
        }
    }

    public function changeSubStatus()
    {
        $id = $this->request->getPost('id');
        $this->sub_category->select('status');
        $data = $this->sub_category->find($id);

        if ($data['status'] == '1') {
            $status = 0;
        } else {
            $status = 1;
        }

        $data = array('status' => $status);
        if ($this->sub_category->update($id, $data)) {
            $msg = [
                'success' => true,
                'message' => "Sub category status updated successfully",
            ];
            return $this->respond($msg, 201);
        } else {
            $msg = [
                'success' => false,
                'message' => "Sub category status update unsuccessfull",
            ];
            return $this->fail($msg, false);
        }
    }

    function addLeads()
    {
        $created_by   = '';
        if ($this->session->has('loginInfo')) {
            $created_by = $this->session->get('loginInfo')['user_id'];
        }
       
        if (! $this->validate([
            'firstName' => 'required',
            'number' => 'required|max_length[10]',
            'email'    => 'required|valid_email',
            'noOfBed'    => 'required',
            'noOfBathroom'    => 'required',
            'priceRange'    => 'required',
            'square_feet'    => 'required',
            'facing'    => 'required',
            'lookingFor'    => 'required',
            'propertyType'    => 'required',
            'propertySubType'    => 'required',
            'state'    => 'required',
            'city'    => 'required',
            'location'    => 'required',
            'floor'    => 'required'            
        ])) {
            
            return $this->fail($this->validation->getErrors(), 400);
        }else{
            $lead_data = array(
                'category'        => $this->request->getPost('propertyType'),
                'sub_category'    => $this->request->getPost('propertySubType'),
                'first_name'      => $this->request->getPost('firstName'),
                'last_name'       => $this->request->getPost('lastName'),
                'email'           => $this->request->getPost('email'),
                'phone'           => $this->request->getPost('number'),
                'looking_for'     => $this->request->getPost('lookingFor'),
                'no_of_beds'      => $this->request->getPost('noOfBed'),
                'no_of_bathroom'  => $this->request->getPost('noOfBathroom'),
                'price_range'     => $this->request->getPost('priceRange'),
                'property_type'   => $this->request->getPost('propertyType'),
                'subproperty_type' => $this->request->getPost('propertySubType'),
                'city'            => $this->request->getPost('city'),
                'state'           => $this->request->getPost('state'),
                'property_in_location' => $this->request->getPost('location'),
                'square_feet'     => $this->request->getPost('square_feet'),
                'facing'          => $this->request->getPost('facing'),
                'floor'           => $this->request->getPost('floor'),
                'posted_by'       => $this->request->getPost('postedBy'),                
                'owner_id'        => $created_by,
                'created_by'      => $created_by,
            );

            if ($this->leads->insert($lead_data)) {
                $msg = [
                    'success' => true,
                    'message' => "Leads saved successfully",
                    'path' => base_url('all-leads'),
                ];
                return $this->respond($msg, 201);
            } else {
                $data = [
                    'success' => false,
                    'message' => "Their is some problem. Please try again.",
                ];
                return $this->fail($data, false);
            }           
        }        
    }

    function addLeads_old()
    {
        // $created_by   = '';
        // if ($this->session->has('loginInfo')) {
        //     $created_by = $this->session->get('loginInfo')['user_id'];
        // }

        // if ($this->request->getPost()) {
        //     $first_name      = $this->request->getPost('firstName');
        //     $last_name       = $this->request->getPost('lastName');
        //     $email           = $this->request->getPost('email');
        //     $phone           = $this->request->getPost('number');
        //     $looking_for     = $this->request->getPost('lookingFor');
        //     $no_of_beds      = $this->request->getPost('noOfBed');
        //     $no_of_bathroom  = $this->request->getPost('noOfBathroom');
        //     $price_range     = $this->request->getPost('priceRange');
        //     $property_type   = $this->request->getPost('propertyType');
        //     $city            = $this->request->getPost('city');
        //     $state           = $this->request->getPost('state');
        //     $square_feet     = $this->request->getPost('squareFeet');
        //     $property_in_location = $this->request->getPost('location');
        //     $facing          = $this->request->getPost('facing');
        //     $floor           = $this->request->getPost('floor');
        //     $propertySubType      = $this->request->getPost('propertySubType');
        //     $posted_by       = $this->request->getPost('postedBy');
        //     $owner_id        = $created_by;
        //     $created_by      = $created_by;

        //     $i = 0;
        //     $final_data = [];
        //     foreach ($first_name as $key => $value) {
        //         $data = [
        //             'category'        => $property_type[$i],
        //             'sub_category'    => $propertySubType[$i],
        //             'first_name'      => $first_name[$i],
        //             'last_name'       => $last_name[$i],
        //             'email'           => $email[$i],
        //             'phone'           => $phone[$i],
        //             'looking_for'     => $looking_for[$i],
        //             'no_of_beds'      => $no_of_beds[$i],
        //             'no_of_bathroom'  => $no_of_bathroom[$i],
        //             'price_range'     => $price_range[$i],
        //             'property_type'   => $property_type[$i],
        //             'subproperty_type' => $propertySubType[$i],
        //             'city'            => $city[$i],
        //             'state'           => $state[$i],
        //             'property_in_location' => $property_in_location[$i],
        //             'square_feet'     => $square_feet[$i],
        //             'facing'          => $facing[$i],
        //             'floor'           => $floor[$i],
        //             'posted_by'       => $posted_by[$i],
        //             'sub_category'    => $propertySubType[$i],
        //             'owner_id'        => $created_by,
        //             'created_by'      => $created_by,
        //         ];

        //         if (!empty($first_name[$i]) && !empty($email[$i]) && !empty($phone[$i])) {
        //             $final_data[] = $data;
        //         }
        //         $i++;
        //     }

        //     if (count($final_data) > 0) {

        //         if ($this->leads->insertBatch($final_data)) {
        //             $msg = [
        //                 'success' => true,
        //                 'message' => "Leads saved successfully",
        //             ];
        //             return $this->respond($msg, 201);
        //         } else {
        //             return $this->fail($data, false);
        //         }
        //     } else {
        //         $msg = [
        //             'success' => false,
        //             'message' => "Please enter atleast one proper row.",
        //         ];
        //         return $this->fail($msg, false);
        //     }
        // } else {
        //     //$data['validation'] = $this->validation->getErrors();
        //     return $this->fail($this->validation->getErrors(), 400);
        // }
    }


    function newLeads()
    {
        // if($this->session->has('loginInfo')){
        //     $created_by = $this->session->get('loginInfo')['user_id'];
        // }


        $this->validation->setRules([
            'firstName[]'     => ['label' => 'firstName', 'rules' => 'required'],
        ]);

        if ($this->validation->withRequest($this->request)->run()) {
            // $data = array(
            //     "title"    => $this->request->getPost('subCategory'),
            //     'category_id' => $this->request->getPost('category'),
            // );
            // if($this->sub_category->insert($data)){
            //     $msg = [
            //         'success' => true,
            //         'message' => "Sub category saved successfully",
            //     ];
            //     return $this->respond($msg, 201);
            // }else{
            //     return $this->fail($data, false);
            // } 
        } else {
            $data['validation'] = $this->validation->getErrors();
            return $this->template->rander('Leads/add_leads', $data);
            //return view('Leads/add_leads', $);
        }
    }

    function updatecategory()
    {

        $this->validation->setRules([
            'catName' => ['label' => 'category', 'rules' => 'required|is_unique[lead_categories.title]'],
            'id'       => ['label' => 'category id', 'rules' => 'required|is_unique[lead_categories.title]'],
        ]);
        if ($this->validation->withRequest($this->request)->run()) {
            $data = array(
                "title"    => $this->request->getPost('catName'),
            );
            $id = $this->request->getPost('id');
            if ($this->category->update($id, $data)) {
                $msg = [
                    'success' => true,
                    'message' => "Category updated successfully",
                ];
                return $this->respond($msg, 201);
            } else {
                return $this->fail($data, false);
            }
        } else {
            return $this->fail($this->validation->getErrors(), 400);
        }
    }

    function deletecategory()
    {
        $this->validation->setRules([
            'id'       => ['label' => 'category id', 'rules' => 'required|is_unique[lead_categories.title]'],
        ]);
        if ($this->validation->withRequest($this->request)->run()) {
            $id = $this->request->getPost('id');
            if ($this->category->delete($id)) {
                $msg = [
                    'success' => true,
                    'message' => "Category deleted successfully.",
                ];
                return $this->respond($msg, 201);
            } else {
                return $this->fail([], false);
            }
        } else {
            return $this->fail($this->validation->getErrors(), 400);
        }
    }

    function updatesubcategory()
    {
        $this->validation->setRules([
            'catName' => ['label' => 'category', 'rules' => 'required'],
            'id'      => ['label' => 'sub category id', 'rules' => 'required'],
            'subName' => ['label' => 'sub category id', 'rules' => 'required'],
        ]);

        if ($this->validation->withRequest($this->request)->run()) {
            $data = array(
                "title"    => $this->request->getPost('subName'),
                "category_id"    => $this->request->getPost('catName'),
            );
            $id = $this->request->getPost('id');
            if ($this->sub_category->update($id, $data)) {
                $msg = [
                    'success' => true,
                    'message' => "Sub category updated successfully",
                ];
                return $this->respond($msg, 201);
            } else {
                return $this->fail($data, false);
            }
        } else {
            return $this->fail($this->validation->getErrors(), 400);
        }
    }

    function deletesubcategory()
    {
        $this->validation->setRules([
            'id'       => ['label' => 'sub category id', 'rules' => 'required'],
        ]);
        if ($this->validation->withRequest($this->request)->run()) {
            $id = $this->request->getPost('id');
            if ($this->sub_category->delete($id)) {
                $msg = [
                    'success' => true,
                    'message' => "Sub category deleted successfully.",
                ];
                return $this->respond($msg, 201);
            } else {
                return $this->fail([], false);
            }
        } else {
            return $this->fail($this->validation->getErrors(), 400);
        }
    }


    function all_leads()
    {
        $this->leads->select('users.name AS user_name');
        $this->leads->select('leads.*');
        $this->leads->join('users', 'leads.created_by=users.id', 'LEFT');
        $data = $this->leads->findAll();
        if ($data) {
            return $this->respond($data);
        } else {
            return $this->respond('No record found.');
        }
    }

    function show_lead($id = null)
    {
        $result['lead_details'] = $this->leads->getLeadsById($id);
        if ($result['lead_details']) {
            return $this->template->rander('Leads/lead_details', $result);
        } else {
            return $this->respond('No record found.');
        }
    }

    function deletelead($id = null)
    {

        $this->validation->setRules([
            'id'       => ['label' => 'lead id', 'rules' => 'required'],
        ]);
        if ($this->validation->withRequest($this->request)->run()) {
            $id = $this->request->getVar('id');
            $data = $this->leads->find($id);
            if ($data) {
                if ($this->leads->delete($id)) {
                    $msg = [
                        'success' => true,
                        'message' => "Lead deleted successfully.",
                    ];
                    return $this->respond($msg, 201);
                } else {
                    return $this->fail($data, false);
                }
            } else {
                return $this->fail($data, false);
            }
        } else {
            return $this->fail($this->validation->getErrors(), 400);
        }
    }


    function getsubcategory()
    {

        $cat_id = $this->request->getVar('catId');
        $data = $this->sub_category->where("category_id", $cat_id)->findAll();
        if ($data) {
            $msg = [
                'success' => true,
                'message' => "Category updated successfully",
            ];
            return $this->respond($data, 200);
        } else {
            return $this->fail($data, false);
        }
    }

    public function import()
    {

        $this->validation->setRules([
            'categoryImport' => ['label' => 'category ', 'rules' => 'required'],
            'file_csv'   => ['label' => 'csv', 'rules' => 'uploaded[file_csv]|ext_in[file_csv,csv]']
        ]);

        if ($this->validation->withRequest($this->request)->run()) {
            $session        = session();
            $emp            = $session->get('loginInfo');
            $file_name      = rand() . $_FILES['file_csv']['name'];
            $filewithpath   = base_url() . "/public/temp/" . $file_name;
            $file           = $this->request->getFile('file_csv');
            $file->move('./temp', $file_name);

            $data           = $this->request->getPost();
            $catid          = $this->request->getPost('categoryImport');
            $sub_cat_id    = $this->request->getPost('subcategory1');
            $handle1        = fopen('./temp/' . $file_name, "r");

            $num            = 0;
            $countLead      = 0;
            $header         = fgetcsv($handle1, 1024, ",");

            $header         = implode(",", $header);
            $header         = '(' . $header . ')';
            $leads          = [];

            try {
                while (($row = fgetcsv($handle1, 1024, ",")) != FALSE) {
                    ++$num;
                    if (count($row) > 0) {
                        $lead = array(
                            "first_name" => $row[0],
                            "last_name"  => $row[1],
                            "email"      => $row[2],
                            "phone"      => $row[3],
                            "category"   => $catid,
                            "sub_category" => $sub_cat_id,
                            "created_at" => date('Y-m-d h:i:s')
                        );
                        array_push($leads, $lead);
                    }
                }

                if ($this->leads->insertBatch($leads)) {
                    $response = [
                        'status'   => 200,
                        'error'    => null,
                        'messages' => [
                            'success' =>  $num . ' Data Import Successfully.'
                        ]
                    ];
                    return $this->respond($response);
                } else {
                    return $this->fail('Data import unsuccessfull.', 400);
                }
            } catch (\Exception $e) {

                return $this->fail("Please select valid format file.", 400);
            }
        } else {
            return $this->fail($this->validation->getErrors(), 400);
        }
    }


    function allcities()
    {
        $state_id = $this->request->getVar('state_id');
        $this->city = new CitiesModel();
        $this->city->select(['id', 'city']);
        $data = $this->city->where("state_id", $state_id)->findAll();
        if ($data) {
            $msg = [
                'success' => true,
            ];
            return $this->respond($data, 200);
        } else {
            return $this->fail($data, false);
        }
    }


    public function getAllSubproperty()
    {
        $id = $this->request->getVar('proertyTypeId');
        $res = $this->SubPropertyTypes->where(['cat_id' => $id])->findAll();
        if ($res) {
            return $this->respond($res, 200);
        } else {
            return $this->respond($res, 404);
        }
    }
}
