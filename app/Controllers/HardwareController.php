<?php

namespace App\Controllers;

use App\Models\HardwareBrandsModel;
use App\Models\HardwareModelsModel;
use App\Models\HardwareTypesModel;
use App\Models\HardwareTypesBrandModelMapping;



class HardwareController extends BaseController
{
    protected $hardwaretypesmodel;
    protected $hardwarebrandsmodel;
    protected $hardwaremodelsmodel;
    protected $hardwaremappingmodel;

    public function __construct()
    {
        $this->hardwaretypesmodel = new HardwareTypesModel();
        $this->hardwarebrandsmodel = new HardwareBrandsModel();
        $this->hardwaremodelsmodel = new HardwareModelsModel();
        $this->hardwaremappingmodel = new HardwareTypesBrandModelMapping();
    }

    public function getselectedtype($id = false)
    {

        if ((int) $id > 0) {

            $data['id'] = $this->hardwaretypesmodel->search_by_id($id)['id'];
            $data['hardware_name'] = $this->hardwaretypesmodel->search_by_id($id)['hardware_name'];
            $data['status'] = $this->hardwaretypesmodel->search_by_id($id)['status'];

            $data['typelist'] = $this->hardwaretypesmodel->getList();

            return view('HardwareManagementView/EditHardwareType', $data);
        } else {
            redirect('not_good_id_method', 'refresh'); //in case of not valid id
        }
    }

    public function getselectedmodel($id = false)
    {

        if ((int) $id > 0) {

            $data['id'] = $this->hardwaremodelsmodel->search_by_id($id)['id'];
            $data['model_name'] = $this->hardwaremodelsmodel->search_by_id($id)['model_name'];
            $data['status'] = $this->hardwaremodelsmodel->search_by_id($id)['status'];


            $data['modellist'] = $this->hardwaremodelsmodel->getList();


            return view('HardwareManagementView/EditHardwareModel', $data);
        } else {
            redirect('not_good_id_method', 'refresh'); //in case of not valid id
        }
    }

    public function getselectedbrand($id = false)
    {

        if ((int) $id > 0) {

            $data['id'] = $this->hardwarebrandsmodel->search_by_id($id)['id'];
            $data['brand_name'] = $this->hardwarebrandsmodel->search_by_id($id)['brand_name'];
            $data['status'] = $this->hardwarebrandsmodel->search_by_id($id)['status'];

            $data['brandlist'] = $this->hardwarebrandsmodel->getList();


            return view('HardwareManagementView/EditHardwareBrand', $data);
        } else {
            redirect('not_good_id_method', 'refresh'); //in case of not valid id
        }
    }

    public function getselectedmapping($id = false)
    {

        if ((int) $id > 0) {

            $data['id'] = $this->hardwaremappingmodel->search_by_id($id)['id'];
            $data['tid'] = $this->hardwaremappingmodel->search_by_id($id)['tid'];
            $data['bid'] = $this->hardwaremappingmodel->search_by_id($id)['bid'];
            $data['mid'] = $this->hardwaremappingmodel->search_by_id($id)['mid'];

            return view('HardwareManagementView/EditHardwareMapping', $data);
        } else {
            redirect('not_good_id_method', 'refresh'); //in case of not valid id
        }
    }

    public function gettypelist()
    {

        $data['typelist'] = $this->hardwaretypesmodel->getList();
        return view('HardwareManagementView/ViewHardwareType', $data);

    }

    public function getmodellist()
    {

        $data['modellist'] = $this->hardwaremodelsmodel->getList();
        return view('HardwareManagementView/ViewHardwareModel', $data);

    }

    public function getbrandlist()
    {

        $data['brandlist'] = $this->hardwarebrandsmodel->getList();
        return view('HardwareManagementView/ViewHardwareBrand', $data);

    }

    public function getmappinglist()
    {

        $data['mappinglist'] = $this->hardwaremappingmodel->getList();
        return view('HardwareManagementView/ViewHardwareMapping', $data);

    }

    public function getmappinglistbytype()
    {

        $table1Model = new HardwareTypesBrandModelMapping();
        $table2Model = new HardwareBrandsModel();

        $id = $this->request->getPost('id');

        $result = $table1Model->select('hardware_type_brand_model_mapping.*, hardware_brands.brand_name as brand_name')
            ->join('hardware_brands', 'hardware_type_brand_model_mapping.bid = hardware_brands.id')
            ->where('hardware_type_brand_model_mapping.tid', $id)
            ->findAll();

        $data['brandlist'] = $result;
        return $this->respond(['status' => 100, 'data' => $data]);

    }

    public function getmappinglistbytypeandbrand()
    {

        $table1Model = new HardwareTypesBrandModelMapping();
        $table2Model = new HardwareBrandsModel();

        $tid = $this->request->getPost('tid');
        $bid = $this->request->getPost('bid');

        //print_r($tid);
        //print_r($bid);

        $result = $table1Model->select('hardware_type_brand_model_mapping.*, hardware_models.model_name as model_name')
            ->join('hardware_models', 'hardware_type_brand_model_mapping.mid = hardware_models.id')
            ->where('hardware_type_brand_model_mapping.tid', $tid)
            ->where('hardware_type_brand_model_mapping.bid', $bid)
            ->findAll();

        $data['brandlist'] = $result;
        return $this->respond(['status' => 100, 'data' => $data]);

    }






    public function gettypelisttoadd()
    {

        $data['typelist'] = $this->hardwaretypesmodel->getList();
        return view('HardwareManagementView/AddHardwareType', $data);

    }

    public function getmodellisttoadd()
    {

        $data['modellist'] = $this->hardwaremodelsmodel->getList();
        return view('HardwareManagementView/AddHardwareModel', $data);

    }

    public function getbrandlisttoadd()
    {

        $data['brandlist'] = $this->hardwarebrandsmodel->getList();
        return view('HardwareManagementView/AddHardwareBrand', $data);

    }

    public function getmappinglisttoadd()
    {

        $data['mappinglist'] = $this->hardwaremappingmodel->getList();
        return view('HardwareManagementView/AddHardwareMappings', $data);

    }



    public function savetype()
    {
        $data = [
            "id" => (int) (trim($this->request->getVar('id'))),
            "hardware_name" => trim($this->request->getVar('hardwarename')),
            "status" => trim($this->request->getVar('status'))
        ];

        //print($this->request->getVar('hardwarename'));


        $result = $this->hardwaretypesmodel->savedata($data);

        print($result);

        if ($result > 0) {
            return redirect()->to(base_url('hardwaretypes/view'));

        } else {
            var_dump("save error!");
        }

        die;
    }

    public function savemodel()
    {
        $data = [
            "id" => trim($this->request->getVar('id')),
            "model_name" => trim($this->request->getVar('modelname')),
            "status" => trim($this->request->getVar('status'))
        ];

        $result = $this->hardwaremodelsmodel->savedata($data);

        if ($result > 0) {
            return redirect()->to(base_url('hardwaremodels/view'));

        } else {
            var_dump("save error!");
        }

        die;
    }

    public function savebrand()
    {
        $data = [
            "id" => trim($this->request->getVar('id')),
            "brand_name" => trim($this->request->getVar('brandname')),
            "status" => trim($this->request->getVar('status'))
        ];

        $result = $this->hardwarebrandsmodel->savedata($data);

        if ($result > 0) {
            return redirect()->to(base_url('hardwarebrands/view'));

        } else {
            var_dump("save error!");
        }

        die;
    }

    public function savemapping()
    {
        $data = [
            "tid" => trim($this->request->getVar('tid')),
            "bid" => trim($this->request->getVar('bid')),
            "mid" => trim($this->request->getVar('mid')),
        ];


        $result = $this->hardwaremappingmodel->savedata($data);

        if ($result > 0) {
            return redirect()->to(base_url('hardwaremapping/view'));

        } else {
            var_dump("save error!");
        }

        die;
    }

    public function deletetype($id)
    {


        $result = $this->hardwaretypesmodel->deletedata($id);

        if ($result > 0) {
            return redirect()->to(base_url('hardwaretypes/view'));

        } else {
            var_dump("save error!");
        }

        die;

    }

    public function deletemodel($id)
    {


        $result = $this->hardwaremodelsmodel->deletedata($id);

        if ($result > 0) {
            return redirect()->to(base_url('hardwaremodels/view'));

        } else {
            var_dump("save error!");
        }

        die;

    }

    public function deletebrand($id)
    {


        $result = $this->hardwarebrandsmodel->deletedata($id);

        if ($result > 0) {
            return redirect()->to(base_url('hardwarebrands/view'));

        } else {
            var_dump("save error!");
        }

        die;

    }


    public function deletemapping($id)
    {


        $result = $this->hardwaremappingmodel->deletedata($id);

        if ($result > 0) {
            return redirect()->to(base_url('hardwaremapping/view'));

        } else {
            var_dump("save error!");
        }

        die;

    }

    public function searchandupdatetype()
    {

        if ($this->request->getPost()) {



            $id = $this->request->getPost('id');
            $hardwarename = $this->request->getPost('hardware_name');
            $status = $this->request->getPost('status');

            //print("dfdf");
            //print($hardwarename);

            // Check if the ID and role name are provided
            if (!$id || !$hardwarename) {
                // Handle the case where ID or role name is not provided
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID or unit name');
            }

            // Search for the role
            $existingtype = $this->hardwaretypesmodel->search_by_id($id);

            if (!$existingtype) {
                // Handle the case where the role is not found
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Hardware Type not found');
            }

            $data = [
                "id" => trim($this->request->getPost('id')),
                "hardware_name	" => trim($this->request->getPost('hardware_name')),
                "status" => trim($this->request->getPost('status')),
            ];

            // Perform the update operation
            $affectedRows = $this->hardwaretypesmodel->updatebyId($id, $data);

            if ($affectedRows > 0) {
                // Record updated successfully
                //$data['rolelist'] = $this->unitmodel->getUnits();

                return redirect()->to(base_url('hardwaretypes/view'));


                //return view('RoleManagementView/ViewRole', $data);
            } else {
                // No record was updated
                throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
            }

        }
    }

    public function searchandupdatemodel()
    {

        if ($this->request->getPost()) {



            $id = $this->request->getPost('id');
            $modelname = $this->request->getPost('modelname');
            $status = $this->request->getPost('status');

            //print("dfdf");
            //print($id);

            // Check if the ID and role name are provided
            if (!$id || !$modelname) {
                // Handle the case where ID or role name is not provided
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID or unit name');
            }

            // Search for the role
            $existingmodel = $this->hardwaremodelsmodel->search_by_id($id);

            if (!$existingmodel) {
                // Handle the case where the role is not found
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Hardware model not found');
            }

            $data = [
                "id" => trim($this->request->getPost('id')),
                "model_name" => trim($this->request->getPost('modelname')),
                "status" => trim($this->request->getPost('status')),
            ];

            // Perform the update operation
            $affectedRows = $this->hardwaremodelsmodel->updatebyId($id, $data);

            if ($affectedRows > 0) {
                // Record updated successfully
                //$data['rolelist'] = $this->unitmodel->getUnits();

                return redirect()->to(base_url('hardwaremodels/view'));


                //return view('RoleManagementView/ViewRole', $data);
            } else {
                // No record was updated
                throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
            }

        }
    }


    public function searchandupdatebrand()
    {

        if ($this->request->getPost()) {



            $id = $this->request->getPost('id');
            $brandname = $this->request->getPost('brand_name');
            $status = $this->request->getPost('status');

            //print("dfdf");
            //print($id);

            // Check if the ID and role name are provided
            if (!$id || !$brandname) {
                // Handle the case where ID or role name is not provided
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID or brand name');
            }

            // Search for the role
            $existingbrand = $this->hardwarebrandsmodel->search_by_id($id);

            if (!$existingbrand) {
                // Handle the case where the role is not found
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Hardware Brand not found');
            }

            $data = [
                "id" => trim($this->request->getPost('id')),
                "brand_name" => trim($this->request->getPost('brand_name')),
                "status" => trim($this->request->getPost('status')),
            ];

            // Perform the update operation
            $affectedRows = $this->hardwarebrandsmodel->updatebyId($id, $data);

            if ($affectedRows > 0) {
                // Record updated successfully
                //$data['rolelist'] = $this->unitmodel->getUnits();

                return redirect()->to(base_url('hardwarebrands/view'));


                //return view('RoleManagementView/ViewRole', $data);
            } else {
                // No record was updated
                throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
            }

        }
    }


    public function searchandupdatemapping()
    {

        if ($this->request->getPost()) {

            $id = $this->request->getPost('id');
            $tid = $this->request->getPost('tid');
            $bid = $this->request->getPost('bid');
            $mid = $this->request->getPost('mid');

            // Check if the ID and role name are provided
            if (!$id || !$this->hardwaremappingmodel) {
                // Handle the case where ID or role name is not provided
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Invalid ID or mapping');
            }

            // Search for the role
            $existingmapping = $this->hardwaremappingmodel->search_by_id($id);

            if (!$existingmapping) {
                // Handle the case where the role is not found
                throw new \CodeIgniter\Exceptions\PageNotFoundException('Mapping not found');
            }

            $data = [
                "id" => trim($this->request->getPost('id')),
                "tid" => trim($this->request->getPost('tid')),
                "bid" => trim($this->request->getPost('bid')),
                "mid" => trim($this->request->getPost('mid'))
            ];

            // Perform the update operation
            $affectedRows = $this->hardwaremappingmodel->updatebyId($id, $data);

            if ($affectedRows > 0) {
                // Record updated successfully
                //$data['rolelist'] = $this->unitmodel->getUnits();

                return redirect()->to(base_url('hardwaremappings/view'));


                //return view('RoleManagementView/ViewRole', $data);
            } else {
                // No record was updated
                throw new \CodeIgniter\Exceptions\PageNotFoundException('No record was updated');
            }

        }
    }



}

