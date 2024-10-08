<?php

namespace App\Controllers\User\Profile;

use Config\Validation;
use App\Models\UserModel;
use App\Models\UserProfileModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\User\Auth\SessionController;
use App\Validation\Custom_Validation;

class ProfileController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db   = \Config\Database::connect();
    }
    public function index()
    {

        $userProfileModel = new UserProfileModel();

        $userDetails = $userProfileModel->where("user_id", session()->get("user_id"))->first();

        if (!$userDetails) {
            helper(['form']);
            return redirect()->to("/create-profile");
        }
        
        $builder = $this->db->table("users");
        $builder->select("*")                
                ->join('userprofiles', 'userprofiles.user_id = users.user_id')
                ->where('users.user_id', session()->get('user_id'));
        $query = $builder->get();
        $data['result'] = $query->getFirstRow();
        

        return view("user/profile/profile", $data);
    }

    public function edit_profile_view()
    {
        
        helper(['form']);
        return view('user/profile/user_profile_edit');

    }
    public function update_profile_view()
    {
        helper(['form']);
        $user = new UserProfileModel();
        $data['userdata'] = $user->where('user_id', session()->get('user_id'))->first();
        
        helper(['form']);
        return view('user/profile/user_profile_update', $data);

    }

    public function create()
    {
        $user = new UserProfileModel();
        $validation = new Custom_Validation();


        helper(['form']);
      
        $data = [
            'user_id' => session()->get('user_id'),
            'firstname' => $this->request->getVar('firstname'),
            'lastname' => $this->request->getVar('lastname'),
            'phone_number' => $this->request->getVar('phone_number'),
        ];

        if (!$this->validateData($data, $validation->userprofile_save)) {
            $data['validation'] = $this->validator;
            return view('user/profile/register', $data);
        }
        
        $user->where('user_id', session()->get('user_id'))->insert($data);
        return redirect()->to('/profile');
       
    }
    public function update()
    {
        helper(['form']);
        $rules = [
            'firstname' => 'required|min_length[2]|max_length[50]',
            'lastname' => 'required|min_length[2]|max_length[50]',
            'phone_number' => 'required|regex_match[/^[0-9]{10}$/]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'avatar' => 'required',
        ];

        if ($this->validate($rules)) {
            $user = new UserProfileModel();

            $data = [
                
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'phone_number' => $this->request->getVar('phone_number'),
            ];
            $email = $this->request->getVar('email');
            // $user->where('user_id', session()->get('user_id'))->update($data);
            $user->set($data)->where('user_id', session()->get('user_id'))->update();
            $usermodel = new UserModel();
            $usermodel->set('email', $email)->where('id', session()->get('user_id'))->update();


            return redirect()->to('/profile');
        } else {
            $data['validation'] = $this->validator;
            echo view('user/profile/user_profile_update', $data);
        }
    }
}
