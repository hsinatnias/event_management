<?php

namespace App\Controllers\User\Profile;

use App\Models\UserModel;
use App\Models\UserProfileModel;
use CodeIgniter\Database\RawSql;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\User\Auth\SessionController;

class UserController extends BaseController
{
    public function index()
    {
        //
    }

    public function show_register_form()
    {
        return view("user/profile/register");
    }

    public function register()
    {

        helper(['form']);

        $rules = [
            'username' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmpassword' => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $user = new UserModel();

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
        } else {
            $data['validation'] = $this->validator;
            echo view('user/profile/register', $data);
        }

    }
}
