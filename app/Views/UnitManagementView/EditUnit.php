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
                            <form id="editunit" action="<?php echo base_url('/unit/update');?>" method="post" accept-charset="utf-8">
                            <h4 class="card-title">Edit Unit</h4>




                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">

                                                                            <div class="basic-form">
                                                                            <form>
        <div class="form-row">
            <div hidden class="form-group col-md-2">
                <label>Unit Id</label>
                <?php if (isset($editunitid)) { ?>
                <input required type="text" class="form-control" name="unitid" value="<?= $editunitid?>">
            <?php } else { ?>
                <input required type="text" class="form-control" name="unitid" value="">
            <?php } ?>
            </div>
            <div class="form-group col-md-3">
                <label>Unit Name<span class="required-field"></span></label>
                <?php if (isset($editunitname)) { ?>
                <input required type="text" class="form-control" name="unitname" value="<?= $editunitname?>">
            <?php } else { ?>
                <input required type="text" class="form-control" name="unitname" value="">
            <?php } ?>
            </div>
            <div class="form-group col-md-3">
                <label>Unit Email<span class="required-field"></span></label>
                <?php if (isset($editunitemail)) { ?>
                <input required type="email" class="form-control" name="unitemail" value="<?= $editunitemail?>">
            <?php } else { ?>
                <input required type="email" class="form-control" name="unitemail" value="">
            <?php } ?>
            </div>
            <div class="form-group col-md-4">
            <label>&nbsp</label>
            <div class="input-group-append">
             
                <button class="btn btn-outline-dark" style="height: 45px;" type="submit" href="<?php echo base_url('/unit/update');?>" >Update Unit</button>
            </div>
            </div>
        </div>
        </form></div></div>
                                        
                                                    <div class="table-responsive">
                                                      
                                                        
                                                    <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Name</th>  
                                                                    <th>Email</th>
                                                                    <th>Created On</th>                                                             
                                                                    <th>Updated On</th>
                                                                    <th>Status</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($unitlist as $units): ?>	
                                                                <tr>                                                                   
                                                                    <td><?php echo $units->id; ?></td>

                                                                    
                                                                    <td><?php echo $units->name; ?></td>
                                                                    <td><?php echo $units->email; ?></td>
                                                                    <td>
                                                                    <?php
                                                                        $short1 = $units->created_at;
                                                                        $shortDate1 = date("Y-m-d", strtotime($short1));
                                                                        echo $shortDate1 ?>
                                                                </td>
                                                                    <td>
                                                                    <?php
                                                                        $short2 = $units->updated_at;
                                                                        $shortDate2 = date("Y-m-d", strtotime($short2));
                                                                        echo $shortDate2 ?>
                                                                </td>
                                                                    <td>
                                                                        <?php
                                                                        $status =
                                                                            $units->status;
                                                                        switch (
                                                                            $status
                                                                        ) { case "1": ?>
                                                                                                <span class="badge badge-success" style="width:60px"><b>Active&nbsp</b><i class="fa fa-unlock color-muted m-r-5"></i></span>                                                                                           
                                                                                                <?php break;case "0": ?>
                                                                                                <span class="badge badge-dark" style="width:60px"><b>Inactive&nbsp</b><i class="fa fa-lock color-muted m-r-5"></i></span>                                                                                                                                                                                
                                                                                                <?php break;default: ?>
                                                                                                <p>Status: Unknown</p>
                                                                                                <?php }
                                                                        ?>
                                                                    </td>

                                                                    <td>
                                                                        <?php
                                                                        $status =
                                                                            $units->status;
                                                                        switch (
                                                                            $status
                                                                        ) { case "1": ?>
                                                                                                <span><a href="<?php echo base_url('unit/edit/'.$units->id);?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                                                                <a href="#" onclick="changeStatusDisable(<?php echo $units->id; ?>);" data-toggle="tooltip" data-placement="top" title="Disable Unit"><i class="fa fa-lock color-danger"></i></a></span>                                                                    
                                                                                                <?php break;case "0": ?>
                                                                                                 <span><a href="<?php echo base_url('unit/edit/'.$units->id);?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                                                                 <a  href="#" onclick="changeStatusEnable(<?php echo $units->id; ?>);" data-toggle="tooltip" data-placement="top" title="Enable Unit"><i class="fa fa-unlock-alt color-danger"></i></a></span>                                                                    
                                                                                                <?php break;default: ?>
                                                                                                <p>Status: Unknown</p>
                                                                                                <?php }
                                                                        ?>
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

    
    <script type="text/javascript">

$('#editunit').submit(function(e) {
                e.preventDefault(); // Prevent form submission

                var unitid = $('input[name="unitid"]').val();
                var unitname = $('input[name="unitname"]').val();
                var unitemail = $('input[name="unitemail"]').val();         
                
                debugger;
                if (unitid === "" || unitemail === "") {
                    Swal.fire("Information!", "Please enter required fields", "info");
                } else {

                    Swal.fire({
                title: 'Are you sure?',
                text: "Unit will be updated!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Proceed'
                }).then((result) => {
                if (result.isConfirmed) {
				
				
				                        $.ajax({
                        url: "<?php echo base_url("/unit/update"); ?>",
                        type: "POST",
                        dataType: "json",
                        data: {
                            unitid:unitid,
                            unitname: unitname,
                            unitemail: unitemail
                        },
                        success: function (response) {

                            debugger;
                            //alert(response.status);
                            // Check if response is not null and has data
                            if (response && response.status == "success") {

                                
                                Swal.fire("Done!", "Unit Updated!", "success")
                                .then((value) => {
                                    window.location.href = "<?php echo base_url(
                                        "/unit/view"
                                    ); ?>";
                                });

                            } else if(response && response.status == "Role not found") {
                                Swal.fire("Error!", "Unit Not Found", "error");
                                console.log("Unit Update Failed");
                            }
                            else{
                                Swal.fire("Error!", "Role Update Failed", "error");
                                console.log("Unit Update Failed");
                            }

                        },
                        error: function (xhr, status, error) {
                            // Handle errorabout:blank#blocked
                            Swal.fire("Error!", "Unit Update Failed", "error");
                        }
                    }); 
				

}
})

                        

                }

                
            });


            function changeStatusEnable(id) {

roleid = id;
status = 1;
///debugger;
if (id === "") {
Swal.fire("Information!", "Role Not Selected", "info");
} else {

Swal.fire({
    title: 'Are you sure?',
    text: "Role will be enabled!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Proceed'
    }).then((result) => {
    if (result.isConfirmed) {
    
    
$.ajax({
url: "<?php echo base_url("/role/change_status"); ?>",
type: "POST",
dataType: "json",
data: {
    roleid: roleid,
    status: status
},
success: function (response) {

    debugger;

    if (response && response.status == "success") {

        Swal.fire("Done!", "Status Changed!", "success")
            .then((value) => {
                window.location.href = "<?php echo base_url(
                    "/role/view"
                ); ?>";
            });

    }
    else if (response && response.status == "User not found") {

        Swal.fire("Error!", "Role Not Found", "error")
            .then((value) => {
                window.location.href = "<?php echo base_url(
                    "/role/view"
                ); ?>";
            });

    }

    else {
        Swal.fire("Error!", "Status Change Failed", "error");
        console.log("Role Update Failed");
    }

},
error: function (xhr, status, error) {
    // Handle error
    Swal.fire("Error!", "Status Change Failed", "error");
}
});

    
    

}
})

}
}

function changeStatusEnable(id) {

unitid = id;
status = 1;
///debugger;
if (id === "") {
Swal.fire("Information!", "Role Not Selected", "info");
} else {

Swal.fire({
    title: 'Are you sure?',
    text: "Unit will be disabled!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Proceed'
    }).then((result) => {
    if (result.isConfirmed) {
    
    
$.ajax({
url: "<?php echo base_url("/unit/change_status"); ?>",
type: "POST",
dataType: "json",
data: {
    unitid: unitid,
    status: status
},
success: function (response) {

    debugger;

    if (response && response.status == "success") {

        Swal.fire("Done!", "Status Changed!", "success")
            .then((value) => {
                window.location.href = "<?php echo base_url(
                    "/unit/view"
                ); ?>";
            });

    }
    else if (response && response.status == "User not found") {

        Swal.fire("Error!", "Unit Not Found", "error")
            .then((value) => {
                window.location.href = "<?php echo base_url(
                    "/unit/view"
                ); ?>";
            });

    }

    else {
        Swal.fire("Error!", "Status Change Failed", "error");
        console.log("Role Change Failed");
    }

},
error: function (xhr, status, error) {
    // Handle error
    Swal.fire("Error!", "Status Change Failed", "error");
}
});

    
    

}
})

}
}

function changeStatusDisable(id) {

unitid = id;
status = 0;
///debugger;
if (id === "") {
Swal.fire("Information!", "Role Not Selected", "info");
} else {

Swal.fire({
    title: 'Are you sure?',
    text: "Unit will be disabled!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Proceed'
    }).then((result) => {
    if (result.isConfirmed) {
    
    
$.ajax({
url: "<?php echo base_url("/unit/change_status"); ?>",
type: "POST",
dataType: "json",
data: {
    unitid: unitid,
    status: status
},
success: function (response) {

    debugger;

    if (response && response.status == "success") {

        Swal.fire("Done!", "Status Changed!", "success")
            .then((value) => {
                window.location.href = "<?php echo base_url(
                    "/unit/view"
                ); ?>";
            });

    }
    else if (response && response.status == "User not found") {

        Swal.fire("Error!", "Unit Not Found", "error")
            .then((value) => {
                window.location.href = "<?php echo base_url(
                    "/unit/view"
                ); ?>";
            });

    }

    else {
        Swal.fire("Error!", "Status Change Failed", "error");
        console.log("Role Change Failed");
    }

},
error: function (xhr, status, error) {
    // Handle error
    Swal.fire("Error!", "Status Change Failed", "error");
}
});

    
    

}
})

}
}

        

</script>


    
                                                   

<?= $this->endSection() ?>



    


 

