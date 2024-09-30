<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>


<!--**********************************
            Content body start
***********************************-->

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/offline/dataTables.dataTables.css'); ?>">
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/offline/buttons.dataTables.css'); ?>">
<!-- DataTables Buttons JS -->

<script src="<?php echo base_url('js/offline/dataTables.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/dataTables.buttons.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/buttons.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/buttons.print.min.js'); ?>"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(function () {
        $("#datepickerfrom").datepicker();
        $("#datepickerto").datepicker();
        $("#datepickersingle").datepicker();

    });
</script>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pie Chart</title>
<!-- Bootstrap CSS -->



<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Reports</a></li>

            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <span class="display-5"><i class="icon-tag gradient-3-text"></i></span>
                            <h3 class="mt-3">
                                <?php echo $totalcount; ?> Tickets
                            </h3>
                            <p>Personalize your report</p><a href=" <?php echo base_url('/report/ticket'); ?>"
                                class="btn gradient-4 btn-md border-0 btn-rounded px-5">Generate</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <span class="display-5"><i class="icon-user gradient-4-text"></i></span>
                            <h3 class="mt-3">
                                <?php echo $allusers; ?> Users
                            </h3>
                            <p>Personalize your report</p>
                            <a class="btn gradient-3 btn-md border-0 btn-rounded px-5" id="userBtn"
                                onclick="enableUserTable();"
                                href=" <?php echo base_url('/report/user'); ?>">Generate</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <span class="display-5"><i class="icon-diamond gradient-4-text"></i></span>
                            <h3 class="mt-3">80 points</h3>
                            <p>Personalize your report</p>
                            <a href="javascript:void()"
                                class="btn gradient-1 btn-md border-0 btn-rounded px-5">Generate</a>
                        </div>
                    </div>
                </div>
            </div> -->


            <div class="col-5">
                <div class="card">
                    <div class="card-body">
                        <div class="container mt-2">
                            <canvas id="myPieChart" width="100" height="100"></canvas>
                        </div>
                    </div>
                </div>
                <!-- row -->
            </div>
        </div>

    </div>

</div>

<!-- Card -->
</div>

</div>

</div>
<!-- #/ container -->
</div>
<!--**********************************
        Content body end
            *********************************** -->




<!--**********************************
            Main wrapper end
                *********************************** -->



<script type="text/javascript">


    $(document).ready(function () {
        // Show div when show button is clicked

        $(document).ready(function () {
            new DataTable('#myTable', {

                layout: {
                    topStart: {
                        buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                    },
                    bottomStart: "pageLength"

                }
            });
        });


        // Event handler for checkbox change
        $('#roleCheckbox').change(function () {
            if ($(this).is(':checked')) {
                // Checkbox is checked, execute your code here
                //alert("checked");

                $.ajax({
                    url: '<?php echo site_url('role/all'); ?>', // URL to fetch data from
                    type: 'GET', // HTTP method (GET or POST)
                    dataType: 'json', // Expected data type
                    success: function (response) {
                        // Clear existing options (if any)
                        $('#roleDropdown').empty();

                        debugger;

                        // Loop through the response data and append options to the dropdown
                        $.each(response.data.rolelist, function (index, item) {

                            debugger;
                            $('#roleDropdown').append($('<option>', {
                                value: item.role_id,
                                text: item.role_name
                            }));
                        });
                    },
                    error: function (xhr, status, error) {
                        // Handle error response
                        $('#roleDropdown').empty();
                        console.error(xhr.responseText);
                    }
                });


            } else {
                // Checkbox is unchecked, execute your code here
                console.log("Checkbox is unchecked");
                $('#roleDropdown').empty();
                //alert("unchecked");
            }
        });

        $('#unitCheckbox').change(function () {
            if ($(this).is(':checked')) {
                // Checkbox is checked, execute your code here
                //alert("checked");

                $.ajax({
                    url: '<?php echo site_url('unit/all'); ?>', // URL to fetch data from
                    type: 'GET', // HTTP method (GET or POST)
                    dataType: 'json', // Expected data type
                    success: function (response) {
                        // Clear existing options (if any)
                        $('#unitDropdown').empty();

                        debugger;

                        // Loop through the response data and append options to the dropdown
                        $.each(response.data.unitlist, function (index, item) {

                            debugger;
                            $('#unitDropdown').append($('<option>', {
                                value: item.id,
                                text: item.name
                            }));
                        });
                    },
                    error: function (xhr, status, error) {
                        // Handle error response
                        $('#unitDropdown').empty();
                        console.error(xhr.responseText);
                    }
                });


            } else {
                // Checkbox is unchecked, execute your code here
                console.log("Checkbox is unchecked");
                $('#unitDropdown').empty();
                //alert("unchecked");
            }
        });


        $("#tblUser").hide();




        //$('#myTable').DataTable();
        $('#loadDataBtn').click(function () {

            var periodFrom = $("#periodfrom").val();
            var periodTo = $("#periodto").val();
            var Status = $("#active").val();

            //alert(periodFrom);
            //alert(periodTo);
            //alert(Status);

            $.ajax({
                url: "<?php echo site_url('user/viewreport'); ?>",
                method: "POST",
                data: { periodfrom: periodFrom, periodto: periodTo, status: Status },
                async: true,
                dataType: 'json',
                success: function (data) {

                    new DataTable('#myTable', {

                        destroy: true,

                        data: data.data.userlist,
                        columns: [
                            { data: 'id', title: "ID" },
                            { data: 'user_name', title: "User Name" },
                            { data: 'first_name', title: "First Name" },
                            { data: 'last_name', title: "Last Name" },
                            { data: 'email', title: "Email" },
                            { data: 'mobile', title: "Mobile" },
                            { data: 'ext', title: "Ext" },
                            { data: 'role_name', title: "Role" },
                            { data: 'name', title: "Unit" },
                            { data: 'created_at', title: "Created On" }
                        ],
                        layout: {
                            topStart: {
                                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                            },
                            topEnd: "pageLength"
                        }
                    });



                }

            });
            return false;
        });

        // Initialize the datepicker
        $('#datePicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });

        // Enable/disable status dropdown based on checkbox
        $('#roleCheckbox').change(function () {
            if ($(this).is(':checked')) {
                $('#roleDropdown').prop('disabled', false);
            } else {
                $('#roleDropdown').prop('disabled', true);
            }
        });

        $('#unitCheckbox').change(function () {
            if ($(this).is(':checked')) {
                $('#unitDropdown').prop('disabled', false);
            } else {
                $('#unitDropdown').prop('disabled', true);
            }
        });

        $('#statusCheckbox').change(function () {
            if ($(this).is(':checked')) {
                $('#statusDropdown').prop('disabled', false);
            } else {
                $('#statusDropdown').prop('disabled', true);
            }
        });

        // Change event for date type radio buttons
        $('input[name="dateType"]').change(function () {

            //alert($(this).val());
            if ($(this).val() === 'range') {
                // Disable datepicker for range
                $('#datepickersingle').prop('disabled', true);
                $('#datepickerfrom').prop('disabled', false);
                $('#datepickerto').prop('disabled', false);
            } else {
                // Enable datepicker for single date
                $('#datepickersingle').prop('disabled', false);
                $('#datepickerfrom').prop('disabled', true);
                $('#datepickerto').prop('disabled', true);
            }
        });

    });

    function enableUserTable() {

        $("#tblUser").show();
    }

    // Hide div when hide button is clicked

    $(document).ready(function () {

        const data = {
            labels: ['Open', 'In Progress', 'Closed', 'Reopened', 'Approval Pending', 'Approved'],
            datasets: [{
                label: 'Ticket Status', // Optional label for the dataset
                data: [
                    <?php
                    echo $opencount . ', ';
                    echo $progresscount . ', ';
                    echo $closedcount . ', ';
                    echo $reopencount . ', ';
                    echo $approvalpendingcount . ', ';
                    echo $approvedcount;
                    ?>
                ], // Assigning PHP variables directly to JavaScript array
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)'
                ],
                hoverOffset: 4
            }]
        };

        // Get the canvas element
        const ctx = document.getElementById('myPieChart').getContext('2d');

        // Create the pie chart
        const myPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                plugins: {
                    title: {
                        display: true,
                        text: 'Ticket Status Summery',
                        font: {
                            size: 18
                        }

                    }
                }
            }
        });

    });



</script>


<?= $this->endSection() ?>