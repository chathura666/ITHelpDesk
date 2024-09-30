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

<script type="text/javascript">

    $(document).ready(function () {

        $('#editunit').submit(function (e) {
            e.preventDefault(); // Prevent form submission

            var id = $('input[name="ticketid"]').val();
            var unit = $('select[name="unitdropdown"]').val();

            debugger;
            if (id === "") {
                Swal.fire("Information!", "Tickt ID Missing!", "info");
            } else {

                if (status === "notselected") {
                    Swal.fire("Information!", "Please Select Unit!", "info");
                }
                else {
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "Ticket Assigned Unit will be updated!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Proceed'
                    }).then((result) => {
                        if (result.isConfirmed) {


                            $.ajax({
                                url: "<?php echo base_url("/ticket/changeunit"); ?>",
                                type: "POST",
                                dataType: "json",
                                data: {
                                    ticketid: id,
                                    unit: unit
                                },
                                success: function (response) {

                                    debugger;
                                    alert(response.status);
                                    // Check if response is not null and has data
                                    if (response && response.status == "success") {


                                        Swal.fire("Done!", "Assigned Unit Updated!", "success")
                                            .then((value) => {
                                                window.location.href = "<?php echo base_url(
                                                    "ticket/manageticket"
                                                ); ?>";
                                            });

                                    }
                                    else {
                                        Swal.fire("Error!", "Assigned Unit Update Failed!", "error");
                                    }

                                },
                                error: function (xhr, status, error) {
                                    // Handle errorabout:blank#blocked
                                    Swal.fire("Error!", "Assigned Unit Update Failed!", "error");
                                }
                            });




                        }
                    })

                }

            }
        });
    });


</script>

<body>

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="container">
        <div class="card">
            <div class="card-body">

                <!-- insert for date -->


                <form id="editunit" action="<?php echo base_url('/ticket/changeunit'); ?>" method="post"
                    accept-charset="utf-8">

                    <div class="form-row">
                        <div class="form-group col-md-6">

                            <h4 class="card-title">Transfer Ticket</h4>
                            <br>
                            <div hidden class="form-group col-md-3">
                                <label>ticket</label>
                                <?php if (isset ($ticketid)) { ?>
                                    <input type="text" class="form-control" name="ticketid" value="<?= $ticketid ?>">
                                <?php } else { ?>
                                    <input type="text" class="form-control" name="ticketid" value="">
                                <?php } ?>
                            </div>


                            <label>Select Unit To Transfer</label>
                            <select id="unitdropdown" name="unitdropdown" class="form-control">
                                <option selected="selected" value="notselected">Select Unit...</option>
                                <?php foreach ($unitslist as $unit) { ?>
                                    <option value="<?php echo $unit->id; ?>">
                                        <?php echo $unit->name; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-dark">Update</button>
                </form>


            </div>
        </div>
    </div>



    <!-- end date -->
    <!--**********************************
            Content body end
        ***********************************-->



    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
</body>

</html>