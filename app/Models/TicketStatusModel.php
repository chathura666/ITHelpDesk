<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketStatusModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'ticket_status_master';
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

    public function getListByUser($id)
    {

        
        $array = array('created_by' => $id);
        return $this->where($array)->get()->getResult();
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