<?php

namespace App\Controllers\Admin\Auth;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class AdminAuthController extends BaseController
{
    public function index()
    {
        echo "Welcome to admin";
    }
}
