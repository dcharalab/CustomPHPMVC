<?php

    class Users extends Controller
    {
        public function __construct() {
            $this->userModel = $this->model('User');
        }

        public function register()
        {
            //check for post
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                # process form

                //Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                //validations
                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }elseif($this->userModel->findUserByEmail($data['email'])){
                    $data['email_err'] = 'Email is already taken';
                }

                if (empty($data['name'])) {
                    $data['name_err'] = 'Please enter name';
                }

                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }elseif(strlen($data['password']) < 6){
                    $data['password_err'] = 'Password must be at least 6 characters';
                }

                if (empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = 'Please confirm password';
                }elseif($data['confirm_password'] != $data['password']){
                    $data['confirm_password_err'] = 'Passwords do not much';
                }

                //Check errors are empty

                if (empty($data['email_err']) && empty($data['name_err']) &&
                 empty($data['password_err']) && empty($data['confirm_password_err'])) {
                   //Validated
                   die('SUCCESS');
                }else{
                    //load view
                    $this->view('users/register', $data);
                }

            }else{
                //init data
                $data = [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => ''
                ];

                $this->view('users/register', $data);
            }
        }

        public function login()
        {
            //check for post
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                # process form
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'email_err' => '',
                    'password_err' => '',
                ];

                 //validations

                if (empty($data['email'])) {
                    $data['email_err'] = 'Please enter email';
                }

                if (empty($data['password'])) {
                    $data['password_err'] = 'Please enter password';
                }

                //Check errors are empty

                if (empty($data['email_err']) && empty($data['password_err'])) {
                   //Validated
                   die('SUCCESS');
                }else{
                    //load view
                    $this->view('users/login', $data);
                }

            }else{
                //init data
                $data = [
                    'email' => '',
                    'password' => '',
                    'email_err' => '',
                    'password_err' => '',
                ];

                $this->view('users/login', $data);
            }
        }

    }
    