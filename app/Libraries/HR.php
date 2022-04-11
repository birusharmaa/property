<?php

namespace App\Libraries;

use CodeIgniter\HTTP\IncomingRequest;
// use CodeIgniter\HTTP\RequestInterface;

class HR
{
    protected $request;
    protected $propertyInfo;
    protected $propertyAddress;
    protected $propertyArea;
    protected $propertyOwnerInfo;
    protected $propertyAmenities;
    protected $proId;
    protected $timestamp;
    protected $userId;
    protected $security;

    function __construct()
    {
        $this->request = \Config\Services::request();
        $this->security = \Config\Services::security();
        $this->timestamp  = date('Y-m-d H:i:s');
        $this->userId  = 1;


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
            'PropertyInfoModel',
            'PropertyOwnerInfoModel',
            'PropertyAddressModel',
            'PropertyAmenitiesModel',
            'PropertyAreaModel',
            'PropertyUserRelationModel',
            'PropertyCategoryModel',
            'PropertyTypeModel',
            'AmenitiesModel',

        ];
    }

    /**
     * This function is used to save property information in to the data base.
     *
     * @param array $data
     * @return boolean
     */
    public function saveProperty($data = [])
    {
        $formData = $this->request->getPost();
        if ($formData) {
            $this->prepareFormData($formData);

            if ($this->saveInfo()) {
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
    protected function saveInfo()
    {
        try {
            $this->PropertyInfoModel->insert($this->propertyInfo);
            $this->proId = $this->PropertyInfoModel->insertID();
            if ($this->proId) {
                $this->saveAddress($this->propertyAddress);
                $this->saveArea($this->propertyArea);
                $this->saveOwnerInfo($this->propertyOwnerInfo);
                $this->saveAmenities($this->propertyAmenities);

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
    protected function saveAddress($data = [])
    {
        try {

            $data['ptadd_property_id'] = $this->proId;
            $this->PropertyAddressModel->insert($data);
        } catch (\Exception $e) {
            die($e->getMessage());
            log_message('error', $e->getMessage());
        }
    }

    protected function saveArea($data = [])
    {
        try {
            $data['ptar_prop_id'] = $this->proId;
            $this->PropertyAreaModel->insert($data);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }
    /**
     * This function is use to save porperty owner information
     *
     * @param array $data
     * @return void
     */
    protected function saveOwnerInfo(array $data = [])
    {
        try {
            $data['poi_prop_id'] = $this->proId;
            $this->PropertyOwnerInfoModel->insert($data);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }

    /**
     * This function is used to save porperty amenities in the data base.
     *
     * @param int $propertyId
     * @param array $data
     * @return void
     */
    protected function saveAmenities($data = [])
    {
        try {
            $data['pa_prop_id'] = $this->proId;
            $this->PropertyAmenitiesModel->insert($data);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }

    /**
     * This function is used to get list of all the avalble property type in the DB.
     *
     * @return void
     */
    public function getPropertyType()
    {
        try {
            return $this->PropertyTypeModel->select('pt_id,pt_title')->where(['pt_status' => true])->findAll();
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }

    /**
     * This function is used to get list of all the avalble property categories in the DB.
     *
     * @return void
     */
    public function getPropertyCategories()
    {
        try {
            return $this->PropertyCategoryModel->select('cat_id,cat_title')->where(['cat_status' => true])->findAll();
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }

    /**
     * This function is used to get list of all the avalble property categories in the DB.
     *
     * @return void
     */
    public function getAmenities()
    {
        try {
            return $this->AmenitiesModel->select('ame_id,ame_title')->where(['ame_status' => true])->orderby('ame_title', 'ASC')->findAll();
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
             * Form data for property info
             */
            $propId = $formData['propInfo_id'] ?? "";

            $this->propertyInfo['prpt_title'] = $formData['propertyName'];
            $this->propertyInfo['property_available_for'] = $formData['property_available_for'];
            $this->propertyInfo['prpt_property_cate'] = $formData['pro_category'];
            $this->propertyInfo['prpt_property_type'] = (int) $formData['property_type'];
            $this->propertyInfo['prpt_no_of_bedrooms'] = $formData['bedrooms'];
            $this->propertyInfo['prpt_no_of_bathrooms'] = $formData['bathrooms'];
            $this->propertyInfo['prpt_no_of_balconies'] = $formData['balconies'];
            $this->propertyInfo['prpt_kitechen_size'] = $formData['kitechen'];

            $this->propertyInfo['prpt_bathroom_style'] = $formData['BathroomStyle'];
            $this->propertyInfo['prpt_drawing_hall'] = $formData['drawingHall'];
            $this->propertyInfo['prpt_dining_hall'] = $formData['diningHall'];
            $this->propertyInfo['prpt_no_of_sittings'] = $formData['sittings'];
            $this->propertyInfo['prpt_no_of_cabins'] = $formData['cabins'];

            $this->propertyInfo['prpt_no_of_lifts'] = $formData['lifts'];
            $this->propertyInfo['prpt_no_of_entry_gates'] = $formData['gates'];
            $this->propertyInfo['prpt_drawing_hall_size'] = $formData['drawingHallSize'];
            $this->propertyInfo['prpt_dining_hall_size'] = $formData['diningHallSize'];
            $this->propertyInfo['prpt_room_size'] = $formData['roomSize'];
            $this->propertyInfo['prpt_washroomsize'] = $formData['washroomSize'];
            $this->propertyInfo['prpt_servant_room'] = $formData['servantRoom'];

            $this->propertyInfo['prpt_images_link'] = isset($formData['imgpath']) ? json_encode($formData['imgpath']) : null;
            $this->propertyInfo['prpt_video_link'] = $formData['propertyVdeo'];
            $this->propertyInfo['prpt_status'] = true;
            /**
             * Form data for Address
             */
            $this->propertyAddress['ptadd_state'] = $formData['InputState'] ?? '';
            $this->propertyAddress['ptadd_latitude'] = $formData['latitude'] ?? '';
            $this->propertyAddress['ptadd_longitude'] = $formData['latitude'] ?? '';
            $this->propertyAddress['ptadd_city'] = $formData['InputCity'] ?? '';;
            $this->propertyAddress['ptadd_zip_code'] = $formData['pin'] ?? '';
            $this->propertyAddress['ptadd_near_by'] = $formData['nearBy'] ?? '';
            $this->propertyAddress['ptadd_locality'] = $formData['locality'] ?? '';
            $this->propertyAddress['ptadd_tower_name'] = $formData['towerName'] ?? '';
            $this->propertyAddress['ptadd_block'] = $formData['block'] ?? '';
            $this->propertyAddress['ptadd_pocket'] = $formData['pocket'] ?? '';
            $this->propertyAddress['ptadd_township'] = $formData['township'] ?? '';
            $this->propertyAddress['ptadd_society_name'] = $formData['societyName'] ?? '';
            $this->propertyAddress['ptadd_builder_name'] = $formData['builderName'] ?? '';
            $this->propertyAddress['ptadd_building'] = $formData['building'] ?? '';
            $this->propertyAddress['ptadd_floor'] = $formData['floor'] ?? '';
            $this->propertyAddress['ptadd_facing'] = $formData['facing'] ?? '';
            $this->propertyAddress['ptadd_house_unit_no'] = $formData['houseUnit'] ?? '';
            $this->propertyAddress['ptadd_status'] = true;

            /**
             * Form data for property area
             */
            $this->propertyArea = [
                'ptar_square_feet' => $formData['squareFeet'] ?? '',
                'ptar_carpet_area' => $formData['carpetArea'] ?? '',
                'ptar_build_up_area' => $formData['buildUpArea'] ?? '',
                'ptar_yard' => $formData['inputYard'] ?? '',
                'ptar_meter' => $formData['inputMeter'] ?? '',
                'ptar_super_carpet_area' => $formData['suCarpetArea'] ?? '',
                'ptar_status' => true,

            ];

            /**
             * Form data for property ownerInfo
             */

            $this->propertyOwnerInfo = [
                'poi_prop_owner_name' => $formData['inputOwner'] ?? '',
                'poi_owner_phone_umber' => $formData['ownerNumber'] ?? '',
                'poi_alt_number' => $formData['ownerAlternateNumber'] ?? '',
                'poi_owner_email' => $formData['ownerEmail'] ?? '',
                'poi_status' => true,
            ];

            /**
             * Formd data for property Amenities
             */
            $amenities_list = $formData['amenities_list'] ? json_encode($formData['amenities_list']) : '';
            $this->propertyAmenities = [
                'pa_amenities' => $amenities_list,
                'pa_status' => true,
            ];
        }

        if ($propId) {
            $this->propertyInfo['prpt_update_at'] = $this->timestamp;
            $this->propertyInfo['prpt_update_by'] = $this->userId;

            $this->propertyAddress['ptadd_update_at'] = $this->timestamp;
            $this->propertyAddress['ptadd_update_by'] = $this->userId;

            $this->propertyArea['ptar_update_at'] = $this->timestamp;
            $this->propertyArea['ptar_update_by'] = $this->userId;

            $this->propertyOwnerInfo['poi_update_at'] = $this->timestamp;
            $this->propertyOwnerInfo['poi_update_by'] = $this->userId;

            $this->propertyAmenities['pa_update_at'] = $this->timestamp;
            $this->propertyAmenities['pa_update_by'] = $this->userId;
        } else {

            $this->propertyInfo['prpt_created_at'] = $this->timestamp;
            $this->propertyInfo['prpt_created_by'] = $this->userId;

            $this->propertyAddress['ptadd_created_at'] = $this->timestamp;
            $this->propertyAddress['ptadd_created_by'] = $this->userId;

            $this->propertyArea['ptar_created_at'] = $this->timestamp;
            $this->propertyArea['ptar_created_by'] = $this->userId;

            $this->propertyOwnerInfo['poi_created_at'] = $this->timestamp;
            $this->propertyOwnerInfo['poi_created_by'] = $this->userId;

            $this->propertyAmenities['pa_created_at'] = $this->timestamp;
            $this->propertyAmenities['pa_created_by'] = $this->userId;
        }
    }

    /**
     * This method is used to upload images file into the data base.
     *
     * @param array $files
     * @return void
     */
    public function uploadPropertyImages($files = [])
    {
        $path = [];
        if ($files) {
            foreach ($files['files'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $path[] =  '/uploads/proerties/' . $newName;
                    $img->move('./uploads/proerties/', $newName);
                }
            }
        }
        return $path;
    }

    /**
     * This method is used to load property info
     *
     * @param integer $limit
     * @param integer $offset
     * @return array
     */
    public function getPropertyInfo($limit = 10, $offset = 0)
    {
        return $this->PropertyInfoModel->getPropertyInfo($limit, $offset);
    }

    /**
     * This function is used to update property publish status
     *
     * @param INT $propertyId
     * @param INT $status
     * @return void
     */
    public function updatePublishedStatus($propertyId = null, $status = null)
    {
        try {
            $status = ($status == 1) ? 0 : 1;
            $data = ['prpt_status' => $status];
            return $this->PropertyInfoModel->update($propertyId, $data);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }

    /**
     * This function
     *
     * @param Int|null $propertyId
     * @return void
     */
    public function getPropertyDetails(Int $propertyId = null)
    {
        $propInfo['propInfo'] = $this->PropertyInfoModel->getPropertyDetailedInfo($propertyId);
        $propInfo['propAddress'] = $this->PropertyAddressModel->getPropertyAddress($propertyId);
        $propInfo['propArea'] = $this->PropertyAreaModel->select('ptar_id,ptar_square_feet,ptar_carpet_area,ptar_build_up_area,ptar_yard,ptar_meter,ptar_super_carpet_area')->where('ptar_prop_id', $propertyId)->first();
        $propInfo['propOwnInfo'] = $this->PropertyOwnerInfoModel->select('poi_id,poi_prop_owner_name,poi_owner_phone_umber,poi_alt_number,poi_owner_email')->where('poi_prop_id', $propertyId)->first();
        $propInfo['propAmenities'] = $this->PropertyAmenitiesModel->select('pa_id,pa_amenities')->where('pa_prop_id', $propertyId)->first();
        return $propInfo;
    }

    /**
     * This function is used to delete the selected property
     *
     * @param Int $proId
     * @return boolean
     */
    public function delete($proId = null)
    {
        try {
            $data = ['prpt_isdelete' => true];
            return $this->PropertyInfoModel->update($proId, $data);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }

    /**
     * This function is used to update property
     *
     * @param array $formData
     * @return boolean
     */
    public function updateProperty($formData = []): bool
    {
        try {
            $propId = $this->request->getPost('propInfo_id');
            $propAddress_id = $this->request->getPost('propAddress_id');
            $propArea_id = $this->request->getPost('propArea_id');
            $propOwnInfo_id = $this->request->getPost('propOwnInfo_id');
            $propAmenities_id = $this->request->getPost('propAmenities_id');
            $formData = $this->request->getPost();
            $this->prepareFormData($formData);
            if ($this->PropertyInfoModel->update($propId, $this->propertyInfo)) {
                $this->PropertyAreaModel->update($propArea_id, $this->propertyArea);
                $this->PropertyOwnerInfoModel->update($propOwnInfo_id, $this->propertyOwnerInfo);
                $this->PropertyAddressModel->update($propAddress_id, $this->propertyAddress);
                $this->PropertyAmenitiesModel->update($propAmenities_id, $this->propertyAmenities);
                return true;
            }
            return false;
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }


    /**
     * This function is used to assign property to the user.
     *
     * @param array $formData
     * @return array
     */
    public function assignProperty($formData = []): array
    {
        try {
            $formData   = [
                'pur_user_id' => xss_clean($this->request->getVar('user')),
                'pur_prop_id' => xss_clean($this->request->getVar('property')),
                'pur_allot_status_id' => xss_clean($this->request->getVar('propertyFor')),
                'pur_status' => true,
                'pur_created_at' =>  $this->timestamp,
                'pur_update_at' =>  $this->timestamp,
                'pur_created_by' => $this->userId,
                'pur_update_by' => $this->userId,
            ];
            $isAvailable =  $this->PropertyUserRelationModel->where([
                'pur_user_id' => xss_clean($this->request->getVar('user')),
                'pur_prop_id' => xss_clean($this->request->getVar('property'))
            ])->find();

            if ($isAvailable) {
                return ['isAvailbale' => false, 'message' => 'Property already assigned to this user'];
            } else {
                $isAssigned = $this->PropertyUserRelationModel->save($formData);
                if ($isAssigned)
                    return ['isAssigned' => true, 'message' => 'Property successfully assigned'];
                else
                    return ['isAssigned' => false, 'message' => 'Internal server error, Please contact your service provider'];
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }
    
    /**
     * This function is used to assign property to user
     *
     * @return mixed
     */
    public function getAssignPropertyList($limit=null, $offset=null)
    {
        return $this->PropertyUserRelationModel->getAssignedList($limit,$offset);
    }



}
