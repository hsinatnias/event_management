<?php

namespace App\Controllers\User\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    /**
     * display authentication/Login  form
     * @return void
     */
    public function index()
    {

    }
    /**
     * Make user login with values from login form
     * @return void
     */
    public function login()
    {

    }
    public function logout()
    {
        $session = new SessionController();
        $session->remove_session();

        return redirect()->route("/");
    }


}
