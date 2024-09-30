<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>




        <!--**********************************
            Content body start
        ***********************************-->
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
                            <form action="<?php echo base_url('/issueVsUnit/save');?>" method="post" accept-charset="utf-8">
                            <h4 class="card-title">Assign Issues to Unit</h4>
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
                                                                    <th>Unit ID</th>
                                                                    <th>Issue ID</th> 
                                                                    <th>Active</th>                                                               
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($issuevsunitlist as $issue): ?>	
                                                                <tr>                                                                   

                                                                    <th><?php echo $issue->id; ?></th>
                                                                    <th><?php echo $issue->uid; ?></th>
                                                                    <th><?php echo $issue->issue_id; ?></th>
                                                                    <th><?php echo $issue->active; ?></th>

                                                                    
                                                                    <td><span><a href="<?php echo base_url('issueVsUnit/edit/'.$issue->id);?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                                    <a href="<?php echo base_url('issueVsUnit/delete/'.$issue->id);?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash color-danger"></i></a></span>                                                                    
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
                                                                    

    
                                                   

<?= $this->endSection() ?>



    


 

