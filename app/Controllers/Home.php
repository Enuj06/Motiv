<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use Config\Services;
use Config\Email;
use CodeIgniter\Controllers;

use App\Models\SecurityModel;

class Home extends BaseController
{
    public function home()
    {
                $email = Services::email();
        $email->setFrom('agilahardwareandconstructionsu@gmail.com', 'Developer June');
        $email->setTo('devjune02@gmail.com');
        $email->setSubject('New Visitor on Your Site');
        $email->setMessage('There is a visitor.');

        if($email->send()){
                    return view('home');
        } else {
            $data = $email->printDebugger(['headers']);
            return 'Failed to send email. ' . $data;
        }

    }

    public function saveDeviceInfo()
    {
        $deviceInfo = $this->request->getPost();

        // Save device info to session
        session()->set('deviceInfo', $deviceInfo);

        // Optionally email the info
        $email = Services::email();
        $email->setFrom('agilahardwareandconstructionsu@gmail.com', 'Developer June');
        $email->setTo('devjune02@gmail.com');
        $email->setSubject('New Device Visit');
        $email->setMessage("
            <h3>New Device Detected</h3>
            <p><strong>Browser:</strong> {$deviceInfo['browser']}</p>
            <p><strong>Device:</strong> {$deviceInfo['device']}</p>
            <p><strong>OS:</strong> {$deviceInfo['os']}</p>
        ");
        $email->send();

        // Redirect back to home (landing page)
        return redirect()->to('/pinaka');
    }

    public function error()
    {
        return view('error');
    }   

    public function resist(){
        return view('resist');
    }

    public function pinaka(){
        return view('home');
    }

    public function testEmail(){
        $email = Services::email();
        $email->setFrom('agilahardwareandconstructionsu@gmail.com', 'Developer June');
        $email->setTo('devjune02@gmail.com');
        $email->setSubject('Test Email from CodeIgniter');
        $email->setMessage('This is a test email sent from CodeIgniter application.');

        if($email->send()){
            echo 'Email sent successfully';
        } else {
            $data = $email->printDebugger(['headers']);
            return 'Failed to send email. ' . $data;
        }
    }
}
