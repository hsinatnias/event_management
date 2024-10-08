<?php

namespace App\Controllers\User\Profile;

use App\Models\UserModel;
use App\Models\UserProfileModel;
use CodeIgniter\Database\RawSql;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\User\Auth\SessionController;
use App\Validation\Custom_Validation;

class UserController extends BaseController
{
    public function index()
    {
        //
    }

    public function show_register_form()
    {
        helper(['form']);
        return view("user/profile/register");
    }

    public function register()
    {
        $validation = new Custom_Validation();

        helper(['form']);

        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'confirmpassword' => $this->request->getVar('confirmpassword'),
        ];
        

        if(!$this->validateData($data, $validation->signup))
        {
            $data['validation'] = $this->validator;
            return view('user/profile/register', $data);
        }
            $user = new UserModel();
            unset($data);
            $data = [
                'username' => $this->request->getVar('username'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ];

            $user_id =  $user->insert($data, true);
            $data['user_id']= $user_id;
            

            $authSession = new SessionController();
            $authSession->set_session($data);

            return redirect()->to('/profile');

        
      

    }
}
