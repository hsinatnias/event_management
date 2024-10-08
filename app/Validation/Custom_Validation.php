<?php

namespace App\Validation;

use CodeIgniter\Config\BaseConfig;

class Custom_Validation extends BaseConfig{
    public array $signup =[
        'username' => [
            'rules' => 'required|min_length[2]|max_length[50]|alpha_numeric_punct|is_unique[users.username]',
            'errors'=>[
                'required'                  => 'User name is required',
                'min_length[3]'             => 'User name should have minimum 3 characters',
                'max_length[50]'            => 'User name cannot exceed 50 characters',
                'alpha_numeric_punct'       => 'User name can contain only anumeric characters',
                'is_unique[users.username]' => 'Username should be unique'
            ]
            ],
        'email' => [
            'rules' => 'required|max_length[100]|valid_email|is_unique[users.email]',
            'errors'=>[
                'required'                  => 'Email cannot be empty',
                'max_length[100]'           => 'Email address cannot exceed 100 characters',
                'valid_email'               => 'Its should be a valid Email address',
                'is_unique[users.email]'    => 'Email address should be unique',
            ]
            ],
        'password' => [
            'rules' => 'required|min_length[4]|max_length[50]',
            'errors'=>[
                'required'                  => 'Password field cannot be empty',
                'min_length[4]'             => 'Password should have minimum 4 characters',
                'max_length[50]'            => 'Password should not exceed 50 characters',
            ]
            ],
        'confirmpassword' => [
            'rules' => 'matches[password]',
            'errors'=>[
                'matches[password]'                  => 'Password fields should match',
            ]
        ]
    ];

    public array $userprofile_save=[
        'firstname' => [
            'rules'     => 'required|min_length[3]|max_length[50]',
            'errors'    => [
                'required'          => 'First name field cannot be empty',
                'min_length[3]'     => 'Should be a 3 character name',
                'max_length[50]'    => 'Cannot exceed 50 characters',
            ]
        ],
        'lastname' => [
            'rules'     => 'required|min_length[3]|max_length[50]',
            'errors'    => [
                'required'          => 'Last name field cannot be empty',
                'min_length[3]'     => 'Should be a 3 character name',
                'max_length[50]'    => 'Cannot exceed 50 characters',
            ]
        ],
        'phone_number' => [
            'rules'     => 'required|regex_match[/^[0-9]{10}$/]',
            'errors'    => [
            'required'                          => 'Phone number field cannot be empty',
            'regex_match[/^[0-9]{10}$/]'    => 'Please enter a valid 10 digit telephone number ',
                
            ]
        ]

    ];

    

}

