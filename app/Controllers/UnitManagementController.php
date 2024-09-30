<?php

namespace App\Controllers;

use App\Models\UnitModel;
use App\Models\LogUserActionsModel;



class UnitManagementController extends BaseController
{
    protected $unitmodel;
    protected $logactionmodel;

    public function __construct()
    {
        $this->unitmodel = new UnitModel();
        $this->logactionmodel = new LogUserActionsModel();
    }

    public function getselectedunit($id = false)
    {

        // var_dump($seg1);die;

        if ((int) $id > 0) {

            $data['editunitname'] = $this->unitmodel->search_by_id($id)['name'];
            $data['editunitid'] = $this->unitmodel->search_by_id($id)['id'];
            $data['editunitemail'] = $this->unitmodel->search_by_id($id)['email'];


            $data['unitlist'] = $this->unitmodel->getUnits();
            // print_r('<pre>');
            // print_r($data);
            // print_r('<pre>');die;
            return view('UnitManagementView/EditUnit', $data);
        } else {
            redirect('not_good_id_method', 'refresh'); //in case of not valid id
        }
    }


    public function getunitlisttoedit()
    {
        $data['editunitlist'] = $this->unitmodel->getUnits();
        // return view('firewallrequest/pendingrequestlist', $data);
        // print_r('<pre>');
        // print_r($data['rolelist']);
        // print_r('</pre>');die;
        return view('UnitManagementView/EditUnit', $data);
    }



    public function getunitlist()
    {

        $data['unitlist'] = $this->unitmodel->getUnits();
        return view('UnitManagementView/ViewUnit', $data);

    }

    public function getallunits()
    {

        $data['unitlist'] = $this->unitmodel->getUnits();
        if ($data > 0) {

            //$this->setUserActions('INSERT','Role Added - '.$this->request->getVar('rolename'));

            return json_encode(['status' => 'success', 'data' => $data]);

        } else {
            var_dump("save error!");
        }

    }



    public function getunitlisttoadd()
    {
        $data['unitlist'] = $this->unitmodel->getUnits();
        return view('UnitManagementView/AddUnit', $data);

    }


    public function save()
    {
        $unitdata = [
            "name" => trim($this->request->getVar('unitname')),
            "email" => trim($this->request->getVar('email'))
        ];


        $result = $this->unitmodel->saveUnit($unitdata);



        if ($result > 0) {
            //print($result);
            //return redirect()->to(base_url('unit/view'));
            return json_encode(['status' => 'success']);


        } else {
            //var_dump("save error!");
            return json_encode(['status' => 'Invalid ID or unit name']);
        }

        //die;
    }


    public function deleteselectedunit($id)
    {


        $model = new UnitModel(); // Replace with your actual model
        $model->where('id', $id)->delete();

        // Redirect to the roles page after deleting
        //$data['rolelist'] = $this->unitmodel->getRole();

        // return view('RoleManagementView/ViewRole', $data);
        return redirect()->to(base_url('unit/view'));

    }

    public function searchAndUpdate()
    {

        if ($this->request->getPost()) {



            $id = $this->request->getPost('unitid');
            $unitName = $this->request->getPost('unitname');
            $email = $this->request->getPost('unitemail');

            //print("dfdf");
            //print($id);

            // Check if the ID and role name are provided
            if (!$id || !$unitName) {
                // Handle the case where ID or role name is not provided

                //throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID or unit name');
                return json_encode(['status' => 'Invalid ID or unit name']);

            }

            // Create an instance of your model
            $unitModel = new UnitModel();

            // Search for the role
            $existingRole = $unitModel->findUnit($id);

            if (!$existingRole) {
                // Handle the case where the role is not found
                //throw new \CodeIgniter\Exceptions\PageNotFoundException('Unit not found');
                return json_encode(['status' => 'Unit not found']);
            }

            $unitdata = [
                "name" => trim($this->request->getVar('unitname')),
                "email" => trim($this->request->getVar('unitemail')),
                "updated_at" => date("Y-m-d")
            ];

            // Perform the update operation
            $affectedRows = $unitModel->updateUnit($id, $unitdata);

            if ($affectedRows > 0) {
                // Record updated successfully
                //$data['rolelist'] = $this->unitmodel->getUnits();

                // return redirect()->to(base_url('unit/view'));
                return json_encode(['status' => 'success']);


                //return view('RoleManagementView/ViewRole', $data);
            } else {
                // No record was updated
                // throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
                return json_encode(['status' => 'No record was updated']);
            }

        }
    }

    public function searchAndUpdateStatus()
    {

        if ($this->request->getPost()) {



            $id = $this->request->getPost('unitid');
            $unitStatus = $this->request->getPost('status');


            // Check if the ID and role name are provided
            if (!$id) {
                // Handle the case where ID or role name is not provided
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID');
            }

            // Create an instance of your model
            $unitModel = new UnitModel();

            // Search for the role
            $existingUnit = $unitModel->findUnit($id);

            if (!$existingUnit) {
                // Handle the case where the role is not found
                return json_encode(['status' => 'Unit not found']);
            }

            $roledata = [
                "status" => trim($unitStatus)
            ];

            // Perform the update operation
            $affectedRows = $unitModel->updateUnit($id, $roledata);

            if ($affectedRows > 0) {

                $this->setUserActions('UPDATE', 'Unit Status Updated - ' . $existingUnit['name']);

                return json_encode(['status' => 'success']);


                //return view('RoleManagementView/ViewRole', $data);
            } else {
                // No record was updated
                throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
            }

        }
    }

    public function setUserActions($action, $remark)
    {

        $userdata = [
            "action" => trim($action),
            "remark" => trim($remark),
            "done_by" => trim($_SESSION['username'])
        ];

        $result = $this->logactionmodel->saveaction($userdata);

        if ($result > 0) {

            return json_encode(['status' => 'success']);

        } else {
            var_dump("save error!");
        }
    }



}

