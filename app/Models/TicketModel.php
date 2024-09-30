<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'ticket_master';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = false;
    protected $allowedFields = [];

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        return $data;
    }

    public function getList()
    {
        $this->join('issue_base', 'ticket_master.issue_id = issue_base.id')
            ->join('user_master', 'ticket_master.assigned_to = user_master.id');
        return $this->select('ticket_master.*, issue_base.issue_description AS issue_description, user_master.user_name AS name')
            ->orderBy('id', 'desc')->get()->getResult();
    }

    public function getAdminList()
    {
        $this->join('issue_base', 'ticket_master.issue_id = issue_base.id')
            ->join('user_master', 'ticket_master.assigned_to = user_master.id');
        return $this->select('ticket_master.*, issue_base.issue_description AS issue_description, user_master.user_name AS name')
            ->orderBy('id', 'desc')->get()->getResult();
    }

    public function getBrList($id)
    {
        $this->join('issue_base', 'ticket_master.issue_id = issue_base.id')
            ->join('user_master', 'ticket_master.assigned_to = user_master.id');

        return $this->select('ticket_master.*, issue_base.issue_description AS issue_description, user_master.user_name AS name')
            ->where('created_by', $id)
            ->orderBy('id', 'desc')->get()->getResult();
    }


    public function getPersonalList($id)
    {
        $this->join('issue_base', 'ticket_master.issue_id = issue_base.id')
            ->join('user_master', 'ticket_master.assigned_to = user_master.id');

        return $this->select('ticket_master.*, issue_base.issue_description AS issue_description, user_master.user_name AS name')
            ->where('created_by', $id)
            ->orderBy('id', 'desc')->get()->getResult();
    }

    public function getDepartmentList($id)
    {
        $this->join('issue_base', 'ticket_master.issue_id = issue_base.id')
            ->join('user_master', 'ticket_master.assigned_to = user_master.id');

        return $this->select('ticket_master.*, issue_base.issue_description AS issue_description, user_master.user_name AS name')
            ->where('current_assigned_unit', $id)
            ->orderBy('id', 'desc')->get()->getResult();


    }

    public function getPersonalAssignedList($id)
    {
        $this->join('issue_base', 'ticket_master.issue_id = issue_base.id')
            ->join('user_master', 'ticket_master.assigned_to = user_master.id');

        return $this->select('ticket_master.*, issue_base.issue_description AS issue_description, user_master.user_name AS name')
            ->where('assigned_to', $id)
            ->orderBy('id', 'desc')->get()->getResult();
    }

    public function getUnitPendingList($id, $unit)
    {
        $this->join('issue_base', 'ticket_master.issue_id = issue_base.id')
            ->join('user_master', 'ticket_master.assigned_to = user_master.id');

        return $this->select('ticket_master.*, issue_base.issue_description AS issue_description, user_master.user_name AS name')
            ->where('assigned_to', $id)
            ->where('current_assigned_unit', $unit)
            ->orderBy('id', 'desc')->get()->getResult();
    }

    public function getApprovalPendingList($id, $unit)
    {
        $this->join('issue_base', 'ticket_master.issue_id = issue_base.id')
            ->join('user_master', 'ticket_master.assigned_to = user_master.id');

        return $this->select('ticket_master.*, issue_base.issue_description AS issue_description, user_master.user_name AS name')
            ->where('current_assigned_unit', $unit)
            ->where('ticket_master.status', $id)
            ->orderBy('id', 'desc')->get()->getResult();
    }




    public function getListByUser($id)
    {
        $this->join('issue_base', 'ticket_master.issue_id = issue_base.id');

        return $this->select('ticket_master.*, issue_base.issue_description AS issue_description')
            ->where('created_by', $id)
            ->orderBy('id', 'desc')->get()->getResult();

        //return $this->get()->getResult();

        // $array = array('created_by' => $id);
        // return $this->where($array)->get()->getResult();
    }

    public function getListByUnit($id)
    {

        echo "$id";
        $this->join('issue_base', 'ticket_master.issue_id = issue_base.id');

        return $this->select('ticket_master.*, issue_base.issue_description AS issue_description')
            ->where('current_assigned_unit', $id)
            ->orderBy('id', 'desc')->get()->getResult();

        //return $this->get()->getResult();

        // $array = array('created_by' => $id);
        // return $this->where($array)->get()->getResult();
    }


    public function getTicketCountByStatus($id, $status)
    {

        return $this->where('created_by', $id)
            ->where('status', $status)
            ->countAllResults();
    }

    public function getTicketAllCountByStatusAndUnit($id, $status)
    {

        return $this->where('current_assigned_unit', $id)
            ->where('status', $status)
            ->countAllResults();
    }

    public function getTicketAllCountByStatus($status)
    {

        return $this->where('status', $status)
            ->countAllResults();
    }


    public function getTicketRating()
    {

        $builder = $this->db->table('ticket_master');

        // Select the sum of the user_rating column where status is 1
        $builder->selectSum('user_rating', 'total_rating')->where('status', 3);

        // Execute the query and get the result
        $result = $builder->get()->getRow();

        // Access the total_rating
        $totalRating = $result->total_rating;

        return $totalRating;
    }



    public function getTicketCountByStatusandMonth($id, $status)
    {

        return $this->where('created_by', $id)
            ->where('status', $status)
            ->where('MONTH(created_on)', date('m'))
            ->where('YEAR(created_on)', date('Y'))
            ->countAllResults();
    }

    public function getTicketCountAllByStatusandMonthAndUnit($id, $status)
    {

        return $this->where('current_assigned_unit', $id)
            ->where('status', $status)
            ->where('MONTH(created_on)', date('m'))
            ->where('YEAR(created_on)', date('Y'))
            ->countAllResults();
    }


    public function getTicketCountMonthly()
    {

        $query = $this->select('YEAR(created_on) AS year, MONTH(created_on) AS month, COUNT(*) AS ticket_count')
            ->from('ticket_master')
            ->where('created_on >= DATE_SUB(CURDATE(), INTERVAL 5 MONTH)', NULL, FALSE)
            ->group_by('YEAR(created_on), MONTH(created_on)')
            ->order_by('YEAR(created_on) DESC, MONTH(created_on) DESC')
            ->get();

        $result = $query->result_array();

        print_r($result);
    }






    public function getLast()
    {
        return $this->orderBy('id', 'desc')->first();
    }



    public function savedata($data = [])
    {
        return $this->insert($data);
    }


    public function search_by_id($id)
    {

        return $this->where('id', $id)->first();
    }

    public function updateTicket($id, $data)
    {
        $builder = $this->db->table($this->table);
        $builder->where($this->primaryKey, $id);
        $builder->update($data);

        return $this->db->affectedRows();
    }


}