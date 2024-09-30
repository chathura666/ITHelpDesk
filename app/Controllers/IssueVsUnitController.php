<?php

namespace App\Controllers;

use App\Models\IssuesModel;
use App\Models\IssuesUnitMapping;
use App\Models\UnitModel;



class IssueVsUnitController extends BaseController
{
    protected $issuevsunitmodel;

    protected $unitmodel;

    protected $issuemodel;

    public function __construct()
    {
        $this->issuevsunitmodel = new IssuesUnitMapping();
        $this->unitmodel = new UnitModel();
        $this->issuemodel = new IssuesModel();
    }

    public function getSelectedIssueVsUnit($id = false)
    {

        // var_dump($seg1);die;

        if ((int) $id > 0) {

            $data['editid'] = $this->issuevsunitmodel->search_by_id($id)['id'];
            $data['edituid'] = $this->issuevsunitmodel->search_by_id($id)['uid'];
            $data['editunitname'] = $this->unitmodel->search_by_id( $data['edituid'])['name'];
            $data['editissue_id'] = $this->issuevsunitmodel->search_by_id($id)['issue_id'];
            $data['editissuename'] = $this->issuemodel->search_by_id( $data['editissue_id'])['issue_description'];
            $data['editactive'] = $this->issuevsunitmodel->search_by_id($id)['active'];

            $data['issuevsunitlist'] = $this->issuevsunitmodel->getList();
            $data['unitlist'] = $this->unitmodel->getUnits();
            $data['issuelist'] = $this->issuemodel->getList();

            return view('IssueAssignView/EditIssueVsUnit', $data);
        } else {
            redirect('not_good_id_method', 'refresh'); //in case of not valid id
        }
    }


    public function getIssueVsUnitListToEdit()
    {
        $data['editissuevsunitlist'] = $this->issuevsunitmodel->getList();
        return view('IssueAssignView/EditIssueVsUnit', $data);
    }

    public function getIssueVsUnitList()
    {

        $data['issuevsunitlist'] = $this->issuevsunitmodel->getList();
        return view('IssueAssignView/ViewIssuesVsUnit', $data);

    }

    public function getIssueVsUnitListToAdd()
    {
        $data['issuevsunitlist'] = $this->issuevsunitmodel->getList();

        $data['issuevsunitlist'] = $this->issuevsunitmodel->getList();
        $data['unitlist'] = $this->unitmodel->getUnits();
        $data['issuelist'] = $this->issuemodel->getList();

        return view('IssueAssignView/AddIssueVsUnit', $data);

    }


    public function saveIssueVsUnit()
    {
        $issuedata = [
            "id" => trim($this->request->getVar('id')),
            "uid" => trim($this->request->getVar('uid')),
            "issue_id" => trim($this->request->getVar('issue_id')),
            "active" => trim($this->request->getVar('active'))
        ];

        
        $result = $this->issuevsunitmodel->save($issuedata);

        if ($result > 0) {
            return redirect()->to(base_url('issueVsUnit/view'));

        } else {
            var_dump("save error!");
        }

        die;
    }


    public function deleteSelectedIssueVsUnit($id)
    {


        $model = new IssuesUnitMapping(); // Replace with your actual model
        $model->where('id', $id)->delete();

        // Redirect to the roles page after deleting
        //$data['rolelist'] = $this->unitmodel->getRole();

        // return view('RoleManagementView/ViewRole', $data);
        return redirect()->to(base_url('issueVsUnit/view'));

    }

    public function searchAndUpdateIssueVsUnit()
    {

        if ($this->request->getPost()) {



            $id = $this->request->getPost('id');
            $issueDesc = $this->request->getPost('issue_description');
            $status = $this->request->getPost('status');

            //print("dfdf");
            //print($id);

            // Check if the ID and role name are provided
            if (!$id || !$issueDesc) {
                // Handle the case where ID or role name is not provided
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID or Issue Description');
            }

            // Create an instance of your model
            $issuevsunitmodel = new IssuesUnitMapping();

            // Search for the role
            $existingRole = $issuevsunitmodel->findIssue($id, $issueDesc);

            if (!$existingRole) {
                // Handle the case where the role is not found
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Issue not found');
            }

            $issuedata = [
                "id" => trim($this->request->getVar('id')),
                "issue_description" => trim($this->request->getVar('issue_description')),
                "status" => trim($this->request->getVar('status'))
            ];

            // Perform the update operation
            $affectedRows = $issuevsunitmodel->updateUnit($id, $issueDesc, $issuedata);

            if ($affectedRows > 0) {
                // Record updated successfully
                //$data['rolelist'] = $this->unitmodel->getUnits();

                return redirect()->to(base_url('issueVsUnit/view'));


                //return view('RoleManagementView/ViewRole', $data);
            } else {
                // No record was updated
                throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
            }

        }
    }



}

