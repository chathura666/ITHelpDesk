<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">
    <!-- Custom Stylesheet -->

    <!-- Lakmal for check strnatcasecmp -->


    <!-- Custom Stylesheet -->
    <link href="<?php echo base_url('plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css'); ?>" rel="stylesheet">
    

    <!-- Page plugins css -->


    <!-- Date picker plugins css -->
    <link href="<?php echo base_url('plugins/bootstrap-datepicker/bootstrap-datepicker.min.css'); ?>" rel="stylesheet">


    <link href="<?php echo base_url('plugins/bootstrap-daterangepicker/daterangepicker.css'); ?>" rel="stylesheet">

  

    <!-- lakmal for check END -->
</head>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Edit User</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">


            <!-- insert for date -->

            <div class="col-12">
                        <!-- Card -->
                <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="<?php echo base_url('/user/update');?>" method="post" accept-charset="utf-8">
                                <h4 class="card-title">User Details</h4>
                                	 <br>
                                	 <input type="text" class="form-control" name="userid" value="<?= $edituserid?>">
                                    <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label>Username</label>
                                                     <?php if (isset($editusername)) { ?>
                                                <input type="text" class="form-control" name="username" value="<?= $editusername?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="username" value="">
                                            <?php } ?>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label>First Name</label>
                                                     <?php if (isset($edituserfname)) { ?>
                                                <input type="text" class="form-control" name="firstname" value="<?= $edituserfname?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="firstname" value="">
                                            <?php } ?>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Last Name</label>
                                                    <?php if (isset($edituserlname)) { ?>
                                                <input type="text" class="form-control" name="lastname" value="<?= $edituserlname?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="lastname" value="">
                                            <?php } ?>
                                                </div>
                                                
                                                
                                    </div>

                                    <div class="form-row">

                                    			<div class="form-group col-md-3">
                                                     <label>Role</label>
                                                    <select name="role" id="inputState" class="form-control">
                                                        <option value="<?= $edituserrole?>"><?php echo $editrolename; ?></option>
                                                        <?php foreach($rolelist as $role) { ?>
                                                            <option value="<?php echo $role->role_id; ?>"><?php echo $role->role_name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                                </div>
                                            <div class="form-group col-md-3">
                                                    <label>Assigned Unit</label>
                                                    <select name="unit" id="inputState" class="form-control">
                                                        <option value="<?= $edituserdep?>"><?php echo $editunitname; ?></option>
                                                        <?php foreach($unitlist as $unit) { ?>
                                                            <option value="<?php echo $unit->id; ?>"><?php echo $unit->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                            </div>
                                                
                                               
                                    </div>
                                            
                                    <div class="form-row">

                                     <div class="form-group col-md-3">
                                                    <label>Email</label>
                                                    <?php if (isset($edituseremail)) { ?>
                                                <input type="text" class="form-control" name="email" value="<?= $edituseremail?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="email" value="">
                                            <?php } ?>
                                                </div>
                                            <div class="form-group col-md-3">
                                                <label>Mobile No</label>
                                                 <?php if (isset($editusermobile)) { ?>
                                                <input type="text" class="form-control" name="mobile" value="<?= $editusermobile?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="mobile" value="">
                                            <?php } ?>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Ext</label>
                                                 <?php if (isset($edituserext)) { ?>
                                                <input type="text" class="form-control" name="ext" value="<?= $edituserext?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="ext" value="">
                                            <?php } ?>
                                            </div>
                                             <div class="form-group col-md-1">
                                                <label>Status</label>
                                                 <?php if (isset($edituseractive)) { ?>
                                                <input type="text" class="form-control" name="active" value="<?= $edituseractive?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="active" value="">
                                            <?php } ?>
                                            </div>

                                           
                                    </div>
                                     
                                </div>
                                <br>                
                                <button type="submit" class="btn btn-dark">Edit Unit</button>
                            </form>
                        </div>

                        <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                      
                                                        
                                                        <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>User Name</th>
                                                                    <th>First Name</th>
                                                                    <th>Last Name</th>                                                               
                                                                    <th>Email</th>
                                                                    <th>Active</th> 
                                                                    <th>Extension</th>
                                                                    <th>Mobile</th>
                                                                    <th>Department</th>                                                               
                                                                    <th>Role</th> 
                                                                    <th>Created On</th>                                                                 
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($userlist as $user): ?>	
                                                                <tr>                                                                   

                                                                    <th><?php echo $user->id; ?></th>
                                                                    <th><?php echo $user->user_name; ?></th>
                                                                    <th><?php echo $user->first_name; ?></th>
                                                                    <th><?php echo $user->last_name; ?></th>                                                               
                                                                    <th><?php echo $user->email; ?></th>
                                                                    <th><?php echo $user->active; ?></th> 
                                                                    <th><?php echo $user->ext; ?></th>
                                                                    <th><?php echo $user->mobile; ?></th>
                                                                    <th><?php echo $user->primary_unit; ?></th>
                                                                    <th><?php echo $user->role; ?></th>                                                               
                                                                    <th><?php echo $user->created_at; ?></th> 
                                                             
                                                                    
                                                                    <td><span><a href="<?php echo base_url('user/edit/'.$user->id);?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                                    <a href="<?php echo base_url('user/delete/'.$user->id);?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash color-danger"></i></a></span>                                                                    
                                                                    </td>
                                                                </tr>
                                                                <?php endforeach ?>
                                                            </tbody>                                                            
                                                        </table>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        
                        <!-- Card -->
                    </div>

                </div>
            </div>
            


        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->

        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="<?php echo base_url('plugins/common/common.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/custom.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/settings.js'); ?>"></script>
    <script src="<?php echo base_url('js/gleek.js'); ?>"></script>
    <script src="<?php echo base_url('js/styleSwitcher.js'); ?>"></script>

    <script src="<?php echo base_url('plugins/moment/moment.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js'); ?>"></script>

    <script src="<?php echo base_url('js/plugins-init/form-pickers-init.js'); ?>"></script> 
   

    <!-- Lakmal for check start -->



    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asColor.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js'); ?>"></script>

      <!-- Lakmal for check end -->

      

<?= $this->endSection() ?>



    


 

