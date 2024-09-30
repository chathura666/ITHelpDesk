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
<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/offline/jquery-ui.css'); ?>">
<link rel="stylesheet" href="/resources/demos/style.css">

<script src="<?php echo base_url('js/offline/dataTables.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/dataTables.buttons.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/buttons.dataTables.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/jszip.min.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/pdfmake.min.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/vfs_fonts.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/buttons.html5.min.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/buttons.print.min.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/moment.js'); ?>"></script>
<script src="<?php echo base_url('js/offline/jquery-ui.js'); ?>"></script>


<script>
    $(function () {
        $("#datepickerfrom").datepicker();
        $("#datepickerto").datepicker();
        $("#datepickersingle").datepicker();

    });
</script>

<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">User Reports</a></li>

            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div id="UserReport" class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Tickets Reports</h4>
                        <br>
                        <div class="container">


                            <div class="form-row">
                                <div class="form-group col-sm-2">
                                    <label for="dateType">Select Filter Type:</label>
                                </div>
                                <div class="form-group col-md-2">
                                </div>
                                <div class="form-group col-md-2">
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="dateType">Select Options:</label>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Select Values:</label>
                                </div>


                            </div>
                            <div class="form-row">

                                <div class="form-group col-sm-2">
                                    <input type="radio" id="dateSingle" name="dateType" value="single">
                                    <label for="dateRange">Single Date</label>

                                </div>
                                <div class="form-group col-sm-2">
                                    <input class="form-control-sm" placeholder="Select Date" type="text"
                                        id="datepickersingle" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="checkbox" id="statusCheckbox" name="statusCheckbox">
                                    <label for="statusCheckbox">&nbsp&nbsp&nbsp&nbspStatus</label>
                                </div>
                                <div class="form-group col-md-2">
                                    <select class="form-control-sm col-sm-8" id="statusDropdown" disabled>
                                        <option value="1">Open</option>
                                        <option value="2">Work In Progress</option>
                                        <option value="3">Closed</option>
                                        <option value="4">Re-Opened</option>
                                        <option value="5">Approval Pending</option>
                                        <option value="6">Approed</option>
                                        <option value="7">Invalid</option>
                                    </select>
                                </div>


                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-2">
                                    <input type="radio" id="dateRange" name="dateType" value="range">
                                    <label for="dateRange">Date Range</label>
                                </div>
                                <div class="form-group col-sm-2">
                                    <input class="form-control-sm" type="text" placeholder="Select From Date"
                                        id="datepickerfrom" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                    <input class="form-control-sm" type="text" placeholder="Select To Date"
                                        id="datepickerto" disabled>
                                </div>
                                <div class="form-group col-md-2">
                                    <input type="checkbox" id="priorityCheckbox" name="priorityCheckbox">
                                    <label for="roleCheckbox">&nbsp&nbsp&nbsp&nbspPriority</label>
                                </div>
                                <div class="form-group col-md-2">
                                    <select class="form-control-sm col-sm-8" id="priorityDropdown" disabled>
                                        <option value="1">Low</option>
                                        <option value="2">Medium</option>
                                        <option value="3">High</option>
                                        <option value="4">Severe</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-sm-2">
                                    <button id="loadDataBtn" type="submit" class="btn btn-outline-dark">Search</button>
                                </div>
                                <div class="form-group col-md-2">

                                </div>
                                <div class="form-group col-md-2">
                                </div>
                                <div class="form-group col-sm-2">
                                    <input type="checkbox" id="unitCheckbox" name="unitCheckbox">
                                    <label for="unitCheckbox">&nbsp&nbsp&nbsp&nbspAssigned Unit</label>
                                </div>
                                <div class="form-group col-md-2">
                                    <select class="form-control-sm col-sm-8" id="unitDropdown" disabled>
                                    </select>
                                </div>

                            </div>
                        </div>


                        <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Branch</th>
                                    <th>PF Number</th>
                                    <th>Incident Category</th>
                                    <th>Priority</th>
                                    <th>Created On</th>
                                    <th>Status</th>
                                    <th>Assigned Unit</th>
                                    <th>Assigned To</th>
                                    <th>Modified On</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
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

        new DataTable('#myTable', {

            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                },
                bottomStart: "pageLength"

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

                        //debugger;

                        // Loop through the response data and append options to the dropdown
                        $.each(response.data.unitlist, function (index, item) {

                            //debugger;
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

            var periodfrom = $("#datepickerfrom").val();
            var periodto = $("#datepickerto").val();
            var singledate = $("#datepickersingle").val();
            var unitchk = $("#unitCheckbox").prop('checked');
            var statuschk = $("#statusCheckbox").prop('checked');
            var prioritychk = $("#priorityCheckbox").prop('checked');
            var unitval = $("#unitDropdown").val();
            var statusval = $("#statusDropdown").val();
            var priorityval = $("#priorityDropdown").val();

            var stsnew = "no"
            if (statuschk) {
                stsnew = "yes"
            }

            var prioritynew = "no"
            if (prioritychk) {
                prioritynew = "yes"
            }

            var unitnew = "no"
            if (unitchk) {
                unitnew = "yes"
            }


            var datepicktype = "no";

            if ($('#dateRange').prop('checked')) {
                if (periodfrom === "" || periodto === "") {
                    alert("Please select date");
                }
                else {
                    datepicktype = "range";
                }

            }
            else if ($('#dateSingle').prop('checked')) {

                if (singledate == "") {
                    alert("Please select date");
                }
                else {
                    datepicktype = "single";
                }

            }
            else {
                datepicktype = "no";

            }

            var datetype = datepicktype;


            if (periodfrom && periodto && new Date(periodfrom) > new Date(periodto)) {
                alert("From date cannot be greater than to date ");
            } else {
                //alert("ok");
            }

            debugger;


            $.ajax({
                url: "<?php echo site_url('ticket/viewreport'); ?>",
                method: "POST",
                data: { datetype: datetype, periodfrom: periodfrom, periodto: periodto, singledate: singledate, unitchk: unitnew, statuschk: stsnew, prioritychk: prioritynew, unitval: unitval, statusval: statusval, priorityval: priorityval },
                async: true,
                dataType: 'json',
                success: function (data) {

                    new DataTable('#myTable', {

                        destroy: true,

                        data: data.data.ticketlist,
                        columns: [
                            { data: 'id', title: "ID" },
                            { data: 'branch', title: "Branch" },
                            { data: 'pf_number', title: "PF Number" },
                            { data: 'incedent_category', title: "Incident Category" },
                            { data: 'prioirty_name', title: "Priority" },
                            {
                                data: 'created_on',
                                title: "Created On",
                                render: function (data) {
                                    return moment(data).format('MM/DD/YYYY');
                                }
                            },
                            { data: 'description', title: "Status" },
                            { data: 'name', title: "Assigned Unit" },
                            { data: 'user_name', title: "Assigned To" },
                            {
                                data: 'modified_on',
                                title: "Modified On",
                                render: function (data) {
                                    return moment(data).format('MM/DD/YYYY');
                                }
                            }
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
        $('#priorityCheckbox').change(function () {
            if ($(this).is(':checked')) {
                $('#priorityDropdown').prop('disabled', false);
            } else {
                $('#priorityDropdown').prop('disabled', true);
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


</script>


<?= $this->endSection() ?>