<?php

namespace App\Controllers;

use App\Models\NotificationModel;



class NotificationController extends BaseController
{
    protected $notificationmodel;

    public function __construct()
    {
        $this->notificationmodel = new NotificationModel();
    }

    public function getlatestNotifications()
    {

        $data['notifications'] = [];

        //print_r($_SESSION['role']);

        $id = $_SESSION['user_id'];
        if ($_SESSION['role'] == 2) {
            $data['notifications'] = $this->notificationmodel->getPesonalNotification($id);
        }
        if ($_SESSION['role'] == 4) {
            $data['notifications'] = $this->notificationmodel->getAgentNotification($id);
        }
        if ($_SESSION['role'] == 3 || $_SESSION['role'] == 5) {
            $branch = $_SESSION['branch'];
            $data['notifications'] = $this->notificationmodel->getUnitNotification($branch);
        }

        return $this->respond($data);

    }
    public function searchAndUpdateNotification($id)
    {

        //$id = $this->request->getPost('id');

        //print("dfdf");
        //print($id);

        // Check if the ID and role name are provided
        if (!$id) {
            // Handle the case where ID or role name is not provided
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID or Ticket Description');
        }

        // Create an instance of your model
        $notificationmodel = new NotificationModel();

        // Search for the role
        $existingTicket = $notificationmodel->findbyID($id);

        if (!$existingTicket) {
            // Handle the case where the role is not found
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Ticket not found');
        }


        if ($_SESSION['role'] == 2) {
            $readdata = [
                "mark_as_read" => 1
            ];
        }
        if ($_SESSION['role'] == 4) {
            $readdata = [
                "mark_as_read_agent" => 1
            ];
        }
        if ($_SESSION['role'] == 3 || $_SESSION['role'] == 5) {
            $readdata = [
                "mark_as_read_dephead" => 1
            ];
        }

        //print_r($readdata);

        $affectedRows = $notificationmodel->updateTicket($id, $readdata);

        if ($affectedRows > 0) {


            return $this->respond(['status' => 100, 'data' => $affectedRows]);

        } else {
            // No record was updated
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
        }

    }

    public function searchAndUpdateAllNotification()
    {


        // Create an instance of your model
        $notificationmodel = new NotificationModel();

        $affectedRows = 0;

        if ($_SESSION['role'] == 2) {

            $id = $_SESSION['user_id'];

            $readdata = [
                "mark_as_read" => 1
            ];

            $affectedRows = $notificationmodel->updateAllTicket($readdata,$id);
        }
        if ($_SESSION['role'] == 4) {

            $id = $_SESSION['user_id'];
            $readdata = [
                "mark_as_read_agent" => 1
            ];

            $affectedRows = $notificationmodel->updateAllAgentTicket($readdata,$id);
        }
        if ($_SESSION['role'] == 3 || $_SESSION['role'] == 5) {

            $id = $_SESSION['branch'];
            $readdata = [
                "mark_as_read_dephead" => 1
            ];

            $affectedRows = $notificationmodel->updateAllUnitTicket($readdata,$id);
        }

        // Perform the update operation
        //$affectedRows = $notificationmodel->updateAllTicket($readdata);

        if ($affectedRows > 0) {
            // Record updated successfully
            //$data['rolelist'] = $this->unitmodel->getUnits();

            return $this->respond(['status' => 100, 'data' => $affectedRows]);


            //return view('RoleManagementView/ViewRole', $data);
        } else {
            // No record was updated
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
        }

    }





    public function markasread()
    {


        $data['count'] = $this->notificationmodel->getNotificationsCount();
        return $this->respond(['status' => 100, 'data2' => $data]);

    }


    public function getlatestCount()
    {

        $data['count'] = [];

        $id = $_SESSION['user_id'];
        if ($_SESSION['role'] == 2) {
            $data['count'] = $this->notificationmodel->getPersonalNotificationsCount($id);
        }
        if ($_SESSION['role'] == 4) {
            $data['count'] = $this->notificationmodel->getAgentNotificationsCount($id);
        }
        if ($_SESSION['role'] == 3 || $_SESSION['role'] == 5) {
            $branch = $_SESSION['branch'];
            $data['count'] = $this->notificationmodel->getUnitNotificationsCount($branch);
        }


        return $this->respond(['status' => 100, 'data2' => $data]);

    }

    public function sendEmail()
    {
        $email = \Config\Services::email();

        $email->setFrom('chathuradulanga@gmail.com', 'Chathura');
        $email->setTo('chathura@boc.lk');
        $email->setSubject('Test');
        $email->setMessage('TestTestTest');

        if ($email->send()) {
            echo 'Email sent successfully';
        } else {
            echo $email->printDebugger(['headers']);
        }

    }



}

