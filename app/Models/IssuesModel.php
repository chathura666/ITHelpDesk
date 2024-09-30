<?php

namespace App\Models;

use CodeIgniter\Model;



class IssuesModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'issue_base';
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
    	$array = array('status' => 1);
        return $this->where($array)->get()->getResult();
    }

    public function getHardwareIssueList()
    {
    	$array = array('issue_type' => 'Hardware');
        return $this->where($array)->get()->getResult();
    }

    public function getHardwareIssueListByType($id)
    {
        //print_r($id);
        return $this->where('issue_type', 'Hardware')
        ->where('hardware_type',(string)$id)            
        ->get()->getResult();  
    }

    public function getSoftwareIssueList()
    {
    	$array = array('issue_type' => 'Software');
        return $this->where($array)->get()->getResult();
    }


    public function savedata($data=[])
    {
        return $this->insert($data);
    }

    public function deletedata($id)
    {
        return $this->where('id', $id)->delete();
    }


    public function search_by_id($id){

        return $this->where('id',$id)->first();
     }

     public function updatebyId($id, $data) {
        $builder = $this->db->table($this->table);
        $builder->where($this->primaryKey, $id);
        $builder->update($data);

        return $this->db->affectedRows();
    }

    public function findIssue($id, $issueDesc) {
        return $this->where(['id' => $id])->first();
    }

    
}