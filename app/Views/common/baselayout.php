<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />

    <title>BOC - HelpDesk Ticket System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('images/favicon.png'); ?>">
    <link href="<?php echo base_url('css/style.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('css/offline/bootstrap.min.css'); ?>" rel="stylesheet">

    <script src="<?php echo base_url('js/offline/chart.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/offline/jquery-3.7.1.js'); ?>"></script>
    <script src="<?php echo base_url('js/common.min.js'); ?>"></script>


    <style>
        img.logo-style {
            height: 56px;
            margin: 5px;
            margin-top: 0px;
        }

        .brand-logo {
            background-color: white;
        }

        .logo-abbr img {
            height: 45px;
            margin: 5px;
        }

        .nav-header .brand-logo a b img {
            max-width: 3.5625rem;
        }

        [data-nav-headerbg="color_1"] .nav-header {
            background-color: #ffffff;
        }
    </style>



</head>

<body>





    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr" style="margin:-16px;width:50px"><img
                            src="<?php echo base_url("images/logo-sm.png"); ?>" alt=""> </b>
                    <span class="logo-compact"><img src="<?php echo base_url("images/FireNet360 Logo.png"); ?>"
                            alt=""></span>
                    <span class="brand-title">
                        <img src="<?php echo base_url("images/FireNet360 Logo.png"); ?>" alt="" class="logo-style">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>

                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown"
                                onclick=fetchNotificationsManually();>
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2">
                                    <div id="notifycount2"></div>
                                </span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div id="notificationcount"
                                    class="dropdown-content-heading d-flex justify-content-between">
                                </div>
                                <div class="dropdown-content-body">
                                    <ul id="mylist">

                                    </ul>

                                </div>
                            </div>
                        </li>
                        &nbsp &nbsp &nbsp &nbsp
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="<?php echo base_url("images/avatar/" . $_SESSION['user_avatar']); ?>"
                                    height="40" width="40" alt="">
                                <!-- <img src="<?php echo base_url("images/user/1.png"); ?>" height="40" width="40" alt=""> -->
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#resetPasswordModal"><i
                                                    class="fa fa-key "></i> <span data-toggle="modal"
                                                    data-target="#resetPasswordModal">Change Password</span></a>
                                        </li>
                                        <hr class="my-2">
                                        <li>
                                            <a href="<?php echo base_url('/lock'); ?>"><i class="icon-lock"></i>
                                                <span>Lock
                                                    Screen</span></a>
                                        </li>
                                        <li><a href="<?php echo base_url('/login'); ?>"><i class="fa fa-sign-out"></i>
                                                <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <br></br>
                    <li><a>
                            <?php if (isset ($_SESSION['username'])): ?>
                                <span class="nav-text"><b>Welcome</b>&nbsp
                                    <?php echo $_SESSION['firstname']; ?>
                                </span>
                            <?php endif; ?>
                        </a>
                    </li>



                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i style="color:red;" class="fa-tachometer fa"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="<?php echo base_url('/dashboard'); ?>">Home Panel</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>


                    <li class="nav-label">Tickets</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="fa fa-ticket"></i><span class="nav-text">Ticket Requests</span>
                        </a>
                        <ul aria-expanded="false">
                            <?php if (isset ($_SESSION['permissions']->TKT_All_View) && $_SESSION['permissions']->TKT_All_View) { ?>
                                <li><a href="<?php echo base_url('ticket/all'); ?>">View All Tickets</a></li>
                            <?php } ?>
                            <?php if (isset ($_SESSION['permissions']->TKT_Assigned_Tickets) && $_SESSION['permissions']->TKT_Assigned_Tickets) { ?>
                                <li><a href="<?php echo base_url('ticket/agentview/' . $_SESSION['user_id']); ?>">My
                                        Work</a></li>
                            <?php } ?>
                            <?php if (isset ($_SESSION['permissions']->TKT_Pending_Tickets) && $_SESSION['permissions']->TKT_Pending_Tickets) { ?>
                                <li><a href="<?php echo base_url('ticket/pending'); ?>">Pending Tickets</a></li>
                            <?php } ?>
                            <?php if (isset ($_SESSION['permissions']->TKT_Manage_Tickets) && $_SESSION['permissions']->TKT_Manage_Tickets) { ?>
                                <li><a href="<?php echo base_url('ticket/manageticket'); ?>">Manage Ticket</a></li>
                            <?php } ?>
                            <?php if (isset ($_SESSION['permissions']->TKT_Add) && $_SESSION['permissions']->TKT_Add) { ?>
                                <li><a href="<?php echo base_url('ticket/add'); ?>">Add Ticket</a></li>
                            <?php } ?>
                            <?php if (isset ($_SESSION['permissions']->TKT_Approve) && $_SESSION['permissions']->TKT_Approve) { ?>
                                <li><a href="<?php echo base_url('ticket/approve'); ?>">Pending Approvals</a></li>
                            <?php } ?>
                        </ul>

                    </li>


                    <?php if (isset ($_SESSION['permissions']->FAQ_View) && $_SESSION['permissions']->FAQ_View) { ?>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa-book  fa"></i><span class="nav-text">Help Topics</span>
                            </a>
                            <ul aria-expanded="false">
                                <?php if (isset ($_SESSION['permissions']->FAQ_View) && $_SESSION['permissions']->FAQ_View) { ?>
                                    <li><a href="<?php echo base_url('FAQ/view'); ?>">View Articles</a></li>
                                <?php } ?>
                                <!-- <?php if (isset ($_SESSION['permissions']->FAQ_Add) && $_SESSION['permissions']->FAQ_Add) { ?>
                                    <li><a href="<?php echo base_url('FAQ/add'); ?>">Add FAQ</a></li>
                                <?php } ?> -->
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if (isset ($_SESSION['permissions']->RPT_View) && $_SESSION['permissions']->RPT_View) { ?>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-print"></i><span class="nav-text">Reports</span>
                            </a>
                            <ul aria-expanded="false">
                                <li><a href="<?php echo base_url('report'); ?>">Generate Report</a></li>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if (isset ($_SESSION['permissions']->ADM_View_Users) && $_SESSION['permissions']->ADM_View_Users) { ?>
                        <li class="nav-label">Administration</li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-user"></i><span class="nav-text">User Management</span>
                            </a>
                            <ul aria-expanded="false">
                                <?php if (isset ($_SESSION['permissions']->ADM_View_Users) && $_SESSION['permissions']->ADM_View_Users) { ?>
                                    <li><a href="<?php echo base_url('user/view'); ?>">View Users</a></li>
                                <?php } ?>
                                <?php if (isset ($_SESSION['permissions']->ADM_Add_Users) && $_SESSION['permissions']->ADM_Add_Users) { ?>
                                    <li><a href="<?php echo base_url('user/add'); ?>">Add User</a></li>
                                <?php } ?>
                                <?php if (isset ($_SESSION['permissions']->ADM_Edit_Users) && $_SESSION['permissions']->ADM_Edit_Users) { ?>
                                    <li><a href="<?php echo base_url('user/edit'); ?>">Edit User</a></li>
                                <?php } ?>
                                <!-- <li><a href="<?php echo base_url('user/edit'); ?>">Edit Roles</a></li> -->
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if (isset ($_SESSION['permissions']) && $_SESSION['role'] == "2" && $_SESSION['permissions']->ADM_Edit_Users) { ?>
                        <li class="nav-label">Administration</li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-user"></i><span class="nav-text">User Management</span>
                            </a>
                            <ul aria-expanded="false">
                                <?php if (isset ($_SESSION['permissions']->ADM_Edit_Users) && $_SESSION['permissions']->ADM_Edit_Users) { ?>
                                    <li><a href="<?php echo base_url('user/edit'); ?>">Edit User</a></li>
                                <?php } ?>
                                <!-- <li><a href="<?php echo base_url('user/edit'); ?>">Edit Roles</a></li> -->
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if (isset ($_SESSION['permissions']) && $_SESSION['role'] == "3" && $_SESSION['permissions']->ADM_Edit_Users) { ?>
                        <li class="nav-label">Administration</li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-user"></i><span class="nav-text">User Management</span>
                            </a>
                            <ul aria-expanded="false">
                                <?php if (isset ($_SESSION['permissions']->ADM_Edit_Users) && $_SESSION['permissions']->ADM_Edit_Users) { ?>
                                    <li><a href="<?php echo base_url('user/edit'); ?>">Edit User</a></li>
                                <?php } ?>
                                <!-- <li><a href="<?php echo base_url('user/edit'); ?>">Edit Roles</a></li> -->
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if (isset ($_SESSION['permissions']) && $_SESSION['role'] == "4" && $_SESSION['permissions']->ADM_Edit_Users) { ?>
                        <li class="nav-label">Administration</li>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-user"></i><span class="nav-text">User Management</span>
                            </a>
                            <ul aria-expanded="false">
                                <?php if (isset ($_SESSION['permissions']->ADM_Edit_Users) && $_SESSION['permissions']->ADM_Edit_Users) { ?>
                                    <li><a href="<?php echo base_url('user/edit'); ?>">Edit User</a></li>
                                <?php } ?>
                                <!-- <li><a href="<?php echo base_url('user/edit'); ?>">Edit Roles</a></li> -->
                            </ul>
                        </li>
                    <?php } ?>



                    <?php if (isset ($_SESSION['permissions']->ADM_View_Roles) && $_SESSION['permissions']->ADM_View_Roles) { ?>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-users"></i><span class="nav-text">Role Management</span>
                            </a>
                            <ul aria-expanded="false">
                                <?php if (isset ($_SESSION['permissions']->ADM_View_Roles) && $_SESSION['permissions']->ADM_View_Roles) { ?>
                                    <li><a href="<?php echo base_url('role/view'); ?>">View Roles</a></li>
                                <?php } ?>
                                <?php if (isset ($_SESSION['permissions']->ADM_Add_Roles) && $_SESSION['permissions']->ADM_Add_Roles) { ?>
                                    <li><a href="<?php echo base_url('role/add'); ?>">Add Role</a></li>
                                <?php } ?>
                                <?php if (isset ($_SESSION['permissions']->ADM_Edit_Role_Permissions) && $_SESSION['permissions']->ADM_Edit_Role_Permissions) { ?>
                                    <li><a href="<?php echo base_url('rolemodel/view'); ?>">Role Module Setup</a></li>
                                <?php } ?>
                                <!-- <li><a href="<?php echo base_url('role/edit'); ?>">Edit Roles</a></li> -->
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if (isset ($_SESSION['permissions']->ADM_View_Units) && $_SESSION['permissions']->ADM_View_Units) { ?>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-university"></i><span class="nav-text">Unit Management</span>
                            </a>
                            <ul aria-expanded="false">
                                <?php if (isset ($_SESSION['permissions']->ADM_View_Units) && $_SESSION['permissions']->ADM_View_Units) { ?>
                                    <li><a href="<?php echo base_url('unit/view'); ?>">View Units</a></li>
                                <?php } ?>
                                <?php if (isset ($_SESSION['permissions']->ADM_Add_Units) && $_SESSION['permissions']->ADM_Add_Units) { ?>
                                    <li><a href="<?php echo base_url('unit/add'); ?>">Add Unit</a></li>
                                <?php } ?>
                                <!-- <li><a href="<?php echo base_url('unit/edit'); ?>">Edit Roles</a></li> -->
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (isset ($_SESSION['permissions']->DH_View_Issues) && $_SESSION['permissions']->DH_View_Issues) { ?>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-lightbulb-o"></i><span class="nav-text">Issue Management</span>
                            </a>
                            <ul aria-expanded="false">
                                <?php if (isset ($_SESSION['permissions']->DH_View_Issues) && $_SESSION['permissions']->DH_View_Issues) { ?>
                                    <li><a href="<?php echo base_url('issue/view'); ?>">View Issues</a></li>
                                <?php } ?>
                                <?php if (isset ($_SESSION['permissions']->DH_Add_Issues) && $_SESSION['permissions']->DH_Add_Issues) { ?>
                                    <li><a href="<?php echo base_url('issue/add'); ?>">Add Issue</a></li>
                                <?php } ?>
                                <!-- <li><a href="<?php echo base_url('issue/edit'); ?>">Edit Roles</a></li> -->
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (isset ($_SESSION['permissions']->DH_View_Issues_Mapping) && $_SESSION['permissions']->DH_View_Issues_Mapping) { ?>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-object-group"></i><span class="nav-text">Issue Branch Mapping</span>
                            </a>
                            <ul aria-expanded="false">
                                <?php if (isset ($_SESSION['permissions']->DH_View_Issues_Mapping) && $_SESSION['permissions']->DH_View_Issues_Mapping) { ?>
                                    <li><a href="<?php echo base_url('issueVsUnit/view'); ?>">View Issue Branch Mappings</a>
                                    </li>
                                <?php } ?>
                                <?php if (isset ($_SESSION['permissions']->DH_Add_Issues_Mapping) && $_SESSION['permissions']->DH_Add_Issues_Mapping) { ?>
                                    <li><a href="<?php echo base_url('issueVsUnit/add'); ?>">Add Issue Branch Mapping</a></li>
                                <?php } ?>
                                <!-- <li><a href="<?php echo base_url('issueVsUnit/edit'); ?>">Edit Roles</a></li> -->
                            </ul>
                        </li>
                    <?php } ?>


                    <?php if (isset ($_SESSION['permissions']->TS_View_Hdware_Type) && $_SESSION['permissions']->TS_View_Hdware_Type) { ?>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa-television fa"></i><span class="nav-text">Hardware Types</span>
                            </a>
                            <ul aria-expanded="false">

                                <?php if (isset ($_SESSION['permissions']->TS_View_Hdware_Type) && $_SESSION['permissions']->TS_View_Hdware_Type) { ?>
                                    <li><a href="<?php echo base_url('hardwaretypes/view'); ?>">View Hardware Types</a></li>
                                <?php } ?>
                                <?php if (isset ($_SESSION['permissions']->TS_Add_Hdware_Type) && $_SESSION['permissions']->TS_Add_Hdware_Type) { ?>
                                    <li><a href="<?php echo base_url('hardwaretypes/add'); ?>">Add Hardware Type</a></li>
                                <?php } ?>
                                <!-- <li><a href="<?php echo base_url('hardwaretypes/edit'); ?>">Edit Roles</a></li> -->
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (isset ($_SESSION['permissions']->TS_View_Hdware_Brand) && $_SESSION['permissions']->TS_View_Hdware_Brand) { ?>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-desktop"></i><span class="nav-text">Hardware Brands</span>
                            </a>
                            <ul aria-expanded="false">

                                <?php if (isset ($_SESSION['permissions']->TS_View_Hdware_Brand) && $_SESSION['permissions']->TS_View_Hdware_Brand) { ?>
                                    <li><a href="<?php echo base_url('hardwarebrands/view'); ?>">View Hardware Brands</a></li>
                                <?php } ?>
                                <?php if (isset ($_SESSION['permissions']->TS_Add_Hdware_Brand) && $_SESSION['permissions']->TS_Add_Hdware_Brand) { ?>
                                    <li><a href="<?php echo base_url('hardwarebrands/add'); ?>">Add Hardware Brand</a></li>
                                <?php } ?>
                                <!-- <li><a href="<?php echo base_url('hardwarebrands/edit'); ?>">Edit Roles</a></li> -->
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (isset ($_SESSION['permissions']->TS_View_Hdware_Model) && $_SESSION['permissions']->TS_View_Hdware_Model) { ?>
                        <li>
                            <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                                <i class="fa fa-hdd-o"></i><span class="nav-text">Hardware Models</span>
                            </a>
                            <ul aria-expanded="false">

                                <?php if (isset ($_SESSION['permissions']->TS_View_Hdware_Model) && $_SESSION['permissions']->TS_View_Hdware_Model) { ?>
                                    <li><a href="<?php echo base_url('hardwaremodels/view'); ?>">View Hardware Models</a></li>
                                <?php } ?>
                                <?php if (isset ($_SESSION['permissions']->TS_Add_Hdware_Model) && $_SESSION['permissions']->TS_Add_Hdware_Model) { ?>
                                    <li><a href="<?php echo base_url('hardwaremodels/add'); ?>">Add Hardware Model</a></li>
                                <?php } ?>
                                <!-- <li><a href="<?php echo base_url('hardwaremodels/edit'); ?>">Edit Roles</a></li> -->
                            </ul>
                        </li>
                    <?php } ?>




                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--content goes here-->
        <?= $this->renderSection('baselayout') ?>

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright &copy; Designed & Developed by <a href="https://www.boc.lk">Technical
                        Support Unit</a> 2024</p>
            </div>
        </div>

        <div id="resetPasswordModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Reset Password</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <!-- Reset password form goes here -->
                        <form id="resetPasswordForm" action="<?php echo base_url('user/reset_password'); ?>"
                            method="post">
                            <div class="form-group">
                                <?php if ($_SESSION['user_id']) { ?>
                                    <input type="text" class="form-control" name="userid"
                                        value="<?= $_SESSION['user_id'] ?>" hidden>
                                <?php } else { ?>
                                    <input type="text" class="form-control" name="userid" value="" hidden>
                                <?php } ?>
                                <div class="form-group">
                                    <?php if ($_SESSION['user_id']) { ?>
                                        <input type="text" class="form-control" name="username"
                                            value="<?= $_SESSION['username'] ?>" readonly>
                                    <?php } else { ?>
                                        <input type="text" class="form-control" name="username" value="" readonly>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="currentpassword"
                                        placeholder="Current Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="confpassword"
                                        placeholder="Confirm Password" required>
                                </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                        <button type="submit" form="resetPasswordForm" class="btn btn-outline-dark">Reset
                            Password</button>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

    <script src="<?php echo base_url('js/offline/sweetalert2.js'); ?>"></script>
    <script src="<?php echo base_url('js/custom.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/settings.js'); ?>"></script>
    <script src="<?php echo base_url('js/gleek.js'); ?>"></script>



    <script>


        $('#resetPasswordForm').submit(function (e) {
            e.preventDefault(); // Prevent form submission

            //alert("asdsd");

            var userid = $('input[name="userid"]').val();
            var username = $('input[name="username"]').val();
            var password = $('input[name="password"]').val();
            var confirmpw = $('input[name="confpassword"]').val();
            var currentpw = $('input[name="currentpassword"]').val();

            ///debugger;
            if (username === "") {
                Swal.fire("Information!", "Please enter required fields", "info");
            } else {

                if (password === confirmpw) {


                    $.ajax({
                        url: "<?php echo base_url('/user/change_password') ?>",
                        type: "POST",
                        dataType: "json",
                        data: {
                            userid: userid,
                            username: username,
                            password: password,
                            currentpw: currentpw
                        },
                        success: function (response) {

                            debugger;

                            if (response && response.status == "success") {

                                Swal.fire("Done!", "Password Changed!", "success")
                                    .then((value) => {
                                        window.location.href = "<?php echo base_url('/login'); ?>";
                                    });

                            }
                            else if (response && response.status == "User not found") {

                                Swal.fire("Error!", "User Not Found", "error")
                                    .then((value) => {
                                        window.location.href = "<?php echo base_url('/login'); ?>";
                                    });

                            }
                            else if (response && response.status == "Invalid Current Password") {

                                Swal.fire("Error!", "Invalid Current Password", "error");

                            }



                            else {
                                Swal.fire("Error!", "Password Change Failed", "error");
                                console.log("User Creation Failed");
                            }

                        },
                        error: function (xhr, status, error) {
                            // Handle error
                            Swal.fire("Error!", "Password Change Failed", "error");
                        }
                    });
                }

                else {
                    Swal.fire("Error!", "Passwords do not match", "error");

                }




            }
        });


        function markasread(typeid) {

            id = typeid;
            $.ajax({
                url: '<?php echo base_url("notification/markasread/"); ?>' + "/" + typeid,
                type: 'GET',
                dataType: 'json',
                success: function (response2) {
                    //alert("marked as read");
                    fetchNotificationsManually()
                }
            });
        }

        function markallasread() {

            $.ajax({
                url: '<?php echo base_url("notification/markallasread/"); ?>',
                type: 'GET',
                dataType: 'json',
                success: function (response2) {
                    //alert("marked all as read");
                    fetchNotificationsManually()
                }
            });
        }

        function getDuration(startTime, endTime) {
            // Parse the timestamps into Date objects
            var startDate = new Date(startTime);
            var endDate = new Date();

            // Calculate the difference in milliseconds
            var duration = endDate - startDate;

            // Calculate the duration in seconds, minutes, hours, and days
            var seconds = Math.floor((duration / 1000) % 60);
            var minutes = Math.floor((duration / (1000 * 60)) % 60);
            var hours = Math.floor((duration / (1000 * 60 * 60)) % 24);
            var days = Math.floor(duration / (1000 * 60 * 60 * 24));

            // Construct the duration string
            var durationString = '';
            if (days > 0) {
                durationString = days + ' day' + (days === 1 ? '' : 's') + ' ';
            }
            else if (hours > 0) {
                durationString = hours + ' hour' + (hours === 1 ? '' : 's') + ' ';
            }
            else if (minutes > 0) {
                durationString = minutes + ' minute' + (minutes === 1 ? '' : 's') + ' ';
            }
            else if (seconds > 0) {
                durationString = seconds + ' second' + (seconds === 1 ? '' : 's');
            }

            return durationString;
        }


        function toshortdateTime(dateval) {
            var dateTimeString = dateval;

            // Split the date-time string into date and time components
            var [datePart, timePart] = dateTimeString.split(' ');

            // Split the date component into year, month, and day
            var [year, month, day] = datePart.split('-');

            // Split the time component into hours, minutes, and seconds
            var [hours, minutes, seconds] = timePart.split(':');

            // Short date-time format: yyyy-mm-dd hh:mm:ss
            var shortDateTime = year + '-' + month + '-' + day + ' ' + hours + ':' + minutes;

            return shortDateTime;
        }

        function fetchNotificationsManually() {


            $.ajax({
                url: '<?php echo base_url("notification/latestNotifications"); ?>',
                type: 'GET',
                dataType: 'json',
                success: function (response2) {

                    // Update notification bar with latest notifications
                    var ul = document.getElementById("mylist");
                    ul.innerHTML = ""; // Clear all child nodes

                    $.each(response2.notifications, function (index, value) {

                        var li = document.createElement("li");
                        // Set the inner HTML of the <li> to the specified content
                        li.innerHTML = '<a href="javascript:void()"><span class="mr-3 avatar-icon bg-danger-lighten-2" style="background-color: lightskyblue;"><i class="fa-bell-o fa"></i></span><div class="notification-content"><h6 class="notification-heading"><a href="' + <?php echo "'" . base_url() . "'"; ?> + '/ticket/details/' + value.ticket_id + '">Ticket ID: ' + value.ticket_id + '</a><button title="Mark as read" onclick="markasread(' + value.id + ')" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></h6><span class="notification-text">' + value.log + ' </span><span class="notification-text"><br>Added On - ' + getDuration(value.added_on) + ' ago</span> </div></a>';
                        // Append the <li> element to the existing <ul>
                        document.getElementById("mylist").appendChild(li);

                    });
                }
            });

            $.ajax({
                url: '<?php echo base_url("notification/latestNotificationsCount"); ?>',
                type: 'GET',
                dataType: 'json',
                success: function (response) {
                    // Update notification bar with latest notifications
                    $('#notificationcount').empty();
                    $('#notificationcount').append('<a href="#" title="Mark all as read" onclick="markallasread()"><i class="fa fa-trash font-18 align-top mr-2"></i>Clear</a><span class="">' + response.data2.count + ' New Notifications </span> <span class="badge badge-pill gradient-2">' + response.data2.count + '</span></a>');
                    $('#notifycount2').empty();
                    $('#notifycount2').append(response.data2.count);

                }
            });

        }

        $(document).ready(function () {


            function fetchNotifications() {


                $.ajax({
                    url: '<?php echo base_url("notification/latestNotifications"); ?>',
                    type: 'GET',
                    dataType: 'json',
                    success: function (response2) {

                        // Update notification bar with latest notifications
                        var ul = document.getElementById("mylist");
                        ul.innerHTML = ""; // Clear all child nodes

                        $.each(response2.notifications, function (index, value) {

                            var li = document.createElement("li");
                            // Set the inner HTML of the <li> to the specified content
                            li.innerHTML = '<a href="#"><span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span><div class="notification-content"><h6 class="notification-heading"><a onclick="callfunc()" href="#">' + value.log + '</a></h6><span class="notification-text">' + value.added_on + '</span> </div></a>';
                            // Append the <li> element to the existing <ul>
                            document.getElementById("mylist").appendChild(li);
                        });
                    }
                });

                $.ajax({
                    url: '<?php echo base_url("notification/latestNotificationsCount"); ?>',
                    type: 'GET',
                    dataType: 'json',
                    success: function (response) {
                        // Update notification bar with latest notifications
                        $('#notificationcount').empty();
                        $('#notificationcount').append('<span class="">' + response.data2.count + ' New Notifications </span> <span class="badge badge-pill gradient-2">' + response.data2.count + '</span></a>');
                        $('#notifycount2').empty();
                        $('#notifycount2').append(response.data2.count);

                    }
                });

            }

            fetchNotifications();
        });



    </script>




</body>

</html>