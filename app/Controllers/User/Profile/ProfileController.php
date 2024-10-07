<?php

namespace App\Controllers\User\Profile;

use App\Models\UserModel;
use CodeIgniter\Files\File;
use App\Models\UserProfileModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Controllers\User\Auth\SessionController;

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
                ->join('userprofiles', 'userprofiles.user_id = users.id')
                ->where('users.id', session()->get('user_id'));
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

        helper(['form']);
        $rules = [
            'firstname' => 'required|min_length[2]|max_length[50]',
            'lastname' => 'required|min_length[2]|max_length[50]',            
            'phone_number' => 'required|regex_match[/^[0-9]{10}$/]',
            'uploaded_fileinfo' => 'uploaded[uploaded_fileinfo]|is_image[uploaded_fileinfo]|mime_in[uploaded_fileinfo,image/jpg,image/jpeg,image/gif,image/png,image/webp]|max_size[uploaded_fileinfo,100]|max_dims[uploaded_fileinfo,1024,768]',
        ];

        if ($this->validate($rules)) {
            
            $img = $this->request->getFile('uploaded_fileinfo');
            
            if (! $img->hasMoved()) {
                $filepath = WRITEPATH . 'uploads/' . $img->store("profile_images", session()->get('username').".".$img->getExtension());
    
                $fileInfo = new File($filepath);
                $file_path  = 'profile_images/'.$fileInfo->getFilename();
            }

            
            $data = [
                'user_id' => session()->get('user_id'),
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'phone_number' => $this->request->getVar('phone_number'),
                'uploaded_fileinfo' => $file_path
            ];
            
            $user->where('user_id', session()->get('user_id'))->insert($data);


            return redirect()->to('/profile');
        } else {
            $data['validation'] = $this->validator;
            echo view('user/profile/user_profile_edit', $data);
        }
    }
    public function update()
    {
        helper(['form']);
        $rules = [
            'firstname' => 'required|min_length[2]|max_length[50]',
            'lastname' => 'required|min_length[2]|max_length[50]',
            'phone_number' => 'required|regex_match[/^[0-9]{10}$/]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'uploaded_fileinfo' => 'uploaded[uploaded_fileinfo]|is_image[uploaded_fileinfo]|mime_in[uploaded_fileinfo,image/jpg,image/jpeg,image/gif,image/png,image/webp]|max_size[uploaded_fileinfo,100]|max_dims[uploaded_fileinfo,1024,768]',
        ];

        
        if ($this->validate($rules)) {
            $user = new UserProfileModel();

            $img = $this->request->getFile('uploaded_fileinfo');
            if (! $img->hasMoved()) {
                $filepath = WRITEPATH . 'uploads/' . $img->store("profile_images", session()->get('username').".".$img->getExtension());
    
                $fileInfo = new File($filepath);
                $file_path  = 'profile_images/'.$fileInfo->getFilename();
                
            }

            $data = [
                
                'firstname' => $this->request->getVar('firstname'),
                'lastname' => $this->request->getVar('lastname'),
                'phone_number' => $this->request->getVar('phone_number'),
                'uploaded_fileinfo' => $file_path
                
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
