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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Personal Tickets</a></li>
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
                            <h4 class="card-title">View Personal Tickets</h4>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="myTable" class="display table table-striped table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th> 
                                                                    <th>INCEDENT CATEGORY</th>
                                                                    <th>ISSUE</th>                                                             
                                                                    <th>PRIORITY</th>
                                                                    <th>STATUS</th>
                                                                    <th>CREATED ON</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($ticketlist as $tickets): ?>	
                                                                <tr>                                                                 
                                                                    <td><?php echo $tickets->id; ?></td>
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
                                                                                                <span class="badge badge-danger" style="width:60px"><b>Re-Opened</b></span></td>
                                                                                                <?php
                                                                                                break;
                                                                                            case 5:
                                                                                                ?>
                                                                                                <span class="badge badge-warning" style="width:60px"><b>Approval</b></span></td>
                                                                                                <?php
                                                                                                break;
                                                                                            case 6:
                                                                                                ?>
                                                                                                <span class="badge badge-dark" style="width:60px"><b>Approved</b></span></td>
                                                                                                <?php
                                                                                                break; 
                                                                                            case 7:
                                                                                                ?>
                                                                                                <span class="badge badge-light" style="width:60px"><b>Invalid</b></span></td>
                                                                                                <?php
                                                                                                break;       
                                                                                            default:
                                                                                                ?>
                                                                                                <p>Status: Unknown</p>
                                                                                                <?php
                                                                                        }
                                                                        ?>                                                               
                                                                    
                                                                    <td>                                    
                                                                                                <?php $mysqlDatetime = $tickets->created_on;
                                                                                                $shortDate = date("Y-m-d H:i", strtotime($mysqlDatetime));
                                                                                                echo $shortDate; ?>
                                                                    </td>                    
                                                                                                                            
                                                                    <td><span>  
                                                                    <a href="#" onclick="checkStatusaAndEdit('<?php echo $tickets->id; ?>','<?php echo $tickets->status; ?>')" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil"></i> </a>
                                                                    <a href="<?php echo base_url('ticket/details/'.$tickets->id);?>" data-toggle="tooltip"  data-placement="top" title="View"><i class="fa-eye fa"></i></a></span>                                                                    
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

    function checkStatusaAndEdit(id,status) {
       

       // alert(status);
        if (status === "2" || status === "4" || status === "5" || status === "6" || status === "7") {
            Swal.fire("Information!", "Ticket is being procced cannot be updated. Please contact relevent unit.", "info");
    } else {

        window.location.href = '<?php echo base_url('ticket/edit/'); ?>'+'/'+id;
   
    }

    }

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




    


 

