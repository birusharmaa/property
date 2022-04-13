<?php

namespace App\Libraries;

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;

class Properties
{
    protected $request;
    protected $propertyBasicDetails;
    protected $propertyLocation;
    protected $propertyProfile;

    protected $propertyImage;
    protected $propertyPricing;
    protected $otherfeaturesArr;
    protected $propertyOwnerDetails;

    protected $proId;
    protected $timestamp;
    protected $userId;
    protected $security;
    protected $cityid;
    protected $aptId;
    protected $localityId;


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
            'PropertyBasicDetailsModel',
            'PropertyLocationDetails',
            'PropertyPriceingModel',
            'PropertyProfileModel',
            'PropertyAdditionalFeaturesModel',
            'PropertyImagesModel',
            'PropertyCategoryModel',
            'PropertyTypeModel',
            'AmenitiesModel',
            'SubPropertyTypes',
            'QuestionModel',
            'QuestionOptionModel',
            'PropertyMasterValue',
            'PropertyMasterKeyModel',
            'PropertyCityModel',
            'ApartmentModel',
            'LocalityModel',
            'SubLocalityModel',
            'ProjectModel',
            'PropertyOwnerInfoModel',
            'PropertyUserRelationModel'

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

            if ($this->saveBasic()) {
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
    protected function saveBasic()
    {
        try {

            $this->PropertyBasicDetailsModel->insert($this->propertyBasicDetails);
            $this->proId = $this->PropertyBasicDetailsModel->insertID;
            if ($this->proId) {
                $this->saveLocation($this->propertyLocation);
                $this->saveProfile($this->propertyProfile);
                $this->savePricing($this->propertyPricing);
                $this->saveImages($this->propertyImage);
                $this->saveOtherFeatures($this->otherfeaturesArr);
                if (count($this->propertyOwnerDetails) > 0)
                    $this->saveOwnerDetails($this->propertyOwnerDetails);
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
    protected function saveLocation($data = [])
    {
        try {
            $data['property_id'] = $this->proId;
            $this->PropertyLocationDetails->insert($data);
        } catch (\Exception $e) {
            die($e->getMessage());
            log_message('error', $e->getMessage());
        }
    }

    protected function saveProfile($data = [])
    {
        try {
            $data['property_id'] = $this->proId;
            $this->PropertyProfileModel->insert($data);
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
    protected function savePricing(array $data = [])
    {
        try {
            $data['property_id'] = $this->proId;
            $this->PropertyPriceingModel->insert($data);
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
    protected function saveOtherFeatures($data = [])
    {
        try {
            $data['property_id'] = $this->proId;
            $this->PropertyAdditionalFeaturesModel->insert($data);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }


    /**
     *This function is used to save images files into the database.
     *
     * @param array $data
     * @return void
     */
    public function saveImages($data = [])
    {
        try {
            $data['property_id'] = $this->proId;
            $this->PropertyImagesModel->insert($data);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }


    /**
     *This function is used to save property owner details into the database.
     *
     * @param array $data
     * @return void
     */
    public function saveOwnerDetails($data = [])
    {
        try {
            $data['property_id'] = $this->proId;
            $this->PropertyOwnerInfoModel->insert($data);
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
            return $this->AmenitiesModel->select('ame_id,ame_title,ame_for')->where(['ame_status' => true])->orderby('ame_title', 'ASC')->findAll();
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

            

            // echo '<pre>';

            // print_r($formData);
            // die;
            /**
             * Preparing data for property basic details 
             * start
             */
            $lookingFor = json_decode($formData['lookingforObj'], true);
            $apartmentTitle =  xss_clean($formData['apartment_is']) ?? "";
            $propFor = "";
            if ($lookingFor['lookingfor'] == 1) $propFor = "Sell";
            else if ($lookingFor['lookingfor'] == 2) $propFor = "Rent/Lease";
            else $propFor = "PG";


            $property_title = $apartmentTitle . ' Apartment for ' . $propFor;

            if ($lookingFor['propertyType'] == 'residential') {
                $this->propertyBasicDetails = [
                    'property_title' =>   $property_title,
                    'looking_for' => xss_clean($lookingFor['lookingfor']),
                    'property_type' => 1,
                    'propertySubType' => xss_clean($lookingFor['propertySubType']),
                    'question_data' => null,
                    'status' => true,
                ];
            } else {
                $questionData = [
                    'questionbelongsto' => xss_clean($lookingFor['questionbelongs']),
                    'questionId' => xss_clean($lookingFor['questionId']),
                    'questionValue' => xss_clean($lookingFor['questionValue']),
                    'questionlocatedId' => xss_clean($lookingFor['questionlocatedId']),
                    'questionlocatedValue' => xss_clean($lookingFor['questionlocatedValue'])
                ];
                $this->propertyBasicDetails = [
                    'property_title' =>   $property_title,
                    'looking_for' => xss_clean($lookingFor['lookingfor']),
                    'property_type' => 2,
                    'propertySubType' => xss_clean($lookingFor['propertySubType']),
                    'question_data' => json_encode($questionData),
                    'status' => true,
                ];
            }


            /**
             * End
             */

            /**
             * Preparing Property location data start
             */
            $this->propertyLocation = [
                'city' => $this->checkPropertiesCity(xss_clean($formData['city'])),
                'appartment' => $this->checkPropertiesApartment(xss_clean($formData['apartment_society'])),
                'project' => $this->checkPropertiesProject(xss_clean($formData['project_optinal'])),
                'house_number' => xss_clean($formData['inputhouse_number']),
                'locality' => $this->checkPropertiesLocality($formData['locality']),
                'sub_locality' => xss_clean($formData['sublocality'])??"",
                'located_inside' => xss_clean($formData['loacated-inside']),
                'zone' => xss_clean($formData['zone-type']),
                'address' => xss_clean($formData['_address']),
                'status' => true,
            ];
            /**
             * End
             */

            /**
             * Preparing Property profileData start
             */

            $otherRooms = json_encode($formData['other_rooms']);

            $furnishing_app = [
                'furnishing_light' => xss_clean($formData['furnishing_light']) ?? 0,
                'furnishing_fan' => xss_clean($formData['furnishing_light']) ?? 0,
                'furnishing_ac' => xss_clean($formData['furnishing_ac']) ?? 0,
                'furnishing_tv' => xss_clean($formData['furnishing_tv']) ?? 0,
                'furnishing_bed' => xss_clean($formData['furnishing_bed']) ?? 0,
                'furnishing_wardrobe' => xss_clean($formData['furnishing_wardrobe']) ?? 0,
                'furnishing_geyser' => xss_clean($formData['furnishing_geyser']) ?? 0,
                'furnishing_w_machine' => xss_clean($formData['furnishing_w_machine']) ?? 0,
                'furnishing_stove' => xss_clean($formData['furnishing_stove']) ?? 0,
                'furnishing_microwave' => xss_clean($formData['furnishing_microwave']) ?? 0,
                'furnishing_kitchen' => xss_clean($formData['furnishing_kitchen']) ?? 0,
                'furnishing_chimney' => xss_clean($formData['furnishing_chimney']) ?? 0,
                'furnishing_table' => xss_clean($formData['furnishing_table']) ?? 0,
                'furnishing_curtains' => xss_clean($formData['furnishing_curtains']) ?? 0,
                'furnishing_exh_fan' => xss_clean($formData['furnishing_exh_fan']) ?? 0,
            ];


            $this->propertyProfile = [
                'appartment_is' => xss_clean($formData['apartment_is']) ?? 0,
                'no_of_bedroom' => xss_clean($formData['no_of_bedrooms']) ?? xss_clean(!empty($formData['no_of_bedrooms_other'])) ?? 0,
                'no_of_bathroom' => xss_clean($formData['no_of_bathrooms']) ?? xss_clean(!empty($formData['no_of_bathrooms_other'])) ?? 0,
                'no_of_diningrooms' => xss_clean($formData['no_of_diningrooms']) ?? xss_clean(!empty($formData['no_of_diningrooms_other'])) ?? 0,
                'no_of_balconies' => xss_clean($formData['no_of_bathrooms']) ?? 0,
                'carpet_area' => xss_clean($formData['txt_carpetarea']) ?? '0x0',
                'carpet_area_unit' => xss_clean($formData['txt_carpetarea_unit']) ?? 1,
                'build_up_area' => xss_clean($formData['txt_build_up_area']) ?? '0x0',
                'build_up_area_unit' => xss_clean($formData['txt_build_up_area_unit']) ?? 1,
                'super_build_up_area' =>  xss_clean($formData['txt_super_build_up_area']) ?? '0x0',
                'super_build_up_area_unit' =>  xss_clean($formData['txt_super_build_up_area_unit']) ?? '0x0',
                'shop_facade_size' =>  xss_clean($formData['shop_facade_size']) ?? '0x0',
                'shop_facade_size_unit' =>  xss_clean($formData['shop_facade_size_unit']) ??1,
                'other_rooms' => json_encode($otherRooms),
                'furnishing' => xss_clean($formData['furnishing']) ?? "unfurnished",
                'furnishing_app' => json_encode($furnishing_app),
                'cover_parking' => xss_clean($formData['parking_cover']) ?? 0,
                'open_parking' => xss_clean($formData['parking_open']) ?? 0,
                'total_no_of_floors' => xss_clean($formData['floor_details_floor_no']) ?? 0,
                'property_on_floor' => xss_clean($formData['floor_no']),
                'availability_status' => xss_clean($formData['availability_status']) ?? 0,
                'possession_year' => xss_clean($formData['underConstruction_possession_years']) ?? 0,
                'possession_month' => xss_clean($formData['underConstruction_possession_month']) ?? 0,
                'property_age' => xss_clean($formData['year']),
                'status' => true,
                'created_at' => $this->timestamp,
                'created_by' => $this->userId,
            ];

            /**
             * End
             */

            /**
             * Start property pricing data
             * 
             */

            $this->propertyPricing = [
                'ownership' => xss_clean($formData['Ownership']) ?? "",
                'price' => xss_clean($formData['expectd_price']) ?? "",
                'price_pr_sqft' => xss_clean($formData['price_per_sqft']) ?? "",
                'all_Inclusive_price' => xss_clean($formData['inclusive_tax_price']) ?? "",
                'govt_charges_excluded' => xss_clean($formData['tax_gove_charge_excld']) ?? "",
                'price_negotiable' => xss_clean($formData['negotiable_price']) ?? "",
                'maintenance' => xss_clean($formData['additional_price_maintenance']) ?? "",
                'maintenance_tenyour' => xss_clean($formData['maintenance_unit']) ?? "",
                'expected_rental' => xss_clean($formData['additional_price_rental']) ?? "",
                'booking_amount' => xss_clean($formData['additional_price_amount']) ?? "",
                'annual_dues_payable' => xss_clean($formData['additional_price_payable']) ?? "",
                'membership_charge' => xss_clean($formData['additional_price_charge']) ?? "",
                'is_pre_leased_or_rent' => xss_clean($formData['rented-properties']) ?? "",
                'current_rent_pr_month' => xss_clean($formData['pre_rented_leased_current_rent_pmonth']) ?? "",
                'less_tiy' => xss_clean($formData['pre_rented_leased_lease_tenure_in_years']) ?? "",
                'a_r_i_percent' => xss_clean($formData['prerented_details_price_arinp']) ?? "",
                'lease_tobusiness_type' => xss_clean($formData['leased_to_business_type']) ?? "",
                'fire_noc_certified' => xss_clean($formData['NOC-certified']) ?? "",
                'occupancy_certificate' => xss_clean($formData['occupancy-certificate']) ?? "",
                'office_pre_used' => json_encode($formData['office_previously']) ?? "",
                'desciption' => xss_clean($formData['propdescription']) ?? "",
                'status' => true,

            ];

            /**
             * pricing End
             */

            /**
             * Start property Amenities and another features 
             */
            $ameneties = isset($formData['ameneties']) ? json_encode($formData['ameneties']) : '';
            $PropertyFeatures = isset($formData['PropertyFeatures']) ? json_encode($formData['PropertyFeatures']) : '';
            $sb = isset($formData['Society/BuildingFeatures']) ? json_encode($formData['Society/BuildingFeatures']) : '';
            $AdditionalFeatures = isset($formData['AdditionalFeatures']) ? json_encode($formData['AdditionalFeatures']) : '';
            $WaterSource = isset($formData['WaterSource']) ? json_encode($formData['WaterSource']) : '';
            $Overlooking = isset($formData['Overlooking']) ? json_encode($formData['Overlooking']) : '';
            $OtherFeatures = isset($formData['OtherFeatures']) ? json_encode($formData['OtherFeatures']) : '';
            $locaction_adv = isset($formData['locaction_adv']) ? json_encode($formData['locaction_adv']) : '';

            $this->otherfeaturesArr = [
                'property_features' => $PropertyFeatures,
                'amenities' => $ameneties,
                'soc_building_features' => $sb,
                'additional_features' => $AdditionalFeatures,
                'water_source' => $WaterSource,
                'overlooking' => $Overlooking,
                'other_features' => $OtherFeatures,
                'power_back_up' => xss_clean($formData['backup']),
                'property_facing' => xss_clean($formData['facing']),
                'type_of_flooring' => xss_clean($formData['type_of_flooring']),
                'w_facing_road' => xss_clean($formData['Width_of_facing_road']),
                'w_facing_road_unit' => xss_clean($formData['Width_of_facing_road_unit']),
                'location_adv' => $locaction_adv,
                'ups' => xss_clean($formData['usp_price']),
                'status' => true,
            ];

            /**
             * End property amenities data
             */
            $path = isset($formData['imgPath']) ? json_encode(xss_clean($formData['imgPath'])) : "";

            $this->propertyImage = [
                'imges_url' => $path,
                "gallary_url" => "",
                "upload_link_over_sms" => false,
                "whatsapp_link" => false,
                "property_id" => false,
            ];

            if (isset($formData['owner-name'])) {
                $this->propertyOwnerDetails = [
                    'name' => xss_clean($formData['owner-name']),
                    'phone_number' => xss_clean($formData['owner-email']),
                    'alt_number' => xss_clean($formData['owner-phone']),
                    'email' => xss_clean($formData['owner-alt-number']),
                    'status' => true,
                    'created_at' => $this->timestamp
                ];
            }
        }
    }


    /**
     * This function is used to insert new city
     *
     * @param string $city
     * @return void
     */
    private function checkPropertiesCity($city = null)
    {

        $cityRes =  $this->PropertyCityModel->where(['ct_title' => $city])->first();
        if ($cityRes) {
            $this->cityid = $cityRes['id'];
            return  $cityRes['id'];
        } else {
            try {
                $cityData = [
                    'ct_title' => xss_clean($city),
                    'status' => true,
                    'created_by' => $this->userId,
                ];
                $this->PropertyCityModel->insert($cityData);
                $this->cityid = $this->PropertyCityModel->insertID;
                return $this->cityid;
            } catch (\Exception $e) {
                die($e->getMessage());
            }
        }
    }

    /**
     * This function is used to insert new locality
     *
     * @param string $locality
     * @return void
     */
    private function checkPropertiesLocality($locality = null)
    {
        $local =  $this->LocalityModel->where('locality_title', $locality)->first();

        if ($local) {
            $this->localityId = $local['id'];
            return $local['id'];
        } else {
            $localityData = [
                'locality_title' =>  xss_clean($locality),
                'city_id' => $this->cityid,
                'status' => true,
                'created_by' => $this->userId,
            ];

            $this->LocalityModel->insert($localityData);
            $this->localityId = $this->LocalityModel->insertID;
            return $this->localityId;
        }
    }



    /**
     * This function is used to insert new Sublocality
     *
     * @param string $sublocality
     * @return void
     */
    private function checkPropertiesSubLocality($sublocality = null)
    {
        $sblocal =  $this->SubLocalityModel->where('sublocality_title', $sublocality)->first();

        if ($sblocal) {

            return   $sblocal['id'];
        } else {
            $sublocalityData = [
                'sublocality_title' =>  xss_clean($sublocality),
                'locality_id' => $this->localityId,
                'status' => true,
                'created_by' => $this->userId,
            ];
            $this->SubLocalityModel->insert($sublocalityData);
            return  $this->SubLocalityModel->getInsertID;
        }
    }


    private function checkPropertiesApartment($apartment = null)
    {
        $apt =  $this->ApartmentModel->where(['ap_title' => $apartment])->first();

        if ($apt) {
            return $this->aptId = $apt['id'];
        } else {
            $apartmentData = [
                'ap_title' =>  xss_clean($apartment),
                'city_id' => $this->cityid,
                'status' => true,
                'created_by' => $this->userId,
            ];
            $this->ApartmentModel->insert($apartmentData);
            $this->aptId = $this->ApartmentModel->insertID;
            return $this->aptId;
        }
    }


    /**
     * This function is used to insert new project by city
     *
     * @param string|null $project
     * @return integer
     */
    public function checkPropertiesProject(string $project = null)
    {
        $projectData =  $this->ProjectModel->where(['project_title' => $project])->first();
        if ($projectData) {
            return   $projectData['id'];
        } else {
            $projectData = [
                'project_title' =>  xss_clean($project),
                'city_id' => $this->cityid,
                'status' => true,
                'created_by' => $this->userId,
            ];
            $this->ProjectModel->insert($projectData);

            return $this->ProjectModel->getInsertID;
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
            $dateFolder = date("Ymd");
            foreach ($files['files'] as $img) {
                if ($img->isValid() && !$img->hasMoved()) {
                    $newName = $img->getRandomName();
                    $path[] =  '/uploads/proerties/' . $dateFolder . '/' . $newName;
                    $img->move('./uploads/proerties/' . $dateFolder . '/', $newName);
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
        return $this->PropertyBasicDetailsModel->getPropertyBasicInfo();
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
            $data = ['isPublished' => $status];
            return $this->PropertyBasicDetailsModel->update($propertyId, $data);
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

        $propInfo['basicInfo'] = $this->PropertyBasicDetailsModel->getPropertyBasicInfoById($propertyId);
        $propInfo['locationDetails'] = $this->PropertyLocationDetails->getPropertyDetailsById($propertyId);
        $propInfo['ownerInfo'] = $this->PropertyOwnerInfoModel->select('id,name,phone_number,alt_number,email,property_id,status,name')->where('property_id', $propertyId)->first();
        $propInfo['propPropfile'] = $this->PropertyProfileModel->where('property_id', $propertyId)->first();
        $propInfo['propOtherFeatures'] = $this->PropertyAdditionalFeaturesModel->getPropertyAdditionalDetails($propertyId);
        $propInfo['priceing'] = $this->PropertyPriceingModel->where('property_id', $propertyId)->first();
        $propInfo['propImages'] = $this->PropertyImagesModel->where('property_id', $propertyId)->first();

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
            $data = ['isDeleted' => true];
            return $this->PropertyBasicDetailsModel->update($proId, $data);
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
    // public function updateProperty($formData = []): bool
    // {
    //     try {
    //         $propId = $this->request->getPost('propInfo_id');
    //         $propAddress_id = $this->request->getPost('propAddress_id');
    //         $propArea_id = $this->request->getPost('propArea_id');
    //         $propOwnInfo_id = $this->request->getPost('propOwnInfo_id');
    //         $propAmenities_id = $this->request->getPost('propAmenities_id');
    //         $formData = $this->request->getPost();
    //         $this->prepareFormData($formData);
    //         if ($this->PropertyInfoModel->update($propId, $this->propertyInfo)) {
    //             $this->PropertyAreaModel->update($propArea_id, $this->propertyArea);
    //             $this->PropertyOwnerInfoModel->update($propOwnInfo_id, $this->propertyOwnerInfo);
    //             $this->PropertyAddressModel->update($propAddress_id, $this->propertyAddress);
    //             $this->PropertyAmenitiesModel->update($propAmenities_id, $this->propertyAmenities);
    //             return true;
    //         }
    //         return false;
    //     } catch (\Exception $e) {
    //         log_message('error', $e->getMessage());
    //     }
    // }


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
                'pur_prop_id' => xss_clean($this->request->getVar('property')),
                'pur_status' => true,
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
    public function getAssignPropertyList($limit = null, $offset = null)
    {
 
        return $this->PropertyUserRelationModel->getAssignedList($limit, $offset);
    }

    /**
     * 
     */

    public function getSubPropertyCategories($limit = null, $offset = null)
    {
        return $this->SubPropertyTypes->getSubPropertyCategories($limit = null, $offset = null);
    }


    /**
     * This function is used to get list of all the question are required
     *
     * @return array
     */
    public function getQuestionList()
    {
        $data = $this->QuestionModel->getQuestionList();
        $questionData = [];
        if ($data) {
            foreach ($data as $key => $question) {
                $questionData[$key]['ques_id'] = $question->ques_id;
                $questionData[$key]['qes_title'] = $question->qes_title;
                $questionData[$key]['que_class'] = $question->que_class;
                $questionData[$key]['blng_id'] = $question->blng_id;
                $questionData[$key]['options'] =  $this->QuestionOptionModel->select('questionoptions.id,questionoptions.title,questionoptions.class,questionoptions.value,questionoptions.name')->where(['ques_id' => $question->ques_id])->findAll();
            }
        }

        return $questionData;
    }


    public function getLocatedInside()
    {
        $data = $this->QuestionOptionModel->select('questionoptions.id,questionoptions.title,questionoptions.class,questionoptions.value,questionoptions.name')->where(['ques_id' => 7])->findAll();
        return $data;
    }


    public function getMasterQuestions()
    {
        $ids = [7, 8, 9, 10];
        $data = $this->PropertyMasterKeyModel->getQuestionList($ids);
        $subQuestionData = [];
        if ($data) {
            foreach ($data as $key => $question) {
                $subQuestionData[$key]['id'] = $question->id;
                $subQuestionData[$key]['title'] = $question->title;
                $subQuestionData[$key]['class'] = $question->key_for;
                $subQuestionData[$key]['subQuestion'] =  $this->PropertyMasterValue->select('id,title,short_name,status,key_id')->where(['key_id' => $question->id])->findAll();
            }
        }
        return $subQuestionData;
    }



    public function getMasterQuestionsL2()
    {
        $ids = [1, 2, 3, 4, 5, 6, 10];
        $data = $this->PropertyMasterKeyModel->getQuestionList($ids);
        $subQuestionData = [];
        if ($data) {
            foreach ($data as $key => $question) {
                $subQuestionData[$key]['id'] = $question->id;
                $subQuestionData[$key]['title'] = $question->title;
                $subQuestionData[$key]['class'] = $question->key_for;
                $subQuestionData[$key]['subQuestion'] =  $this->PropertyMasterValue->select('id,title,short_name,status,key_id')->where(['key_id' => $question->id])->findAll();
            }
        }
        return $subQuestionData;
    }
    public function getLocationAdvantage()
    {
        $ids = [1, 2, 3, 4, 5, 6, 7, 8, 9];
        $data = $this->PropertyMasterKeyModel->getQuestionList($ids);
        $subQuestionData = [];
        if ($data) {
            foreach ($data as $key => $question) {
                $subQuestionData[$key]['id'] = $question->id;
                $subQuestionData[$key]['title'] = $question->title;
                $subQuestionData[$key]['class'] = $question->key_for;
                $subQuestionData[$key]['subQuestion'] =  $this->PropertyMasterValue->select('id,title,short_name,status,key_id')->where(['key_id' => $question->id])->findAll();
            }
        }

        return $subQuestionData;
    }
}
