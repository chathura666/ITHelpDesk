<?php

namespace App\Controllers;

use App\Models\IssuesModel;
use App\Models\IssuesUnitMapping;



class IssueController extends BaseController
{
    protected $issuemodel;
    public function __construct()
    {
        $this->issuemodel = new IssuesModel();
        $this->issuevsunitmodel = new IssuesUnitMapping();
    }

    public function getselectedissue($id = false)
    {

        // var_dump($seg1);die;

        if ((int) $id > 0) {

            $data['editissueid'] = $this->issuemodel->search_by_id($id)['id'];
            $data['editissuetype'] = $this->issuemodel->search_by_id($id)['issue_type'];
            $data['editissuedesc'] = $this->issuemodel->search_by_id($id)['issue_description'];
            $data['editissuestatus'] = $this->issuemodel->search_by_id($id)['status'];

            $data['issuelist'] = $this->issuemodel->getList();

            return view('IssueView/EditIssue', $data);
        } else {
            redirect('not_good_id_method', 'refresh'); //in case of not valid id
        }
    }


    public function getissuelisttoedit()
    {
        $data['editissuelist'] = $this->issuemodel->getList();
        return view('IssueView/EditIssue', $data);
    }

    public function getissuelist()
    {

        $data['issuelist'] = $this->issuemodel->getList();
        return view('IssueView/ViewIssues', $data);

    }

    public function getissuelisttoadd()
    {
        $data['issuelist'] = $this->issuemodel->getList();
        return view('IssueView/AddIssue', $data);

    }


    public function saveissue()
    {
        $issuedata = [
            "id" => trim($this->request->getVar('id')),
            "issue_type" => trim($this->request->getVar('issue_type')),
            "issue_description" => trim($this->request->getVar('issue_description'))
        ];

        
        $result = $this->issuemodel->save($issuedata);

        if ($result > 0) {
            return redirect()->to(base_url('issue/view'));

        } else {
            var_dump("save error!");
        }

        die;
    }


    public function deleteselectedissue($id)
    {


        $model = new IssuesModel(); // Replace with your actual model
        $model->where('id', $id)->delete();

        // Redirect to the roles page after deleting
        //$data['rolelist'] = $this->unitmodel->getRole();

        // return view('RoleManagementView/ViewRole', $data);
        return redirect()->to(base_url('issue/view'));

    }

    public function gethardwareissues()
    {


        $data['issuelist'] =  $this->issuemodel->getHardwareIssueList();
        return $this->respond(['status' => 100, 'data' => $data]);

    }

    public function getsoftwareissues()
    {

        

        $data['issuelist'] =  $this->issuemodel->getHardwareIssueList();
        return $this->respond(['status' => 100, 'data' => $data]);

    }

    public function gethardwareissuesbytype()
    {

        $id = $this->request->getPost('hwtype');
        $data['issuelist'] =  $this->issuemodel->getHardwareIssueListByType($id);
        return $this->respond(['status' => 100, 'data' => $data]);

    }

    public function searchAndUpdate()
    {

        if ($this->request->getPost()) {



            $id = $this->request->getPost('id');
            $issuetype = $this->request->getPost('issue_type');
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
            $issuemodel = new IssuesModel();

            // Search for the role
            $existingRole = $issuemodel->findIssue($id, $issueDesc);

            if (!$existingRole) {
                // Handle the case where the role is not found
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Issue not found');
            }

            $issuedata = [
                "id" => trim($this->request->getVar('id')),
                "issue_type" => trim($this->request->getVar('issue_type')),
                "issue_description" => trim($this->request->getVar('issue_description')),
                "status" => trim($this->request->getVar('status'))
            ];

            // Perform the update operation
            $affectedRows = $issuemodel->updatebyId($id,$issuedata);

            if ($affectedRows > 0) {
                // Record updated successfully
                //$data['rolelist'] = $this->unitmodel->getUnits();

                return redirect()->to(base_url('issue/view'));


                //return view('RoleManagementView/ViewRole', $data);
            } else {
                // No record was updated
                throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
            }

        }
    }


}

