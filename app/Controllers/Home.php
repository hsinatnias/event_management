<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $session = session();

        $data = [
            'name' => $session->get('name'),
            'email' => $session->get('email'),
            'authorised' => $session->get('isLoggedIn'),
        ];

        return view('home', $data);
    }
}
