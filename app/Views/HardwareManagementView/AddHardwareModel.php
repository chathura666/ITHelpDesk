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
                            <form action="<?php echo base_url('/hardwaremodels/save');?>" method="post" accept-charset="utf-8">
                            <h4 class="card-title">Add Hardware Types</h4>




                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">

                                                                            <div class="basic-form">
                                    <form>
                                        <div class="form-row">
                                            <div hidden class="form-group col-md-2">
                                                <label>Hardware Id</label>
                                                <input type="text" class="form-control" name="id">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Hardware Model Name</label>                                             
                                                <input type="text" class="form-control" name="modelname">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Status</label>                                             
                                                <input type="text" class="form-control" name="status">
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>&nbsp</label>
                                            <div class="input-group-append">
                                             
                                                <button class="btn btn-outline-dark" style="height: 45px;" type="submit" href="<?php echo base_url('/hardwaremodels/save');?>" >Add Hardware</button>
                                            </div>
                                            </div>
                                        </div>
                                        </form></div>
                                        
                                                    <div class="table-responsive">
                                                      
                                                        
                                                    <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Model Name</th>
                                                                    <th>Status</th>                                                                                                     
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($modellist as $model): ?>	
                                                                <tr>                                                                   

                                                                    <th><?php echo $model->id; ?></th>
                                                                    <th><?php echo $model->model_name; ?></th>
                                                                    <th><?php echo $model->status; ?></th>
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



    


 

