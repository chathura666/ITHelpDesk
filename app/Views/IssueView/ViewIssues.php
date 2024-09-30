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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">View Issues</a></li>

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
                            <form action="<?php echo base_url('/hardware/save');?>" method="post" accept-charset="utf-8">
                            <h4 class="card-title">View Issue Details</h4>
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
                                                                    <th>Issue Type</th>
                                                                    <th>Issue Description</th>
                                                                    <th>Status</th>                                                               
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($issuelist as $issue): ?>	
                                                                <tr>                                                                   

                                                                    <th><?php echo $issue->id; ?></th>
                                                                    <th><?php echo $issue->issue_type; ?></th>
                                                                    <th><?php echo $issue->issue_description; ?></th>
                                                                    <th><?php echo $issue->status; ?></th>

                                                                    
                                                                    <td><span><a href="<?php echo base_url('issue/edit/'.$issue->id);?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                                    <a href="<?php echo base_url('issue/delete/'.$issue->id);?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash color-danger"></i></a></span>                                                                    
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
                                                   

<?= $this->endSection() ?>



    


 

