<?php

namespace App\Models;

use CodeIgniter\Model;

class MeetingModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'meetings';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['emp_id', 'lead_id', 'meeting_date', 'meeting_time', 'purpose', 'remark_after_meet', 'meeting_status', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by', 'deleted_at', 'deleted_by'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getMeetingList($userid = [])
    {
        $builder = $this->db->table($this->table);
        $builder->select('meetings.*, concat(employees.emp_first_name," ",employees.emp_last_name) as emp_name, concat(leads.first_name," ",leads.last_name,"-",leads.phone) as lead_name');
        $builder->select('meetingstatuses.title as meeting_status_title');
        $builder->join('employees', 'employees.id=meetings.emp_id', 'left');
        $builder->join('meetingstatuses', 'meetingstatuses.id=meetings.meeting_status', 'left');
        $builder->join('leads', 'leads.id=meetings.lead_id', 'left');
        $builder->orderBy('created_at', 'DESC');
        if ($userid) {
            $builder->where(['meetings.created_by' => $userid, 'meetings.status' => true]);
        } else {
            $builder->where(['meetings.status' => true]);
        }
        $query   = $builder->get();

        if ($query->getResult() > 0) {
            return $query->getResult();
        } else {
            return false;
        }
    }

    /**
     * get meeting details form db by meeting idf
     *
     * @param integer|null $meetingId
     * @return void
     */
    public function getMeetingById(int $meetingId = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('meetings.*, concat(employees.emp_first_name," ",employees.emp_last_name) as emp_name, concat(leads.first_name," ",leads.last_name,"-",leads.phone) as lead_name');
        $builder->join('employees', 'employees.id=meetings.emp_id', 'left');
        $builder->join('leads', 'leads.id=meetings.lead_id', 'left');
        $builder->orderBy('created_at', 'DESC');
        if ($meetingId) {
            $builder->where(['meetings.id' => $meetingId, 'meetings.status' => true]);
        } else {
            $builder->where(['meetings.status' => true]);
        }
        $query   = $builder->get();

        if ($query->getResult() > 0) {
            return $query->getRow();
        } else {
            return false;
        }
    }
}
