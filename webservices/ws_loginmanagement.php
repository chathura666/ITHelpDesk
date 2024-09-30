<?php 
//request parameters
$data=[];

if(isset($_POST ['signinbtn']))
         {
 $param_1 = $_POST['username'];
 $param_2 = $_POST['password'];

 //print_r('<pre>');
 //print_r($param_1);
 //print_r('</pre>');die;
 }

// print_r('expression');die;


 	//$url = "Criib_Management/webresources/ManageUser/CribLogin?ADUserID=".$param_1."&ADPwd=".$param_2."";
	////$request = "Criib_Management/webresources/ManageUser/CribLogin?ADUserID=".$param_1."&ADPwd=".$param_2."";
 	//$request = "Criib_Management/webresources/ManageUser/CribLogin?ADUserID=it207391&ADPwd=don0391";

	$method="GET";




	// require_once 'loginwebapi.php';
	//require_once '../js/crib/login.js';


?>
<script src="../js/firewallform/login.js"></script> 
<script type="text/javascript">
	     
    	manageloginresponse();
</script>