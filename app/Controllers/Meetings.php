<?php

namespace App\Controllers;

class Meetings extends Security_Controller
{
    protected $employeeId;

    public function __construct()
    {
        parent::__construct();
        $session = session();
        $data = $session->get('loginInfo');
        $this->employeeId = $data['emp_id'];
    }

    /**
     * This method is used to show list of all the meetings
     * @return void
     */
    public function index()
    {
        if ($this->userRoleId == 1) {
            $pageData['meetingList'] = $this->MeetingModel->findAll();
            $pageData['employees'] = $this->EmployeesModel->select('id, concat(emp_first_name," ",emp_last_name) as name')->where(['emp_status' => true])->findAll();
        } else {
            $pageData['meetingList'] = $this->MeetingModel->where(['created_by' => $this->userid])->findAll();
            $pageData['employees'] = $this->EmployeesModel->where(['id' => $this->employeeId])->first();
        }
        $pageData['status'] = $this->MeetingStatusModel->where(['status' => true])->findAll();

        $pageData['leads'] = $this->LeadsModal->select('id, concat(first_name," ",last_name," - ",phone) as name')->findAll();

        $this->template->rander('Meetings/index', $pageData);
    }

    /**
     * This method is used to get list of all the meeting available using ajax query
     *
     * @return void
     */
    public function getMeetingList()
    {
        if ($this->userRoleId == 1) {
            $meetings = $this->MeetingModel->getMeetingList();
        } else {
            $meetings = $this->MeetingModel->getMeetingList($this->userid);
        }
        return $this->respond(['message' => 'success', 'data' =>  $meetings, 'status' => true,], 200);
    }


    /**
     * This method is used to save meeting details into the database.
     *
     * @return void
     */
    public function insert()
    {

        if (!$this->validate([
            'employee' => 'required',
            'leadName' => 'required',
            'meetingDate' => 'required',
            'meetingTime' => 'required',
            'purpose' => 'required|min_length[30]|max_length[255]',
        ])) {
            $errors = $this->validator->getErrors();
            return $this->respond(['message' => 'errorslist', 'validation' => $errors, 'status' => false,], 400);
        } else {

            $leadMobileNoumber = explode("-", $this->request->getVar('leadName')); // Getting lead modile number form string
            $leadid = $this->LeadsModal->getLeadId($leadMobileNoumber[1]); // Getting lead id by lead mobile number
            $formData = [
                'emp_id' => xss_clean($this->request->getVar('employee')) ?? "",
                'lead_id' => $leadid->id,
                'meeting_date' => xss_clean($this->request->getVar('meetingDate')) ?? "",
                'meeting_time' => xss_clean($this->request->getVar('meetingTime')) ?? 1,
                'purpose' => xss_clean($this->request->getVar('purpose')) ?? "",
                'meeting_status' => xss_clean($this->request->getVar('meeting-status')) ?? "",
                'created_by' => $this->userid,
            ];
            $res = $this->MeetingModel->insert($formData);
            $meetingId = $this->MeetingModel->getinsertID();

            /**
             * Inserting meeting location details into the meeting location tables
             */
            if (count($this->request->getVar('recommended-property')) > 0) {
                $recommendedpropertyList = [];
                $recommendedproperty = $this->request->getVar('recommended-property');
                foreach ($recommendedproperty as $key => $item) {
                    $list = ['meeting_id' => $meetingId, 'property_id' => $item, 'created_by' => $this->employeeId];
                    $recommendedpropertyList[] = $list;
                }
                $this->MeetingLocationModel->insertBatch($recommendedpropertyList);
            }
            if ($res) {
                return $this->respond(['message' => 'Successfully inserted', 'status' => true], 200);
            } else {
                return $this->respond(['message' => 'Not found', 'status' => false], 404);
            }
        }
    }

    /**
     * This method is used to show single meeting details using by meeting id
     *
     * @param int $id
     * @return void
     */
    public function show($id = null)
    {
        $fromData = $this->request->getVar();
        $availableproperty = [];
        $selectedLocation = [];
        $res = $this->MeetingModel->getMeetingById($id);
        $leadDetails  = $this->LeadsModal->where(['id' => $res->lead_id])->first();
        if ($leadDetails) {
            $searchConditions = ['looking_for' => $leadDetails['looking_for'], 'property_type' => $leadDetails['property_type'], 'city' => $leadDetails['city'], 'property_in_location' => $leadDetails['property_in_location']];

            $availableproperty = $this->PropertyBasicDetailsModel->getRecommendedPropertyForMeetings($searchConditions);

            $selectedLocation = $this->MeetingLocationModel->where(['meeting_id' => $res->id])->find();


            if ($availableproperty && $selectedLocation) {
                foreach ($availableproperty as $locationkey => $location) {
                    foreach ($selectedLocation as $itemkey => $item) {
                        if ($location->property_id == $item['property_id']) {
                            $location->selected = true;
                        }
                    }
                }
            }
        }



        if ($leadDetails) {
            return $this->respond(['messages' => 'Successfully', 'meetinglocations' => $availableproperty, 'selectedLocation' => $selectedLocation, 'status' => true, 'data' => $res], 200);
        } else {
            return $this->respond(['messages' => 'Not found', 'status' => false], 404);
        }
    }

    /**
     * Updated meeting details
     * @return void
     */

    public function update()
    {
        if (!$this->validate([
            'employee' => 'required',
            'leadName' => 'required',
            'meetingDate' => 'required',
            'meetingTime' => 'required',
            'purpose' => 'required|min_length[30]|max_length[255]',
        ])) {
            $errors = $this->validator->getErrors();
            return $this->respond(['message' => 'errorslist', 'validation' => $errors, 'status' => false,], 400);
        } else {
            $id = $this->request->getVar('rowid');
            $leadMobileNoumber = explode("-", $this->request->getVar('leadName'));
            $leadid = $this->LeadsModal->getLeadId($leadMobileNoumber[1]);
            $formData = [
                'emp_id' => xss_clean($this->request->getVar('employee')) ?? "",
                'lead_id' => $leadid->id,
                'meeting_date' => xss_clean($this->request->getVar('meetingDate')) ?? "",
                'meeting_time' => xss_clean($this->request->getVar('meetingTime')) ?? 1,
                'purpose' => xss_clean($this->request->getVar('purpose')) ?? "",
                'updated_by' => $this->userid,
            ];
            $res = $this->MeetingModel->update($id, $formData);

            if (count($this->request->getVar('recommended-property')) > 0) {
                $recommendedpropertyList = [];
                $recommendedproperty = $this->request->getVar('recommended-property');

                $this->MeetingLocationModel->where(['meeting_id' => $id])->delete();

                foreach ($recommendedproperty as $key => $item) {
                    $list = ['meeting_id' => $id, 'property_id' => $item, 'created_by' => $this->employeeId];
                    $recommendedpropertyList[] = $list;
                }
                $this->MeetingLocationModel->insertBatch($recommendedpropertyList);
            }

            if ($res) {
                return $this->respond(['message' => 'Successfully updated', 'status' => true], 200);
            } else {
                return $this->respond(['message' => 'Not found', 'status' => false], 404);
            }
        }
    }

    /**
     * This method is used to delete meeting details form database.
     *
     * @param [type] $id
     * @return void
     */
    public function delete($id = null)
    {

        $formData = ['status' => false, 'deleted_by' => $this->userid];
        $res = $this->MeetingModel->update($id, $formData);
        if ($res) {
            return $this->respond(['message' => 'Successfully deleted', 'status' => true], 200);
        } else {
            return $this->respond(['message' => 'Not found', 'status' => false], 404);
        }
    }

    /**
     *This method is used to update remarks for the meeting 
     *
     * @param [type] $id
     * @return void
     */
    public function updateRemark($id = null)
    {
        $formData = ['updated_by' => $this->userid, 'remark_after_meet' => xss_clean($this->request->getVar('remark'))];
        $res = $this->MeetingModel->update($id, $formData);
        if ($res) {
            return $this->respond(['message' => 'Successfully updated', 'status' => true], 200);
        } else {
            return $this->respond(['message' => 'Not found', 'status' => false], 404);
        }
    }

    /**
     * This method is used to get recommended location matched with lead requirments
     *
     * @return void
     */
    public function getLocations()
    {

        $leadMobileNoumber = explode("-", $this->request->getVar('leadValue'));

        $leadDetails = $this->LeadsModal->getLeadDetails($leadMobileNoumber[1]);

        $searchConditions = ['looking_for' => $leadDetails->looking_for, 'property_type' => $leadDetails->property_type, 'city' => $leadDetails->city, 'property_in_location' => $leadDetails->property_in_location];

        $data = $this->PropertyBasicDetailsModel->getRecommendedPropertyForMeetings($searchConditions);

        if ($data) {
            return $this->respond(['message' => 'Successfully updated', 'data' => $data, 'status' => true], 200);
        } else {
            return $this->respond(['message' => 'Not found', 'status' => false], 404);
        }
    }


    public function getMeetingLocations()
    {
        $meetingId = $this->request->getVar('meetingId');
        if ($meetingId) {
            $data =   $this->MeetingLocationModel->getLocationList($meetingId);
            if ($data) {
                return $this->respond(['message' => 'found', 'data' => $data, 'status' => true], 200);
            } else {
                return $this->respond(['message' => 'Not found', 'status' => false], 404);
            }
        } else {
            return $this->respond(['message' => 'Bad request', 'status' => false], 400);
        }
    }

    /**
     * This function is used to updated meeting location if visited.
     *
     * @return object
     */
    public function updateVisitedLocation()
    {
        $meetingId = $this->request->getVar('id');
        if ($meetingId) {
            $data = ['is_visited' => true, 'updated_by' => $this->userid];

            $data =  $this->MeetingLocationModel->update($meetingId, $data);

            if ($data) {
                return $this->respond(['message' => 'Meeting location successfully updated.', 'data' => $data, 'status' => true], 200);
            } else {
                return $this->respond(['message' => 'Not found', 'status' => false], 404);
            }
        } else {
            return $this->respond(['message' => 'Bad request', 'status' => false], 400);
        }
    }
}
