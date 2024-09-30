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



<script type="text/javascript">

$(document).ready(function() {

        document.getElementById('selectedAvatar').innerHTML = '<img id="useravatar" src="<?php echo base_url(
            "images/avatar/1.png"
        ); ?>" alt="Selected Avatar" class=" rounded-circle mr-3"> ';


        // Event listener for select change
                document.getElementById('avatarSelect').addEventListener('change', function() {
                var selectedAvatar = this.value;
                
                document.getElementById('selectedAvatar').innerHTML = '<img id="useravatar" src="' + selectedAvatar + '" alt="Selected Avatar" class=" rounded-circle mr-3"> ';
            });

            $('input').on('input', function() {
        // Remove the 'error' class when the user starts typing
        $(this).removeClass('error');
    });

            $('#addUser').submit(function(e) {
                e.preventDefault(); // Prevent form submission

                var username = $('input[name="username"]').val();
                var firstname = $('input[name="firstname"]').val();
                var lastname = $('input[name="lastname"]').val();
                var mobile = $('input[name="mobile"]').val();
                var email = $('input[name="email"]').val();
                var ext = $('input[name="ext"]').val();
                var unit = $('select[name="unit"]').val();
                var role = $('select[name="role"]').val();
                var password = $('input[name="password"]').val();
                var confirmpw = $('input[name="confirmpw"]').val();
                var avatar = $('#useravatar').attr('src');

                $('input').removeClass('error');


                $('input[required]').each(function() {
                    if ($(this).val() === '') {
                        // If the input field is empty, add the 'error' class to highlight it
                        $(this).addClass('error');
                    }
                });

                
                
                debugger;
                if (username === "") {
                    Swal.fire("Information!", "Please enter required fields", "info");
                } else {
                    
                    if(password === confirmpw)
                    {

                        if(role === "notselected")
                        {
                            Swal.fire("Information!", "Please select role", "info");
                        }

                        else if(unit === "notselected")
                        {
                            Swal.fire("Information!", "Please select unit", "info");
                        }

                        else if(role === "notselected")
                        {
                            Swal.fire("Information!", "Please select role", "info");
                        }
                        else{
                    
                    if(avatar != undefined)
                        {
                            // Find the index of the last occurrence of '/'
                        var lastIndex = avatar.lastIndexOf('/');

                        // Extract substring from the last '/' to the end of the string
                        var substring = avatar.substring(lastIndex + 1);
                        //console.log(substring); // Output: file.jpg

                        // Alternatively, you can use slice() method
                        var slicedSubstring = avatar.slice(lastIndex + 1);

                        
                        $.ajax({
                        url: "<?php echo base_url("/user/save"); ?>",
                        type: "POST",
                        dataType: "json",
                        data: {
                            username: username,
                            firstname: firstname,
                            lastname: lastname,
                            mobile: mobile,
                            email:email,
                            ext: ext,
                            unit: unit,
                            role: role,
                            password:password,
                            avatar:slicedSubstring
                        },
                        success: function (response) {

                            //debugger;
                            //alert(response.status);
                            // Check if response is not null and has data
                            if (response && response.status == "success") {

                                
                                Swal.fire("Done!", "User Created!", "success")
                                .then((value) => {
                                    window.location.href = "<?php echo base_url(
                                        "/user/view"
                                    ); ?>";
                                });

                            } else if(response && response.status == "user exist") {
                                Swal.fire("Error!", "User Already Exist", "error");
                                console.log("User Creation Failed");
                            }
                            else{
                                Swal.fire("Error!", "User Creation Failed", "error");
                                console.log("User Creation Failed");
                            }

                        },
                        error: function (xhr, status, error) {
                            // Handle errorabout:blank#blocked
                            Swal.fire("Error!", "User Creation Failed", "error");
                        }
                    });
                        //alert(slicedSubstring);
                        }
                        else
                        {
                            Swal.fire("Information!", "Please select avatar", "info");
                        }

                        //alert(avatar);
                    
                }


                    }
                    else
                    {
                        Swal.fire("Error!", "Passwords do not match", "error");

                    }
                    



                }
            });
        });

    
</script>

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
                    <li class="breadcrumb-item" active><a href="javascript:void(0)">Add User</a></li>

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
                            <form id="addUser" action="<?php echo base_url(
                                "/user/save"
                            ); ?>" method="post" accept-charset="utf-8">
                                <h4 class="card-title">Add New User</h4>
                                	 <br>
                                    <div class="form-row">
                                                <div class="form-group col-md-3">
                                                    <label for="username">Username<span class="required-field"></span></label>
                                                    <input pattern="[A-Za-z]{2}\d{6}" required type="text" class="form-control" placeholder="PFXXXXXX" name="username">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label>First Name<span class="required-field"></span></label>
                                                    <input required type="text" maxlength="50" class="form-control" placeholder="Name" name="firstname">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Last Name<span class="required-field"></span></label>
                                                    <input required type="text" maxlength="50" class="form-control" placeholder="Name" name="lastname">
                                                </div>       
                                                
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                                    <label>Email<span class="required-field"></label>
                                                    <input required type="email" maxlength="30" class="form-control" placeholder="Email" name="email">
                                                </div>
                                            <div class="form-group col-md-3">
                                                <label>Mobile No<span class="required-field"></label>
                                                <input required type="text" pattern="^\d{10}$" placeholder="07XXXXXXX" class="form-control" name="mobile">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Ext</label>
                                                <input  type="text" placeholder="Extension Number" class="form-control" name="ext">
                                            </div>                                           
                                    </div>

                                    <div class="form-row">

                                    			<div class="form-group col-md-3">
                                                     <label>Role<span class="required-field"></label>
                                                    <select name="role" id="inputState" class="form-control">
                                                        <option selected="selected" value="notselected">Select Role...</option>
                                                        <?php foreach (
                                                            $rolelist
                                                            as $role
                                                        ) { ?>
                                                            <option value="<?php echo $role->role_id; ?>"><?php echo $role->role_name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                                </div>

                                            <div class="form-group col-md-3">
                                                    <label>Assigned Unit<span class="required-field"></label>
                                                    <select name="unit" id="inputState" class="form-control">
                                                        <option selected="selected" value="notselected">Select Unit...</option>
                                                        <?php foreach (
                                                            $unitlist
                                                            as $unit
                                                        ) { ?>
                                                            <option value="<?php echo $unit->id; ?>"><?php echo $unit->name; ?></option>
                                                        <?php } ?>    
                                                    </select>
                                            </div>

                                            <div class="form-group col-md-2">
                                            <label>User Avatar</label>
                                                <select id="avatarSelect"  class="form-control">
                                                <option selected="selected" value="<?php echo base_url(
                                                    "images/avatar/1.png"
                                                ); ?>">Select Avatar...</option>
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
                                            <div class="form-group col-md-3">
                                            <label></label>
                                            <div id="selectedAvatar"></div>
                                            </div>

                                            

                                    </div>
                                            


                                    <div class="form-row">

                                <div class="form-group col-md-3">
                                        <label>Password<span class="required-field"></label>
                                        <input required type="password" class="form-control" placeholder="Password" name="password">
                                    </div>
                                <div class="form-group col-md-3">
                                    <label>Confirm Password<span class="required-field"></label>
                                    <input required type="password" class="form-control" placeholder="Confirm Password" name="confirmpw">
                                </div>
                               

                                
                            </div>
                                     
                                </div>
                                <br>   
                                <button type="button" class="btn btn-outline-dark" onclick="history.back();">Back</button>             
                                <button type="submit" class="btn btn-outline-dark">Add User</button>          
                            </form>
                        </div>
                        </div>
                        
                        <!-- Card -->

                    <div class="card">
                    <div class="card-body">
                        <div class="basic-form">
                            <h4 class="card-title">View Users</h4>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                    <table id="myTable" class="display table table-striped table-bordered zero-configuration">
                                                            <thead>
                                                                <tr>
                                                                    <th>User Name</th>
                                                                    <th>First Name</th>                                                               
                                                                    <th>Mobile</th>   
                                                                    <th>Unit</th>                                                               
                                                                    <th>Role</th>                
                                                                    <th>Created On</th>  
                                                                    <th>Status</th>                                                                    
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach (
                                                                    $userlist
                                                                    as $user
                                                                ): ?>	
                                                                <tr>                                                                   

                                                                    <td><?php echo $user->user_name; ?></td>
                                                                    <td><?php echo $user->first_name; ?></td>
                                                                    <td><?php echo $user->mobile; ?></td>
                                                                    <td><?php echo $user->name; ?></td>
                                                                    <td><?php echo $user->role_name; ?></td> 
                                                                    <td>
                                                                    <?php
                                                                        $short1 = $user->created_on;
                                                                        $shortDate1 = date("Y-m-d", strtotime($short1));
                                                                        echo $shortDate1 ?>
                                                                </td>
                                                                    <td>
                                                                        <?php
                                                                        $status =
                                                                            $user->active; //echo $status //echo $status;
                                                                        switch (
                                                                            $status
                                                                        ) { case "1": ?>
                                                                                                <span class="badge badge-success" style="width:60px"><b>Active</b></span>                                                                                           
                                                                                                <?php break;case "0": ?>
                                                                                                <span class="badge badge-dark" style="width:60px"><b>Inactive</b></span>                                                                                                                                                                                
                                                                                                <?php break;default: ?>
                                                                                                <p>Status: Unknown</p>
                                                                                                <?php }
                                                                        ?>
                                                                    </td>


                                                                    
                                                                </tr>
                                                                <?php endforeach; ?>
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
 
<?= $this->endSection() ?>



    


 

 ?>