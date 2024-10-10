<?php

namespace App\Controllers\Admin\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminAuthController extends BaseController
{
    /**
     * Display Admin login page
     * 
     */
    public function index()
    {

        return view("admin/auth/login");
    }

    public function login()
    {
        $username = $this->request->getVar("username");
        $password = $this->request->getVar("password");



    }
    public function password_reset()
    {
        echo "Here we reset password";
    }

    public function login_html()
    {
        $html = '
<form id="reset_password">
    <img class="mb-4" src="' . site_url('/img/letterV.png') . '" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating mb-3" id="email_container">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Password Reset</button>
    <p class="mt-5 mb-3 text-muted"><a href="#" onclick="password_reset();">Forgot password</a></p>
</form>
';

return $this->response->setContentType('text/html')->setBody($html);
    }
}
