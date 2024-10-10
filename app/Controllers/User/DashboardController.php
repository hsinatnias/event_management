<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\User\Auth\SessionController;

class DashboardController extends BaseController
{
    protected $session;

    public function __construct(){
        $this->session = session();
    }
    public function index()
    {
        

        $data = [
            'name' => $this->session->get('name'),
            'email' => $this->session->get('email'),
            'authorised' => $this->session->get('isLoggedIn'),
        ];

        return view('user/dashboard', $data);
    }
}
