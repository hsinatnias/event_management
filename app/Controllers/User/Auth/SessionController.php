<?php

namespace App\Controllers\User\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class SessionController extends BaseController
{
    protected $session;
    public function __construct(){
$this->session = session();
    }
    public function set_session($data)
    {
        
        $user_id = $data['user_id'] ?? $data['id'];
        $profilePic = $data['uploaded_fileinfo']?? 'dummy.png';
        $authData = [
            'username' => $data['username'],
            'email' => $data['email'],
            'user_id'=> $user_id,
            'isLoggedIn' => true,
            'uploaded_fileinfo' => $profilePic
        ];

        $this->session->set($authData);
    }
    public function set_specific($key, $value){
        $data[$key]= $value;
        $this->session->set($data);
    }

    public function remove_session()
    {
        session()->destroy();
        // $session = session();
        // $authData = ['isLoggedIn'=> false];
        // $session->set($authData);
    }
}
