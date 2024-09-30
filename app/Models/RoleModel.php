<?php

namespace App\Models;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'roles_master';
    protected $primaryKey           = 'role_id';
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

    public function getRole()
    {
        return $this->get()->getResult();
        // return $this->where('mng_apr',0)->get()->getResult();
        // print_r('<pre>');
        // print_r($this->where('mng_apr',0)->findAll());
        // print_r('</pre>');die;
    }



    public function getallRole()
    {
        $query = $this->get()->getResult();
        // return $this->where('mng_apr',0)->get()->getResult();
        // print_r('<pre>');
        // print_r($query);
        // print_r('</pre>');die;


		if (count($query) > 0) {

			$myarray = array();

			foreach ($query as $row1) {
				$myarray[$row1->role_id] = $row1->role_name;
			}
			return $myarray;
		}
		return false;
    }

    public function saveRole($data=[])
    {
        return $this->insert($data);
    }


    public function search_by_id($id){

        return $this->where('role_id',$id)->first();
     }

     public function updateRole($id,$data) {
        $builder = $this->db->table($this->table);
        $builder->where($this->primaryKey, $id);
        $builder->update($data);

        return $this->db->affectedRows();
    }

    public function findRole($id) {
        return $this->where(['role_id' => $id])->first();
    }

    
}