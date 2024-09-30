<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>


<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/offline/dataTables.dataTables.css'); ?>">
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/offline/buttons.dataTables.css'); ?>">
<!-- DataTables Buttons JS -->

<script src="<?php echo base_url('js/offline/dataTables.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/dataTables.buttons.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/buttons.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/buttons.print.min.js'); ?>"></script>

<script type="text/javascript">

function approveTicket(id) {

//alert();

ticketid = id;
status = 6;
///debugger;
if (ticketid === "") {
                Swal.fire("Information!", "Tickt ID Missing!", "info");
            } else {

                if (status === "") {
                    Swal.fire("Information!", "Status Not Selected!", "info");
                }
                else {
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "Ticket will be approved!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Proceed'
                        }).then((result) => {
                            if (result.isConfirmed) {


                                $.ajax({
                                    url: "<?php echo base_url("/ticket/changestatus"); ?>",
                                    type: "POST",
                                    dataType: "json",
                                    data: {
                                        ticketid: ticketid,
                                        status: status
                                    },
                                    success: function (response) {

                                        debugger;
                                        //alert(response.status);
                                        // Check if response is not null and has data
                                        if (response && response.status == "success") {


                                            Swal.fire("Done!", "Approved Successully!", "success")
                                                .then((value) => {
                                                    window.location.href = "<?php echo base_url(
                                                        "ticket/approve/"
                                                    ); ?>";
                                                });

                                        } 
                                        else {
                                            Swal.fire("Error!", "Ticket Approval Failed", "error");
                                        }

                                    },
                                    error: function (xhr, status, error) {
                                        // Handle errorabout:blank#blocked
                                        Swal.fire("Error!", "Ticket Approval Failed", "error");
                                    }
                                });




                            }
                        })

                }

            }
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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">All Tickets</a></li>
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

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                            <h4 class="card-title">Pending Tickets</h4>
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="myTable" class="display table table-striped table-bordered" style="font-size: small;">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>PF</th> 
                                                                    <th>INCEDENT CATEGORY</th>
                                                                    <th>ISSUE</th>                                                             
                                                                    <th>PRIORITY</th>
                                                                    <th>APPROVAL STATUS</th>
                                                                    <th>ASSIGNED TO</th>
                                                                    <th>CREATED ON</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($ticketlist as $tickets): ?>	
                                                                <tr>                                                                 
                                                                    <td><?php echo $tickets->id; ?></td>
                                                                    <td><?php echo $tickets->pf_number; ?></td>
                                                                    <td><?php echo $tickets->incedent_category; ?></td>
                                                                    <td><?php echo $tickets->issue_description ; ?></td>
                                                                    <td>
                                                                        <?php
                                                                                        $status = $tickets->priority;
                                                                                        //echo $status 
                                                                                        //echo $status; 
                                                                                        switch ($status) {
                                                                                            case 1:
                                                                                                ?>
                                                                                                <span class="badge gradient-4 badge-pill badge-primary" style="width:50px"><b>Low</b></span>
                                                                                                <?php
                                                                                                break;
                                                                                            case 2:
                                                                                                ?>
                                                                                                <span class="badge gradient-1 badge-pill badge-primary" style="width:50px"><b>Medium</b></span>
                                                                                                <?php
                                                                                                
                                                                                                break;
                                                                                            case 3:
                                                                                                ?>
                                                                                                <span class="badge gradient-3 badge-pill badge-primary" style="width:50px"><b>High</b></span>
                                                                                                <?php
                                                                                                break;
                                                                                            case 4:
                                                                                                ?>
                                                                                                <span class="badge gradient-2 badge-pill badge-primary" style="width:50px"><b>Severe</b></span>
                                                                                                <?php
                                                                                                break;    
                                                                                            default:
                                                                                                ?>
                                                                                                <p>Status: Unknown</p>
                                                                                                <?php
                                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                    <?php
                                                                                        $status = $tickets->status;

                                                                                        switch ($status) {
                                                                                            case 1:
                                                                                                ?>
                                                                                                <span class="badge badge-primary" style="width:60px"><b>Open</b></span></td>                                                                                            <?php
                                                                                                break;
                                                                                            case 2:
                                                                                                ?>
                                                                                                <span class="badge badge-secondary" style="width:60px"><b>Working</b></span></td>
                                                                                                <?php
                                                                                                break;
                                                                                            case 3:
                                                                                                ?>
                                                                                                <span class="badge badge-success" style="width:60px"><b>Closed</b></span></td>
                                                                                                <?php
                                                                                                break;
                                                                                            case 4:
                                                                                                ?>
                                                                                                <span class="badge badge-success" style="width:60px"><b>Re-Opened</b></span></td>
                                                                                                <?php
                                                                                                break;
                                                                                            case 5:
                                                                                                ?>
                                                                                                <span class="badge badge-warning" style="width:80px"><b>Pending</b></span></td>
                                                                                                <?php
                                                                                                break;
                                                                                            case 6:
                                                                                                ?>
                                                                                                <span class="badge badge-dark" style="width:60px"><b>Approved</b></span></td>
                                                                                                <?php
                                                                                                break;        
                                                                                            default:
                                                                                                ?>
                                                                                                <p>Status: Unknown</p>
                                                                                                <?php
                                                                                        }
                                                                        ?>                                                               
                                                                    <td ><?php echo $tickets->name; ?></td>
                                                                    <td>                                    
                                                                                                <?php $mysqlDatetime = $tickets->created_on;
                                                                                                $shortDate = date("Y-m-d H:i", strtotime($mysqlDatetime));
                                                                                                echo $shortDate; ?>
                                                                    </td>                    
                                                                                                                            
                                                                    <td><span>
                                                                    <a data-toggle="tooltip" href="#" title="click to view" onclick="approveTicket('<?php echo $tickets->id; ?>')"><span class="badge badge-success" style="width:80px"><b>Approve</b></span></a></td>
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

    <script type="text/javascript">

    $(document).ready(function () {
        // Show div when show button is clicked

        $(document).ready(function () {
            new DataTable('#myTable', {

                layout: {
                    topStart: {
                        buttons: ['copy', 'excel', 'pdf', 'print']
                    },
                    bottomStart: "pageLength"

                }
            });
        });

    });


    // Hide div when hide button is clicked


</script>

    

    <!--**********************************
        Main wrapper end
    ***********************************-->
                                                                    
                                    

<?= $this->endSection() ?>




    


 

