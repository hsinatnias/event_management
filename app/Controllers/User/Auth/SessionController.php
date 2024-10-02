<?php

namespace App\Controllers\User\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SessionController extends BaseController
{
    public function set_session($data)
    {
        $session = session();
        $user_id = $data['user_id'] ?? $data['id'];
        $authData = [
            'username' => $data['username'],
            'email' => $data['email'],
            'user_id'=> $user_id,
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
