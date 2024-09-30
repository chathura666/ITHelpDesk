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
                            <form action="<?php echo base_url('/issue/update');?>" method="post" accept-charset="utf-8">
                            <h4 class="card-title">Edit Issue Details</h4>




                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">

                                                                            <div class="basic-form">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label>Hardware Id</label>
                                                <?php if (isset($editissueid)) { ?>
                                                <input type="text" class="form-control" name="id" value="<?= $editissueid?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="id" value="">
                                            <?php } ?>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Issue Type</label>
                                                <?php if (isset($editissuetype)) { ?>
                                                <input type="text" class="form-control" name="issue_type" value="<?= $editissuetype?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="issue_type" value="">
                                            <?php } ?>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Issue Description</label>
                                                <?php if (isset($editissuedesc)) { ?>
                                                <input type="text" class="form-control" name="issue_description" value="<?= $editissuedesc?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="issue_description" value="">
                                            <?php } ?>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Status</label>
                                                <?php if (isset($editissuestatus)) { ?>
                                                <input type="text" class="form-control" name="status" value="<?= $editissuestatus?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="status" value="">
                                            <?php } ?>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>&nbsp</label>
                                            <div class="input-group-append">
                                             
                                                <button class="btn btn-outline-dark" style="height: 45px;" type="submit" href="<?php echo base_url('/issue/update');?>" >Update Issue</button>
                                            </div>
                                            </div>
                                        </div>
                                        </form></div>
                                        
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


    
                                                   

<?= $this->endSection() ?>



    


 

