<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'log_notification_info';
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

    public function getAll()
    {
        return $this->get()->getResult();

    }

    public function getPesonalNotification($id)
    {
        return $this->where('mark_as_read', 0)
            ->where('created_by', $id)
            ->get()->getResult();
    }

    public function getAgentNotification($id)
    {
        return $this->where('mark_as_read_agent', 0)
            ->where('assigned_to', $id)
            ->get()->getResult();
    }

    public function getUnitNotification($id)
    {
        return $this->where('mark_as_read_dephead', 0)
            ->where('assigned_unit', $id)
            ->get()->getResult();
    }

    public function getPersonalNotificationsCount($id)
    {

        return $this
            ->where('mark_as_read', 0)
            ->where('created_by', $id)
            ->countAllResults();
    }

    public function getAgentNotificationsCount($id)
    {

        return $this
            ->where('mark_as_read_agent', 0)
            ->where('assigned_to', $id)
            ->countAllResults();
    }

    public function getUnitNotificationsCount($id)
    {

        return $this
            ->where('mark_as_read_dephead', 0)
            ->where('assigned_unit', $id)
            ->countAllResults();
    }

    public function updateTicket($id,$data)
    {
        $builder = $this->db->table($this->table);
        $builder->where($this->primaryKey, $id);
        $builder->update($data);

        return $this->db->affectedRows();
    }

    public function updateAllTicket($data,$id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('created_by', $id);
        $builder->update($data);

        return $this->db->affectedRows();
    }

    public function updateAllAgentTicket($data,$id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('assigned_to', $id);
        $builder->update($data);

        return $this->db->affectedRows();
    }

    public function updateAllUnitTicket($data,$id)
    {
        $builder = $this->db->table($this->table);
        $builder->where('assigned_unit', $id);
        $builder->update($data);

        return $this->db->affectedRows();
    }

    public function findticket($id)
    {
        return $this->where(['ticket_id' => $id])->first();
    }

    public function findbyID($id)
    {
        return $this->where(['id' => $id])->first();
    }


}