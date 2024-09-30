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
                            <form action="<?php echo base_url('/hardwaretypes/update');?>" method="post" accept-charset="utf-8">
                            <h4 class="card-title">Edit Hardware Types</h4>




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
                                                <?php if (isset($id)) { ?>
                                                <input readonly type="text" class="form-control" name="id" value="<?= $id?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="id" value="">
                                            <?php } ?>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Hardware Name</label>
                                                <?php if (isset($hardware_name)) { ?>
                                                <input type="text" class="form-control" name="hardware_name" value="<?= $hardware_name?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="hardware_name" value="">
                                            <?php } ?>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Status</label>
                                                <?php if (isset($status)) { ?>
                                                <input type="text" class="form-control" name="status" value="<?= $status?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="status" value="">
                                            <?php } ?>
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>&nbsp</label>
                                            <div class="input-group-append">
                                             
                                                <button class="btn btn-outline-dark" style="height: 45px;" type="submit" href="<?php echo base_url('/hardwaretypes/update');?>" >Update Hardware</button>
                                            </div>
                                            </div>
                                        </div>
                                        </form></div>
                                        
                                                    <div class="table-responsive">
                                                      
                                                        
                                                    <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Hardware Name</th>
                                                                    <th>Status</th>                                                               
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($typelist as $type): ?>	
                                                                <tr>                                                                   

                                                                    <th><?php echo $type->id; ?></th>
                                                                    <th><?php echo $type->hardware_name; ?></th>
                                                                    <th><?php echo $type->status; ?></th>

                                                                    
                                                                    <td><span><a href="<?php echo base_url('hardwaretypes/edit/'.$type->id);?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                                    <a href="<?php echo base_url('hardwaretypes/delete/'.$type->id);?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash color-danger"></i></a></span>                                                                    
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



    


 

