<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\API\ResponseTrait;

class Login extends AppController
{

    public $session;

    use ResponseTrait;

    public function __construct()
    {
        helper('url', 'cookie', 'general');
    }

    public function index()
    {
        if ($this->session->get('loginInfo')) {
            return redirect()->to('dashboard');
        }
        return view('login');
    }

    public function login()
    {
        if ($this->request->getMethod() == 'post') {
            //Add field rules
            $rules = [
                'email' => 'required|max_length[50]|valid_email',
                'password' => 'required|min_length[7]|max_length[255]|validateUser[email,password]',
            ];

            $messages = [
                "name" => [
                    "required" => "Name is required"
                ],
                "email" => [
                    "required" => "Email required",
                    "valid_email" => "Email address is not in format",
                    "is_unique" => "Email address already exists"
                ],
            ];

            //Get field value
            $email = $this->request->getVar('email');
            $password = $this->request->getVar('password');
            $remember = "";
            $remember = $this->request->getVar('remember');

            //Check field are empty or not
            if (empty($email) || empty($password)) {
                return view('index', [
                    "validation" => $this->validator,
                ]);
            } else {
                $model = new User();
                $user = $model->where('email', $email)->first();
                //Check email is exists or not
                if (!empty($user)) {
                    //password verify
                    if (password_verify($password, $user['password'])) {

                        //Session declaration and store

                        $newdata = [
                            "user_id" => $user['id'],
                            'user_name' => $user['name'],
                            'user_email' => $user['email'],
                            'logged_in' => true
                        ];

                        $this->session->set('loginInfo', $newdata);

                        if ($remember == "on") {
                            $time = time();
                            //One year time
                            $time = $time + 31536000;
                        }
                        //Set success message
                        $data['status'] = "success";
                        $data['message'] = "Login successfully.";
                        $udateData = ['email' => $user['personal_email'], 'password' => $password];
                        $this->session->set('updated_password', $udateData);

                        return $this->respond($data);
                    } else {
                        //Set wrong password message
                        $data['status'] = "failed";
                        $data['message'] = "Authencation failed, wrong credential.";
                        return $this->fail($data);
                    }
                } else {

                    //Email does not exists
                    $data['status'] = "failed";
                    $data['type'] = "email";
                    $data['message'] = "Your email id don't not exists.";
                    return $this->fail($data);
                }
            }
        }
        return view('admin/login/index');
    }

    public function forget_password()
    {
        return view('forget_password');
    }

    //Logout from current session
    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url());
    }
}
