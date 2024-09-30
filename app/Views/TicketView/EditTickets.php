<?= $this->extend('App\Views\common\baselayout') ?>
<?= $this->section('baselayout') ?>

<style>
    /* CSS for file icons */
    .file-icon {
        width: 24px;
        /* Adjust icon size as needed */
        height: 24px;
        /* Adjust icon size as needed */
        vertical-align: middle;
        margin-right: 5px;
    }
</style>


<script type="text/javascript">

    $(document).ready(function () {

        // Function to fetch page content and display it in the modal
        function loadTicketHistory() {

            var ticketId = $('#ticket').val();

            if (ticketId != "") {
                $.ajax({
                    url: '<?= base_url('ticket/history/') ?>' + "/" + ticketId,
                    type: 'GET',
                    success: function (response) {
                        // Set the fetched page content to the modal body
                        $('#modalBody').html(response);

                        // Show the modal
                        $('#myModal').modal('show');
                    },
                    error: function (xhr, status, error) {
                        console.error('Error loading page content:', error);
                    }
                });
            }
            else {
                Swal.fire("Information!", "Search Ticket Number First!", "info");
                document.querySelector('#statusModal').disabled = true;
                document.querySelector('#assignModal').disabled = true;
                document.querySelector('#transferModal').disabled = true;
                document.querySelector('#historyModal').disabled = true;
            }


        }

        // Call the function when modal button is clicked
        $('#historyModal').click(function () {
            loadTicketHistory();
        });

        function loadTicketStatus() {


            var ticketId = $('#ticket').val();

            if (ticketId != "") {
                $.ajax({
                    url: '<?= base_url('ticket/status/') ?>' + "/" + ticketId,
                    type: 'GET',
                    success: function (response) {
                        // Set the fetched page content to the modal body
                        $('#modalBody').html(response);

                        // Show the modal
                        $('#myModal').modal('show');
                    },
                    error: function (xhr, status, error) {
                        console.error('Error loading page content:', error);
                    }
                });
            }
            else {
                Swal.fire("Information!", "Search Ticket Number First!", "info");
                document.querySelector('#statusModal').disabled = true;
                document.querySelector('#assignModal').disabled = true;
                document.querySelector('#transferModal').disabled = true;
                document.querySelector('#historyModal').disabled = true;
            }

        }

        // Call the function when modal button is clicked
        $('#statusModal').click(function () {
            loadTicketStatus();
        });


        function loadTicketAssign() {


            var ticketId = $('#ticket').val();

            if (ticketId != "") {
                $.ajax({
                    url: '<?= base_url('ticket/assign/') ?>' + "/" + ticketId,
                    type: 'GET',
                    success: function (response) {
                        // Set the fetched page content to the modal body
                        $('#modalBody').html(response);

                        // Show the modal
                        $('#myModal').modal('show');
                    },
                    error: function (xhr, status, error) {
                        console.error('Error loading page content:', error);
                    }
                });
            }
            else {
                Swal.fire("Information!", "Search Ticket Number First!", "info");
                document.querySelector('#statusModal').disabled = true;
                document.querySelector('#assignModal').disabled = true;
                document.querySelector('#transferModal').disabled = true;
                document.querySelector('#historyModal').disabled = true;
            }

        }

        // Call the function when modal button is clicked
        $('#assignModal').click(function () {
            loadTicketAssign();
        });

        function loadTicketTransfer() {


            var ticketId = $('#ticket').val();

            if (ticketId != "") {
                $.ajax({
                    url: '<?= base_url('ticket/transfer/') ?>' + "/" + ticketId,
                    type: 'GET',
                    success: function (response) {
                        // Set the fetched page content to the modal body
                        $('#modalBody').html(response);

                        // Show the modal
                        $('#myModal').modal('show');
                    },
                    error: function (xhr, status, error) {
                        console.error('Error loading page content:', error);
                    }
                });
            }
            else {
                Swal.fire("Information!", "Search Ticket Number First!", "info");
                document.querySelector('#statusModal').disabled = true;
                document.querySelector('#assignModal').disabled = true;
                document.querySelector('#transferModal').disabled = true;
                document.querySelector('#historyModal').disabled = true;
            }

        }

        // Call the function when modal button is clicked
        $('#transferModal').click(function () {
            loadTicketTransfer();
        });


        document.getElementById("searchTicket").addEventListener("click", function () {

            var ticketId = $('#ticketId').val();

            //alert(ticketId);

            $.ajax({
                url: '<?= base_url('ticket/manage/') ?>' + "/" + ticketId,
                type: 'GET',
                dataType: 'json',
                success: function (response) {

                    //response;
                    debugger;


                    $('[name="ticket"]').val(ticketId);
                    $('[name="pf"]').val(response.data.editticketpf_number);
                    $('[name="name"]').val(response.data.editticketname);
                    $('[name="mobile"]').val(response.data.editticketcontact_no);
                    $('[name="branch"]').val(response.data.editticketbranch);
                    $('[name="changetype"]').val(response.data.editticketincedent_category);
                    $('[name="hwtype"]').val(response.data.edittickethardware_name);
                    $('[name="hwbrand"]').val(response.data.editticketbrand_name);
                    $('[name="hwmodel"]').val(response.data.editticketmodel_name);
                    $('[name="issue"]').val(response.data.editticketissue_description);
                    $('[name="ip"]').val(response.data.editticketip_address);
                    $('[name="user"]').val(response.data.editticketuser_name);
                    $('[name="content"]').text(response.data.editticketcontent);
                    $('[name="priority"]').val(response.data.editticketpriority_name);

                    //alert(response.data.attachment);

                    if (response.data.attachment) {
                        $('#attachementhide').show();
                        $('#pttachment').text("Attachment_" + ticketId + ".pdf");


                        $('#aattachment').attr('href', '<?= base_url('attachment/') ?>' + "/" + response.data.attachment);

                    }
                    else{
                        $('#attachementhide').hide();
                    }

                    var issuetype = response.data.editticketincedent_category;

                    if (issuetype === 'Hardware') {
                        $('#cht2').prop('checked', true);
                    }

                    if (issuetype === 'Software') {
                        $('#cht1').prop('checked', true);
                    }


                    $('[name="remarks"]').val(response.data.editticket_remarks);
                    $('[name="assignedto"]').val(response.data.editticket_assignedtoname);
                    $('[name="assignedunit"]').val(response.data.editticket_assignedtounitname);
                    $('[name="datecreated"]').val(response.data.editticketcreated_on);
                    $('[name="lastmodified"]').val(response.data.editticketmodified_on);
                    $('[name="status"]').val(response.data.editticketstatusdescription);

                    if ($('[name="pf"]').val() != "") {

                        document.querySelector('#historyModal').disabled = false;

                        if (document.querySelector('#statusModal') !== null) {
                            if ($('[name="status"]').val() != "Closed") {
                                document.querySelector('#statusModal').disabled = false;
                            }
                        }

                        if (document.querySelector('#assignModal') !== null) {
                            if ($('[name="status"]').val() != "Closed") {
                                document.querySelector('#assignModal').disabled = false;
                            }
                        }

                        if (document.querySelector('#transferModal') !== null) {
                            if ($('[name="status"]').val() != "Closed") {
                                document.querySelector('#transferModal').disabled = false;
                            }
                        }

                    }

                    $('#ticketId').val("");
                }
            });
        });



        if ($('#cht').is(':checked')) {
            var dropdown1 = document.getElementById("hwtype");
            var dropdown2 = document.getElementById("hwmodel");
            var dropdown3 = document.getElementById("hwbrand");


            dropdown1.style.display = "none"; // Hide the dropdown
            dropdown2.style.display = "none"; // Hide the dropdown
            dropdown3.style.display = "none"; // Hide the dropdown
        }

    });


    function remote(ip) {
        ///alert("Dfdfd");

        $.ajax({
            url: 'remote/' + ip,
            type: 'GET',
            dataType: 'json',
            success: function (response) {

                alert("Remote Session Initiating.....");
            }
        });
    }



</script>




<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">



    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Manage Ticket</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">


            <!-- insert for date -->

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="input-group form-group col-md-3">
                                <input type="text" class="form-control" id="ticketId" />
                                <div class="input-group-append">
                                    <button id="searchTicket" class="btn btn-outline-dark" type="button">Search
                                        Ticket</button>
                                </div>
                            </div>
                            <div class="button-icon input-group form-group col-md-1"></div>

                            <div class="button-icon input-group form-group col-md-6"
                                style="display: flex;justify-content: flex-end;">
                                <button class=" btn btn-outline-dark" type="button" id="historyModal"
                                    style="margin-right: 10px;" disabled>View History</button>

                                <?php if (($_SESSION['role'] == 3) || ($_SESSION['role'] == 4) || ($_SESSION['role'] == 5)) { ?>

                                    <button class=" btn btn-outline-dark" type="button" id="statusModal"
                                        style="margin-right: 10px;" disabled>Update Status</button>
                                <?php } ?>



                                <?php if (($_SESSION['role'] == 3) || ($_SESSION['role'] == 4) || ($_SESSION['role'] == 5)) { ?>

                                    <button class=" btn btn-outline-dark" type="button" id="assignModal"
                                        style="margin-right: 10px;" disabled>Assign Ticket</button>

                                <?php } ?>

                                <?php if (($_SESSION['role'] == 3) || ($_SESSION['role'] == 5)) { ?>

                                    <button class=" btn btn-outline-dark" type="button" id="transferModal" disabled>Transfer
                                        Ticket</button>

                                <?php } ?>


                            </div>





                        </div>




                    </div>
                </div>
            </div>

            <div class="col-12">
                <!-- Card -->


                <div class="card">
                    <div class="card-body">

                        <div class="basic-form">
                            <form action="<?php echo base_url('/requests/save'); ?>" method="post"
                                accept-charset="utf-8">
                                <h4 class="card-title">Requestor's Information</h4>
                                <br>
                                <div class="form-row">

                                    <div class="form-group col-md-1">
                                        <label>Ticket No</label>
                                        <input type="text" class="form-control input-flat" id="ticket" name="ticket"
                                            readonly>

                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>PF Number</label>
                                        <input type="text" class="form-control input-flat" id="pf" name="pf" readonly>

                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Name</label>

                                        <input type="text" class="form-control" name="name" id="name" readonly>

                                    </div>


                                    <div class="form-group col-md-2">
                                        <label>Contact No</label>

                                        <input type="text" class="form-control" name="mobile" readonly>

                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Branch/Department</label>

                                        <input type="text" class="form-control" name="branch" readonly>

                                    </div>
                                </div>

                        </div>


                        <br>

                        <h4 class="card-title">Information about the ticket request</h4>
                        <br>
                        <div class="form-row">
                            <div class="form-group col-md-3">

                                <label>Type of Ticket </label>
                                <div class="form-group row-md-4">
                                    <div class="form-check">

                                        <input disabled class="form-check-input" type="radio" id="cht1"
                                            name="changetype" readonly>

                                        <label class="form-check-label">Software Related</label>
                                    </div>
                                </div>
                                <div class="form-group row-md-4">
                                    <div class="form-check">

                                        <input disabled class="form-check-input" type="radio" id="cht2"
                                            name="changetype" readonly>

                                        <label class="form-check-label">Hardware Related</label>
                                    </div>
                                </div>
                            </div>
                            <div id="hwtype" class="form-group col-md-3">
                                <label>Hardware Type</label>

                                <input type="text" class="form-control" name="hwtype" readonly>

                            </div>

                            <div id="hwbrand" class="form-group col-md-2">
                                <label>Hardware Brand</label>

                                <input type="text" class="form-control" name="hwbrand" readonly>

                            </div>

                            <div id="hwmodel" class="form-group col-md-2">
                                <label>Hardware Model</label>

                                <input type="text" class="form-control" name="hwmodel" readonly>

                            </div>


                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Issue Description</label>

                                <input type="text" class="form-control" name="issue" readonly>

                            </div>

                            <div class="form-group col-md-2">
                                <label>Priority</label>

                                <input type="text" class="form-control" name="priority" readonly>

                            </div>


                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Request Details</label>

                                <textarea class="form-control h-150px" rows="4" id="content" name="content"
                                    readonly></textarea>




                            </div>

                            <div class="form-group col-md-2">
                                <label>IP Address</label>

                                <input type="text" class="form-control" name="ip" readonly>

                            </div>

                            <div id="remoteassistant" class="form-group col-md-2">
                                <label>&nbsp</label>
                                <button type="button" onclick="remote('192.168.1.100')"
                                    class="form-control btn mb-1 btn-warning">Remote Assistant<span
                                        class="btn-icon-right"><i class="fa fa-desktop"></i></span></button>
                            </div>

                            <div hidden class="form-group col-md-2">
                                <label>Requeted By</label>

                                <input type="text" class="form-control" name="user" readonly>

                            </div>

                        </div>




                        <div id="attachementhide" style="display: none;" class="col-lg-4">
                            <h4 class="card-title">Attchments</h4>
                            <div class="card-body">
                                <div class="bootstrap-media">
                                    <ul class="list-unstyled">
                                        <li class="media">
                                            <img src="<?php echo base_url('icons/pdf-icon.png'); ?>" class="file-icon">
                                            <div class="media-body" style="padding-top: 3px;">
                                                <h6 class="mt-0 mb-1"><a href="#" id="aattachment">
                                                        <p id="pttachment"></p>
                                                    </a></h6>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>


                        <h4 class="card-title">Information about the ticket resolution</h4>
                        <br>
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label>Remarks</label>

                                <input type="text" class="form-control" name="remarks" readonly>

                            </div>

                            <div class="form-group col-md-2">
                                <label>Date Created</label>

                                <input type="text" class="form-control" name="datecreated" readonly>

                            </div>
                            <div class="form-group col-md-2">
                                <label>Last Modified</label>

                                <input type="text" class="form-control" name="lastmodified" readonly>

                            </div>



                        </div>
                        <div class="form-row">

                            <div class="form-group col-md-4">
                                <label>Assigned Unit</label>

                                <input type="text" class="form-control" name="assignedunit" readonly>

                            </div>


                            <div class="form-group col-md-2">
                                <label>Assigned To</label>

                                <input type="text" class="form-control" name="assignedto" readonly>

                            </div>


                            <div class="form-group col-md-2">
                                <label>Status</label>

                                <input type="text" class="form-control" id="status" name="status" readonly>

                            </div>

                        </div>
                        </form>




                        <button class=" btn btn-outline-dark" type="button" onclick="history.back();">Back</button>
                    </div>

                    <!-- Card -->
                </div>





            </div>
        </div>


        <!-- end date -->

        <div class="modal fade" id="myModal">
            <div class="modal-dialog" style="max-width:700px">
                <div class="modal-content">
                    <!-- Modal Body - This will be filled with the loaded page content -->
                    <div class="modal-body" id="modalBody">
                        <!-- Page content will be loaded here -->
                    </div>
                </div>
            </div>
        </div>




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