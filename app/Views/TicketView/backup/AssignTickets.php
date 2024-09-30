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
                            <form action="<?php echo base_url('/requests/save');?>" method="post" accept-charset="utf-8">
                                <h4 class="card-title">Requestor's Information</h4>
<br>
                                    <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>Name</label>
                                                    <input type="name" class="form-control" placeholder="" name="name">
                                                </div>
                                                 <div class="form-group col-md-2">
                                                	<label>PF No</label>
                                                	<input type="text" class="form-control" name="pfno">
                                           		 </div>
                                                <div class="form-group col-md-4">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" placeholder="" name="email">
                                                </div>
                                    </div>
                                            
                                    <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label>Mobile No</label>
                                                <input type="text" class="form-control" name="mobile">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Ext</label>
                                                <input type="text" class="form-control" name="ext">
                                            </div>
                                            <div class="form-group col-md-3">
                                                    <label>Branch/Department</label>
                                                    <select id="inputState" class="form-control">
                                                        <option selected="selected">Choose Branch/Dep...</option>
                                                        <?php foreach($departments as $department) { ?>
                                                            <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                    <label>Position</label>
                                                    <select id="inputState" class="form-control">
                                                        <option selected="selected">Choose Grade...</option>
                                                        <?php foreach($departments as $department) { ?>
                                                            <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                                        <?php } ?>     
                                                    </select>
                                            </div>
                                                                                       
                                           
                                    </div>
                                     
                                </div>
                                        

                                <br>
                              
                                <h4 class="card-title">Information about the ticket request</h4>
                                <br>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
   
                                            <label>Type of Ticket  </label>
                                                <div class="form-group row-md-4">
                                                    <div class="form-check">                                                
                                                        <input class="form-check-input" type="radio" id="cht" name="changetype" value="software">
                                                        <label class="form-check-label">Software Related</label>                                                
                                                    </div>
                                                </div>
                                                <div class="form-group row-md-4">
                                                    <div class="form-check">                                                
                                                        <input class="form-check-input" type="radio" id="cht" name="changetype" value="hardware">
                                                        <label class="form-check-label">Hardware Related</label>                                                
                                                    </div>
                                                </div>                                               
                                        </div>
                                        <div class="form-group col-md-3">
                                                    <label>Hardware Brands</label>
                                                    <select id="inputState" class="form-control">
                                                        <option selected="selected">Choose Brand...</option>
                                                        <?php foreach($departments as $department) { ?>
                                                            <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                                <label>Hardware Model</label>
                                                <select id="inputState" class="form-control">
                                                    <option selected="selected">Choose Model...</option>
                                                    <?php foreach($departments as $department) { ?>
                                                        <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                                    <?php } ?>    
                                                </select>
                                        </div> 
                                       

                                    </div>

                                    <div class="form-row">
                                    		<div class="form-group col-md-7">
                                    				<label>Issue Category</label>
                                                    <select id="inputState" class="form-control">
                                                    <option selected="selected">Choose Issue...</option>
                                                    <?php foreach($departments as $department) { ?>
                                                        <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                                    <?php } ?>    
                                                </select>
                                            </div>

                                            <div class="form-group col-md-3">
                                    				<label>Priority</label>
                                                    <select id="inputState" class="form-control">
                                                    <option selected="selected">Choose level...</option>
                                                    <?php foreach($departments as $department) { ?>
                                                        <option value="<?php echo $department->id; ?>"><?php echo $department->name; ?></option>
                                                    <?php } ?>    
                                                </select>
                                            </div>
                                    </div>  

                                    <div class="form-row">
                                    		<div class="form-group col-md-4">
                                                    <label>IP Address</label>
                                                    <input type="text" class="form-control" placeholder="" name="ipAdd">
                                                </div>
                                        
                                    <div class="form-group col-md-3">
                                            <label class="m-t-20">Request Date</label>
                                            <input type="text" class="form-control" placeholder="" id="efrmdate" name="reqDate">
                                    </div>                                             
                                              
                                        
                                                                                 
                                                
                                       

                                	</div>
                                	<div class="form-row">
                                	<div class="form-group col-md-7">
                                                <label>Request Details</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px" rows="4" id="comment" name="explanation"></textarea>
                                            	</div>
                                    		</div>   

                                    		 </div>  
                                    <h4 class="card-title">Attchments</h4>
                                    <div class="form-row">
                                    	<div class="form-group col-md-7">
                                           <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                            <div class="input-group-append"><span class="input-group-text">Upload</span>
                                            </div>
                                            </div>
                                        </div>
                                       

                                    </div>

                                    
                                
                                <button type="submit" class="btn btn-dark">Request</button>
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



    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asColor.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js'); ?>"></script>
    <script src="<?php echo base_url('plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js'); ?>"></script>

      <!-- Lakmal for check end -->

      

<?= $this->endSection() ?>



    


 

