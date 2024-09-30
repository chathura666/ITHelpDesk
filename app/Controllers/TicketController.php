<?php

namespace App\Controllers;


use App\Models\HardwareTypesModel;
use App\Models\HardwareBrandsModel;
use App\Models\HardwareModelsModel;
use App\Models\IssuesModel;
use App\Models\IssuesUnitMapping;
use App\Models\TicketModel;
use App\Models\PriorityModel;
use App\Models\TicketsAttachementModel;
use App\Models\TicketStatusModel;
use App\Models\UserModel;
use App\Models\TicketActivityModel;
use App\Models\UnitModel;
use App\Models\LogUserActionsModel;



class TicketController extends BaseController
{
    protected $hwtypemodel;
    protected $hwmodelsmodel;
    protected $hwbrandmodel;
    protected $issuemodel;
    protected $ticketmodel;
    protected $prioirtymodel;
    protected $ticketstatusmodel;
    protected $usermodel;
    protected $ticketactivitymodel;
    protected $unitmodel;
    protected $issueMapping;
    protected $logactionmodel;
    protected $ticketattachement;

    public function __construct()
    {
        $this->hwtypemodel = new HardwareTypesModel();
        $this->hwmodelsmodel = new HardwareModelsModel();
        $this->hwbrandmodel = new HardwareBrandsModel();
        $this->issuemodel = new IssuesModel();
        $this->ticketmodel = new TicketModel();
        $this->prioirtymodel = new PriorityModel();
        $this->ticketstatusmodel = new TicketStatusModel();
        $this->usermodel = new UserModel();
        $this->ticketactivitymodel = new TicketActivityModel();
        $this->unitmodel = new UnitModel();
        $this->issueMapping = new IssuesUnitMapping;
        $this->logactionmodel = new LogUserActionsModel();
        $this->ticketattachement = new TicketsAttachementModel();


    }


    public function getticketlisttoadd()
    {


        if (isset ($_SESSION['user_id'])) {
            $data['typelist'] = $this->hwtypemodel->getList();
            $data['modellist'] = $this->hwmodelsmodel->getList();
            $data['brandlist'] = $this->hwbrandmodel->getList();
            $data['issuelist'] = $this->issuemodel->getList();
            //print_r($data);
            return view('TicketView/AddNewTicket', $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }


    public function getallticketlist()
    {


        if (isset ($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];

            if (isset ($_SESSION['role']) && $_SESSION['role'] === "1") {
                $data['ticketlist'] = $this->ticketmodel->getAdminList();
                return view('TicketView/AllTickets', $data);
            }

            if (isset ($_SESSION['role']) && $_SESSION['role'] === "2") {
                $data['ticketlist'] = $this->ticketmodel->getPersonalList($id);
                return view('TicketView/ViewPersonalTickets', $data);
            }

            if (isset ($_SESSION['role']) && $_SESSION['role'] === "3") {
                $branch = $_SESSION['branch'];
                $data['ticketlist'] = $this->ticketmodel->getDepartmentList($branch);
                return view('TicketView/AllTickets', $data);
            }

            if (isset ($_SESSION['role']) && $_SESSION['role'] === "4") {
                $branch = $_SESSION['branch'];

                $data['ticketlist'] = $this->ticketmodel->getDepartmentList($branch);
                return view('TicketView/AllTickets', $data);
            }

            if (isset ($_SESSION['role']) && $_SESSION['role'] === "5") {
                $branch = $_SESSION['branch'];

                $data['ticketlist'] = $this->ticketmodel->getDepartmentList($branch);
                return view('TicketView/AllTickets', $data);
            }

        } else {
            return redirect()->to(base_url('login'));
        }



    }

    public function manageticketlist()
    {

        //echo "ddd";

        if (isset ($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            //print_r($id);
            //$data['ticketlist'] = $this->ticketmodel->getList();
            //print_r($data['ticketlist']);
            return view('TicketView/EditTickets');
        } else {
            return redirect()->to(base_url('login'));
        }



    }

    public function getpersonalticketlist()
    {
        if (isset ($_SESSION['user_id'])) {
            $id = $_SESSION['user_id'];
            //print_r($id);
            $data['ticketlist'] = $this->ticketmodel->getListByUser($id);
            //print_r($data['ticketlist']);
            return view('TicketView/ViewPersonalTickets', $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function getallticketlistunitwise($id = false)
    {
        if (isset ($_SESSION['user_id'])) {
            //$id = $_SESSION['user_id'];
            //print_r($id);
            $data['ticketlist'] = $this->ticketmodel->getListByUnit($id);
            //print_r($data['ticketlist']);
            return view('TicketView/ViewUnitTickets', $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }




    public function getunitpending($id = false)
    {
        if (isset ($_SESSION['user_id'])) {

            $branch = $_SESSION['branch'];

            $data['ticketlist'] = $this->ticketmodel->getUnitPendingList(2, $branch);
            //print_r($data['ticketlist']);
            return view('TicketView/PendingTickets', $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function getapprovalpending($id = false)
    {
        if (isset ($_SESSION['user_id'])) {

            $branch = $_SESSION['branch'];

            //print_r($branch);

            $data['ticketlist'] = $this->ticketmodel->getApprovalPendingList(5, $branch);
            //print_r($data['ticketlist']);
            return view('TicketView/PendingApprovals', $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }



    public function getagentticketlist($id = false)
    {
        if (isset ($_SESSION['user_id'])) {

            $data['ticketlist'] = $this->ticketmodel->getPersonalAssignedList($id);
            //print_r($data['ticketlist']);
            return view('TicketView/AllTickets', $data);
        } else {
            return redirect()->to(base_url('login'));
        }
    }




    public function startRemoteSession($id = false)
    {

        $remoteComputer = escapeshellarg($id);

        $output = exec("msra.exe /offerRA $remoteComputer");

    }

    public function getsearchedticket($id = false)
    {

        //var_dump($id);

        if (isset ($_SESSION['user_id'])) {
            if ((int) $id > 0) {

                $ticket = $this->ticketmodel->search_by_id($id);

                if ($ticket) {
                    $data['editticketid'] = $this->ticketmodel->search_by_id($id)['id'];
                    $data['editticketbranch'] = $this->ticketmodel->search_by_id($id)['branch'];
                    $data['editticketpf_number'] = $this->ticketmodel->search_by_id($id)['pf_number'];
                    $data['editticketname'] = $this->ticketmodel->search_by_id($id)['name'];
                    $data['editticketcontact_no'] = $this->ticketmodel->search_by_id($id)['contact_no'];
                    $data['editticketincedent_category'] = $this->ticketmodel->search_by_id($id)['incedent_category'];
                    $data['editticketissue_id'] = $this->ticketmodel->search_by_id($id)['issue_id'];
                    $data['edittickethardware_type_id'] = $this->ticketmodel->search_by_id($id)['hardware_type_id'];
                    $data['edittickethardware_brand_id'] = $this->ticketmodel->search_by_id($id)['hardware_brand_id'];
                    $data['edittickethardware_model_id'] = $this->ticketmodel->search_by_id($id)['hardware_model_id'];
                    $data['editticketip_address'] = $this->ticketmodel->search_by_id($id)['ip_address'];
                    $data['editticketcontent'] = $this->ticketmodel->search_by_id($id)['content'];
                    $data['editticketpriority'] = $this->ticketmodel->search_by_id($id)['priority'];
                    $data['editticketcreated_on'] = $this->ticketmodel->search_by_id($id)['created_on'];
                    $data['editticketcreated_by'] = $this->ticketmodel->search_by_id($id)['created_by'];
                    $data['editticketstatus'] = $this->ticketmodel->search_by_id($id)['status'];
                    $data['editticketmodified_on'] = $this->ticketmodel->search_by_id($id)['modified_on'];
                    $data['editticketassigned_to'] = $this->ticketmodel->search_by_id($id)['assigned_to'];
                    $data['editticketmodified_by'] = $this->ticketmodel->search_by_id($id)['modified_by'];
                    $data['editticketcurrent_assigned_unit'] = $this->ticketmodel->search_by_id($id)['current_assigned_unit'];
                    $data['editticketuser_rating'] = $this->ticketmodel->search_by_id($id)['user_rating'];

                    $data['editticketissue_description'] = $this->issuemodel->search_by_id($data['editticketissue_id'])['issue_description'];
                    $data['edittickethardware_name'] = $this->hwtypemodel->search_by_id($data['edittickethardware_type_id'])['hardware_name'];
                    $data['editticketbrand_name'] = $this->hwbrandmodel->search_by_id($data['edittickethardware_brand_id'])['brand_name'];
                    $data['editticketmodel_name'] = $this->hwmodelsmodel->search_by_id($data['edittickethardware_model_id'])['model_name'];
                    $data['editticketpriority_name'] = $this->prioirtymodel->search_by_id($data['editticketpriority'])['prioirty_name'];
                    $data['editticketstatusdescription'] = $this->ticketstatusmodel->search_by_id($data['editticketstatus'])['description'];
                    $data['editticketuser_name'] = $this->usermodel->search_by_id($data['editticketcreated_by'])['user_name'];
                    $data['editticket_assignedtoname'] = $this->usermodel->search_by_id($data['editticketassigned_to'])['user_name'];
                    $data['editticket_assignedtounitname'] = $this->unitmodel->search_by_id($data['editticketcurrent_assigned_unit'])['name'];

                    $remarkVal = $this->ticketactivitymodel->getLast($data['editticketid']);
                    if ($remarkVal) {
                        $data['editticket_remarks'] = $remarkVal['remarks'];
                    }

                    //$data['editticket_remarks'] = $this->ticketactivitymodel->getLast($data['editticketid'])['remarks'];

                    $data['activitylist'] = $this->ticketactivitymodel->getAllDesc($data['editticketid']);

                    $data['activitylistuserdata'] = $this->ticketactivitymodel->getJoinedDataDesc($data['editticketid']);

                    $data['typelist'] = $this->hwtypemodel->getList();
                    $data['modellist'] = $this->hwmodelsmodel->getList();
                    $data['brandlist'] = $this->hwbrandmodel->getList();
                    $data['issuelist'] = $this->issuemodel->getList();
                    $data['ticketlist'] = $this->ticketmodel->getList();

                    $mysqlDatetime = $data['editticketmodified_on'];
                    $shortDate = date("Y-m-d H:i", strtotime($mysqlDatetime));
                    $data['editticket_last_modifiedshort'] = $shortDate;

                    $mysqlDatetime = $data['editticketcreated_on'];
                    $shortDate = date("Y-m-d H:i", strtotime($mysqlDatetime));
                    $data['editticket_created_onshort'] = $shortDate;

                    $findfile = $this->ticketattachement->search_by_id($data['editticketid']);
                    //$data['attachment'] = [];
                    if ($findfile) {
                        $data['attachment'] = $this->ticketattachement->search_by_id($data['editticketid'])['path'];
                    }




                    return json_encode(['status' => 'success', 'data' => $data]);
                } else {

                    $data = [];
                    return json_encode(['status' => 'Ticket not found']);
                }


            } else {
                redirect('not_good_id_method', 'refresh'); //in case of not valid id
            }
        } else {
            return redirect()->to(base_url('login'));
        }

    }


    public function tickethistory($id = false)
    {

        //var_dump($id);

        if (isset ($_SESSION['user_id'])) {
            if ((int) $id > 0) {


                $data['editticketid'] = $this->ticketmodel->search_by_id($id)['id'];

                $data['activitylist'] = $this->ticketactivitymodel->getAllDesc($data['editticketid']);

                $data['activitylistuserdata'] = $this->ticketactivitymodel->getJoinedDataDesc($data['editticketid']);

                return view('TicketView/TicketHistory', $data);
            } else {
                redirect('not_good_id_method', 'refresh'); //in case of not valid id
            }
        } else {
            return redirect()->to(base_url('login'));
        }

    }


    public function ticketStatusList($id = false)
    {

        //var_dump($id);

        if (isset ($_SESSION['user_id'])) {



            $data['statuslist'] = $this->ticketstatusmodel->getList();

            //print_r($data);
            $data['ticketid'] = $id;

            return view('TicketView/TicketStatus', $data);

        } else {
            return redirect()->to(base_url('login'));
        }

    }

    public function ticketAssignList($id = false)
    {
        if (isset ($_SESSION['user_id'])) {

            $data['userslist'] = $this->usermodel->getUserListByRole(4);
            $data['ticketid'] = $id;
            //print_r($data);
            return view('TicketView/TicketAssign', $data);

        } else {
            return redirect()->to(base_url('login'));
        }

    }

    public function ticketTransferList($id = false)
    {

        //var_dump($id);

        if (isset ($_SESSION['user_id'])) {



            $data['unitslist'] = $this->unitmodel->getUnits();

            //print_r($data);
            $data['ticketid'] = $id;

            return view('TicketView/TicketTransfer', $data);

        } else {
            return redirect()->to(base_url('login'));
        }

    }



    public function getselecteticket($id = false)
    {

        //var_dump($id);

        if (isset ($_SESSION['user_id'])) {
            if ((int) $id > 0) {

                $ticket = $this->ticketmodel->search_by_id($id);

                if ($ticket) {
                    $data['editticketid'] = $this->ticketmodel->search_by_id($id)['id'];
                    $data['editticketbranch'] = $this->ticketmodel->search_by_id($id)['branch'];
                    $data['editticketpf_number'] = $this->ticketmodel->search_by_id($id)['pf_number'];
                    $data['editticketname'] = $this->ticketmodel->search_by_id($id)['name'];
                    $data['editticketcontact_no'] = $this->ticketmodel->search_by_id($id)['contact_no'];
                    $data['editticketincedent_category'] = $this->ticketmodel->search_by_id($id)['incedent_category'];
                    $data['editticketissue_id'] = $this->ticketmodel->search_by_id($id)['issue_id'];
                    $data['edittickethardware_type_id'] = $this->ticketmodel->search_by_id($id)['hardware_type_id'];
                    $data['edittickethardware_brand_id'] = $this->ticketmodel->search_by_id($id)['hardware_brand_id'];
                    $data['edittickethardware_model_id'] = $this->ticketmodel->search_by_id($id)['hardware_model_id'];
                    $data['editticketip_address'] = $this->ticketmodel->search_by_id($id)['ip_address'];
                    $data['editticketcontent'] = $this->ticketmodel->search_by_id($id)['content'];
                    $data['editticketpriority'] = $this->ticketmodel->search_by_id($id)['priority'];
                    $data['editticketcreated_on'] = $this->ticketmodel->search_by_id($id)['created_on'];
                    $data['editticketcreated_by'] = $this->ticketmodel->search_by_id($id)['created_by'];
                    $data['editticketstatus'] = $this->ticketmodel->search_by_id($id)['status'];
                    $data['editticketmodified_on'] = $this->ticketmodel->search_by_id($id)['modified_on'];
                    $data['editticketassigned_to'] = $this->ticketmodel->search_by_id($id)['assigned_to'];
                    $data['editticketmodified_by'] = $this->ticketmodel->search_by_id($id)['modified_by'];
                    $data['editticketcurrent_assigned_unit'] = $this->ticketmodel->search_by_id($id)['current_assigned_unit'];
                    $data['editticketuser_rating'] = $this->ticketmodel->search_by_id($id)['user_rating'];

                    $data['editticketissue_description'] = $this->issuemodel->search_by_id($data['editticketissue_id'])['issue_description'];
                    $data['edittickethardware_name'] = $this->hwtypemodel->search_by_id($data['edittickethardware_type_id'])['hardware_name'];
                    $data['editticketbrand_name'] = $this->hwbrandmodel->search_by_id($data['edittickethardware_brand_id'])['brand_name'];
                    $data['editticketmodel_name'] = $this->hwmodelsmodel->search_by_id($data['edittickethardware_model_id'])['model_name'];
                    $data['editticketpriority_name'] = $this->prioirtymodel->search_by_id($data['editticketpriority'])['prioirty_name'];
                    $data['editticketstatusdescription'] = $this->ticketstatusmodel->search_by_id($data['editticketstatus'])['description'];
                    $data['editticketuser_name'] = $this->usermodel->search_by_id($data['editticketcreated_by'])['user_name'];
                    $data['editticket_assignedtoname'] = $this->usermodel->search_by_id($data['editticketassigned_to'])['user_name'];
                    $data['editticket_assignedtounitname'] = $this->unitmodel->search_by_id($data['editticketcurrent_assigned_unit'])['name'];

                    $remarkVal = $this->ticketactivitymodel->getLast($data['editticketid']);
                    if ($remarkVal) {
                        $data['editticket_remarks'] = $remarkVal['remarks'];
                    }

                    $data['activitylist'] = $this->ticketactivitymodel->getAllDesc($data['editticketid']);

                    $data['activitylistuserdata'] = $this->ticketactivitymodel->getJoinedDataDesc($data['editticketid']);

                    $data['typelist'] = $this->hwtypemodel->getList();
                    $data['modellist'] = $this->hwmodelsmodel->getList();
                    $data['brandlist'] = $this->hwbrandmodel->getList();
                    $data['issuelist'] = $this->issuemodel->getList();
                    $data['ticketlist'] = $this->ticketmodel->getList();

                    $mysqlDatetime = $data['editticketmodified_on'];
                    $shortDate = date("Y-m-d H:i", strtotime($mysqlDatetime));
                    $data['editticket_last_modifiedshort'] = $shortDate;

                    $mysqlDatetime = $data['editticketcreated_on'];
                    $shortDate = date("Y-m-d H:i", strtotime($mysqlDatetime));
                    $data['editticket_created_onshort'] = $shortDate;

                    //print_r($data['editticketid']);

                    $findfile = $this->ticketattachement->search_by_id($data['editticketid']);
                    //$data['attachment'] = [];
                    if ($findfile) {
                        $data['attachment'] = $this->ticketattachement->search_by_id($data['editticketid'])['path'];
                    }
                    //print_r($data['attachment']);

                    return view('TicketView/TicketDetails', $data);
                } else {

                    $data = [];
                    redirect('ticket not found', 'refresh');
                }


            } else {
                redirect('not_good_id_method', 'refresh'); //in case of not valid id
            }
        } else {
            return redirect()->to(base_url('login'));
        }

    }

    public function getselectedtickettoedit($id = false)
    {

        if (isset ($_SESSION['user_id'])) {
            if ((int) $id > 0) {

                $data['editticketid'] = $this->ticketmodel->search_by_id($id)['id'];
                $data['editticketbranch'] = $this->ticketmodel->search_by_id($id)['branch'];
                $data['editticketpf_number'] = $this->ticketmodel->search_by_id($id)['pf_number'];
                $data['editticketname'] = $this->ticketmodel->search_by_id($id)['name'];
                $data['editticketcontact_no'] = $this->ticketmodel->search_by_id($id)['contact_no'];
                $data['editticketincedent_category'] = $this->ticketmodel->search_by_id($id)['incedent_category'];
                $data['editticketissue_id'] = $this->ticketmodel->search_by_id($id)['issue_id'];
                $data['edittickethardware_type_id'] = $this->ticketmodel->search_by_id($id)['hardware_type_id'];
                $data['edittickethardware_brand_id'] = $this->ticketmodel->search_by_id($id)['hardware_brand_id'];
                $data['edittickethardware_model_id'] = $this->ticketmodel->search_by_id($id)['hardware_model_id'];
                $data['editticketip_address'] = $this->ticketmodel->search_by_id($id)['ip_address'];
                $data['editticketcontent'] = $this->ticketmodel->search_by_id($id)['content'];
                $data['editticketpriority'] = $this->ticketmodel->search_by_id($id)['priority'];
                $data['editticketcreated_on'] = $this->ticketmodel->search_by_id($id)['created_on'];
                $data['editticketcreated_by'] = $this->ticketmodel->search_by_id($id)['created_by'];
                $data['editticketstatus'] = $this->ticketmodel->search_by_id($id)['status'];
                $data['editticketmodified_on'] = $this->ticketmodel->search_by_id($id)['modified_on'];
                $data['editticketassigned_to'] = $this->ticketmodel->search_by_id($id)['assigned_to'];
                $data['editticketmodified_by'] = $this->ticketmodel->search_by_id($id)['modified_by'];
                $data['editticketcurrent_assigned_unit'] = $this->ticketmodel->search_by_id($id)['current_assigned_unit'];
                $data['editticketuser_rating'] = $this->ticketmodel->search_by_id($id)['user_rating'];

                $data['editticketissue_description'] = $this->issuemodel->search_by_id($data['editticketissue_id'])['issue_description'];
                $data['edittickethardware_name'] = $this->hwtypemodel->search_by_id($data['edittickethardware_type_id'])['hardware_name'];
                $data['editticketbrand_name'] = $this->hwbrandmodel->search_by_id($data['edittickethardware_brand_id'])['brand_name'];
                $data['editticketmodel_name'] = $this->hwmodelsmodel->search_by_id($data['edittickethardware_model_id'])['model_name'];
                $data['editticketpriority_name'] = $this->prioirtymodel->search_by_id($data['editticketpriority'])['prioirty_name'];
                $data['editticketstatusdescription'] = $this->ticketstatusmodel->search_by_id($data['editticketstatus'])['description'];
                $data['editticketuser_name'] = $this->usermodel->search_by_id($data['editticketcreated_by'])['user_name'];
                $data['editticket_assignedtoname'] = $this->usermodel->search_by_id($data['editticketassigned_to'])['user_name'];
                $data['editticket_assignedtounitname'] = $this->unitmodel->search_by_id($data['editticketcurrent_assigned_unit'])['name'];

                $remarkVal = $this->ticketactivitymodel->getLast($data['editticketid']);
                if ($remarkVal) {
                    $data['editticket_remarks'] = $remarkVal['remarks'];
                }
                $data['activitylist'] = $this->ticketactivitymodel->getAllDesc($data['editticketid']);

                $data['activitylistuserdata'] = $this->ticketactivitymodel->getJoinedDataDesc($data['editticketid']);

                $data['typelist'] = $this->hwtypemodel->getList();
                $data['modellist'] = $this->hwmodelsmodel->getList();
                $data['brandlist'] = $this->hwbrandmodel->getList();
                $data['issuelist'] = $this->issuemodel->getList();
                $data['ticketlist'] = $this->ticketmodel->getList();

                $mysqlDatetime = $data['editticketmodified_on'];
                $shortDate = date("Y-m-d H:i", strtotime($mysqlDatetime));
                $data['editticket_last_modifiedshort'] = $shortDate;

                $mysqlDatetime = $data['editticketcreated_on'];
                $shortDate = date("Y-m-d H:i", strtotime($mysqlDatetime));
                $data['editticket_created_onshort'] = $shortDate;

                return view('TicketView/EditTicketsPersonal', $data);
            } else {
                redirect('not_good_id_method', 'refresh'); //in case of not valid id
            }
        } else {
            return redirect()->to(base_url('login'));
        }

    }






    public function saveticket()
    {

        if (isset ($_SESSION['user_id'])) {

            $unitVal = $this->issueMapping->getUnitbyIssue(trim($this->request->getVar('issuelistdropdown')));
            //print_r($unitVal['uid']);

            //print_r($unitVal);

            if (!$unitVal) {

                //return redirect()->to(base_url('/ticket/personalview'));
                return json_encode(['status' => 'issue unit mapping not found']);


            } else {


                $ticketdata = [
                    "pf_number" => trim($this->request->getVar('pfno')),
                    "name" => trim($this->request->getVar('name')),
                    "contact_no" => trim($this->request->getVar('contact')),
                    "branch" => trim($this->request->getVar('branch')),
                    "incedent_category" => trim($this->request->getVar('changetype')),
                    "hardware_type_id" => trim($this->request->getVar('hwtypedropdown')),
                    "hardware_brand_id" => trim($this->request->getVar('hwbranddropdown')),
                    "hardware_model_id" => trim($this->request->getVar('hwmodeldropdown')),
                    "issue_id" => trim($this->request->getVar('issuelistdropdown')),
                    "ip_address" => trim($this->request->getVar('ipAdd')),
                    "priority" => trim($this->request->getVar('priority')),
                    "content" => trim($this->request->getVar('explanation')),
                    "status " => 1,
                    "created_by" => $_SESSION['user_id'],
                    "created_on" => gmdate("Y-m-d H:i"),
                    "current_assigned_unit" => $unitVal['uid']
                ];






                $result = $this->ticketmodel->savedata($ticketdata);

                $data['lastrecord'] = $this->ticketmodel->getLast();

                // $ticketactivitydata = [
                //     "assigned_unit_id" => $unitVal['uid'],
                //     "ticket_id " => trim($data['lastrecord']['id']),
                //     "status" => 1,
                //     "status_changed_on" => gmdate("Y-m-d H:i"),
                //     "last_modified" => gmdate("Y-m-d H:i")
                // ];

                //$result2 = $this->ticketactivitymodel->savedata($ticketactivitydata);

                //var_dump($result);

                if ($result > 0) {

                    $tempFilePath = $this->request->getPost('filename');


                    $ticketattachementdata = [
                        "ticket_form_id" => $data['lastrecord']['id'],
                        "name" => 'Attachement_' . $data['lastrecord']['id'],
                        "path" => $tempFilePath
                    ];

                    $resultattach = $this->ticketattachement->savedata($ticketattachementdata);



                    //return redirect()->to(base_url('/ticket/personalview'));
                    return json_encode(['status' => 'success', 'ticket_no' => $data['lastrecord']['id']]);




                } else {
                    var_dump("save error!");
                }

            }

        } else {
            return redirect()->to(base_url('login'));
        }

    }


    public function fileupload()
    {
        // Check if the form was submitted
        if ($this->request->getMethod() === 'post') {


            $input = $this->validate([
                'file' => 'uploaded[file]|max_size[file,1024]'
            ]);

            $filename = '';
            $filepath = '';
            $filetype = '';
            $status = 400;

            if ($input) {
                $file = $this->request->getFile('file');

                $filename = $file->getRandomName();
                $filepath = WRITEPATH . 'uploads/temp';
                $filetype = explode('/', $file->getMimeType())[0];
                $filesize = $file->getSizeByUnit('mb');
                $fileextn = $file->guessExtension();

                $file->move($filepath, $filename);

                $status = "success";

            } else {
                $status = 400;
            }

            $this->response->setJSON([
                'status' => 200,
                'redirect' => '',
                'messages' => '',
                'data' => [
                    'status' => $status,
                    'filename' => $filename,
                    'filetype' => $filetype,
                    'filepath' => $filepath,
                    'filesize' => $filesize,
                    'fileextn' => $fileextn,
                ]
            ]);

            return $this->response;



            // echo $file;

            // // Check if the file is valid
            // if ($file->isValid() && !$file->hasMoved()) {
            //     // Move the file to the writable/uploads directory
            //     $file->move(ROOTPATH . 'writable/uploads');

            //     // Get the uploaded file's name
            //     $fileName = $file->getName();

            //     print_r($fileName);

            //     // Perform further actions, e.g., save file name to database

            //     //return "File uploaded successfully: $fileName";
            // } else {
            //     //return $file->getErrorString();
            // }
        }

        //return redirect()->to(base_url('upload'));
    }


    public function searchAndUpdate()
    {

        if ($this->checkSession()) {
            if ($this->request->getPost()) {

                $id = $this->request->getPost('ticketid');
                $mobile = trim($this->request->getVar('mobile'));
                $priority = trim($this->request->getVar('priority'));
                $status = trim($this->request->getVar('status'));
                $ipaddress = trim($this->request->getVar('ipaddress'));
                $details = trim($this->request->getVar('content'));

                if (!$id) {

                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID');
                }


                $ticketmodel = new TicketModel();


                $existingTicket = $ticketmodel->search_by_id($id);

                if (!$existingTicket) {

                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Ticket not found');
                }

                $ticketData = [
                    "contact_no" => $mobile,
                    "priority" => $priority,
                    "status" => $status,
                    "ip_address" => $ipaddress,
                    "content" => $details
                ];

                $affectedRows = $ticketmodel->updateTicket($id, $ticketData);

                if ($affectedRows > 0) {

                    $this->setUserActions('UPDATE', 'Ticket Updated - Status: ' . $status . ' Priority: ' . $priority);
                    $_SESSION['user_avatar'] = $this->request->getVar('avatar');
                    return json_encode(['status' => 'success']);

                } else {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
                }

            }
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function searchAndUpdateStatus()
    {

        if ($this->checkSession()) {
            if ($this->request->getPost()) {



                $id = $this->request->getPost('ticketid');
                $status = trim($this->request->getVar('status'));
                $modifiedid = $_SESSION['user_id'];

                if (!$id) {

                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID');
                }


                $ticketmodel = new TicketModel();


                $existingTicket = $ticketmodel->search_by_id($id);

                if (!$existingTicket) {

                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Ticket not found');
                }

                $ticketData = [
                    "status" => $status,
                    "modified_by" => $modifiedid
                ];

                $affectedRows = $ticketmodel->updateTicket($id, $ticketData);

                if ($affectedRows > 0) {

                    $this->setUserActions('UPDATE', 'Ticket Updated - Status: ' . $status);
                    return json_encode(['status' => 'success']);

                } else {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
                }

            }
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function searchAndUpdateAgent()
    {

        if ($this->checkSession()) {
            if ($this->request->getPost()) {



                $id = $this->request->getPost('ticketid');
                $agent = trim($this->request->getVar('agent'));
                $modifiedid = $_SESSION['user_id'];

                if (!$id) {

                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID');
                }


                $ticketmodel = new TicketModel();


                $existingTicket = $ticketmodel->search_by_id($id);

                if (!$existingTicket) {

                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Ticket not found');
                }

                $ticketData = [
                    "assigned_to" => $agent,
                    "modified_by" => $modifiedid
                ];

                $affectedRows = $ticketmodel->updateTicket($id, $ticketData);

                if ($affectedRows > 0) {

                    $this->setUserActions('UPDATE', 'Ticket Updated - New Agent: ' . $agent);
                    return json_encode(['status' => 'success']);

                } else {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
                }

            }
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function searchAndUpdateUnit()
    {

        if ($this->checkSession()) {
            if ($this->request->getPost()) {



                $id = $this->request->getPost('ticketid');
                $unit = trim($this->request->getVar('unit'));
                $modifiedid = $_SESSION['user_id'];

                if (!$id) {

                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID');
                }


                $ticketmodel = new TicketModel();


                $existingTicket = $ticketmodel->search_by_id($id);

                if (!$existingTicket) {

                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Ticket not found');
                }

                $ticketData = [
                    "current_assigned_unit" => $unit,
                    "modified_by" => $modifiedid
                ];

                $affectedRows = $ticketmodel->updateTicket($id, $ticketData);

                if ($affectedRows > 0) {

                    $this->setUserActions('UPDATE', 'Ticket Updated - New Unit: ' . $unit);
                    return json_encode(['status' => 'success']);

                } else {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
                }

            }
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function checkSession()
    {
        if (isset ($_SESSION['user_id'])) {


            $id = $_SESSION['user_id'];
            return true;
        } else {
            echo "not found";
            return false;
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


    public function getticketlistreport()
    {
        if ($this->checkSession()) {



            $datetype = $this->request->getVar('datetype');
            $periodfrom = $this->request->getVar('periodfrom');
            $periodto = $this->request->getVar('periodto');
            $singledate = $this->request->getVar('singledate');
            $unitchk = $this->request->getVar('unitchk');
            $statuschk = $this->request->getVar('statuschk');
            $prioritychk = $this->request->getVar('prioritychk');
            $unitval = $this->request->getVar('unitval');
            $statusval = $this->request->getVar('statusval');
            $priorityval = $this->request->getVar('priorityval');


            $query = $this->ticketmodel
                ->select('ticket_master.id, ticket_master.branch, ticket_master.pf_number, ticket_master.incedent_category, ticket_master.priority, ticket_master.created_on, ticket_master.created_by, ticket_master.status, ticket_master.current_assigned_unit, ticket_master.assigned_to, ticket_master.modified_on, ticket_master.modified_by, ticket_master.user_rating,ticket_status_master.description,priority_master.prioirty_name,units.name,user_master.user_name')
                ->join('user_master', 'ticket_master.assigned_to = user_master.id')
                ->join('units', 'ticket_master.current_assigned_unit = units.id')
                ->join('ticket_status_master', 'ticket_master.status = ticket_status_master.id')
                ->join('priority_master', 'ticket_master.priority = priority_master.id');

            if ($prioritychk == "yes") {

                $query->where('ticket_master.priority', $priorityval);
            }


            if ($unitchk == "yes") {
           
                $query->where('ticket_master.current_assigned_unit', $unitval);
            }


            if ($statuschk == "yes") {

                $query->where('ticket_master.status', $statusval);
            }



            if ($datetype === "no") {
   
            } else if ($datetype === "single") {
                $query->where("DATE_FORMAT(ticket_master.created_on, '%m/%d/%Y')", $singledate);
             

            } else if ($datetype === "range") {
                
                $query->where("DATE_FORMAT(ticket_master.created_on, '%m/%d/%Y') >=", $periodfrom)
                    ->where("DATE_FORMAT(ticket_master.created_on, '%m/%d/%Y') <=", $periodto);

            }
            //print_r($query);


            //print_r($result);
            
            //print_r($data);
            //$lastQuery = $this->ticketmodel->getLastQuery();

            // Display or log the last executed query
            //echo $lastQuery;

            $result = $query->get()->getResult();
            $data['ticketlist'] = $result;
            //print_r($result);
            return $this->respond(['status' => 100, 'data' => $data]);
        } else {
            return redirect()->to(base_url('login'));
        }

    }










}

