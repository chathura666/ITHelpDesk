<?php

namespace App\Controllers;

use App\Models\LogUserActionsModel;
use App\Models\UserModel;
use App\Models\UnitModel;
use App\Models\RoleModel;



class UserManagementController extends BaseController
{
    protected $usermodel;
    protected $rolemodel;
    protected $unitmodel;
    protected $logactionmodel;

    public function __construct()
    {
        $this->usermodel = new UserModel();
        $this->rolemodel = new RoleModel();
        $this->unitmodel = new UnitModel();
        $this->logactionmodel = new LogUserActionsModel();
    }

    public function checkSession()
    {
        if (isset ($_SESSION['user_id'])) {


            $id = $_SESSION['user_id'];
            return true;
        } else {
            echo "not found";
            return false;
        }
    }

    // public function updateuser()
    // {
    //     $userdata = [
    //         "role_name" => trim($this->request->getVar('rolename'))
    //     ];

    //     $result = $this->usermodel->saveRole($userdata);

    //     if ($result > 0) {

    //         $this->setUserActions("UPDATE","role name updated",$_SESSION['user_id']);

    //         var_dump("saved successfully");
    //     } else {
    //         var_dump("save error!");
    //     }

    //     die;
    // }

    public function getselecteduser($id = false)
    {

        if ($this->checkSession()) {

            if ($id) {

                $data['unitlist'] = $this->unitmodel->getUnits();
                $data['rolelist'] = $this->rolemodel->getRole();
                $data['userlist'] = $this->usermodel->getUsers();


                $data['edituserid'] = $this->usermodel->search_by_id($id)['id'];
                $data['editusername'] = $this->usermodel->search_by_id($id)['user_name'];
                $data['edituserfname'] = $this->usermodel->search_by_id($id)['first_name'];
                $data['edituserlname'] = $this->usermodel->search_by_id($id)['last_name'];
                $data['edituseremail'] = $this->usermodel->search_by_id($id)['email'];
                $data['editusermobile'] = $this->usermodel->search_by_id($id)['mobile'];
                $data['edituseractive'] = $this->usermodel->search_by_id($id)['active'];
                $data['edituserext'] = $this->usermodel->search_by_id($id)['ext'];
                $data['edituserdep'] = $this->usermodel->search_by_id($id)['primary_unit'];
                $data['edituserrole'] = $this->usermodel->search_by_id($id)['role'];

                $data['editrolename'] = $this->rolemodel->search_by_id($data['edituserrole'])['role_name'];
                $data['editunitname'] = $this->unitmodel->search_by_id($data['edituserdep'])['name'];

                $data['editcreatedate'] = $this->usermodel->search_by_id($id)['created_on'];

                return view('UserManagementView/EditUserDetails', $data);
            } else {
                redirect('not_good_id_method', 'refresh');
            }
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function getloggedUser()
    {

        if ($this->checkSession()) {

            if (isset ($_SESSION['user_id'])) {

                $id = $_SESSION['user_id'];

                if ($id) {

                    $data['unitlist'] = $this->unitmodel->getUnits();
                    $data['rolelist'] = $this->rolemodel->getRole();
                    $data['userlist'] = $this->usermodel->getUsers();
                    

                    $data['edituserid'] = $this->usermodel->search_by_id($id)['id'];
                    $data['editusername'] = $this->usermodel->search_by_id($id)['user_name'];
                    $data['edituserfname'] = $this->usermodel->search_by_id($id)['first_name'];
                    $data['edituserlname'] = $this->usermodel->search_by_id($id)['last_name'];
                    $data['edituseremail'] = $this->usermodel->search_by_id($id)['email'];
                    $data['editusermobile'] = $this->usermodel->search_by_id($id)['mobile'];
                    $data['edituseractive'] = $this->usermodel->search_by_id($id)['active'];
                    $data['edituserext'] = $this->usermodel->search_by_id($id)['ext'];
                    $data['edituserdep'] = $this->usermodel->search_by_id($id)['primary_unit'];
                    $data['edituserrole'] = $this->usermodel->search_by_id($id)['role'];
                    //print_r($data);

                    $data['editrolename'] = $this->rolemodel->search_by_id($data['edituserrole'])['role_name'];
                    //print_r($data);
                    $data['editunitname'] = $this->unitmodel->search_by_id($data['edituserdep'])['name'];
                    //print_r($data);

                    $data['editcreatedate'] = $this->usermodel->search_by_id($id)['created_on'];
                    //print_r($data);

                    return view('UserManagementView/EditPersonalUserDetails', $data);
                } else {
                    redirect('not_good_id_method', 'refresh');
                }
            } else {
                return redirect()->to(base_url('login'));
            }
        } else {
            return redirect()->to(base_url('login'));
        }
    }


    public function getroleuserlisttoedit()
    {
        if ($this->checkSession()) {
            $data['edtrolelist'] = $this->usermodel->getUsers();
            return view('RoleManagementView/EditRole', $data);

        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function getuserlist()
    {
        if ($this->checkSession()) {

            $result = $this->usermodel->select('user_master.*, roles_master.role_name as role_name,units.name as name')
                ->join('roles_master', 'user_master.role  = roles_master.role_id')
                ->join('units', 'user_master.primary_unit = units.id')
                ->get()->getResult();

            $data['userlist'] = $result;

            return view('UserManagementView/ViewUser', $data);
        } else {
            return redirect()->to(base_url('login'));
        }

    }


    public function getuserlistreport()
    {
        if ($this->checkSession()) {

            $datetype = $this->request->getVar('datetype');
            $periodfrom = $this->request->getVar('periodfrom');
            $periodto = $this->request->getVar('periodto');
            $singledate = $this->request->getVar('singledate');
            $unitchk = $this->request->getVar('unitchk');
            $statuschk = $this->request->getVar('statuschk');
            $rolechk = $this->request->getVar('rolechk');
            $unitval = $this->request->getVar('unitval');
            $statusval = $this->request->getVar('statusval');
            $roleval = $this->request->getVar('roleval');



            $query = $this->usermodel
                ->select('user_master.id, user_master.user_name, user_master.password, user_master.first_name, user_master.last_name, user_master.email, user_master.mobile, user_master.active, user_master.ext, user_master.role, user_master.primary_unit, user_master.avatar, user_master.created_on, user_master.updated_on, roles_master.role_name, units.name')
                ->join('roles_master', 'user_master.role = roles_master.role_id')
                ->join('units', 'user_master.primary_unit = units.id');

            //print_r("Status".$statuschk);
            //print_r("Unit".$unitchk);
            //print_r("Role".$rolechk);

            // Add where clauses conditionally
            if ($rolechk == "yes") {
                $query->where('user_master.role', $roleval);
            }


            if ($unitchk == "yes") {
                $query->where('user_master.primary_unit', $unitval);
            }


            if ($statuschk == "yes") {

                $query->where('user_master.active', $statusval);
            }




            if ($datetype === "no") {

            } else if ($datetype === "single") {
                $query->where("DATE_FORMAT(user_master.created_on, '%m/%d/%Y')", $singledate);

            } else if ($datetype === "range") {
                $query->where("DATE_FORMAT(user_master.created_on, '%m/%d/%Y') >=", $periodfrom)
                    ->where("DATE_FORMAT(user_master.created_on, '%m/%d/%Y') <=", $periodto);

            }

            $result = $query->get()->getResult();

            $data['userlist'] = $result;

            //$lastQuery = $this->usermodel->getLastQuery();

            // Display or log the last executed query
            //echo $lastQuery;


            return $this->respond(['status' => 100, 'data' => $data]);
        } else {
            return redirect()->to(base_url('login'));
        }

    }

    public function getuserlisttoadd()
    {

        if ($this->checkSession()) {
            $data['unitlist'] = $this->unitmodel->getUnits();
            $data['rolelist'] = $this->rolemodel->getRole();




            $result = $this->usermodel->select('user_master.*, roles_master.role_name as role_name,units.name as name')
                ->join('roles_master', 'user_master.role  = roles_master.role_id')
                ->join('units', 'user_master.primary_unit = units.id')
                ->get()->getResult();

            $data['userlist'] = $result;

            return view('UserManagementView/AddUser', $data);

        } else {
            return redirect()->to(base_url('login'));
        }

    }
    public function getrole()
    {
        if ($this->checkSession()) {
            $data['rolelist'] = $this->usermodel->getRole();

        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function save()
    {

        if ($this->checkSession()) {
            $un = $this->request->getVar('username');

            $existingUser = $this->usermodel->findUserByUsername($un);

            if ($existingUser) {

                return json_encode(['status' => 'user exist']);
            } else {

                $hashedPassword = password_hash(trim($this->request->getVar('password')), PASSWORD_DEFAULT);

                $userdata = [
                    "user_name" => trim($this->request->getVar('username')),
                    "first_name" => trim($this->request->getVar('firstname')),
                    "last_name" => trim($this->request->getVar('lastname')),
                    "email" => trim($this->request->getVar('email')),
                    "mobile" => trim($this->request->getVar('mobile')),
                    "active" => "1",
                    "ext" => trim($this->request->getVar('ext')),
                    "primary_unit" => trim($this->request->getVar('unit')),
                    "role" => trim($this->request->getVar('role')),
                    "password" => $hashedPassword,
                    "avatar" => trim($this->request->getVar('avatar'))
                ];

                $result = $this->usermodel->saveUser($userdata);

                if ($result > 0) {

                    $this->setUserActions('INSERT', 'New User Saved - ' . $un);

                    return json_encode(['status' => 'success']);

                } else {
                    var_dump("save error!");
                }


            }
        } else {
            return redirect()->to(base_url('login'));
        }


    }


    public function deleteselecteduser($id)
    {

        if ($this->checkSession()) {
            $model = new usermodel();
            $model->where('id', $id)->delete();

            $this->setUserActions('DELETE', 'User Deleted - ' . $id);

            return redirect()->to(base_url('user/view'));
        } else {
            return redirect()->to(base_url('login'));
        }

    }

    public function searchAndUpdate()
    {

        if ($this->checkSession()) {
            if ($this->request->getPost()) {



                $id = $this->request->getPost('userid');
                $user_name = trim($this->request->getVar('username'));

                if (!$id) {

                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID');
                }


                $userModel = new UserModel();


                $existingUser = $userModel->findUser($id);

                if (!$existingUser) {

                    throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
                }

                $userdata = [
                    "first_name" => trim($this->request->getVar('firstname')),
                    "last_name" => trim($this->request->getVar('lastname')),
                    "email" => trim($this->request->getVar('email')),
                    "mobile" => trim($this->request->getVar('mobile')),
                    "active" => trim($this->request->getVar('active')),
                    "ext" => trim($this->request->getVar('ext')),
                    "avatar" => trim($this->request->getVar('avatar'))
                ];

                $affectedRows = $userModel->updateUser($id, $userdata);

                if ($affectedRows > 0) {

                    $this->setUserActions('UPDATE', 'User Updated - ' . $this->request->getVar('username'));
                    $_SESSION['user_avatar'] = $this->request->getVar('avatar');
                    return json_encode(['status' => 'success']);

                } else {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
                }

            }
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function searchAndUpdatePassword()
    {
        if ($this->checkSession()) {
            $this->checkSession();

            if ($this->request->getPost()) {



                $id = $this->request->getPost('userid');
                $user_name = trim($this->request->getVar('username'));
                $currentpw = trim($this->request->getVar('currentpw'));
                if (!$id) {
                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID');
                }

                $userModel = new UserModel();

                $existingUser = $userModel->findUser($id);

                if (!$existingUser) {

                    return json_encode(['status' => 'User not found']);
                } else {


                    if (password_verify($currentpw, $existingUser['password'])) {
                        $hashedPassword = password_hash(trim($this->request->getVar('password')), PASSWORD_DEFAULT);

                        $userdata = [
                            "password" => $hashedPassword
                        ];

                        $affectedRows = $userModel->updateUser($id, $userdata);

                        if ($affectedRows > 0) {

                            $this->setUserActions('UPDATE', 'User Password Updated - ' . $existingUser['user_name']);

                            return json_encode(['status' => 'success']);

                        } else {

                            throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
                        }
                    } else {
                        return json_encode(['status' => 'Invalid Current Password']);
                    }



                }



            }
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function searchAndUpdateStatus()
    {
        if ($this->checkSession()) {
            $this->checkSession();

            if ($this->request->getPost()) {

                $id = $this->request->getPost('userid');
                $currentsts = trim($this->request->getVar('status'));


                if (!$id) {

                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID');
                }

                $userModel = new UserModel();

                $existingUser = $userModel->findUser($id);

                if (!$existingUser) {

                    return json_encode(['status' => 'User not found']);
                } else {

                    $userdata = [
                        "active" => $currentsts
                    ];

                    $affectedRows = $userModel->updateUser($id, $userdata);

                    if ($affectedRows > 0) {

                        $this->setUserActions('UPDATE', 'User Status Updated - ' . $existingUser['user_name']);

                        return json_encode(['status' => 'success']);

                    } else {

                        throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
                    }
                }



            }

        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function searchUser()
    {
        if ($this->checkSession()) {
            $this->checkSession();

            if ($this->request->getPost()) {

                $id = $this->request->getPost('pfno');

                if (!$id) {

                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID');
                }

                $userModel = new UserModel();

                $existingUser = $userModel->findUserByUsername($id);
                //$existingUser['unitname'] = $this->unitmodel->search_by_id($existingUser['list']('primary_unit'))['name'];


                if (!$existingUser) {

                    return json_encode(['status' => 'User Not Found']);

                } else {


                    return $this->respond(['status' => 'success', 'data' => $existingUser]);

                }



            }

        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function searchAndResetPassword()
    {
        if ($this->checkSession()) {
            $this->checkSession();

            if ($this->request->getPost()) {



                $id = $this->request->getPost('userid');

                if (!$id) {

                    throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID');
                }

                $userModel = new UserModel();

                $existingUser = $userModel->findUser($id);

                if (!$existingUser) {

                    return json_encode(['status' => 'User not found']);
                } else {

                    $hashedPassword = password_hash($existingUser['user_name'], PASSWORD_DEFAULT);

                    $userdata = [
                        "password" => $hashedPassword
                    ];


                    $affectedRows = $userModel->updateUser($id, $userdata);

                    if ($affectedRows > 0) {

                        $this->setUserActions('UPDATE', 'User Password Reset - ' . $existingUser['user_name']);

                        return json_encode(['status' => 'success']);

                    } else {

                        throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
                    }
                }







            }
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function setUserActions($action, $remark)
    {

        $userdata = [
            "action" => trim($action),
            "remark" => trim($remark),
            "done_by" => trim($_SESSION['username'])
        ];

        $result = $this->logactionmodel->saveaction($userdata);

        if ($result > 0) {

            return json_encode(['status' => 'success']);

        } else {
            var_dump("save error!");
        }
    }


}

