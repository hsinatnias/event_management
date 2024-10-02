<?php

namespace App\Controllers\User\Profile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        //
    }

    public function show_register_form()
    {
        return view("user/register");
    }

    public function register(){
        
    }
}
