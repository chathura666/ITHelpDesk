<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>

<style>
    .error {
        border: 1px solid red;
    }
    .required-field::after {
    content: '*';
    color: red;
    margin-left: 5px;
}
</style>

<script src="<?php echo base_url('js/offline/sweetalert2.js'); ?>"></script>

<script type="text/javascript">

$(document).ready(function() {

    $('#pfno').focusout(function() {

        //alert("Ssss");
        var fieldValue = $(this).val();
        //alert(fieldValue);
        // Show loader
        var loader = document.getElementById("preloader");
        loader.style.display = "block";

        // Make AJAX request
        $.ajax({
            url: '<?= base_url('/user/getDetails') ?>', // Adjust the URL according to your controller's method
            type: 'POST',
            data: { pfno: fieldValue },
            success: function(response) {

                            //alert(response.status);
                            // Check if response is not null and has data
                            if (response && response.status == "success") {

                                loader.style.display = "none";
                                var name = document.getElementById("name");
                                var contact = document.getElementById("contact");
                                var branch = document.getElementById("branch");

                                debugger;



                                name.value = response.data.first_name + " "+response.data.last_name;
                                contact.value = response.data.mobile;
                                branch.value = response.data.name;

                            } 
                           
                            else{

                                var name = document.getElementById("name");
                                var contact = document.getElementById("contact");
                                loader.style.display = "none";
                                name.value = "";
                                contact.value = "";
                            }

                // Hide loader
                


                // Display result
                //$('#result').html(response);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
                loader.style.display = "none";
            }
        });
    });

            $('#addTicket').submit(function(e) {
                e.preventDefault(); // Prevent form submission

                

                var pfno = $('input[name="pfno"]').val();
                var issuelistdropdown = $('select[name="issuelistdropdown"]').val();
                var name = $('input[name="name"]').val();
                var branch = $('input[name="branch"]').val();
                var contact = $('input[name="contact"]').val();
                var changetype =  $('input[name="changetype"]:checked').val();
                var hwtypedropdown = $('select[name="hwtypedropdown"]').val();
                var hwbranddropdown = $('select[name="hwbranddropdown"]').val();
                var hwmodeldropdown = $('select[name="hwmodeldropdown"]').val();
                var ipAdd = $('input[name="ipAdd"]').val();
                var priority = $('select[name="priority"]').val();
                var explanation = $('textarea[name="explanation"]').val();
                var filename = $('input[name="filename"]').val();


                debugger;
                if (pfno === "") {
                    // Show SweetAlert error message
                    Swal.fire("Error!", "Please enter required fields", "error");
                } else {
                    // Show SweetAlert success message
                    // swal("Success!", "Login successful", "success");
                    $.ajax({
                        url: "<?php echo base_url('/ticket/save') ?>",
                        type: "POST",
                        dataType: "json",
                        data: {
                            pfno: pfno,
                            issuelistdropdown: issuelistdropdown,
                            name: name,
                            contact: contact,
                            branch:branch,
                            changetype: changetype,
                            hwtypedropdown: hwtypedropdown,
                            hwbranddropdown: hwbranddropdown,
                            hwmodeldropdown: hwmodeldropdown,
                            ipAdd: ipAdd,
                            priority: priority,
                            explanation: explanation,
                            filename: filename
                        },
                        success: function (response) {

                            debugger;
                            //alert(response.status);
                            // Check if response is not null and has data
                            if (response && response.status == "success") {


                    

                                Swal.fire("Done!", "Your ticket submitted - Ticket ID - "+response.ticket_no, "success")
                                .then((value) => {
                                    window.location.href = "<?php echo base_url('/ticket/personalview'); ?>";
                                });

                            } 
                           else if (response && response.status == "issue mapping not found") {

                            Swal.fire("Error!", "Issue mapping error", "error");
                            }
                            else{
                                Swal.fire("Error!", "Ticket submit failed", "error");
                            }


                        },
                        error: function (xhr, status, error) {
                            // Handle error
                            Swal.fire("Error!", "Ticket submit failed", "error");
                        }
                    });
                }
            });
        });


    function checkIssueCategorySoftware() {
        var position = $("#cht").val();

        var dropdown1 = document.getElementById("hwtype");
        var dropdown2 = document.getElementById("hwmodel");
        var dropdown3 = document.getElementById("hwbrand");


        dropdown1.style.display = "none"; // Hide the dropdown
        dropdown2.style.display = "none"; // Hide the dropdown
        dropdown3.style.display = "none"; // Hide the dropdown
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
        selectType.value = "choose"; 

        var selectBrand = document.getElementById('hwbranddropdown');
        selectBrand.value = "choose"; 

        var selectModel = document.getElementById('hwmodeldropdown');
        selectModel.value = "choose";  
        
        var select = document.getElementById('issuelistdropdown');
        // Clear existing options
        select.innerHTML = '';
        //loadHardwareIssues();

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

                        
                        
                });

                loadHardwareIssuesByType();
                loadModels();

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
                        //alert('200');                        
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
                        //alert('200');                        
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

    function loadHardwareIssuesByType() {

        var hwtype = $("#hwtypedropdown").val();

        $.post("<?php echo base_url();?>"+"/issue/gethardwareissuesbytype",
        {
            hwtype:hwtype
        },
        function(response){
            if (response.status == 200) {
                $data = json_decode(response.data, true);
                //alert('200');                        
                var userlists = response.data.userlists;
                var select = document.getElementById('option');

            } if (response.status == 100 && response.data && response.data.issuelist){  
                
                var issuelist = response.data.issuelist;
                var select = document.getElementById('issuelistdropdown');

            // Clear existing options
                 select.innerHTML = '';

            // Loop through userlists and create option elements

            var option1 = document.createElement('option');
            option1.value = 1;
            option1.text = 'Other'
            select.appendChild(option1);

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
                //alert('200');                        
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

function uploadFile() {
    //alert();

    var fileInput = document.getElementById('uploadfile');
    var file = fileInput.files[0];

    var formData = new FormData();
    formData.append('file', file);

    console.log(formData);

    $.ajax({
        url: "<?php echo base_url('/ticket/upload') ?>",
        type: "POST",
        dataType: "json",
        data: formData,
        processData: false,
                contentType: false,
        success: function (response) {

            debugger;
            //alert(response.status);
            // Check if response is not null and has data
            if (response && response.data.status == "success") {

                // Swal.fire("Done!", "Your ticket submitted - Ticket ID - "+response.ticket_no, "success")
                // .then((value) => {
                //     window.location.href = "<?php echo base_url('/ticket/personalview'); ?>";
                // });

                debugger;
                $("#filename").val(response.data.filename);

                
                alert("upload success");

            } else{
                Swal.fire("Error!", "Ticket submit failed", "error");
            }


        },
        error: function (xhr, status, error) {
            // Handle error
            Swal.fire("Error!", "Ticket submit failed", "error");
        }
    });

    
}





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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Add New Ticket</a></li>
                      
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
                            <form id="addTicket" action="<?php echo base_url('/ticket/save');?>" method="post" accept-charset="utf-8">
                                <h4 class="card-title">Requestor's Information</h4>
                                <br>
                                    <div class="form-row">

                                                <div class="form-group col-md-3">
                                                    <label>PF Number<span class="required-field"></span></label>
                                                    <input type="text" class="form-control" placeholder="" name="pfno"  id="pfno" required>
                                                </div>
                                                <div class="form-group col-md-3">
                                                	<label>Name<span class="required-field"></span></label>
                                                	<input type="text" class="form-control" name="name" id="name" required>
                                           		</div>
                                               
                                                
                                                <div class="form-group col-md-2">
                                                    <label>Contact No<span class="required-field"></span></label>
                                                    <input type="text" class="form-control" placeholder="" name="contact" id="contact" required>
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label>Branch/Department<span class="required-field"></span></label>
                                                    <!-- <select id="inputState" class="form-control"> -->
                                                        <!-- <option selected="selected">Choose Branch/Department...</option> -->
                                                        <input type="text" class="form-control" placeholder="" name="branch" id="branch" required>
                                                           
                                                    <!-- </select> -->
                                            </div>
                                    </div>                                  
                                     
                                </div>
                                        

                                <br>
                              
                                <h4 class="card-title">Information about the ticket request</h4>
                                <br>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
   
                                            <label>Type of Ticket<span class="required-field"></span></label>
                                                <div class="form-group row-md-4" onChange="checkIssueCategorySoftware();">
                                                    <div class="form-check">                                                
                                                        <input required class="form-check-input" type="radio" id="cht" name="changetype" value="software">
                                                        <label class="form-check-label">Software Related</label>                                                
                                                    </div>
                                                </div>
                                                <div class="form-group row-md-4" onChange="checkIssueCategoryHardware();">
                                                    <div class="form-check">                                                
                                                        <input required class="form-check-input" type="radio" id="cht2" name="changetype" value="hardware">
                                                        <label class="form-check-label">Hardware Related</label>                                                
                                                    </div>
                                                </div>                                               
                                        </div>
                                        <div id="hwtype" class="form-group col-md-3" style="display:none">
                                                    <label>Hardware Type</label>
                                                    <select id="hwtypedropdown"  name="hwtypedropdown" class="form-control" onChange="loadBrands();">
                                                        <option selected="selected" value="1">Choose Type...</option>
                                                        <?php foreach($typelist as $type) { ?>
                                                            <option  value="<?php echo $type->id; ?>"><?php echo $type->hardware_name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                        </div>

                                        <div id="hwbrand" class="form-group col-md-2" style="display:none">
                                                <label>Hardware Brand</label>
                                                <select id="hwbranddropdown" name="hwbranddropdown" class="form-control" onChange="loadModels();">
                                                    <option selected="selected" value="1">Choose Brand...</option>
                                                    <?php foreach($brandlist as $brand) { ?>
                                                        <option  value="<?php echo $brand->id; ?>"><?php echo $brand->brand_name; ?></option>
                                                    <?php } ?>    
                                                </select>
                                        </div> 

                                        <div id="hwmodel" class="form-group col-md-3" style="display:none">
                                                <label>Hardware Model</label>
                                                <select id="hwmodeldropdown" name="hwmodeldropdown" class="form-control">
                                                    <option selected="selected" value="1">Choose Model...</option>
                                                    <?php foreach($modellist as $model) { ?>
                                                        <option value="<?php echo $model->id; ?>"><?php echo $model->model_name; ?></option>
                                                    <?php } ?>    
                                                </select>
                                        </div>
                                       

                                    </div>

                                    <div class="form-row">
                                    		<div class="form-group col-md-6">
                                    				<label>Issue Description</label>
                                                    <select id="issuelistdropdown"  name="issuelistdropdown" class="form-control">
                                                    <option selected="selected" value="1">Choose Issue...</option>
                                                    <?php foreach($issuelist as $issue) { ?>
                                                        <option  value="<?php echo $issue->id; ?>"><?php echo $issue->issue_description; ?></option>
                                                    <?php } ?>  
                                                </select>
                                            </div>

                                            <div class="form-group col-md-2">
                                    				<label>Priority<span class="required-field"></span></label>
                                                    <select id="inputState" name="priority" class="form-control">
                                                    <option selected="selected">Choose level...</option>
                                                    <option value="1">Low</option>
                                                    <option value="2">Medium</option>
                                                    <option value="3">High</option>
                                                    <option value="4">Severe</option>                                    
                                                </select>
                                            </div>
                                    </div>  

                                	<div class="form-row">
                                	<div class="form-group col-md-6">
                                                <label>Request Details</label>
                                                <div class="form-group">                                            
                                                <textarea class="form-control h-150px" rows="4" id="explanation" name="explanation"></textarea>
                                            	</div>

                                                
                                    		</div> 
                                            
                                            <div class="form-group col-md-2">
                                                    <label>IP Address</label>
                                                    <input pattern="^(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$" type="text" class="form-control" placeholder="" name="ipAdd">
                                                </div>

                                    		 </div>  
                                    <h4 class="card-title">Attchments</h4>
                                    <div class="form-row">
                                    	<div class="form-group col-md-6">
                                           <div class="input-group mb-3">
                                            <div class="custom-file">
                                                <input id="uploadfile" type="file" name="file" class="custom-file-input">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                            <div id="btn_upload" class="input-group-append" onClick="uploadFile();">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            </div>
                                        </div>
                                       

                                    </div>
                                    <div>
                                    <input hidden type="text" class="form-control" placeholder="" name="filename" id="filename">
                                    </div>

                                    
                                    <button type="button" class="btn btn-outline-dark" onclick="history.back();">Back</button>   
                                <button type="submit" class="btn btn-outline-dark">Submit Ticket</button>
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



    


 

