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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Add Unit</a></li>
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
                            <form id="addUnit" action="<?php echo base_url('/unit/save'); ?>" method="post"
                                accept-charset="utf-8">
                                <h4 class="card-title">Add Units</h4>



                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">


                                            <div class="card">
                                                <div class="card-body">

                                                    <div class="form-row">
                                                        <div class="form-group col-md-4">
                                                            <label>Unit Name<span class="required-field"></span></label>
                                                            <input required type="text" class="form-control"
                                                                placeholder="Name" name="unitname">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>Email<span class="required-field"></span></label>
                                                            <input required type="email" class="form-control"
                                                                placeholder="Email" name="email">
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label>&nbsp</label>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-dark"
                                                                    style="height: 45px;" type="submit"
                                                                    href="<?php echo base_url('/unit/save'); ?>">Add
                                                                    Units</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="table-responsive">


                                                        <table id="myTable"
                                                            class="display table table-striped table-bordered zero-configuration">
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
                                                                        <td>
                                                                            <?php echo $units->id; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $units->name; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $units->email; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            $short1 = $units->created_at;
                                                                            $shortDate1 = date("Y-m-d", strtotime($short1));
                                                                            echo $shortDate1 ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php
                                                                            $short2 = $units->updated_at;
                                                                            $shortDate2 = date("Y-m-d", strtotime($short2));
                                                                            echo $shortDate2 ?>
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

        $('#addUnit').submit(function (e) {
            e.preventDefault(); // Prevent form submission

            var unitname = $('input[name="unitname"]').val();
            var unitemail = $('input[name="email"]').val();

            debugger;
            if (unitname === "") {
                Swal.fire("Information!", "Please enter required fields", "info");
            } else {


                $.ajax({
                    url: "<?php echo base_url("/unit/save"); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        unitname: unitname,
                        email: unitemail
                    },
                    success: function (response) {

                        debugger;
                        //alert(response.status);
                        // Check if response is not null and has data
                        if (response && response.status == "success") {


                            Swal.fire("Done!", "Unit Added!", "success")
                                .then((value) => {
                                    window.location.href = "<?php echo base_url(
                                        "/unit/add"
                                    ); ?>";
                                });
                        }

                        else {
                            Swal.fire("Error!", "Unit Adding Failed", "error");
                            console.log("Unit Adding Failed");
                        }

                    },
                    error: function (xhr, status, error) {
                        // Handle errorabout:blank#blocked
                        Swal.fire("Error!", "Unit Update Failed", "error");
                    }


                });



            }

        });


    });


</script>




<?= $this->endSection() ?>