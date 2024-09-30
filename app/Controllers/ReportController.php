<?php

namespace App\Controllers;

use App\Models\NotificationModel;
use App\Models\TicketModel;
use App\Models\UserModel;



class ReportController extends BaseController
{
    protected $notificationmodel;
    protected $ticketmodel;
    protected $usermodel;

    public function __construct()
    {
        $this->notificationmodel = new NotificationModel();
        $this->ticketmodel = new TicketModel();
        $this->usermodel = new UserModel();
    }

    public function exportPDF()
    {
        $dompdf = new Dompdf();
        $data = [
            'imageSrc' => $this->imageToBase64(ROOTPATH . '/public/img/profile.png'),
            'name' => 'John Doe',
            'address' => 'USA',
            'mobileNumber' => '000000000',
            'email' => 'john.doe@email.com'
        ];
        $html = view('resume', $data);
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream('resume.pdf', ['Attachment' => false]);
    }

    private function imageToBase64($path)
    {
        $path = $path;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }

    public function viewReports()
    {
        //echo "ss";
        $table1Model = new TicketModel();


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
            // $data['ratingperc'] =  (intval($data['ratingsum'])  / (intval($data['closedcount'])*5))*100;



            $data['totalopencount'] = intval($data['opencount']) + intval($data['progresscount']) + intval($data['reopencount']) + intval($data['approvalpendingcount']) + intval($data['approvedcount']);
            $data['totalcount'] = intval($data['opencount']) + intval($data['progresscount']) + intval($data['reopencount']) + intval($data['approvalpendingcount']) + intval($data['approvedcount']) + intval($data['closedcount']);

            //return view('common/dashboard', $data);
        }

        //return view('common/dashboard', $data);

        //$userlist[] = "";


        return view('Reports/ViewReport', $data);

    }

    public function viewUserReports()
    {
        //echo "ss";
        return view('Reports/UserReport');

    }

    public function viewTicketReports()
    {
        //echo "ss";
        return view('Reports/TicketReport');

    }



    



}

