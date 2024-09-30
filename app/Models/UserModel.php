<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'user_master';
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

    public function getUsers()
    {
        return $this->get()->getResult();
    }

    public function getUserbyName($userName)
    {
        return $this->where(['user_name' => $userName])->first();
    }

    public function getUser($username)
    {
        //print_r($this->where('user_name', $username)->get()->getRow());
        return $this->where('user_name', $username)
            ->where('active', 1)
            ->get()->getRow();
    }

    public function getUserListByRole($rid)
    {
        return $this->where('role', $rid)
            ->where('active', 1)
            ->get()->getResult();
    }

    public function getAgents()
    {
        //print_r($this->where('user_name', $username)->get()->getRow());
        return $this->where('active', 1)
            ->get()->getRow();
    }


    public function saveUser($data = [])
    {
        return $this->insert($data);
    }


    public function search_by_id($id)
    {

        return $this->where('id', $id)->first();
    }

    public function updateUser($id, $data)
    {
        $builder = $this->db->table($this->table);
        $builder->where($this->primaryKey, $id);
        $builder->update($data);

        return $this->db->affectedRows();
    }

    public function findUser($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function findUserByUsername($id)
    {

        $this->join('units', 'user_master.primary_unit  = units.id');

        return $this->select('user_master.*, units.name AS name')
            ->where(['user_name' => $id])->first();
    }

    public function getUserAllCountByStatus($status)
    {

        return $this->where('active', $status)
            ->countAllResults();
    }

    public function getUserAllCount()
    {

        return $this->countAllResults();
    }


}