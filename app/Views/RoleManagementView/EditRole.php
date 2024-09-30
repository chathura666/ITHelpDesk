<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>

<link href="<?php echo base_url(
    "plugins/tables/css/datatable/dataTables.bootstrap4.min.css"
); ?>" rel="stylesheet">

<script src="<?php echo base_url("js/custom.min.js"); ?>"></script>
<script src="<?php echo base_url("js/offline/jquery-3.7.1.js"); ?>"></script>
<script src="<?php echo base_url(
    "plugins/tables/js/jquery.dataTables.min.js"
); ?>"></script>
<script src="<?php echo base_url(
    "plugins/tables/js/datatable/dataTables.bootstrap4.min.js"
); ?>"></script>
<script src="<?php echo base_url(
    "plugins/tables/js/datatable-init/datatable-basic.min.js"
); ?>"></script>



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
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item" active><a href="javascript:void(0)">Edit Role</a></li>
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
                            <form id="editrole" action="<?php echo base_url('/role/update');?>" method="post" accept-charset="utf-8">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                <h4 class="card-title">Edit User Role</h4>
                                                <br>

                                                                            <div class="basic-form" style="padding-left: 30px;">
                                    <form>
                                        <div class="form-row">
                                            <div hidden class="form-group col-md-2">
                                                <label hidden>Role Id</label>
                                                <?php if (isset($editroleid)) { ?>
                                                <input hidden type="text" class="form-control" name="roleid" value="<?= $editroleid?>">
                                            <?php } else { ?>
                                                <input hidden type="text" class="form-control" name="roleid" value="">
                                            <?php } ?>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Role Name</label>
                                                <?php if (isset($editrolename)) { ?>
                                                <input required type="text" class="form-control" name="rolename" value="<?= $editrolename?>">
                                            <?php } else { ?>
                                                <input required type="text" class="form-control" name="rolename" value="">
                                            <?php } ?>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>&nbsp</label>
                                            <div class="input-group-append">
                                             
                                                <button class="btn btn-outline-dark" style="height: 45px;" type="submit" href="<?php echo base_url('/role/update');?>" >Update Role</button>
                                            </div>
                                            </div>
                                        </div>
                                        </form></div>
                                        
                                                    <div class="table-responsive">
                                                      
                                                        
                                                    <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    <th>Role Name</th> 
                                                                    
                                                                    <th>Created On</th> 
                                                                    <th>Updated On</th>   
                                                                    <th>Status</th>                                                                 
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($edtrolelist as $roles): ?>	
                                                                <tr>                                                                   
                                                                    <td><?php echo $roles->role_name; ?></td>
                                                                    <td>
                                                                    <?php
                                                                        $short1 = $roles->created_on;
                                                                        $shortDate1 = date("Y-m-d", strtotime($short1));
                                                                        echo $shortDate1 ?>
                                                                </td>
                                                                    <td>
                                                                    <?php
                                                                        $short2 = $roles->updated_on;
                                                                        $shortDate2 = date("Y-m-d", strtotime($short2));
                                                                        echo $shortDate2 ?>
                                                                </td>

                                                                    <td>
                                                                        <?php
                                                                        $status =
                                                                            $roles->status;
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
                                                                            $roles->status;
                                                                        switch (
                                                                            $status
                                                                        ) { case "1": ?>
                                                                                                <span><a href="<?php echo base_url('role/edit/'.$roles->role_id);?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                                                                <a href="#" onclick="changeStatusDisable(<?php echo $roles->role_id; ?>);" data-toggle="tooltip" data-placement="top" title="Disable User"><i class="fa fa-lock color-danger"></i></a></span>                                                                    
                                                                                                <?php break;case "0": ?>
                                                                                                 <span><a href="<?php echo base_url('role/edit/'.$roles->role_id);?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                                                                 <a  href="#" onclick="changeStatusEnable(<?php echo $roles->role_id; ?>);" data-toggle="tooltip" data-placement="top" title="Enable User"><i class="fa fa-unlock-alt color-danger"></i></a></span>                                                                    
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

$('#editrole').submit(function(e) {
                e.preventDefault(); // Prevent form submission

                var roleid = $('input[name="roleid"]').val();
                var rolename = $('input[name="rolename"]').val();         
                
                debugger;
                if (rolename === "" || roleid === "") {
                    Swal.fire("Information!", "Please enter required fields", "info");
                } else {

                    Swal.fire({
                title: 'Are you sure?',
                text: "Role will be updated!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Proceed'
                }).then((result) => {
                if (result.isConfirmed) {
				
				
				                        $.ajax({
                        url: "<?php echo base_url("/role/update"); ?>",
                        type: "POST",
                        dataType: "json",
                        data: {
                            roleid:roleid,
                            rolename: rolename
                        },
                        success: function (response) {

                            debugger;
                            //alert(response.status);
                            // Check if response is not null and has data
                            if (response && response.status == "success") {

                                
                                Swal.fire("Done!", "Role Updated!", "success")
                                .then((value) => {
                                    window.location.href = "<?php echo base_url(
                                        "/role/edit"
                                    ); ?>";
                                });

                            } else if(response && response.status == "Role not found") {
                                Swal.fire("Error!", "Role Not Found", "error");
                                console.log("Role Update Failed");
                            }
                            else{
                                Swal.fire("Error!", "Role Update Failed", "error");
                                console.log("Role Update Failed");
                            }

                        },
                        error: function (xhr, status, error) {
                            // Handle errorabout:blank#blocked
                            Swal.fire("Error!", "Role Update Failed", "error");
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

function changeStatusDisable(id) {

    roleid = id;
    status = 0;
///debugger;
if (id === "") {
    Swal.fire("Information!", "Role Not Selected", "info");
} else {

    Swal.fire({
                title: 'Are you sure?',
                text: "Role will be disabled!",
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



    


 

