<?= $this->extend('App\Views\common\baselayout') ?>

<?= $this->section('baselayout') ?>

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

    <div class="container-fluid mt-3">
        <?php if ((isset ($_SESSION['role']) && $_SESSION['role'] == "1")) { ?>
            <div class="row">

                <div class="col-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <span class="display-5"><i class="fa-print fa gradient-1-text"></i></span>
                                <h2 class="mt-3">
                                    <?php echo $totalopencount; ?> Tickets
                                </h2>
                                <p>Currently open</p><a href="<?php echo base_url('ticket/all'); ?>"
                                    class="btn gradient-1 btn-lg border-0 btn-rounded px-5">View
                                    tickets</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <span class="display-5"><i class="icon-user gradient-1-text"></i></span>
                                <h2 class="mt-3">
                                    <?php echo $activeusers; ?> Users
                                </h2>
                                <p>Currently active</p><a href="<?php echo base_url('user/add'); ?>"
                                    class="btn gradient-4 btn-lg border-0 btn-rounded px-5">Add
                                    more</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="container mt-2">
                                <canvas id="myPieChart" width="50" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
            <div class="row">

            </div>

        <?php } ?>

        <?php if (isset ($_SESSION['role']) && $_SESSION['role'] == "3" || $_SESSION['role'] == "5") { ?>
            <div class="row">
                <div id="ticketSummery" class="col-lg-3 col-sm-6">

                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Tickets Summery</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total tickets :
                                    <?php echo $totalcount; ?>
                                </p>
                                <p class="text-white mb-0">Active :
                                    <?php echo $totalopencount; ?>
                                </p>
                                <p class="text-white mb-0">Approval Pending :
                                    <?php echo $approvalpendingcount; ?>
                                </p>
                                <p class="text-white mb-0">In Progress :
                                    <?php echo $progresscount; ?>
                                </p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa-ticket fa"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div id="ticketMonthSummery" class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">This Month</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total tickets :
                                    <?php echo $totalcountmonth; ?>
                                </p>
                                <p class="text-white mb-0">Active :
                                    <?php echo $totalopencountmonth; ?>
                                </p>
                                <p class="text-white mb-0">Approval Pending :
                                    <?php echo $approvalpendingcountmonth; ?>
                                </p>
                                <p class="text-white mb-0">In Progress :
                                    <?php echo $progresscountmonth; ?>
                                </p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa-ticket fa"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div id="contactTile" class="card">
                        <div class="card-body">
                            <h5 style="text-align:center;">Contact Numbers</h5>
                            <div class="custom-media-object-1">
                                <div>
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h6>Technical Support</h6>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <h6 class="text-muted">3533</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <h6>ATM Unit</h6>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <h6 class="text-muted">3548</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h6>Computer Room</h6>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <h6 class="text-muted">3515</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <h6>Network Division</h6>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <h6 class="text-muted">3525</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h6>IT Security</h6>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <h6 class="text-muted">3537</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <h6>Core Banking</h6>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <h6 class="text-muted">3524</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h6>Data Center</h6>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <h6 class="text-muted">3520</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <h6>General Applications</h6>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <h6 class="text-muted">3562</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    <table class="table table-xs mb-0">
                                        <thead>
                                            <tr>
                                                <th>User/Ticket ID</th>
                                                <th>Incedent Type</th>
                                                <th>Issue Description</th>
                                                <th>Priority</th>
                                                <th>Status</th>
                                                <th>Created On</th>
                                                <!-- <th>Rating</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ticketlist as $tickets): ?>
                                                <tr>
                                                    <td title="<?php echo $tickets->username; ?>"><img
                                                            src="./images/avatar/<?php echo $tickets->avatar; ?>"
                                                            class=" rounded-circle mr-3" alt="">
                                                        <?php echo $tickets->id; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $tickets->incedent_category; ?>
                                                    </td>
                                                    <td>
                                                        <span>
                                                            <?php echo $tickets->issue_details; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $status = $tickets->prioirty_name;

                                                        switch ($status) {
                                                            case "Low":
                                                                ?>
                                                                <span class="badge gradient-4 badge-pill badge-primary"
                                                                    style="width:70px"><b>
                                                                        <?php echo $tickets->prioirty_name; ?>
                                                                    </b></span>
                                                                <?php
                                                                break;
                                                            case "Medium":
                                                                ?>
                                                                <span class="badge gradient-1 badge-pill badge-primary"
                                                                    style="width:70px"><b>
                                                                        <?php echo $tickets->prioirty_name; ?>
                                                                    </b></span>
                                                                <?php

                                                                break;
                                                            case "High":
                                                                ?>
                                                                <span class="badge gradient-3 badge-pill badge-primary"
                                                                    style="width:70px"><b>
                                                                        <?php echo $tickets->prioirty_name; ?>
                                                                    </b></span>
                                                                <?php
                                                                break;
                                                            case "Severe":
                                                                ?>
                                                                <span class="badge gradient-2 badge-pill badge-primary"
                                                                    style="width:70px"><b>
                                                                        <?php echo $tickets->prioirty_name; ?>
                                                                    </b></span>
                                                                <?php
                                                                break;
                                                            default:
                                                                ?>
                                                                <p>Status: Unknown</p>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $status = $tickets->description;

                                                        switch ($status) {
                                                            case "Open":
                                                                ?>
                                                                <a data-toggle="tooltip" title="click to view"
                                                                    href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                        class="badge badge-primary"
                                                                        style="width:70px"><b>Open</b></span></a>
                                                            </td>
                                                            <?php
                                                            break;
                                                            case "Work In Progress":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-secondary"
                                                                    style="width:70px"><b>Working</b></span></a></td>
                                                            <?php
                                                            break;
                                                            case "Closed":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-success"
                                                                    style="width:70px"><b>Closed</b></span></a></td>
                                                            <?php
                                                            break;
                                                            case "Re-Opened":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-success"
                                                                    style="width:70px"><b>Re-Opened</b></span></a></td>
                                                            <?php
                                                            break;
                                                            case "Approval Pending":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-warning"
                                                                    style="width:70px"><b>Appoval</b></span></a></td>
                                                            <?php
                                                            break;
                                                            case "Approved":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-dark"
                                                                    style="width:70px"><b>Approved</b></span></a></td>
                                                            <?php
                                                            break;
                                                            case "Invalid":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-light"
                                                                    style="width:70px"><b>Invalid</b></span></a></td>
                                                            <?php
                                                            break;
                                                            default:
                                                                ?>
                                                            <p>Status: Unknown</p>
                                                        <?php
                                                        }
                                                        ?>

                                                    <td>
                                                        <?php $mysqlDatetime = $tickets->created_on;
                                                        $shortDate = date("Y-m-d H:i", strtotime($mysqlDatetime));
                                                        echo $shortDate; ?>
                                                    </td>
                                                    <!-- <td>
                                                        <?php
                                                        $rating = $tickets->user_rating;

                                                        switch ($rating) {
                                                            case "0":
                                                                ?>
                                                                <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                        title="0 star" class="fa fa-star gradient-0-text"
                                                                        aria-hidden="true"></i></a><a class="text-muted"
                                                                    href="javascript:void()"><i data-toggle="tooltip" title="0 star"
                                                                        class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                    class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                        title="0 star" class="fa fa-star gradient-0-text"
                                                                        aria-hidden="true"></i></a><a class="text-muted"
                                                                    href="javascript:void()"><i data-toggle="tooltip" title="0 star"
                                                                        class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                    class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                        title="0 star" class="fa fa-star gradient-0-text"
                                                                        aria-hidden="true"></i></a>
                                                            </td>
                                                            <?php
                                                            break;
                                                            case "1":
                                                                ?>
                                                            <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="1 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="1 star"
                                                                    class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="1 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="1 star"
                                                                    class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="1 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a></td>
                                                            <?php
                                                            break;
                                                            case "2":
                                                                ?>
                                                            <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="2 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="2 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="2 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="2 star"
                                                                    class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="2 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a></td>
                                                            <?php
                                                            break;
                                                            case "3":
                                                                ?>
                                                            <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="3 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="3 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="3 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="3 star"
                                                                    class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="3 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a></td>
                                                            <?php
                                                            break;
                                                            case "4":
                                                                ?>
                                                            <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="4 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="4 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="4 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="4 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="4 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a></td>
                                                            <?php
                                                            break;
                                                            case "5":
                                                                ?>
                                                            <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="5 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="5 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="5 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="5 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="5 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a></td>
                                                            <?php
                                                            break;
                                                            default:
                                                                ?>
                                                            <p>Status: Unknown</p>
                                                        <?php
                                                        }
                                                        ?> -->


                                                </tr>
                                            <?php endforeach ?>

                                            <tr>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

        <?php if (isset ($_SESSION['role']) && $_SESSION['role'] == "4") { ?>
            <div class="row">
                <div id="ticketSummery" class="col-lg-3 col-sm-6">

                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Tickets Summery</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total tickets :
                                    <?php echo $totalcount; ?>
                                </p>
                                <p class="text-white mb-0">Active :
                                    <?php echo $totalopencount; ?>
                                </p>
                                <p class="text-white mb-0">Approval Pending :
                                    <?php echo $approvalpendingcount; ?>
                                </p>
                                <p class="text-white mb-0">In Progress :
                                    <?php echo $progresscount; ?>
                                </p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa-ticket fa"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div id="ticketMonthSummery" class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">This Month</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total tickets :
                                    <?php echo $totalcountmonth; ?>
                                </p>
                                <p class="text-white mb-0">Active :
                                    <?php echo $totalopencountmonth; ?>
                                </p>
                                <p class="text-white mb-0">Approval Pending :
                                    <?php echo $approvalpendingcountmonth; ?>
                                </p>
                                <p class="text-white mb-0">In Progress :
                                    <?php echo $progresscountmonth; ?>
                                </p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa-ticket fa"></i></span>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    <table class="table table-xs mb-0">
                                        <thead>
                                            <tr>
                                                <th>User &nbsp Ticket ID</th>
                                                <th>Incedent Type</th>
                                                <th>Issue Description</th>
                                                <th>Priority</th>
                                                <th>Status</th>
                                                <th>Created On</th>
                                                <!-- <th>Rating</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ticketlist as $tickets): ?>
                                                <tr>
                                                    <td title="<?php echo $tickets->username; ?>"><img
                                                            src="./images/avatar/<?php echo $tickets->avatar; ?>"
                                                            class=" rounded-circle mr-3" alt="">
                                                        <?php echo $tickets->id; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $tickets->incedent_category; ?>
                                                    </td>
                                                    <td>
                                                        <span>
                                                            <?php echo $tickets->issue_details; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $status = $tickets->prioirty_name;

                                                        switch ($status) {
                                                            case "Low":
                                                                ?>
                                                                <span class="badge gradient-4 badge-pill badge-primary"
                                                                    style="width:70px"><b>
                                                                        <?php echo $tickets->prioirty_name; ?>
                                                                    </b></span>
                                                                <?php
                                                                break;
                                                            case "Medium":
                                                                ?>
                                                                <span class="badge gradient-1 badge-pill badge-primary"
                                                                    style="width:70px"><b>
                                                                        <?php echo $tickets->prioirty_name; ?>
                                                                    </b></span>
                                                                <?php

                                                                break;
                                                            case "High":
                                                                ?>
                                                                <span class="badge gradient-3 badge-pill badge-primary"
                                                                    style="width:70px"><b>
                                                                        <?php echo $tickets->prioirty_name; ?>
                                                                    </b></span>
                                                                <?php
                                                                break;
                                                            case "Severe":
                                                                ?>
                                                                <span class="badge gradient-2 badge-pill badge-primary"
                                                                    style="width:70px"><b>
                                                                        <?php echo $tickets->prioirty_name; ?>
                                                                    </b></span>
                                                                <?php
                                                                break;
                                                            default:
                                                                ?>
                                                                <p>Status: Unknown</p>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $status = $tickets->description;

                                                        switch ($status) {
                                                            case "Open":
                                                                ?>
                                                                <a data-toggle="tooltip" title="click to view"
                                                                    href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                        class="badge badge-primary"
                                                                        style="width:70px"><b>Open</b></span></a>
                                                            </td>
                                                            <?php
                                                            break;
                                                            case "Work In Progress":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-secondary"
                                                                    style="width:70px"><b>Working</b></span></a></td>
                                                            <?php
                                                            break;
                                                            case "Closed":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-success"
                                                                    style="width:70px"><b>Closed</b></span></a></td>
                                                            <?php
                                                            break;
                                                            case "Re-Opened":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-success"
                                                                    style="width:70px"><b>Re-Opened</b></span></a></td>
                                                            <?php
                                                            break;
                                                            case "Approval Pending":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-warning"
                                                                    style="width:70px"><b>Appoval</b></span></a></td>
                                                            <?php
                                                            break;
                                                            case "Approved":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-dark"
                                                                    style="width:70px"><b>Approved</b></span></a></td>
                                                            <?php
                                                            break;
                                                            case "Invalid":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-light"
                                                                    style="width:70px"><b>Invalid</b></span></a></td>
                                                            <?php
                                                            break;
                                                            default:
                                                                ?>
                                                            <p>Status: Unknown</p>
                                                        <?php
                                                        }
                                                        ?>

                                                    <td>
                                                        <?php $mysqlDatetime = $tickets->created_on;
                                                        $shortDate = date("Y-m-d H:i", strtotime($mysqlDatetime));
                                                        echo $shortDate; ?>
                                                    </td>
                                                    <!-- <td>
                                                        <?php
                                                        $rating = $tickets->user_rating;

                                                        switch ($rating) {
                                                            case "0":
                                                                ?>
                                                                <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                        title="0 star" class="fa fa-star gradient-0-text"
                                                                        aria-hidden="true"></i></a><a class="text-muted"
                                                                    href="javascript:void()"><i data-toggle="tooltip" title="0 star"
                                                                        class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                    class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                        title="0 star" class="fa fa-star gradient-0-text"
                                                                        aria-hidden="true"></i></a><a class="text-muted"
                                                                    href="javascript:void()"><i data-toggle="tooltip" title="0 star"
                                                                        class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                    class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                        title="0 star" class="fa fa-star gradient-0-text"
                                                                        aria-hidden="true"></i></a>
                                                            </td>
                                                            <?php
                                                            break;
                                                            case "1":
                                                                ?>
                                                            <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="1 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="1 star"
                                                                    class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="1 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="1 star"
                                                                    class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="1 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a></td>
                                                            <?php
                                                            break;
                                                            case "2":
                                                                ?>
                                                            <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="2 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="2 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="2 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="2 star"
                                                                    class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="2 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a></td>
                                                            <?php
                                                            break;
                                                            case "3":
                                                                ?>
                                                            <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="3 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="3 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="3 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="3 star"
                                                                    class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="3 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a></td>
                                                            <?php
                                                            break;
                                                            case "4":
                                                                ?>
                                                            <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="4 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="4 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="4 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="4 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="4 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a></td>
                                                            <?php
                                                            break;
                                                            case "5":
                                                                ?>
                                                            <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="5 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="5 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="5 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="5 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="5 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a></td>
                                                            <?php
                                                            break;
                                                            default:
                                                                ?>
                                                            <p>Status: Unknown</p>
                                                        <?php
                                                        }
                                                        ?>
 -->

                                                </tr>
                                            <?php endforeach ?>

                                            <tr>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>


        <?php if (isset ($_SESSION['role']) && $_SESSION['role'] == "2") { ?>
            <div class="row">
                <div id="ticketSummery" class="col-lg-3 col-sm-6">

                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Tickets Summery</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total tickets :
                                    <?php echo $totalcount; ?>
                                </p>
                                <p class="text-white mb-0">Active :
                                    <?php echo $totalopencount; ?>
                                </p>
                                <p class="text-white mb-0">Approval Pending :
                                    <?php echo $approvalpendingcount; ?>
                                </p>
                                <p class="text-white mb-0">In Progress :
                                    <?php echo $progresscount; ?>
                                </p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa-ticket fa"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div id="ticketMonthSummery" class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">This Month</h3>
                            <div class="d-inline-block">
                                <p class="text-white mb-0">Total tickets :
                                    <?php echo $totalcountmonth; ?>
                                </p>
                                <p class="text-white mb-0">Active :
                                    <?php echo $totalopencountmonth; ?>
                                </p>
                                <p class="text-white mb-0">Approval Pending :
                                    <?php echo $approvalpendingcountmonth; ?>
                                </p>
                                <p class="text-white mb-0">In Progress :
                                    <?php echo $progresscountmonth; ?>
                                </p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa-ticket fa"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <div id="contactTile" class="card">
                        <div class="card-body">
                            <h5 style="text-align:center;">Contact Numbers</h5>
                            <div class="custom-media-object-1">
                                <div>
                                    <div class="media-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h6>Technical Support</h6>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <h6 class="text-muted">3533</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <h6>ATM Unit</h6>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <h6 class="text-muted">3548</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h6>Computer Room</h6>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <h6 class="text-muted">3515</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <h6>Network Division</h6>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <h6 class="text-muted">3525</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h6>IT Security</h6>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <h6 class="text-muted">3537</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <h6>Core Banking</h6>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <h6 class="text-muted">3524</h6>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <h6>Data Center</h6>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <h6 class="text-muted">3520</h6>
                                            </div>
                                            <div class="col-lg-4">
                                                <h6>General Applications</h6>
                                            </div>
                                            <div class="col-lg-2 text-right">
                                                <h6 class="text-muted">3562</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="active-member">
                                <div class="table-responsive">
                                    <table class="table table-xs mb-0">
                                        <thead>
                                            <tr>
                                                <th>User &nbsp Ticket ID</th>
                                                <th>Incedent Type</th>
                                                <th>Issue Description</th>
                                                <th>Priority</th>
                                                <th>Status</th>
                                                <th>Created On</th>
                                                <!-- <th>Rating</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($ticketlist as $tickets): ?>
                                                <tr>
                                                    <td><img src="./images/avatar/<?php echo $_SESSION['user_avatar']; ?>"
                                                            class=" rounded-circle mr-3" alt="">
                                                        <?php echo $tickets->id; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $tickets->incedent_category; ?>
                                                    </td>
                                                    <td>
                                                        <span>
                                                            <?php echo $tickets->issue_details; ?>
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $status = $tickets->prioirty_name;

                                                        switch ($status) {
                                                            case "Low":
                                                                ?>
                                                                <span class="badge gradient-4 badge-pill badge-primary"
                                                                    style="width:70px"><b>
                                                                        <?php echo $tickets->prioirty_name; ?>
                                                                    </b></span>
                                                                <?php
                                                                break;
                                                            case "Medium":
                                                                ?>
                                                                <span class="badge gradient-1 badge-pill badge-primary"
                                                                    style="width:70px"><b>
                                                                        <?php echo $tickets->prioirty_name; ?>
                                                                    </b></span>
                                                                <?php

                                                                break;
                                                            case "High":
                                                                ?>
                                                                <span class="badge gradient-3 badge-pill badge-primary"
                                                                    style="width:70px"><b>
                                                                        <?php echo $tickets->prioirty_name; ?>
                                                                    </b></span>
                                                                <?php
                                                                break;
                                                            case "Severe":
                                                                ?>
                                                                <span class="badge gradient-2 badge-pill badge-primary"
                                                                    style="width:70px"><b>
                                                                        <?php echo $tickets->prioirty_name; ?>
                                                                    </b></span>
                                                                <?php
                                                                break;
                                                            default:
                                                                ?>
                                                                <p>Status: Unknown</p>
                                                            <?php
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $status = $tickets->description;

                                                        switch ($status) {
                                                            case "Open":
                                                                ?>
                                                                <a data-toggle="tooltip" title="click to view"
                                                                    href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                        class="badge badge-primary"
                                                                        style="width:70px"><b>Open</b></span></a>
                                                            </td>
                                                            <?php
                                                            break;
                                                            case "Work In Progress":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-secondary"
                                                                    style="width:70px"><b>Working</b></span></a></td>
                                                            <?php
                                                            break;
                                                            case "Closed":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-success"
                                                                    style="width:70px"><b>Closed</b></span></a></td>
                                                            <?php
                                                            break;
                                                            case "Re-Opened":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-success"
                                                                    style="width:70px"><b>Re-Opened</b></span></a></td>
                                                            <?php
                                                            break;
                                                            case "Approval Pending":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-warning"
                                                                    style="width:70px"><b>Appoval</b></span></a></td>
                                                            <?php
                                                            break;
                                                            case "Approved":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-dark"
                                                                    style="width:70px"><b>Approved</b></span></a></td>
                                                            <?php
                                                            break;
                                                            case "Invalid":
                                                                ?>
                                                            <a data-toggle="tooltip" title="click to view"
                                                                href="<?php echo base_url('ticket/details/' . $tickets->id); ?>"><span
                                                                    class="badge badge-light"
                                                                    style="width:70px"><b>Invalid</b></span></a></td>
                                                            <?php
                                                            break;
                                                            default:
                                                                ?>
                                                            <p>Status: Unknown</p>
                                                        <?php
                                                        }
                                                        ?>

                                                    <td>
                                                        <?php $mysqlDatetime = $tickets->created_on;
                                                        $shortDate = date("Y-m-d H:i", strtotime($mysqlDatetime));
                                                        echo $shortDate; ?>
                                                    </td>
                                                    <!-- <td>
                                                        <?php
                                                        $rating = $tickets->user_rating;

                                                        switch ($rating) {
                                                            case "0":
                                                                ?>
                                                                <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                        title="0 star" class="fa fa-star gradient-0-text"
                                                                        aria-hidden="true"></i></a><a class="text-muted"
                                                                    href="javascript:void()"><i data-toggle="tooltip" title="0 star"
                                                                        class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                    class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                        title="0 star" class="fa fa-star gradient-0-text"
                                                                        aria-hidden="true"></i></a><a class="text-muted"
                                                                    href="javascript:void()"><i data-toggle="tooltip" title="0 star"
                                                                        class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                    class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                        title="0 star" class="fa fa-star gradient-0-text"
                                                                        aria-hidden="true"></i></a>
                                                            </td>
                                                            <?php
                                                            break;
                                                            case "1":
                                                                ?>
                                                            <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="1 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="1 star"
                                                                    class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="1 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="1 star"
                                                                    class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="1 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a></td>
                                                            <?php
                                                            break;
                                                            case "2":
                                                                ?>
                                                            <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="2 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="2 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="2 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="2 star"
                                                                    class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="2 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a></td>
                                                            <?php
                                                            break;
                                                            case "3":
                                                                ?>
                                                            <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="3 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="3 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="3 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="3 star"
                                                                    class="fa fa-star gradient-0-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="3 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a></td>
                                                            <?php
                                                            break;
                                                            case "4":
                                                                ?>
                                                            <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="4 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="4 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="4 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="4 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="4 star" class="fa fa-star gradient-0-text"
                                                                    aria-hidden="true"></i></a></td>
                                                            <?php
                                                            break;
                                                            case "5":
                                                                ?>
                                                            <a class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="5 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="5 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="5 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a><a class="text-muted"
                                                                href="javascript:void()"><i data-toggle="tooltip" title="5 star"
                                                                    class="fa fa-star gradient-1-text" aria-hidden="true"></i></a><a
                                                                class="text-muted" href="javascript:void()"><i data-toggle="tooltip"
                                                                    title="5 star" class="fa fa-star gradient-1-text"
                                                                    aria-hidden="true"></i></a></td>
                                                            <?php
                                                            break;
                                                            default:
                                                                ?>
                                                            <p>Status: Unknown</p>
                                                        <?php
                                                        }
                                                        ?> -->


                                                </tr>
                                            <?php endforeach ?>

                                            <tr>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>








        <div class="row">
            <div class="col-lg-12">
                <div class="row">

                </div>
            </div>
        </div>




        <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6">

                <div class="card">


                </div>
            </div>


        </div>



        <div class="row">

        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
        Content body end
    ***********************************-->

<script>



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