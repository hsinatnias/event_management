<?php

namespace App\Controllers\User\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SessionController extends BaseController
{
    public function set_session($data)
    {
        $session = session();
        
        $authData = [
            'username' => $data['username'],
            'email' => $data['email'],
            'isLoggedIn' => true
        ];

        $session->set($authData);
    }

    public function remove_session()
    {
        $session = session();
        $authData = ['isLoggedIn'=> false];
        $session->set($authData);
    }
}
