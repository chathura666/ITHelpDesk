<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />
<link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">



<script src="<?php echo base_url('js/offline/jquery-3.7.1.js'); ?>"></script>
<script src="<?php echo base_url('js/common.min.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/sweetalert2.js'); ?>"></script>
    <script src="<?php echo base_url('js/custom.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/settings.js'); ?>"></script>
    <script src="<?php echo base_url('js/gleek.js'); ?>"></script>



</head>

<body>

        <!--**********************************
            Content body start
        ***********************************-->
        <div>


            <!-- insert for date -->

            <div class="col-12">
                        <!-- Card -->
           <div class="card">
                    <div class="card-body">

                    <div class="col-xl-12 col-lg-12 col-sm-12 col-xxl-12">
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
                                                                <p class="mb-0"><?= $activity->remarks?></p>
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

            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
       

    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
    </body>

</html>


