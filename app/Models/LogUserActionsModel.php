<?php

namespace App\Models;

use CodeIgniter\Model;

class LogUserActionsModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'log_user_actions';
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

    public function saveaction($data=[])
    {
        return $this->insert($data);
    }

}