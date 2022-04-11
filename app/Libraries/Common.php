<?php

namespace App\Libraries;

class Common
{
    function __construct()
    {
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
            'StateModel',
            'CityModel',
            'Propertiesavailablefor',
        ];
    }

    /**
     * This function is used to get list of all the avalble property categories in the DB.
     *
     * @return void
     */
    public function getState()
    {
        try {
            return $this->StateModel->select('st_id,st_title')->where(['st_status' => true])->findAll();
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }

    /**
     * This function is used to get list of all the avalble city  in the DB.
     *
     * @return void
     */
    public function getCities()
    {
        try {
            return $this->CityModel->select('ct_id,ct_title,state_id')->where(['ct_status' => true])->orderby('ct_title', 'ASC')->findAll();
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }

    /**
     * This function is used to get list of all the avalble city  in the DB.
     *
     * @return void
     */
    public function getCityById($stateId = null)
    {
        try {
            return $this->CityModel->select('ct_id,ct_title,state_id')->where(['state_id' => $stateId, 'ct_status' => true])->orderby('ct_title', 'ASC')->findAll();
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }

     /**
      * This function is used to get list of all the availble property status in the DB.
      *
      * @return void
      */
    public function getPropertyFor()
    {
        try {
            return $this->Propertiesavailablefor->select('id,title')->where(['status' => true])->orderby('title', 'ASC')->findAll();
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }


    public function getCountries()
    {
        try {
            return $this->StateModel->getCountry();
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }

    public function getStates($id = null)
    {
        try {
            return $this->StateModel->getStates($id);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }

    public function getCitiesList($stateId = null)
    {
        try {
            return $this->StateModel->getCities($stateId);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
        }
    }

}
