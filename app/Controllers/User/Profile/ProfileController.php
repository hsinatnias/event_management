<?php

namespace App\Controllers\User\Profile;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProfileController extends BaseController
{
    public function index()
    {
        return view("user/profile/profile");
    }
}
