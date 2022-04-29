<?php

namespace App\Controllers;

use App\Libraries\Properties;
use App\Libraries\Common;
use CodeIgniter\API\ResponseTrait;

class Property extends Security_Controller
{ 
    use ResponseTrait;
    protected $property;
    protected $Common;
    public $timestamp;
    public $userid;

    function __construct()
    {
        parent::__construct();
        $this->property = new Properties();
        $this->Common = new Common();
        $this->timestamp = date('Y-m-d H:s:i');
        $data = $this->session->get('loginInfo');
        $this->userid = $data['user_id'];
    }

    /**
     * This function is used to load list of property available into the database.
     *
     * @return void
     */
    public function index()
    {
        $pageData['propertyList'] =   $this->property->getPropertyInfo(10, 0);
        return $this->template->rander("Property/index", $pageData);
    }

    /**
     * This function is used to load property details view
     *
     * @return void
     */
    public function property_detail($propId = null)
    {
       
        if($this->session->has('action_type')){
            $action_type = $this->session->get('action_type');
        }
        
        // if(!check_action_type('r')){
        //     $this->session->setFlashdata("error-name", 'You are not authorized to perform this action.');
        //     return redirect()->route('properties');
        // }

        $pageData =   $this->property->getPropertyDetails(base64_decode($propId));
        return $this->template->rander('Property/property_detail', $pageData);
    }

    /**
     * This function is used to load edit property view
     *
     * @return void
     */
    public function edit_property_detail($propId = null)
    {
        $pageData['pageData'] =   $this->property->getPropertyDetails(base64_decode($propId));
        $pageData['Amenities'] =   $this->property->getAmenities();

        $pageData['PropertyCategories'] =   $this->property->getPropertyCategories();
        $pageData['PropertyTypes'] =   $this->property->getPropertyType();
        $pageData['states'] =   $this->Common->getState();
        $pageData['cities'] =   $this->Common->getCities();

        $pageData['PropertyFor'] =   $this->Common->getPropertyFor();


        return $this->template->rander('Property/edit_property_detail', $pageData);
    }

    /**
     * This function is used to load add prperty form view
     *
     * @return void
     */
    public function add_properties()
    {
        $pageData['PropertyTypes'] =   $this->property->getPropertyType();
        $pageData['Amenities'] =   $this->property->getAmenities();
        $pageData['possessionyear'] =   $this->PossessionByModel->where(['status' => true, 'p_for'=>"y"])->findAll();
        $pageData['possessionmonth'] =   $this->PossessionByModel->where(['status' => true, 'p_for'=>"m"])->findAll();

       
        $pageData['lookingfor'] =   $this->Common->getPropertyFor();
        $pageData['propertyType'] =   $this->property->getPropertyCategories();
        $pageData['SubPropertyType'] =   $this->property->getSubPropertyCategories();
        $pageData['question'] =   $this->property->getQuestionList();
        $pageData['question7'] =   $this->property->getLocatedInside();
        $pageData['locatedinsde'] =   $this->LocatedInsidesModel->where(['status' => true])->findAll();
        $pageData['zonetypemodel'] =   $this->ZoneTypeModel->where(['status' => true])->findAll();
        $pageData['units'] =   $this->UnitsModel->where(['status' => true])->findAll();
        $pageData['keyMaster'] =   $this->property->getMasterQuestions();
        $pageData['keyMaster2'] =   $this->property->getMasterQuestionsL2();
        $pageData['locationAdvantage'] =   $this->property->getLocationAdvantage();
        $pageData['citieslist'] = $this->CityModel->findAll();
        $pageData['appartmentslist'] = $this->ApartmentModel->where(['status' => 1])->findAll();
        $pageData['towerlist'] = $this->TowerModel->where(['status' => 1])->findAll();       
        $pageData['localitieslist'] = $this->LocalityModel->where(['status' => 1])->findAll();
        $pageData['sublocalitieslist'] = $this->SubLocalityModel->where(['status' => 1])->findAll();
        $pageData['projectslist'] = $this->ProjectModel->where(['status' => 1])->findAll();
        return $this->template->rander('Property/add_properties', $pageData);
    }

    /**
     * This function is used to load list of duplicate property view
     *
     * @return void
     */
    public function duplicate_properties()
    {
        return $this->template->rander('Property/duplicate_properties');
    }

    /**
     * This method is used to load list of propery history view
     *
     * @return void
     */
    public function property_history()
    {
        return $this->template->rander('Property/property_history');
    }


    /**
     * This method is used to load allot property list view
     *
     * @return void
     */
    public function allot_property()
    {
        $data['users'] =  $this->User->getUsersNotAdmin();
        $data['properties'] =  $this->PropertyBasicDetailsModel->select('id,property_title')->getWhere(['isDeleted' => false, 'status' => true])->getResult();
        $data['PropertyFor'] =  $this->Propertiesavailablefor->select('id,title')->getWhere(['status' => 1])->getResult();
        $data['assignedproperty'] =  $this->property->getAssignPropertyList(10, 0);


        return $this->template->rander('Property/allot_property', $data);
    }


    /**
     * Function is used to save property into the database
     *
     * @return void
     */
    public function save()
    {
        // if(!check_action_type('c')){
        //     $this->session->setFlashdata("error-name", 'You are not authorized to perform this action.');
        //     return redirect()->route('properties');
        // }

        $res = $this->property->saveProperty();
        if ($res) {
            return $this->respondCreated(['message' => 'Property successfully Added.'], 201);
        } else {
            return $this->fail(['message' => 'Internal server error, Please contact your service provider'], 400);
        }
    }

    /**
     * This function is used to upload property images.
     *
     * @return void
     */
    public function uploadImages()
    {
        $files = $this->request->getFiles();
        $filePath =  $this->property->uploadPropertyImages($files);
        if ($filePath) {
            return $this->respondCreated(['message' => 'Image successfully uploaded.', 'path' => $filePath], 201);
        } else {
            return $this->fail(['message' => 'Internal server error, Please contact your service provider'], 400);
        }
    }


    /**
     * This method is used to delete the file from server
     *
     * @return void
     */
    public function deleteImage()
    {   
        // if(!check_action_type('d')){
        //     $this->session->setFlashdata("error-name", 'You are not authorized to perform this action.');
        //     return redirect()->route('properties');
        // }

        try {
            $path =  $this->request->getVar('path');
            $status = unlink("." . $path);
            if ($status) {
                return $this->respondCreated(['message' => 'File deleted successfully.', 'status' => true], 200);
            } else {
                return $this->fail(['message' => 'File not found', 'status' => false], 404);
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }




    /**
     * This function is used to get city list by state id
     *
     * @param INT $id
     * @return void
     */
    public function getCities($id)
    {
        return  $this->respond($this->Common->getCityById($id), 200);
    }

    /**
     * This Function is used to update pulished status
     *
     * @return boolean
     */
    public function isPublished(){
        $status = $this->request->getVar('status');
        $propId = $this->request->getVar('propId');
        if ($this->property->updatePublishedStatus($propId, $status)) {
            $msg = ($status === 0) ? 'This Property successfully published' : 'This Property unpublished';
            return $this->respondCreated(['message' =>  $msg], 201);
        } else {
            return $this->fail(['message' => 'Internal server error, Please contact your service provider'], 400);
        }
    }

    /**
     * This function is used to delete property
     *
     * @return void
     */
    public function delete()
    {
        // if(!check_action_type('d')){
        //     $this->session->setFlashdata("error-name", 'You are not authorized to perform this action.');
        //     return redirect()->route('properties');
        // }
        if($this->session->delete_action_type!="Yes"){
            $this->session->setFlashdata("error-name", 'You are not authorized to perform this action.');
            exit;
        }
        
        $propId = $this->request->getVar('propId');
        if ($this->property->delete($propId)) {
            return $this->respondCreated(['message' =>  'Property successfully deleted'], 200);
        } else {
            return $this->fail(['message' => 'Internal server error, Please contact your service provider'], 400);
        }
    }

    /**
     * This function is used to assign property to user
     *
     * @return mixed
     */
    public function assignProperty(){

        // if(!check_action_type('c')){
        //     $this->session->setFlashdata("error-name", 'You are not authorized to perform this action.');
        //     return redirect()->route('properties');
        // }

        $res = $this->property->assignProperty();
        if ($res['isAssigned']) {
            return $this->respondCreated(['data' => $res, 'message' => 'Property successfully assigned'], 200);
        } else if (!$res['isAvailbale']) {
            return $this->respond(['data' => $res, 'message' => 'Property already assigned to this user'], 409);
        } else {
            return $this->fail(['data' => $res, 'message' => 'Internal server error, Please contact your service provider'], 500);
        }
    }

    /**
     * This function is used to assign property to user
     *
     * @return mixed
     */
    public function getAssignPropertyList()
    {
        $limit = 10;
        $offset = 1;
        $res = $this->property->getAssignPropertyList($limit, $offset);
    }

    public function getAssignedAllList()
    {
        
        $res = $this->PropertyUserRelationModel->getAssignedAllList();
        
        if ($res) {
            return $this->respond(['data' => $res], 200);
        } else {
            return $this->fail(['data' => []], 404);
        }
    }

    /**
     * This function is used to get assigned property by id
     *
     * @return mixed
     */
    public function getAssignedListByid($id = null)
    {
        $data = $this->PropertyUserRelationModel->getAssignedbyId($id);
     
        if ($data) {
            return $this->respond(['data' => $data], 200);
        } else {
            return $this->fail(['data' => []], 404);
        }
    }

    /**
     * This function is used to get assigned property by id
     *
     * @return mixed
     */
    public function editProperty()
    {
        // if(!check_action_type('u')){
        //     $this->session->setFlashdata("error-name", 'You are not authorized to perform this action.');
        //     return redirect()->route('properties');
        // }

        $formData = [
            'pur_prop_id' => xss_clean($this->request->getVar('property')),
            'pur_user_id' => xss_clean($this->request->getVar('user')),
            'pur_allot_status_id' => xss_clean($this->request->getVar('propertyFor')),
            'pur_update_at' => $this->timestamp,
            'pur_update_by' => $this->userid
        ];
        $id = xss_clean($this->request->getVar('rowid'));
        $res = $this->PropertyUserRelationModel->where($formData)->find();
        if (!$res) {
            $data = $this->PropertyUserRelationModel->update($id, $formData);
            if ($data)
                return $this->respond(['message' => 'Successfully updated', 'data' => $data], 200);
            else
                return $this->respond(['message' => 'Internal server error, during update! Please contact your service provider', 'data' => []], 500);
        } else if ($res) {
            return $this->respond(['message' => 'Already assignd', 'data' => $formData], 409);
        } else {
            return $this->respond(['message' => 'Internal server error! Please contact your service provider', 'data' => []], 500);
        }
    }

    /**
     * This function is used to get assigned property by id
     *
     * @return mixed
     */
    public function deleteProperty()
    {
        $id = $this->request->getVar('id');
        // if(!check_action_type('d')){
        //     //$this->session->setFlashdata("error-name", 'You are not authorized to perform this action.');
        //     return $this->respond(['message' => 'You are not authorized to perform this action.', 'data' => true], 400);
        //     return redirect()->route('properties');
        //}
        $data = $this->PropertyUserRelationModel->update($id, ['pur_status' => false]);
        if ($data) {
            return $this->respond(['message' => 'Successfully deleted', 'data' => true], 200);
        } else {
            return $this->respond(['message' => 'Internal server error! Please contact your service provider', 'data' => false], 500);
        }
    }
}
