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
                            <form action="<?php echo base_url('/unit/update');?>" method="post" accept-charset="utf-8">
                            <h4 class="card-title">Edit Unit</h4>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">


                            	<div class="basic-form">
                                    
                                    <div class="form-row">
                                    <div class="form-group col-md-2">
                                     <label>Unit ID</label>
                                      <?php if (isset($editunitid)) { ?>
                                                <input type="text" class="form-control" name="unitid" value="<?= $editunitid?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="unitid" value="">
                                            <?php } ?>

                                    </div>
                                    <div class="form-group col-md-3">
                                     <label>Unit Name</label>
                                      <?php if (isset($editunitname)) { ?>
                                                <input type="text" class="form-control" name="unitname" value="<?= $editunitname?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="unitname" value="">
                                            <?php } ?>

                                    </div>
                                    <div class="form-group col-md-3">
                                     <label>Email</label>
                                      <?php if (isset($editunitemail)) { ?>
                                                <input type="text" class="form-control" name="unitemail" value="<?= $editunitemail?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="unitemail" value="">
                                            <?php } ?>

                                    </div>
                                     <div class="form-group col-md-3">
                                     <label>&nbsp</label>
                                      <div class="input-group-append">
                                                <button class="btn btn-outline-dark" style="height: 45px;" ="submit" href="<?php echo base_url('/unit/update');?>" >Update Unit</button>
                                            </div>
                                    </div>

                                    </div>


                                     
                                    
	                                </div>
                                                    <div class="table-responsive">
                                                      
                                                        
                                                           <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Name</th>  
                                                                    <th>Email</th>
                                                                    <th>Created On</th>                                                             
                                                                    <th>Updated On</th>
                                                                    <th scope="col">Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($editunitlist as $units): ?>	
                                                                <tr>                                                                   
                                                                    <td><?php echo $units->id; ?></td>
                                                                    <td><?php echo $units->name; ?></td>
                                                                    <td><?php echo $units->email; ?></td>
                                                                    <td><?php echo $units->created_at; ?></td>
                                                                    <td><?php echo $units->updated_at; ?></td>
                                                             
                                                                    
                                                                    <td><span><a href="<?php echo base_url('unit/edit/'.$units->id);?>" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i> </a>
                                                                    <a href="<?php echo base_url('unit/delete/'.$units->id);?>" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash color-danger"></i></a></span>                                                                    
                                                                    </td>
                                                                </tr>
                                                                <?php endforeach ?>
                                                            </tbody>                                                            
                                                        </table>
                                                        '
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



    


 

