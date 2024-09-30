<?php

namespace App\Models;

use CodeIgniter\Model;

class RolepermissionsModel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'role_permission_mapping';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = false;
    protected $allowedFields        = [];
  
   
    public function getPermissions($roleid)
    {
        $permissions =  $this->select(['featurename', 'is_access'])->join('permission_master', 'permission_master.id = role_permission_mapping.per_id')
        ->where('role_permission_mapping.role_id', $roleid)->get()->getResultArray();    
        
        $permissionArray = [];

        foreach($permissions as $permission) {
            $permissionArray[$permission['featurename']] = $permission['is_access'];
        }

        $permissions = json_decode(json_encode($permissionArray));

        // print_r('<pre>');
        // print_r($permissions);
        // print_r('</pre>');die;

        return $permissions;
    }

    public function getRolePermissions($roleid)
    {
        $permissionArray =  
        
        
        $this->db->table('role_permission_mapping')->select([
            'role_permission_mapping.id',
            'role_permission_mapping.role_id',
            'role_permission_mapping.per_id',
            'roles_master.role_name',
            'permission_master.featurename', 
            'role_permission_mapping.is_access'
        ])
        ->join('roles_master', 'roles_master.role_id = role_permission_mapping.role_id')
        ->join('permission_master', 'permission_master.id = role_permission_mapping.per_id')
        ->where('role_permission_mapping.role_id', $roleid)
        ->get()->getResultArray();    



        
        // $permissionArray = [];

        // foreach($permissions as $permission) {
        //     $permissionArray[$permission['featurename']] = $permission['is_access'];
        // }

        $permissions = json_decode(json_encode($permissionArray));

        // print_r('<pre>');
        // print_r($permissions);
        // print_r('</pre>');die;

        return $permissions;
    }

    public function updatePermission($id, $access) {

        $this->set('is_access', $access);
        return $this->where('id', $id)->update();

    }

}