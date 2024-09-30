<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\TicketModel;
use App\Models\IssuesModel;
use App\Models\PriorityModel;
use App\Models\TicketStatusModel;

class Home extends BaseController
{

    protected $ticketmodel;
    protected $prioirtymodel;
    protected $statusmodel;
    protected $issuesmodel;
    protected $usermodel;



    public function __construct()
    {

        $this->ticketmodel = new TicketModel();
        $this->prioirtymodel = new PriorityModel();
        $this->statusmodel = new TicketStatusModel();
        $this->issuesmodel = new IssuesModel();
        $this->usermodel = new UserModel();


        //$this->prioirtymodel = new PriorityModel();
    }

    public function checkSession()
    {
        //print_r($_SESSION['user_id']);
        if (isset ($_SESSION['user_id'])) {

            $id = $_SESSION['user_id'];
            //echo "User ID: $id";
            return true;
        } else {
            echo "not found";
            return false;
            //echo "not found";
        }
    }

    public function homepage()
    {

        if ($this->checkSession()) {
            $data = [
                'permissions' => $this->session->get('permissions')
            ];

            $table1Model = new TicketModel();

            if (isset ($_SESSION['role'])) {
                if ($_SESSION['role'] == 2) {

                    if (isset ($_SESSION['user_id'])) {

                        $id = $_SESSION['user_id'];

                        $result = $table1Model->select('ticket_master.*, issue_base.issue_description as issue_details,ticket_status_master.description as description,priority_master.prioirty_name as prioirty_name')
                            ->join('issue_base', 'ticket_master.issue_id = issue_base.id')
                            ->join('ticket_status_master', 'ticket_master.status = ticket_status_master.id')
                            ->join('priority_master', 'ticket_master.priority = priority_master.id')
                            ->where('ticket_master.created_by', $id)
                            ->orderBy('ticket_master.id', 'desc')
                            ->get()->getResult();

                        $data['ticketlist'] = $result;


                        $data['opencount'] = $this->ticketmodel->getTicketCountByStatus($id, 1);
                        $data['progresscount'] = $this->ticketmodel->getTicketCountByStatus($id, 2);
                        $data['closedcount'] = $this->ticketmodel->getTicketCountByStatus($id, 3);
                        $data['reopencount'] = $this->ticketmodel->getTicketCountByStatus($id, 4);
                        $data['approvalpendingcount'] = $this->ticketmodel->getTicketCountByStatus($id, 5);
                        $data['approvedcount'] = $this->ticketmodel->getTicketCountByStatus($id, 6);

                        $data['opencountmonth'] = $this->ticketmodel->getTicketCountByStatusandMonth($id, 1);
                        $data['progresscountmonth'] = $this->ticketmodel->getTicketCountByStatusandMonth($id, 2);
                        $data['closedcountmonth'] = $this->ticketmodel->getTicketCountByStatusandMonth($id, 3);
                        $data['reopencountmonth'] = $this->ticketmodel->getTicketCountByStatusandMonth($id, 4);
                        $data['approvalpendingcountmonth'] = $this->ticketmodel->getTicketCountByStatusandMonth($id, 5);
                        $data['approvedcountmonth'] = $this->ticketmodel->getTicketCountByStatusandMonth($id, 6);


                        $data['totalopencount'] = intval($data['opencount']) + intval($data['progresscount']) + intval($data['reopencount']) + intval($data['approvalpendingcount']) + intval($data['approvedcount']);
                        $data['totalcount'] = intval($data['opencount']) + intval($data['progresscount']) + intval($data['reopencount']) + intval($data['approvalpendingcount']) + intval($data['approvedcount']) + intval($data['closedcount']);

                        $data['totalopencountmonth'] = intval($data['opencountmonth']) + intval($data['progresscountmonth']) + intval($data['reopencountmonth']) + intval($data['approvalpendingcountmonth']) + intval($data['approvedcountmonth']);
                        $data['totalcountmonth'] = intval($data['opencountmonth']) + intval($data['progresscountmonth']) + intval($data['reopencountmonth']) + intval($data['approvalpendingcountmonth']) + intval($data['approvedcountmonth']) + intval($data['closedcountmonth']);

                        return view('common/dashboard', $data);
                    } else {
                        //return redirect()->to(base_url('login'));
                    }

                } else if ($_SESSION['role'] == 3 || $_SESSION['role'] == 4 || $_SESSION['role'] == 5) {

                    if (isset ($_SESSION['user_id'])) {

                        $id = $_SESSION['branch'];

                        $result = $table1Model->select('ticket_master.*, issue_base.issue_description as issue_details,ticket_status_master.description as description,priority_master.prioirty_name as prioirty_name,user_master.avatar as avatar,user_master.user_name as username')
                            ->join('issue_base', 'ticket_master.issue_id = issue_base.id')
                            ->join('ticket_status_master', 'ticket_master.status = ticket_status_master.id')
                            ->join('priority_master', 'ticket_master.priority = priority_master.id')
                            ->join('user_master', 'ticket_master.created_by = user_master.id')
                            ->where('ticket_master.current_assigned_unit', $id)
                            ->orderBy('ticket_master.id', 'desc')
                            ->get()->getResult();

                        //print_r($result);    

                        $data['ticketlist'] = $result;


                        $data['opencount'] = $this->ticketmodel->getTicketAllCountByStatusAndUnit($id, 1);
                        $data['progresscount'] = $this->ticketmodel->getTicketAllCountByStatusAndUnit($id, 2);
                        $data['closedcount'] = $this->ticketmodel->getTicketAllCountByStatusAndUnit($id, 3);
                        $data['reopencount'] = $this->ticketmodel->getTicketAllCountByStatusAndUnit($id, 4);
                        $data['approvalpendingcount'] = $this->ticketmodel->getTicketAllCountByStatusAndUnit($id, 5);
                        $data['approvedcount'] = $this->ticketmodel->getTicketAllCountByStatusAndUnit($id, 6);

                        $data['opencountmonth'] = $this->ticketmodel->getTicketCountAllByStatusandMonthAndUnit($id, 1);
                        $data['progresscountmonth'] = $this->ticketmodel->getTicketCountAllByStatusandMonthAndUnit($id, 2);
                        $data['closedcountmonth'] = $this->ticketmodel->getTicketCountAllByStatusandMonthAndUnit($id, 3);
                        $data['reopencountmonth'] = $this->ticketmodel->getTicketCountAllByStatusandMonthAndUnit($id, 4);
                        $data['approvalpendingcountmonth'] = $this->ticketmodel->getTicketCountAllByStatusandMonthAndUnit($id, 5);
                        $data['approvedcountmonth'] = $this->ticketmodel->getTicketCountAllByStatusandMonthAndUnit($id, 6);


                        $data['totalopencount'] = intval($data['opencount']) + intval($data['progresscount']) + intval($data['reopencount']) + intval($data['approvalpendingcount']) + intval($data['approvedcount']);
                        $data['totalcount'] = intval($data['opencount']) + intval($data['progresscount']) + intval($data['reopencount']) + intval($data['approvalpendingcount']) + intval($data['approvedcount']) + intval($data['closedcount']);

                        $data['totalopencountmonth'] = intval($data['opencountmonth']) + intval($data['progresscountmonth']) + intval($data['reopencountmonth']) + intval($data['approvalpendingcountmonth']) + intval($data['approvedcountmonth']);
                        $data['totalcountmonth'] = intval($data['opencountmonth']) + intval($data['progresscountmonth']) + intval($data['reopencountmonth']) + intval($data['approvalpendingcountmonth']) + intval($data['approvedcountmonth']) + intval($data['closedcountmonth']);

                        return view('common/dashboard', $data);
                    } else {
                        //return redirect()->to(base_url('login'));
                    }

                } else if ($_SESSION['role'] == 1) {

                    if (isset ($_SESSION['user_id'])) {

                        $id = $_SESSION['branch'];

                        $result = $table1Model->select('ticket_master.*, issue_base.issue_description as issue_details,ticket_status_master.description as description,priority_master.prioirty_name as prioirty_name')
                            ->join('issue_base', 'ticket_master.issue_id = issue_base.id')
                            ->join('ticket_status_master', 'ticket_master.status = ticket_status_master.id')
                            ->join('priority_master', 'ticket_master.priority = priority_master.id')
                            ->orderBy('ticket_master.id', 'desc')
                            ->get()->getResult();

                        $data['ticketlist'] = "";
                        $data['opencount'] = "";
                        $data['progresscount'] = "";
                        $data['closedcount'] = "";
                        $data['reopencount'] = "";
                        $data['approvalpendingcount'] = "";
                        $data['approvedcount'] = "";
                        $data['allusers'] = "";
                        $data['activeusers'] = "";
                        $data['ratingsum'] = "";
                        $data['ratingperc'] = "";
                        $data['totalopencount'] = "";
                        $data['totalcount'] = "";

                        //print_r("ddddddddddddd"+$result);

                        if ($result) {

                            $data['ticketlist'] = $result;


                            $data['opencount'] = $this->ticketmodel->getTicketAllCountByStatus(1);
                            // //print_r($data);
                            $data['progresscount'] = $this->ticketmodel->getTicketAllCountByStatus(2);
                            $data['closedcount'] = $this->ticketmodel->getTicketAllCountByStatus(3);
                            $data['reopencount'] = $this->ticketmodel->getTicketAllCountByStatus(4);
                            $data['approvalpendingcount'] = $this->ticketmodel->getTicketAllCountByStatus(5);
                            $data['approvedcount'] = $this->ticketmodel->getTicketAllCountByStatus(6);

                            $data['allusers'] = $this->usermodel->getUserAllCount();
                            $data['activeusers'] = $this->usermodel->getUserAllCountByStatus(1);


                            $data['ratingsum'] = $this->ticketmodel->getTicketRating();

                            //$this->ticketmodel->getTicketCountMonthly();
                            // $data['ratingperc'] =  (intval($data['ratingsum'])  / (intval($data['closedcount'])*5))*100;



                            $data['totalopencount'] = intval($data['opencount']) + intval($data['progresscount']) + intval($data['reopencount']) + intval($data['approvalpendingcount']) + intval($data['approvedcount']);
                            $data['totalcount'] = intval($data['opencount']) + intval($data['progresscount']) + intval($data['reopencount']) + intval($data['approvalpendingcount']) + intval($data['approvedcount']) + intval($data['closedcount']);

                            return view('common/dashboard', $data);
                        }

                        return view('common/dashboard', $data);


                    } else {
                        //return redirect()->to(base_url('login'));
                    }

                } else {
                    return redirect()->to(base_url('invalidLogin'));

                }
            }

        } else {
            return redirect()->to(base_url('login'));
        }
    }
}
