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
                            <form action="<?php echo base_url('/unit/save');?>" method="post" accept-charset="utf-8">
                            <h4 class="card-title">Add Units</h4>

                               

                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                          
                                        
                                            <div class="card">
                                                <div class="card-body">

                                                <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label>Unit Name</label>
                                                    <input type="text" class="form-control" placeholder="Name" name="unitname">
                                                </div>
                                                <div class="form-group col-md-4">
                                                     <label>Email</label>
                                                     <input type="text" class="form-control" placeholder="Email" name="email">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>&nbsp</label>
                                                    <div class="input-group-append">
                                                <button class="btn btn-outline-dark" style="height: 45px;" type="submit" href="<?php echo base_url('/unit/save');?>" >Add Units</button>
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
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($unitlist as $units): ?>	
                                                                <tr>                                                                   
                                                                    <td><?php echo $units->id; ?></td>
                                                                    <td><?php echo $units->name; ?></td>
                                                                    <td><?php echo $units->email; ?></td>
                                                                    <td><?php echo $units->created_at; ?></td>
                                                                    <td><?php echo $units->updated_at; ?></td>
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



    


 

