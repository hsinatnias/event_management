<?php

namespace App\Controllers\User\Profile;

use App\Models\UserModel;
use CodeIgniter\Files\File;
use App\Models\UserProfileModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\User\Auth\SessionController;
use App\Validation\Custom_Validation;

class ProfileController extends BaseController
{
    protected $custom_validation;
    protected $db;
    protected $userProfileModel ;
    protected $sessionController;
    public function __construct()
    {
        $this->custom_validation = new Custom_Validation();
        $this->db = \Config\Database::connect();
        $this->userProfileModel = new UserProfileModel();
        $this->sessionController = new SessionController();
        helper(['form']);
    }


    public function index()
    {

        $userDetails = $this->userProfileModel->where("user_id", session()->get("user_id"))->first();

        if (!$userDetails) {
            
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
        
        return view('user/profile/user_profile_edit');

    }
    public function update_profile_view()
    {        
        $builder = $this->db->table("users");
        $builder->select("*")
            ->join('userprofiles', 'userprofiles.user_id = users.user_id')
            ->where('users.user_id', session()->get('user_id'));
        $query = $builder->get();
        $data['result'] = $query->getFirstRow();
        
        
        $data['userdata'] = $this->userProfileModel->where('user_id', session()->get('user_id'))->first();
        
        return view('user/profile/user_profile_update', $data);

    }

    public function create()
    {        
        
        $data = [
            'firstname'     => $this->request->getVar('firstname'),
            'lastname'      => $this->request->getVar('lastname'),
            'phone_number'  => $this->request->getVar('phone_number')
        ];
        if (!$this->validateData($data, $this->custom_validation->userprofile_save)) {
            $data['validation'] = $this->validator;
            return view('user/profile/user_profile_edit', $data);
        }


        $img = $this->request->getFile('avatar');

        if ($img->isValid() && !$img->hasMoved()) {
            $file_name = $img->getRandomName();
            $img->move(WRITEPATH.'uploads/profile_images',  $file_name  );        
        }
        $data['uploaded_fileinfo'] =  $file_name;
        $data['user_id'] = session()->get('user_id');       

        $this->userProfileModel->insert($data);
        $this->sessionController->set_specific('uploaded_fileinfo', $file_name);



        return redirect()->to('/profile');

    }
    public function update()
    {        
     
        $rules = $this->custom_validation->userprofile_update;
        if ($this->validate($rules)) {            

            $img = $this->request->getFile('avatar');
            if ($img->isValid() && !$img->hasMoved()) {

                $file_name = $img->getRandomName();
                $img->move(WRITEPATH.'uploads/profile_images',  $file_name  );    

            }

            $data = [                
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'phone_number' => $this->request->getVar('phone_number'),
                'uploaded_fileinfo' => $file_name
            ];

            $email = $this->request->getVar('email');
            // $user->where('user_id', session()->get('user_id'))->update($data);
            $this->userProfileModel->set($data)->where('user_id', session()->get('user_id'))->update();
            $usermodel = new UserModel();
            $usermodel->set('email', $email)->where('user_id', session()->get('user_id'))->update();
            
            $this->sessionController->set_specific('uploaded_fileinfo', $file_name);
            return redirect()->to('/profile');
        } else {
            $data['userdata'] = $this->userProfileModel->where('user_id', session()->get('user_id'))->first();
            $data['validation'] = $this->validator;
            echo view('user/profile/user_profile_update', $data);
        }
    }
}
