<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Controllers\BaseController;
use CodeIgniter\Model\SecurityModel;
use App\Controllers\Services;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }

    public function home(): string
    {
        return view('index');
    }

    public function error(): string
    {
        return view('error');
    }

    public function add()
    {
        if ($this->request->getMethod() === 'post') {
            $visitor = new SecurityModel();
            $data = [
                'browser' => $this->request->getVar('visitor_browser'),
                'os' => $this->request->getVar("visitor_os"),
                'device' => $this->request->getVar("visitor_device"),
                'email' => $this->request->getVar("email"),
            ];
            $u = $visitor->save($data);
            if ($u) {
                return redirect()->to('/home');
            } else {
                return redirect()->to('/error');
            }
        } else {
            return redirect()->to('/home');
        }

        if ($this->sendVerificationEmail($email, $token)) {
            $data = [
                'visitor_browser' => $this->request->getVar('visitor_browser'),
                'visitor_os' => $this->request->getVar('visitor_os'),
                'visitor_device' => $this->request->getVar('visitor_device'),,
                'email' => $email,
                'created_at' => $current_time,
            ];
        }
    }

        private function sendVerificationEmail($email, $token)
    {
        $emailService = Services::email();

        $emailService->setTo($email);
        $emailService->setFrom('agilahardwareandconstructionsu@gmail.com', 'Agila Hardware');
        $emailService->setSubject('Email Verification');
        $message = "Please click the link below to verify your email address:<br>";
        $message .= base_url('verify/' . $token);

        $emailService->setMessage($message);

        if ($emailService->send()) {
            return true;
        } else {
            log_message('error', $emailService->printDebugger(['headers']));
            return false;
        }
    }
}
