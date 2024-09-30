<?php

namespace App\Controllers;

use App\Models\LoggingAttemptsModel;
use App\Models\LoginAttemptsModel;
use App\Models\UserModel;
use App\Models\RolepermissionsModel;

class Login extends BaseController
{
    protected $usermodel;
    protected $rolepermissionsmodel;
    protected $logginattempts;



    public function __construct()
    {
        $this->usermodel = new UserModel();
        $this->rolepermissionsmodel = new RolepermissionsModel();
        $this->logginattempts = new LoginAttemptsModel();

    }

    public function index()
    {
        return view('login/login');
    }

    public function lock()
    {
        //print_r("ddd");
        return view('login/lock');
    }

    public function login()
    {
        //$this->session->destroy();
        $username = trim($this->request->getVar('username'));
        $password = trim($this->request->getVar('password'));

        if (empty($username)) {
            return view('errors/loginError');
        }

        if (empty($password)) {
            return view('errors/loginError');
        }

        $user = $this->usermodel->getUser($username);

        if (empty($user)) {
            return view('errors/loginError');
        } else {

            if (password_verify($password, $user->password)) {
                // Passwords match, login successful
                $userSession = [
                    'username' => $user->user_name,
                    'firstname' => $user->first_name,
                    'is_logged' => true,
                    'role' => $user->role,
                    'branch' => $user->primary_unit,
                    'permissions' => $this->rolepermissionsmodel->getPermissions($user->role),
                    'user_id' => $user->id,
                    'user_avatar' => $user->avatar

                ];

                $logindata = [
                    "user_id" => $user->user_name,
                    "last_login" => gmdate("Y-m-d H:i")
                ];         

                $exist = $this->logginattempts->search_by_id($user->user_name);

                if ($exist) {

                    try {
                        $resultupdate = $this->logginattempts->updateRecord($exist['id'], $logindata);
                    } catch (\Exception $e) {
                        // Exception handling
                        echo 'An error occurred: ' . $e->getMessage();
                    }
                } else {

                    try {
                        $resultsave = $this->logginattempts->saveLogin($logindata);
                    } catch (\Exception $e) {
                        // Exception handling
                        echo 'An error occurred: ' . $e->getMessage();
                    }


                }

                $this->session->set($userSession);

                return redirect()->to(base_url('/dashboard'));
            } else {
                // Passwords don't match

                // $userSession = [
                //     'username' => $user->user_name,
                //     'firstname' => $user->first_name,
                //     'is_logged' => true,
                //     'role' => $user->role,
                //     'branch' => $user->primary_unit,
                //     'permissions' => $this->rolepermissionsmodel->getPermissions($user->role),
                //     'user_id' => $user->id,
                //     'user_avatar' => $user->avatar

                // ];
                // $this->session->set($userSession);
                // return redirect()->to(base_url('/dashboard'));
                return view('errors/loginError');
            }




        }



    }

    public function logout()
    {
        $this->session->destroy();
        return redirect('/');
    }

    public function logInvalid()
    {
        return view('errors/loginError');
    }

}