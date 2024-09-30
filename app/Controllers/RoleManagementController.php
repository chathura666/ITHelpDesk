<?php

namespace App\Controllers;

use App\Models\RoleModel;
use App\Models\RolepermissionsModel;
use App\Models\LogUserActionsModel;


class RoleManagementController extends BaseController
{
    protected $rolemodel;
    protected $logactionmodel;

    public function __construct()
    {
        $this->rolemodel = new RoleModel();
        $this->logactionmodel = new LogUserActionsModel();
    }
    public function updaterole()
    {
        $roledata = [
            "role_name" => trim($this->request->getVar('rolename'))
        ];

        $result = $this->rolemodel->saveRole($roledata);

        if ($result > 0) {
            var_dump("saved successfully");
        } else {
            var_dump("save error!");
        }

        die;
    }
    public function getselectedrole($roleid = false)
    {

        // var_dump($seg1);die;

        if ((int) $roleid > 0) {

            $data['editrolename'] = $this->rolemodel->search_by_id($roleid)['role_name'];
            $data['editroleid'] = $this->rolemodel->search_by_id($roleid)['role_id'];
            $data['edtrolelist'] = $this->rolemodel->getRole();
            // print_r('<pre>');
            // print_r($data);
            // print_r('<pre>');die;
            return view('RoleManagementView/EditRole', $data);
        } else {
            redirect('not_good_id_method', 'refresh'); //in case of not valid id
        }
    }

    public function getrolelisttoedit()
    {

        if(isset($_SESSION['role']))
        {
            if($_SESSION['role'] == 1)
            {
                $data['edtrolelist'] = $this->rolemodel->getRole();
            // return view('firewallrequest/pendingrequestlist', $data);
            // print_r('<pre>');
            // print_r($data['rolelist']);
            // print_r('</pre>');die;
            return view('RoleManagementView/EditRole', $data);
            }
            else
            {
                return redirect()->to(base_url('login'));

            }

        }
        


        
    }

    public function getrolelist()
    {

        $data['rolelist'] = $this->rolemodel->getRole();

        return view('RoleManagementView/ViewRole', $data);

    }

    public function getallroles()
    {

        $data['rolelist'] = $this->rolemodel->getRole();

        if ($data > 0) {

            //$this->setUserActions('INSERT','Role Added - '.$this->request->getVar('rolename'));

            return json_encode(['status' => 'success', 'data' => $data]);

        } else {
            var_dump("save error!");
        }

        return view('RoleManagementView/ViewRole', $data);

    }


    public function getrolelisttoadd()
    {

        $data['rolelist'] = $this->rolemodel->getRole();
        // return view('firewallrequest/pendingrequestlist', $data);
        // print_r('<pre>');
        // print_r($data['rolelist']);
        // print_r('</pre>');die;
        return view('RoleManagementView/AddRole', $data);

    }


    public function save()
    {
        $roledata = [
            "role_name" => trim($this->request->getVar('rolename'))
        ];

        $result = $this->rolemodel->saveRole($roledata);

        if ($result > 0) {

            $this->setUserActions('INSERT','Role Added - '.$this->request->getVar('rolename'));

            return json_encode(['status' => 'success']);

        } else {
            var_dump("save error!");
        }
    }


    public function deleteselectedrole($id)
    {


        $model = new RoleModel(); // Replace with your actual model
        $model->where('role_id', $id)->delete();

        // Redirect to the roles page after deleting
        $data['rolelist'] = $this->rolemodel->getRole();

        // return view('RoleManagementView/ViewRole', $data);
        return redirect()->to(base_url('role/view'));

    }

    public function searchAndUpdate()
    {

        if ($this->request->getPost()) {



            $id = $this->request->getPost('roleid');
            $roleName = $this->request->getPost('rolename');

            // Check if the ID and role name are provided
            if (!$id || !$roleName) {
                // Handle the case where ID or role name is not provided
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID or role name');
            }

            // Create an instance of your model
            $roleModel = new RoleModel();

            // Search for the role
            $existingRole = $roleModel->findRole($id);

            if (!$existingRole) {
                // Handle the case where the role is not found
                return json_encode(['status' => 'Role not found']);
                //throw new \CodeIgniter\Exceptions\PageNotFoundException('Role not found');
            }

            $roledata = [
                "role_name" => trim($this->request->getPost('rolename'))
            ];

            // Perform the update operation
            $affectedRows = $roleModel->updateRole($id, $roledata);

            if ($affectedRows > 0) {
                // Record updated successfully
                $this->setUserActions('UPDATE','Role Status Updated - '.$existingRole['role_name']);

                return json_encode(['status' => 'success']);


                //return view('RoleManagementView/ViewRole', $data);
            } else {
                // No record was updated
                throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
            }

        }
    }

    public function searchAndUpdateStatus()
    {

        if ($this->request->getPost()) {



            $id = $this->request->getPost('roleid');
            $roleStatus = $this->request->getPost('status');


            // Check if the ID and role name are provided
            if (!$id) {
                // Handle the case where ID or role name is not provided
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID');
            }

            // Create an instance of your model
            $roleModel = new RoleModel();

            // Search for the role
            $existingRole = $roleModel->findRole($id);

            if (!$existingRole) {
                // Handle the case where the role is not found
                return json_encode(['status' => 'User not found']);
            }

            $roledata = [
                "status" => trim($roleStatus)
            ];

            // Perform the update operation
            $affectedRows = $roleModel->updateRole($id,$roledata);

            if ($affectedRows > 0) {

                $this->setUserActions('UPDATE','Role Status Updated - '.$existingRole['role_name']);

                return json_encode(['status' => 'success']);


                //return view('RoleManagementView/ViewRole', $data);
            } else {
                // No record was updated
                throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
            }

        }
    }

    public function getrolegroupaccesslist($roleid)
    {
        $rolemodelaccess = new RolepermissionsModel();
        $data['role_list'] = $this->rolemodel->getallRole();
        $data['rolegrouplist'] = $rolemodelaccess->getRolePermissions($roleid);  
        $data['selectedroleid'] = $roleid;  
        // return view('firewallrequest/pendingrequestlist', $data);
        // print_r('<pre>');
        // print_r($data['rolegrouplist']);
        // print_r('</pre>');die;
        return view('RoleManagementView/RoleMapping', $data);

    }
    public function getrole(){
        // $data['rolelist'] = $this->rolemodel->getRole(); 
        $data['role_list'] = $this->rolemodel->getallRole();
            // print_r('<pre>');
            // print_r($data['role_list']);
            // print_r('</pre>');die;
        return view('RoleManagementView/RoleMapping', $data);
    }


    public function updaterolegroup()
    {

        $selectedRows = $this->request->getPost('update_rolegroup');

            print_r('<pre>');
            print_r($selectedRows);
            print_r('</pre>');die;

    }

    public function updatepermissions() {
        $permissionid = $this->request->getPost('id');
        $accesslevel = $this->request->getPost('acceess');

        $rolemodelaccess = new RolepermissionsModel();

        if ($rolemodelaccess->updatePermission($permissionid, $accesslevel)) {
            $status = 200;
            $message = 'Permission updated!';   
            $this->setUserActions('UPDATE','Role Mapping Updated ID- '.$permissionid.'- Level - '.$accesslevel);
        } else {
            $status = 500;
            $message = 'Permission cannot be updated!';
        }
        
        return $this->respond(['status' => $status, 'message' => $message]);
        
    }

    public function checkSession()
    {
        if (isset($_SESSION['user_id'])) {

            
            $id = $_SESSION['user_id'];
            return true;
        } else {
            echo "not found";
            return false;
        }
    }

    public function setUserActions($action,$remark)
    {

        $userdata = [
            "action" => trim($action),
            "remark" => trim($remark),
            "done_by" => trim($_SESSION['username'] )
        ];

        $result = $this->logactionmodel->saveaction($userdata);

        if ($result > 0) {

            return json_encode(['status' => 'success']);

        } else {
            var_dump("save error!");
        }
    }



}

