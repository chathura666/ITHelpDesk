<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>



<style>
    .error {
        border: 1px solid red;
    }

    .required-field::after {
        content: '*';
        color: red;
        margin-left: 5px;
    }
</style>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Add Issue</a></li>
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
                            <form action="<?php echo base_url('/issue/save');?>" method="post" accept-charset="utf-8">
                            <h4 class="card-title">Add Issue Description</h4>




                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">

                                                                            <div class="basic-form">
                                    <form>
                                        <div class="form-row">
                                            <div hidden class="form-group col-md-2">
                                                <label>Id</label>
                                                <input type="text" class="form-control" name="id">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Issue Type<span class="required-field"></span></label>                                             
                                                <!-- <input required type="text" class="form-control" name="issue_type"> -->
                                                <select id="issue_type"  name="issue_type" class="form-control">
                                                        <option selected="selected" value="1">Choose Type...</option>
                                                        <option value="Hardware">Hardware</option>
                                                        <option value="Software">Software</option>  
                                                    </select>

                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Issue Description<span class="required-field"></span></label>                                             
                                                <input required type="text" class="form-control" name="issue_description">
                                            </div>
                                            <div class="form-group col-md-4">
                                            <label>&nbsp</label>
                                            <div class="input-group-append">
                                             
                                                <button class="btn btn-outline-dark" style="height: 45px;" type="submit" href="<?php echo base_url('/issue/save');?>" >Add Issue Description</button>
                                            </div>
                                            </div>
                                        </div>
                                        </form></div>
                                        
                                                    <div class="table-responsive">
                                                      
                                                        
                                                    <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    <th>ID</th>
                                                                    <th>Issue Description</th>
                                                                    <th>Status</th>                                                                                                     
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($issuelist as $issuelist): ?>	
                                                                <tr>                                                                   

                                                                    <th><?php echo $issuelist->id; ?></th>
                                                                    <th><?php echo $issuelist->issue_description; ?></th>
                                                                    <th><?php echo $issuelist->status; ?></th>
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



    


 

