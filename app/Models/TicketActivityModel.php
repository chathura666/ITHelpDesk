<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketActivityModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'ticket_activity';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = false;
    protected $allowedFields        = [];
  
   	protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data){
        return $data;
    }

    protected function beforeUpdate(array $data){
        return $data;
    }    

    public function getList()
    {
        return $this->get()->getResult();
    }

    public function getLast($id)
    {
        return $this->where('ticket_id', $id)
                    ->orderBy('status_changed_on', 'desc')->first();
    }

    public function getTickets($id)
    {

        return $this
        ->where('ticket_id', $id)
        ->countAllResults();
    }

    public function getAllDesc($id)
    {
        return $this->where('ticket_id', $id)
                    ->orderBy('last_modified', 'desc')->get()->getResult();
    }

    public function getListByUser($id)
    {

        
        $array = array('created_by' => $id);
        return $this->where($array)->get()->getResult();
    }

    public function getTicketCountByStatus($id,$status)
    {

        return $this->where('created_by', $id)
        ->where('status', $status)
        ->countAllResults();
    }

    public function getTicketCountByStatusandMonth($id,$status)
    {

        return $this->where('created_by', $id)
        ->where('status', $status)
        ->where('MONTH(created_on)', date('m'))
        ->where('YEAR(created_on)', date('Y'))
        ->countAllResults();
    }

    public function getJoinedDataDesc($id)
    {
        // Example of a join query
        $builder = $this->db->table('ticket_activity');
        $builder->select('*');
        $builder->join('ticket_master', 'ticket_master.id = ticket_activity.ticket_id');
        $builder->where('ticket_id', $id);
        $query = $builder->orderBy('last_modified', 'desc')->get();

        //print_r($query->getResult());
        return $query->getResult();
    }



    public function savedata($data=[])
    {
        return $this->insert($data);
    }


    public function search_by_id($id){

        return $this->where('id',$id)->first();
     }

     public function updateRole($id, $data) {
        $builder = $this->db->table($this->table);
        $builder->where($this->primaryKey, $id);
        $builder->update($data);

        return $this->db->affectedRows();
    }

    
}