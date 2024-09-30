<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>


<script type="text/javascript">

$(document).ready(function() {

    var position = $("#cht").val();

    if ($('#cht').is(':checked')) {
        //alert();
        var dropdown1 = document.getElementById("hwtype");
        var dropdown2 = document.getElementById("hwmodel");
        var dropdown3 = document.getElementById("hwbrand");


        dropdown1.style.display = "none"; // Hide the dropdown
        dropdown2.style.display = "none"; // Hide the dropdown
        dropdown3.style.display = "none"; // Hide the dropdown
    }

    if(position==="Hardware")
    {
        
    }
    else{
    var dropdown1 = document.getElementById("hwtype");
    var dropdown2 = document.getElementById("hwmodel");
    var dropdown3 = document.getElementById("hwbrand");


    dropdown1.style.display = "none"; // Hide the dropdown
    dropdown2.style.display = "none"; // Hide the dropdown
    dropdown3.style.display = "none"; // Hide the dropdown
    }


    $('#editTicket').submit(function(e) {

                //alert("ddd");
                e.preventDefault(); // Prevent form submission

                var id = $('input[name="ticketid"]').val();
                var mobile = $('input[name="mobile"]').val();
                var priority = $('select[name="priority"]').val();
                var status = $('select[name="status"]').val();
                var content = $('textarea[name="content"]').val();
                var ip = $('input[name="ip"]').val();           
                
                debugger;
                if (id === "") {
                    Swal.fire("Information!", "Please enter required fields", "info");
                } else {

                        Swal.fire({
                title: 'Are you sure?',
                text: "Ticket will be updated!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Proceed'
                }).then((result) => {
                if (result.isConfirmed) {

                                            
                    $.ajax({
                        url: "<?php echo base_url("/ticket/update"); ?>",
                        type: "POST",
                        dataType: "json",
                        data: {
                            ticketid:id,
                            mobile: mobile,
                            priority:priority,
                            status: status,
                            content: content,
                            ip: ip
                        },
                        success: function (response) {

                            debugger;
                            //alert(response.status);
                            // Check if response is not null and has data
                            if (response && response.status == "success") {

                                
                                Swal.fire("Done!", "Ticket Updated!", "success")
                                .then((value) => {
                                    window.location.href = "<?php echo base_url(
                                        "/ticket/personalview"
                                    ); ?>";
                                });

                            } else if(response && response.status == "user exist") {
                                Swal.fire("Error!", "Ticket Not Exist", "error");
                                console.log("Ticket Update Failed");
                            }
                            else{
                                Swal.fire("Error!", "Ticket Update Failed", "error");
                                console.log("Ticket Update Failed");
                            }

                        },
                        error: function (xhr, status, error) {
                            // Handle errorabout:blank#blocked
                            Swal.fire("Error!", "Ticket Update Failed", "error");
                        }
                    });

				
				

}
})



                        
                    
                }

                
            });






});

 

</script>




        <!--**********************************
            Content body start
        ***********************************-->

        <div id="preloader">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50">
                    <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
                </svg>
            </div>
        </div>

        <div class="content-body">

        

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Edit Ticket</a></li>
                      
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
                        <div class="basic-form">
                        <br>
                            <form id="editTicket" action="<?php echo base_url('/requests/save');?>" method="post" accept-charset="utf-8">
                            <h5>Requestor's Information</h5>
                                
                                    <div class="form-row">

                                                <div hidden class="form-group col-md-2">
                                                    <label>TicketID</label>
                                                    <?php if (isset($editticketpf_number)) { ?>
                                                        <input readonly type="text" class="form-control" name="ticketid" value="<?= $editticketid?>" >
                                                    <?php } else { ?>
                                                        <input readonly type="text" class="form-control" name="ticketid" value="">
                                                    <?php } ?>
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label>Username</label>
                                                    <?php if (isset($editticketpf_number)) { ?>
                                                        <input readonly type="text" class="form-control" name="pf" value="<?= $editticketpf_number?>" >
                                                    <?php } else { ?>
                                                        <input readonly type="text" class="form-control" name="pf" value="">
                                                    <?php } ?>
                                                </div>
                                                <div class="form-group col-md-3">
                                                	<label>Name</label>
                                                	<?php if (isset($editticketname)) { ?>
                                                        <input readonly type="text" class="form-control" name="name" value="<?= $editticketname?>" >
                                                    <?php } else { ?>
                                                        <input readonly type="text" class="form-control" name="name" value="">
                                                    <?php } ?>
                                           		</div>
                                               
                                                
                                                <div class="form-group col-md-2">
                                                    <label>Contact No</label>
                                                    <?php if (isset($editticketcontact_no)) { ?>
                                                        <input required pattern="^\d{10}$" placeholder="07XXXXXXX" type="text" class="form-control" name="mobile" value="<?= $editticketcontact_no?>" >
                                                    <?php } else { ?>
                                                        <input required pattern="^\d{10}$" placeholder="07XXXXXXX" type="text" class="form-control" name="mobile" value="">
                                                    <?php } ?>
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label>Branch/Department</label>
                                                    <?php if (isset($editticketbranch)) { ?>
                                                        <input type="text" class="form-control" name="branch" value="<?= $editticketbranch?>" >
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="branch" value="">
                                                    <?php } ?>
                                            </div>
                                    </div>                                  
                                     
                                </div>
                                        

                                <br>
                              
                                <h5>Ticket Information</h5>
                                <br>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
   
                                            <label>Type of Ticket  </label>
                                                <div  class="form-group row-md-4">
                                                    <div  class="form-check"> 
                                                        <?php if (isset($editticketincedent_category) && $editticketincedent_category=="Software") { ?>
                                                            <input disabled class="form-check-input" type="radio" id="cht" name="changetype" checked value="<?= $editticketincedent_category?>" >
                                                        <?php } else { ?>
                                                            <input disabled class="form-check-input" type="radio" id="cht" name="changetype" value="<?= $editticketincedent_category?>" >           
                                                        <?php } ?>
                                                        <label class="form-check-label">Software Related</label>                                                
                                                    </div>
                                                </div>
                                                <div class="form-group row-md-4">
                                                    <div class="form-check">                                                
                                                    <?php if (isset($editticketincedent_category) && $editticketincedent_category=="Hardware") { ?>
                                                            <input disabled class="form-check-input" type="radio" id="cht2" name="changetype" checked value="<?= $editticketincedent_category?>" >
                                                        <?php } else { ?>
                                                            <input disabled class="form-check-input" type="radio" id="cht2" name="changetype"  value="<?= $editticketincedent_category?>" >           
                                                        <?php } ?>                                                        
                                                        <label class="form-check-label">Hardware Related</label>                                                
                                                    </div>
                                                </div>                                               
                                        </div>
                                        <div id="hwtype" class="form-group col-md-3">
                                                    <label>Hardware Type</label>
                                                    <?php if (isset($edittickethardware_type_id)) { ?>
                                                        <input type="text" class="form-control" name="hwtype" value="<?= $edittickethardware_name?>" >
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="hwtype" value="">
                                                    <?php } ?>
                                        </div>

                                        <div id="hwbrand" class="form-group col-md-2">
                                                <label>Hardware Brand</label>
                                                <?php if (isset($editticketbrand_name)) { ?>
                                                        <input type="text" class="form-control" name="hwbrand" value="<?= $editticketbrand_name?>" >
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="hwbrand" value="">
                                                    <?php } ?>
                                        </div> 

                                        <div id="hwmodel" class="form-group col-md-2">
                                                <label>Hardware Model</label>
                                                <?php if (isset($editticketmodel_name)) { ?>
                                                        <input type="text" class="form-control" name="hwmodel" value="<?= $editticketmodel_name?>" >
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="hwmodel" value="">
                                                    <?php } ?>
                                        </div>
                                       

                                    </div>

                                    <div class="form-row">
                                    		<div class="form-group col-md-5">
                                    				<label>Issue Description</label>
                                                    <?php if (isset($editticketissue_description)) { ?>
                                                        <input readonly type="text" class="form-control" name="issue" value="<?= $editticketissue_description?>" >
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="issue" value="">
                                                    <?php } ?>
                                            </div>

                                            <div class="form-group col-md-2">
                                    				<label>Priority</label>
                                                        <select name="priority" id="inputState" class="form-control">?>
                                                        <option selected="selected" value="<?= $editticketpriority?>"><?php echo $editticketpriority_name; ?></option>  
                                                        <option value="1">Low</option>
                                                        <option value="2">Medium</option>
                                                        <option value="3">High</option>
                                                        <option value="4">Severe</option>     
                                                           
                                                    </select>
                                            </div>

                                            <div class="form-group col-md-2">
                                    				<label>Status</label>

                                                    <select name="status" id="inputState" class="form-control">?>
                                                        <option selected="selected" value="<?= $editticketstatus?>"><?php echo $editticketstatusdescription; ?></option>  
                                                        <option value="4">Re-Opened</option>
                                                        <option value="7">Invalid</option>

                                                    </select>
                                            </div>
                                    </div>  

                                	<div class="form-row">
                                	<div class="form-group col-md-5">
                                                <label>Request Details</label>
                                                <?php if (isset($editticketcontent)) { ?>
                                                        <textarea class="form-control h-150px" rows="4" id="comment" name="content"><?= $editticketcontent?></textarea>

                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="content" value="">
                                                    <?php } ?>

                                                
                                    		</div> 
                                            
                                            <div class="form-group col-md-2">
                                                    <label>IP Address</label>
                                                    <?php if (isset($editticketip_address)) { ?>
                                                        <input type="text" class="form-control" name="ip" value="<?= $editticketip_address?>" >
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="ip" value="">
                                                    <?php } ?>
                                                </div>

                                                <div class="form-group col-md-2">
                                                    <label>Requeted By</label>
                                                    <?php if (isset($editticketuser_name)) { ?>
                                                        <input type="text" class="form-control" name="user" value="<?= $editticketuser_name?>" readonly>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" name="user" value="">
                                                    <?php } ?>
                                                </div>

                                    		 </div> 
                                             
                                             
                                    <h5>Ticket Information</h5>
                                    <div class="form-row">
                                    	<div class="form-group col-md-5">
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
                            <button type="button" class="btn btn-outline-dark" onclick="history.back();">Back</button>             
                            <button type="submit" class="btn btn-outline-dark">Edit Ticket</button>   

                            </form>
                                                   </div>
                        
                        <!-- Card -->
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
