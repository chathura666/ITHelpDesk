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
                                                <label>Issue Id</label>
                                                <?php if (isset($editid)) { ?>
                                                <input type="text" class="form-control" name="id" value="<?= $editid?>">
                                            <?php } else { ?>
                                                <input type="text" class="form-control" name="id" value="">
                                            <?php } ?>
                                            </div>
                                            <div class="form-group col-md-3">
                                                    <label>Assigned Unit</label>
                                                    <select name="unit" id="inputState" class="form-control">
                                                        <option value="<?= $edituid?>"><?php echo $editunitname; ?></option>
                                                        <?php foreach($unitlist as $unit) { ?>
                                                            <option value="<?php echo $unit->id; ?>"><?php echo $unit->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                    <label>Issue Description</label>
                                                    <select name="unit" id="inputState" class="form-control">
                                                    <option value="<?= $editissue_id?>"><?php echo $editissuename; ?></option>
                                                        <?php foreach($issuelist as $issue) { ?>
                                                            <option value="<?php echo $issue->id; ?>"><?php echo $issue->issue_description; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                            </div>
                                            
                                            <div class="form-group col-md-4">
                                                <label>Active</label>
                                                <select name="unit" id="inputState" class="form-control">
                                                <option value="<?= $editactive?>"><?php echo $editactive; ?></option>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                </select>
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



    


 

