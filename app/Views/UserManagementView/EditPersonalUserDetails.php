<?= $this->extend("App\Views\common\baselayout") ?>
<?= $this->section("baselayout") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->

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
</head>

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
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item" active><a href="javascript:void(0)">Edit User</a></li>
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
                            <form id="editUser" action="<?php echo base_url(
                                "/user/update"
                            ); ?>" method="post" accept-charset="utf-8">
                                <h4 class="card-title">Edit User Details</h4>
                                <br>
                                <input type="text" class="form-control" name="userid" value="<?= $edituserid ?>" hidden>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Username</label>
                                        <?php if (
                                            isset ($editusername)
                                        ) { ?>
                                            <input type="text" class="form-control" name="username"
                                                value="<?= $editusername ?>" readonly>
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="username" value="">
                                        <?php } ?>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>First Name<span class="required-field"></span></label>
                                        <?php if (
                                            isset ($edituserfname)
                                        ) { ?>
                                            <input required maxlength="50" type="text" class="form-control" name="firstname"
                                                value="<?= $edituserfname ?>">
                                        <?php } else { ?>
                                            <input required type="text" class="form-control" name="firstname" value="">
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Last Name<span class="required-field"></span></label>
                                        <?php if (
                                            isset ($edituserlname)
                                        ) { ?>
                                            <input required type="text" maxlength="50" class="form-control" name="lastname"
                                                value="<?= $edituserlname ?>">
                                        <?php } else { ?>
                                            <input required type="text" class="form-control" name="lastname" value="">
                                        <?php } ?>
                                    </div>


                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-3">
                                        <label>Email<span class="required-field"></span></label>
                                        <?php if (isset ($edituseremail)) { ?>
                                            <input required type="email" class="form-control" name="email"
                                                value="<?= $edituseremail ?>">
                                        <?php } else { ?>
                                            <input required type="email" class="form-control" name="email" value="">
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Mobile No<span class="required-field"></span></label>
                                        <?php if (isset ($editusermobile)) { ?>
                                            <input pattern="^\d{10}$" required type="text" placeholder="07XXXXXXX" class="form-control" name="mobile"
                                                value="<?= $editusermobile ?>">
                                        <?php } else { ?>
                                            <input required type="text" class="form-control" name="mobile" value="">
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>Ext</label>
                                        <?php if (isset ($edituserext)) { ?>
                                            <input type="text" class="form-control" name="ext" value="<?= $edituserext ?>">
                                        <?php } else { ?>
                                            <input type="text" class="form-control" name="ext" value="">
                                        <?php } ?>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>User Avatar</label>
                                        <select id="avatarSelect" class="form-control">

                                            <?php
                                            $avatar =
                                                $_SESSION["user_avatar"]; //echo $status;
                                            //echo $status
                                            switch (
                                                $avatar
                                            ) {
                                                case "1.png": ?>
                                                    <option selected="selected" value="<?php echo base_url(
                                                        "images/avatar/1.png"
                                                    ); ?>">Default</option>
                                                    <?php break;
                                                case "2.png": ?>
                                                    <option selected="selected" value="<?php echo base_url(
                                                        "images/avatar/2.png"
                                                    ); ?>">Avatar 1
                                                    </option>
                                                    <?php break;
                                                case "3.png": ?>
                                                    <option selected="selected" value="<?php echo base_url(
                                                        "images/avatar/3.png"
                                                    ); ?>">Avatar 2
                                                    </option>
                                                    <?php break;
                                                case "4.png": ?>
                                                    <option selected="selected" value="<?php echo base_url(
                                                        "images/avatar/4.png"
                                                    ); ?>">
                                                        Avatar 3</option>
                                                    <?php break;
                                                case "5.png": ?>
                                                    <option selected="selected" value="<?php echo base_url(
                                                        "images/avatar/5.png"
                                                    ); ?>">
                                                        Avatar 4</option>
                                                    <?php break;
                                                case "6.png": ?>
                                                    <option selected="selected" value="<?php echo base_url(
                                                        "images/avatar/6.png"
                                                    ); ?>">Avatar 5</option>
                                                    <?php break;
                                                case "7.png": ?>
                                                    <option selected="selected" value="<?php echo base_url(
                                                        "images/avatar/7.png"
                                                    ); ?>">Avatar 6
                                                    </option>
                                                    <?php break;
                                                case "8.png": ?>
                                                    <option selected="selected" value="<?php echo base_url(
                                                        "images/avatar/8.png"
                                                    ); ?>">Avatar 7
                                                    </option>
                                                    <?php break;
                                                default: ?>
                                                    <p>Status: Unknown</p>
                                            <?php }
                                            ?>






                                            <option value="<?php echo base_url(
                                                "images/avatar/2.png"
                                            ); ?>">Avatar 1</option>
                                            <option value="<?php echo base_url(
                                                "images/avatar/3.png"
                                            ); ?>">Avatar 2</option>
                                            <option value="<?php echo base_url(
                                                "images/avatar/4.png"
                                            ); ?>">Avatar 3</option>
                                            <option value="<?php echo base_url(
                                                "images/avatar/5.png"
                                            ); ?>">Avatar 4</option>
                                            <option value="<?php echo base_url(
                                                "images/avatar/6.png"
                                            ); ?>">Avatar 5</option>
                                            <option value="<?php echo base_url(
                                                "images/avatar/7.png"
                                            ); ?>">Avatar 6</option>
                                            <option value="<?php echo base_url(
                                                "images/avatar/8.png"
                                            ); ?>">Avatar 7</option>
                                            <option value="<?php echo base_url(
                                                "images/avatar/9.png"
                                            ); ?>">Avatar 8</option>

                                            <!-- Add more options for additional avatars -->
                                        </select>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label></label>
                                        <div id="selectedAvatar"></div>
                                    </div>


                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-3">
                                        <label>Role<span class="required-field"></span></label>
                                        <input readonly type="text" class="form-control" name="role"
                                            value="<?= $editrolename ?>">
                                        <!-- <select name="role" id="inputState" class="form-control">
                                                        <option value="<?= $edituserrole ?>"><?php echo $editrolename; ?></option>
                                                        <?php foreach ($rolelist as $role) { ?>
                                                            <option value="<?php echo $role->role_id; ?>"><?php echo $role->role_name; ?></option>
                                                        <?php } ?>    
                                                    </select> -->
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Assigned Unit<span class="required-field"></span></label>
                                        <input readonly type="text" class="form-control" name="unit"
                                            value="<?= $editunitname ?>">
                                        <!-- <select name="unit" id="inputState" class="form-control">
                                                        <option value="<?= $edituserdep ?>"><?php echo $editunitname; ?></option>
                                                        <?php foreach ($unitlist as $unit) { ?>
                                                            <option value="<?php echo $unit->id; ?>"><?php echo $unit->name; ?></option>
                                                        <?php } ?>    
                                                    </select> -->
                                    </div>


                                </div>



                        </div>
                        <br>
                        <button type="button" class="btn btn-outline-dark" onclick="history.back();">Back</button>
                        <button type="submit" class="btn btn-outline-dark">Edit User</button>

                        </form>
                    </div>
                    <!-- Card -->
                </div>

            </div>
        </div>



    </div>
    <!--**********************************
            Content body end
        ***********************************-->


    <!--**********************************
            Footer start
        ***********************************-->

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

<script type="text/javascript">

    $(document).ready(function () {

        document.getElementById('selectedAvatar').innerHTML = '<img id="useravatar" src="<?php echo base_url(
            "images/avatar/" . $_SESSION["user_avatar"]
        ); ?>" alt="Selected Avatar" class=" rounded-circle mr-3"> ';


        // Event listener for select change
        document.getElementById('avatarSelect').addEventListener('change', function () {
            var selectedAvatar = this.value;

            document.getElementById('selectedAvatar').innerHTML = '<img id="useravatar" src="' + selectedAvatar + '" alt="Selected Avatar" class=" rounded-circle mr-3"> ';
        });

        $('#editUser').submit(function (e) {
            e.preventDefault(); // Prevent form submission

            var id = $('input[name="userid"]').val();
            var username = $('input[name="username"]').val();
            var firstname = $('input[name="firstname"]').val();
            var lastname = $('input[name="lastname"]').val();
            var mobile = $('input[name="mobile"]').val();
            var email = $('input[name="email"]').val();
            var ext = $('input[name="ext"]').val();
            var unit = $('select[name="unit"]').val();
            var role = $('select[name="role"]').val();
            var avatar = $('#useravatar').attr('src');

            debugger;
            if (username === "") {
                Swal.fire("Information!", "Please enter required fields", "info");
            } else {

                if (role === "notselected") {
                    Swal.fire("Information!", "Please select role", "info");
                }

                else if (unit === "notselected") {
                    Swal.fire("Information!", "Please select unit", "info");
                }

                else if (role === "notselected") {
                    Swal.fire("Information!", "Please select role", "info");
                }
                else {

                    if (avatar != undefined) {
                        // Find the index of the last occurrence of '/'
                        var lastIndex = avatar.lastIndexOf('/');

                        // Extract substring from the last '/' to the end of the string
                        var substring = avatar.substring(lastIndex + 1);
                        //console.log(substring); // Output: file.jpg

                        // Alternatively, you can use slice() method
                        var slicedSubstring = avatar.slice(lastIndex + 1);

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "User will be updated!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Proceed'
                        }).then((result) => {
                            if (result.isConfirmed) {


                                $.ajax({
                                    url: "<?php echo base_url("/user/update"); ?>",
                                    type: "POST",
                                    dataType: "json",
                                    data: {
                                        userid: id,
                                        username: username,
                                        firstname: firstname,
                                        lastname: lastname,
                                        mobile: mobile,
                                        email: email,
                                        ext: ext,
                                        unit: unit,
                                        role: role,
                                        avatar: slicedSubstring
                                    },
                                    success: function (response) {

                                        debugger;
                                        //alert(response.status);
                                        // Check if response is not null and has data
                                        if (response && response.status == "success") {


                                            Swal.fire("Done!", "User Updated!", "success")
                                                .then((value) => {
                                                    window.location.href = "<?php echo base_url(
                                                        "/user/edit"
                                                    ); ?>";
                                                });

                                        } else if (response && response.status == "user exist") {
                                            Swal.fire("Error!", "User Already Exist", "error");
                                            console.log("User Creation Failed");
                                        }
                                        else {
                                            Swal.fire("Error!", "User Creation Failed", "error");
                                            console.log("User Creation Failed");
                                        }

                                    },
                                    error: function (xhr, status, error) {
                                        // Handle errorabout:blank#blocked
                                        Swal.fire("Error!", "User Creation Failed", "error");
                                    }
                                });




                            }
                        })



                        //alert(slicedSubstring);
                    }
                    else {
                        Swal.fire("Information!", "Please select avatar", "info");
                    }

                    //alert(avatar);

                }

            }
        });
    });


</script>



<?= $this->endSection() ?>








?>