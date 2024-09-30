<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>

<style>
        /* CSS for file icons */
        .file-icon {
            width: 24px; /* Adjust icon size as needed */
            height: 24px; /* Adjust icon size as needed */
            vertical-align: middle;
            margin-right: 5px;
        }
    </style>


<script type="text/javascript">
    


$(document).ready(function() {

    if ($('#cht').is(':checked')) {
        //alert("dddd");
        var dropdown1 = document.getElementById("hwtype");
        var dropdown2 = document.getElementById("hwmodel");
        var dropdown3 = document.getElementById("hwbrand");


        dropdown1.style.display = "none"; // Hide the dropdown
        dropdown2.style.display = "none"; // Hide the dropdown
        dropdown3.style.display = "none"; // Hide the dropdown
    }

});




    function checkIssueCategorySoftware() {
        var position = $("#cht").val();

        var dropdown1 = document.getElementById("hwtype");
        var dropdown2 = document.getElementById("hwmodel");
        var dropdown3 = document.getElementById("hwbrand");


        dropdown1.style.display = "none"; // Hide the dropdown
        dropdown2.style.display = "none"; // Hide the dropdown
        dropdown3.style.display = "none"; // Hide the dropdown
        
        document.getElementById("hwbranddropdown").disabled = true;
        document.getElementById("hwmodeldropdown").disabled = true;


        loadSoftwareIssues();

    }

    function checkIssueCategoryHardware() {
        var position = $("#cht2").val();

        var dropdown1 = document.getElementById("hwtype");
        var dropdown2 = document.getElementById("hwmodel");
        var dropdown3 = document.getElementById("hwbrand");

        dropdown1.style.display = "block"; // Hide the dropdown
        dropdown2.style.display = "block"; // Hide the dropdown
        dropdown3.style.display = "block"; // Hide the dropdown

        document.getElementById("hwbranddropdown").disabled = true;
        document.getElementById("hwmodeldropdown").disabled = true;

        var selectType = document.getElementById('hwtypedropdown');
        //selectType.innerHTML = '';
        //var optionType = document.createElement('option');
        selectType.value = "choose"; 
       //selectType.se(optionType);

        var selectBrand = document.getElementById('hwbranddropdown');
        //selectBrand.innerHTML = '';
        //var optionBrand = document.createElement('option');
        selectBrand.value = "choose"; 
        //selectBrand.appendChild(optionBrand);

        var selectModel = document.getElementById('hwmodeldropdown');
        //selectModel.innerHTML = '';
        //var optionModel = document.createElement('option');
        selectModel.value = "choose";  
        //selectModel.appendChild(optionModel);


        loadHardwareIssues();

    }

    function loadBrands() {
        var typeid = $("#hwtypedropdown").val();

        $.post("<?php echo base_url();?>"+"/hardwareMapping/getbrandsbytype",
                {
                    id: typeid,
                },
                function(response){

                    if (response.status == 200) {
                        $data = json_decode(response.data, true);
                       
                        var userlists = response.data.userlists;
                        var select = document.getElementById('option');

                    } if (response.status == 100 && response.data && response.data.brandlist){  
                        
                        var brandlists = response.data.brandlist;
                        var select = document.getElementById('hwbranddropdown');

                    // Clear existing options
                         select.innerHTML = '';

                    // Loop through userlists and create option elements
                    brandlists.forEach(function(brand) {
                        var option = document.createElement('option');
                        option.value = brand.bid;
                        option.text = brand.brand_name; // Replace with the actual user property you want to display
                        select.appendChild(option);

                        loadModels();
                });

                document.getElementById("hwbranddropdown").disabled = false;


                    } else {
                        console.log('Error: ' + response.message);
                     }
                    
                });

                

    }

    function loadModels() {
        var typeid = $("#hwtypedropdown").val();
        var brandid = $("#hwbranddropdown").val();

        $.post("<?php echo base_url();?>"+"/hardwareMapping/getmodelsbytypeandbrand",
                {
                    tid: typeid,
                    bid: brandid
                },
                function(response){
                    if (response.status == 200) {
                        $data = json_decode(response.data, true);
                        alert('200');                        
                        var userlists = response.data.userlists;
                        var select = document.getElementById('option');

                    } if (response.status == 100 && response.data && response.data.brandlist){  
                        
                        var brandlists = response.data.brandlist;
                        var select = document.getElementById('hwmodeldropdown');

                    // Clear existing options
                         select.innerHTML = '';

                    // Loop through userlists and create option elements
                    brandlists.forEach(function(brand) {
                        var option = document.createElement('option');
                        option.value = brand.mid;
                        option.text = brand.model_name; // Replace with the actual user property you want to display
                        select.appendChild(option);
                });

                    document.getElementById("hwmodeldropdown").disabled = false;
                   


                    } else {
                        console.log('Error: ' + response.message);
                     }
                    
                });

    }


    function loadHardwareIssues() {


        $.post("<?php echo base_url();?>"+"/issue/gethardwareissues",
                {
                },
                function(response){
                    if (response.status == 200) {
                        $data = json_decode(response.data, true);
                        alert('200');                        
                        var userlists = response.data.userlists;
                        var select = document.getElementById('option');

                    } if (response.status == 100 && response.data && response.data.issuelist){  
                        
                        var issuelist = response.data.issuelist;
                        var select = document.getElementById('issuelistdropdown');

                    // Clear existing options
                         select.innerHTML = '';

                    // Loop through userlists and create option elements
                    issuelist.forEach(function(issue) {
                        var option = document.createElement('option');
                        option.value = issue.id;
                        option.text = issue.issue_description	; // Replace with the actual user property you want to display
                        select.appendChild(option);
                });

                
                document.getElementById("issuelistdropdown").disabled = false;



                    } else {
                        console.log('Error: ' + response.message);
                     }
                    
                });

    }

    function loadSoftwareIssues() {


$.post("<?php echo base_url();?>"+"/issue/getsoftwareissues",
        {
        },
        function(response){
            if (response.status == 200) {
                $data = json_decode(response.data, true);
                alert('200');                        
                var userlists = response.data.userlists;
                var select = document.getElementById('option');

            } if (response.status == 100 && response.data && response.data.issuelist){  
                
                var issuelist = response.data.issuelist;
                var select = document.getElementById('issuelistdropdown');

            // Clear existing options
                 select.innerHTML = '';

            // Loop through userlists and create option elements
            issuelist.forEach(function(issue) {
                var option = document.createElement('option');
                option.value = issue.id;
                option.text = issue.issue_description	; // Replace with the actual user property you want to display
                select.appendChild(option);
        });


            } else {
                console.log('Error: ' + response.message);
             }
            
        });

}



</script>




        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

        

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">                     
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Ticket Details</a></li>
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
                    <h4 class="card-title">Ticket No: <?= $editticketid?></h4>
                    <br>
                        <div class="basic-form">
                            <form action="<?php echo base_url('/requests/save');?>" method="post" accept-charset="utf-8">
                                <h4 class="card-title">Requestor's Information</h4>
                                <br>
                                    <div class="form-row">

                                                <div class="form-group col-md-3">
                                                    <label>PF Number</label>
                                                    <?php if (isset($editticketpf_number)) { ?>
                                                        <input type="text" class="form-control" name="pf" value="<?= $editticketpf_number?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="pf" value="">
                                                    <?php } ?>
                                                </div>
                                                <div class="form-group col-md-3">
                                                	<label>Name</label>
                                                	<?php if (isset($editticketname)) { ?>
                                                        <input type="text" class="form-control" name="name" value="<?= $editticketname?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="name" value="">
                                                    <?php } ?>
                                           		</div>
                                               
                                                
                                                <div class="form-group col-md-2">
                                                    <label>Contact No</label>
                                                    <?php if (isset($editticketcontact_no)) { ?>
                                                        <input type="text" class="form-control" name="mobile" value="<?= $editticketcontact_no?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="mobile" value="">
                                                    <?php } ?>
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label>Branch/Department</label>
                                                    <?php if (isset($editticketbranch)) { ?>
                                                        <input type="text" class="form-control" name="branch" value="<?= $editticketbranch?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="branch" value="">
                                                    <?php } ?>
                                            </div>
                                    </div>                                  
                                     
                                </div>
                                        

                                <br>
                              
                                <h4 class="card-title">Information about the ticket request</h4>
                                <br>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
   
                                            <label>Type of Ticket  </label>
                                                <div class="form-group row-md-4">
                                                    <div class="form-check"> 
                                                        <?php if (isset($editticketincedent_category) && $editticketincedent_category=="Software") { ?>
                                                            <input disabled class="form-check-input" type="radio" id="cht" name="changetype" checked value="<?= $editticketincedent_category?>" readonly>
                                                        <?php } else { ?>
                                                            <input disabled class="form-check-input" type="radio" id="cht" name="changetype" value="<?= $editticketincedent_category?>" readonly>           
                                                        <?php } ?>
                                                        <label class="form-check-label">Software Related</label>                                                
                                                    </div>
                                                </div>
                                                <div class="form-group row-md-4">
                                                    <div class="form-check">                                                
                                                    <?php if (isset($editticketincedent_category) && $editticketincedent_category=="Hardware") { ?>
                                                            <input disabled class="form-check-input" type="radio" id="cht" name="changetype" checked value="<?= $editticketincedent_category?>" readonly>
                                                        <?php } else { ?>
                                                            <input disabled class="form-check-input" type="radio" id="cht" name="changetype" value="<?= $editticketincedent_category?>" readonly>           
                                                        <?php } ?>                                                        
                                                        <label class="form-check-label">Hardware Related</label>                                                
                                                    </div>
                                                </div>                                               
                                        </div>
                                        <div id="hwtype" class="form-group col-md-3">
                                                    <label>Hardware Type</label>
                                                    <?php if (isset($edittickethardware_type_id)) { ?>
                                                        <input type="text" class="form-control" name="hwtype" value="<?= $edittickethardware_name?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="hwtype" value="">
                                                    <?php } ?>
                                        </div>

                                        <div id="hwbrand" class="form-group col-md-2">
                                                <label>Hardware Brand</label>
                                                <?php if (isset($editticketbrand_name)) { ?>
                                                        <input type="text" class="form-control" name="hwbrand" value="<?= $editticketbrand_name?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="hwbrand" value="">
                                                    <?php } ?>
                                        </div> 

                                        <div id="hwmodel" class="form-group col-md-2">
                                                <label>Hardware Model</label>
                                                <?php if (isset($editticketmodel_name)) { ?>
                                                        <input type="text" class="form-control" name="hwmodel" value="<?= $editticketmodel_name?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="hwmodel" value="">
                                                    <?php } ?>
                                        </div>
                                       

                                    </div>

                                    <div class="form-row">
                                    		<div class="form-group col-md-6">
                                    				<label>Issue Description</label>
                                                    <?php if (isset($editticketissue_description)) { ?>
                                                        <input type="text" class="form-control" name="issue" value="<?= $editticketissue_description?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="issue" value="">
                                                    <?php } ?>
                                            </div>

                                            <div class="form-group col-md-2">
                                    				<label>Priority</label>
                                                    <?php if (isset($editticketpriority_name)) { ?>
                                                        <input type="text" class="form-control" name="priority" value="<?= $editticketpriority_name?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="priority" value="">
                                                    <?php } ?>
                                            </div>

                                            
                                    </div>  

                                	<div class="form-row">
                                	<div class="form-group col-md-6">
                                                <label>Request Details</label>
                                                <?php if (isset($editticketcontent)) { ?>
                                                        <textarea class="form-control h-150px" rows="4" id="comment" name="content" readonly><?= $editticketcontent?></textarea>

                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="content" value="">
                                                    <?php } ?>

                                                
                                    		</div> 
                                            
                                            <div class="form-group col-md-2">
                                                    <label>IP Address</label>
                                                    <?php if (isset($editticketip_address)) { ?>
                                                        <input type="text" class="form-control" name="ip" value="<?= $editticketip_address?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="ip" value="">
                                                    <?php } ?>
                                                </div>

                                                <div hidden class="form-group col-md-2">
                                                    <label>Requeted By</label>
                                                    <?php if (isset($editticketuser_name)) { ?>
                                                        <input type="text" class="form-control" name="user" value="<?= $editticketuser_name?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="user" value="">
                                                    <?php } ?>
                                                </div>

                                    		 </div> 
                                             
                                             
                                    
                                            
                                        <?php if (isset($attachment)) { ?>
                                            <h4 class="card-title">Attchments</h4>
                                    <div class="form-row">
                                    	
                                        <div class="col-lg-4">
                                                <div class="card-body">
                                                    <div class="bootstrap-media">
                                                        <ul class="list-unstyled">
                                                            <li class="media">
                                                            <img src="<?php echo base_url('icons/pdf-icon.png'); ?>" class="file-icon">
                                                                <div class="media-body" style="padding-top: 3px;">
                                                                    <h6 class="mt-0 mb-1"><a href="<?php echo base_url('attachment/'.$attachment); ?>">Attachement_<?= $editticketid?>.pdf</a></h6></div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                
                                            </div>
                                            </div>
                                       

                                       </div>
                                            <?php } else { ?>
                                                       
                                                    <?php } ?>
                                     


                                    <h4 class="card-title">Information about the ticket resolution</h4>
                                    <br>
                                    <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label>Remarks</label>
                                        <?php if (isset($editticket_remarks)) { ?>
                                            <input type="text" class="form-control" name="remarks" value="<?= $editticket_remarks?>" readonly>
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="remarks" value="">
                                        <?php } ?>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Date Created</label>
                                        <?php if (isset($editticket_created_onshort)) { ?>
                                            <input type="text" class="form-control" name="createddate" value="<?= $editticket_created_onshort?>" readonly>
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="createddate" value="">
                                        <?php } ?>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Last Modified</label>
                                        <?php if (isset($editticket_last_modifiedshort)) { ?>
                                            <input type="text" class="form-control" name="datemodified" value="<?= $editticket_last_modifiedshort?>" readonly>
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="datemodified" value="">
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-3">
                                        <label>Assigned Unit</label>
                                        <?php if (isset($editticket_assignedtounitname)) { ?>
                                            <input type="text" class="form-control" name="assignedunit" value="<?= $editticket_assignedtounitname?>" readonly>
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="assignedunit" value="">
                                        <?php } ?>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Assigned To</label>
                                        <?php if (isset($editticket_assignedtoname)) { ?>
                                            <input type="text" class="form-control" name="assignedto" value="<?= $editticket_assignedtoname?>" readonly>
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="assignedto" value="">
                                        <?php } ?>
                                    </div>

                                    <div class="form-group col-md-2">
                                    				<label>Status</label>
                                                    <?php if (isset($editticketstatusdescription)) { ?>
                                                        <input type="text" class="form-control" name="status" value="<?= $editticketstatusdescription?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="status" value="">
                                                    <?php } ?>
                                            </div>
                                    


                                   
                                    </div>
                            </form>

                            <button class=" btn btn-dark" type="button" onclick="history.back();">Back</button>
                        </div>
                        
                        <!-- Card -->
                    </div>

                    <div class="col-xl-5 col-lg-10 col-sm-10 col-xxl-10">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Activity Log</h4>
                                                <div id="activity">
                                                        <?php foreach($activitylist as $activity) { ?>
                                                            <div class="media border-bottom-1 pt-3 pb-3">
                                                            <div class="media-body">
                                                                <h5><?php
                                                                $status = $activity->status;

                                                                switch ($status) {
                                                                    case "1":
                                                                        ?>
                                                                        <i class="fa fa-circle-o text-primary  mr-2"></i>Status: Open</h5>
                                                                        <?php
                                                                        break;
                                                                    case "2":
                                                                        ?>
                                                                        <i class="fa fa-circle-o text-secondary  mr-2"></i>Status: Work In Progress</h5>
                                                                        <?php
                                                                        break;
                                                                    case "3":
                                                                        ?>
                                                                        <i class="fa fa-circle-o text-success  mr-2"></i>Status: Closed</h5>
                                                                        <?php
                                                                        break;
                                                                    case "4":
                                                                        ?>
                                                                        <i class="fa fa-circle-o text-danger  mr-2"></i>Status: Re-Opened</h5>
                                                                        <?php
                                                                        break;
                                                                    case "5":
                                                                        ?>
                                                                        <i class="fa fa-circle-o text-info  mr-2"></i>Status: Approval Pending</h5>
                                                                        <?php
                                                                        break;
                                                                    case "6":
                                                                        ?>
                                                                        <i class="fa fa-circle-o text-dark  mr-2"></i>Status: Approved</h5>
                                                                        </span></td>
                                                                        <?php
                                                                        break;        
                                                                    default:
                                                                        ?>
                                                                        <p>Status: Unknown</p>
                                                                        <?php
                                                                }
                                                                ?>                
                                                                </h5>
                                                                <p class="mb-0">Remarks - <?= $activity->remarks?></p>
                                                            </div><span class="text-muted "><?php if (isset($activity->last_modified)) {
                                                                                                $mysqlDatetime = $activity->last_modified;
                                                                                                $shortDate = date("Y-m-d H:i", strtotime($mysqlDatetime));
                                                                                                echo $shortDate;}?></span>
                                                        </div>
                                                        <?php } ?> 	
                                                    
                                                </div>
                                            </div>
                                        </div>
                    </div>

                   

                </div>
            </div>
            

            <!-- end date -->




                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
       

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->


    
                                                   

<?= $this->endSection() ?>
