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
    <link href="<?php echo base_url('plugins/clockpicker/dist/jquery-clockpicker.min.css'); ?>" rel="stylesheet">

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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
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
                            <form action="<?php echo base_url('/requests/approval/'.$datasearch_by_Id['req_id']);?>" method="post" accept-charset="utf-8">
                                <h4 class="card-title">Requestor's Information</h4>

                                    <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Name</label>
                                                    <input type="name" class="form-control" placeholder="Name" name="name" value="<?= $datasearch_by_Id['staffmember']; ?>">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" placeholder="Email" value="<?= $datasearch_by_Id['email']; ?>">
                                                </div>
                                    </div>
                                            
                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label>Mobile No</label>
                                                <input type="text" class="form-control" value="<?= $datasearch_by_Id['mobile']; ?>">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Ext</label>
                                                <input type="text" class="form-control" value="<?= $datasearch_by_Id['extention']; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label class="m-t-20">Date</label>
                                                <input type="text" class="form-control" placeholder="2017-06-06" id="req_mdate" value="<?= $datasearch_by_Id['date']; ?>">
                                            </div>                                            
                                            <div class="form-group col-md-2">
                                                <label>PF No</label>
                                                <input type="text" class="form-control" value="<?= $datasearch_by_Id['pfno']; ?>">
                                            </div>
                                    </div>
                                     
                                </div>

                                    <div class="form-row">
                                            <div class="form-group col-md-4">
                                                    <label>Department</label>
                                                    <input type="text" class="form-control" value="<?= $datasearch_by_Id['department']; ?>">
                                            </div>
                                            <div class="form-group col-md-4">
                                                    <label>Position</label>
                                                    <input type="text" class="form-control" value="<?= $datasearch_by_Id['position']; ?>">
                                            </div>                                           
                                     
                                    </div>                                           
                            

                                <br>
                              
                                <h4 class="card-title">Information about the access request</h4>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label>Type of Change  </label>
                                                <div class="form-group row-md-4">
                                                    <div class="form-check">                                                
                                                        <input class="form-check-input" type="radio" id="add" name="type"  value="Add" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['typeofchange'] == "add" ? "checked" : "") ?> required>                                                        
                                                        <label class="form-check-label">Add</label>                                                
                                                    </div>
                                                </div>
                                                <div class="form-group row-md-4">
                                                    <div class="form-check">                                                
                                                        <input class="form-check-input" type="radio" id="modify" name="type"  value="Modify" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['typeofchange'] == "modify" ? "checked" : "") ?> required>
                                                        <label class="form-check-label">Modify</label>                                                
                                                    </div>
                                                </div>
                                                <div class="form-check">                                                
                                                <input class="form-check-input" type="radio" id="remove" name="type"  value="Remove" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['typeofchange'] == "remove" ? "checked" : "") ?> required>
                                                    <label class="form-check-label">Remove</label>                                                
                                                </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label>Category </label>
                                                <div class="form-group row-md-4">
                                                    <div class="form-check">                                                
                                                    <input class="form-check-input" type="radio" id="permanent" name="category"  value="Permanent" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['category'] == "per" ? "checked" : "") ?> required>
                                                        <label class="form-check-label">Permanent</label>                                                
                                                    </div>
                                                </div>
                                                <div class="form-group row-md-4">
                                                    <div class="form-check">                                                
                                                    <input class="form-check-input" type="radio" id="test" name="category"  value="Test" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['category'] == "Temp" ? "checked" : "") ?> required>
                                                        <label class="form-check-label">Test/Temp</label>                                                
                                                    </div>
                                                </div>
                                        </div>                                        
                                                <div class="form-group col-md-4">
                                                    <label class="m-t-20">Expiration Date</label>
                                                    <input type="text" class="form-control" id="exdate" value="<?= $datasearch_by_Id['expiredate']; ?>">
                                                </div> 
                                       

                                    </div>

                                    <div class="form-row">
                                        
                                            <div class="form-group col-md-4">
                                                    <label class="m-t-20">Effective From</label>
                                                    <input type="text" class="form-control" id="efrmdate" value="<?= $datasearch_by_Id['effectdate']; ?>">
                                            </div>                                             
                                              
                                        
                                            <div class="form-group col-md-8">
                                                <label>Explanation of Change Application</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px" rows="4" id="comment"><?php echo $datasearch_by_Id["explanation"] ?></textarea>
                                            </div>
                                    </div>                                        
                                                
                                       

                                </div>


                                    <h4 class="card-title">Detailed Firewall Request Information</h4>
                                    <div class="form-row">

                                            <div class="form-group col-md-3">
                                                <label>Source Address/Subnet Mask</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px" rows="4" id="source"><?php echo $datasearch_by_Id["source"] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Destination Address/Subnet Mask</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px" rows="4" id="desti"><?php echo $datasearch_by_Id["destination"] ?></textarea>
                                                </div>
                                            </div>                                
                                            <div class="form-group col-md-3">
                                                <label>Protocols</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px" rows="4" id="protocol"><?php echo $datasearch_by_Id["protocol"] ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Ports</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px" rows="4" id="port"><?php echo $datasearch_by_Id["ports"] ?></textarea>
                                                </div>
                                            </div>
                                       

                                    </div>

                                    <div class="form-row">

                                            <div class="form-group col-md-4">
                                                <label>Direction </label>
                                                    <div class="form-group row-md-4">
                                                        <div class="form-check">                                                
                                                            <input class="form-check-input" type="radio" id="dir" name="direction" value="bi-dir" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['direction'] == "bi-dir" ? "checked" : "") ?>>
                                                            <label class="form-check-label">Bi-Direction</label>                                                
                                                        </div>
                                                    </div>
                                                    <div class="form-group row-md-4">
                                                        <div class="form-check">                                                
                                                            <input class="form-check-input" type="radio" id="dir" name="direction" value="uni-dir" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['direction'] == "uni-dir" ? "checked" : "") ?>>
                                                            <label class="form-check-label">Uni-Direction</label>                                                
                                                        </div>
                                                    </div>
                                            </div>  

                                            <div class="form-group col-md-4">
                                                <label>Action </label>
                                                    <div class="form-group row-md-4">
                                                        <div class="form-check">                                                
                                                            <input class="form-check-input" type="radio" id="act" name="action" value="permit" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['action'] == "permit" ? "checked" : "") ?>>
                                                            <label class="form-check-label">Permit</label>                                                
                                                        </div>
                                                    </div>
                                                    <div class="form-group row-md-4">
                                                        <div class="form-check">                                                
                                                            <input class="form-check-input" type="radio" id="act" name="action" value="deny" <?= $datasearch_by_Id == 0 ? "" : ($datasearch_by_Id['action'] == "deny" ? "checked" : "") ?>>
                                                            <label class="form-check-label">Deny</label>                                                
                                                        </div>
                                                    </div>
                                            </div>
                                                                            
                                                
                                       
                                    </div>

                                
                                <button type="submit" name="appr" value="appr" class="btn btn-dark">Approve</button>
                                <button type="submit" name="rej" value="rej" class="btn btn-dark">Reject</button>

                            </form>
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


    <!-- Clock Plugin JavaScript -->
    <script src="<?php echo base_url('/plugins/clockpicker/dist/jquery-clockpicker.min.js'); ?>"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asColor.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js'); ?>"></script>



  

      <!-- Lakmal for check end -->

      

<?= $this->endSection() ?>



    


 

