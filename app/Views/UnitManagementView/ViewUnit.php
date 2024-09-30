	<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>




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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">View Units</a></li>
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
                            <h4 class="card-title">View Units</h4>
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



    


 

