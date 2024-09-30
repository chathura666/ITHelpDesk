<?php

namespace App\Controllers;

use App\Models\NotificationModel;



class FAQController extends BaseController
{
    //protected $notificationmodel;

    public function __construct()
    {
        //$this->notificationmodel = new NotificationModel();
    }


    public function viewFAQ()
    {

        $directory = WRITEPATH . 'uploads/';

        // Get the list of files in the directory
        $files = array_diff(scandir($directory), array('..', '.'));

        // Pass the list of files to the view
        return view('FAQ/ViewFAQ', ['files' => $files]);
        //return view('FAQ/ViewFAQ');

    }

    public function download($filename)
    {
        // Path to the PDF file
        $filePath = WRITEPATH . 'uploads/' . $filename;

        // Check if the file exists
        if (file_exists($filePath)) {
            // Set the appropriate headers for the file download
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Length: ' . filesize($filePath));

            // Read the file and output its contents
            readfile($filePath);
        } else {
            // File not found
            echo 'File not found.';
        }
    }


    public function downloadattachment($filename)
    {
        // Path to the PDF file
       // $filePath = $filename;
        $filePath = WRITEPATH . 'uploads/temp/' . $filename;

        // Check if the file exists
        if (file_exists($filePath)) {
            // Set the appropriate headers for the file download
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $filename . '"');
            header('Content-Length: ' . filesize($filePath));

            // Read the file and output its contents
            readfile($filePath);
        } else {
            // File not found
            echo 'File not found.';
        }
    }



}

