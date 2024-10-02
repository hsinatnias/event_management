<?php

namespace App\Controllers\User\Auth;

use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\User\Auth\SessionController;

class AuthController extends BaseController
{
    /**
     * display authentication/Login  form
     * @return void
     */
    public function index()
    {
        helper(['form']);
        return view('user/auth/login');
    }
    /**
     * Make user login with values from login form
     * @return void
     */
    public function login()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = new UserModel();
        $data = $user->where('email', $email)->first();

        if($data){
            $pass = $data['password'];
            $athenticatePassword = password_verify($password, $pass);
            if($athenticatePassword){
                $authSession = new SessionController();
                $authSession->set_session($data);
                return redirect()->route('/');
            }else{
                session()->setFlashdata('msg', 'Password is incorrect');
                return redirect()->back()->withInput();
            }
        }else{
            session()->setFlashdata('msg', 'Email is incorrect');
            return redirect()->back()->withInput();
        }

    }
    public function logout()
    {
        $session = new SessionController();
        $session->remove_session();

        return redirect()->route("/");
    }


}
