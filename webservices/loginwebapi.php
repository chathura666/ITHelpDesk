<?php

$web_service_host = "http://172.20.106.159";
$web_service_port = "80";
$web_service_key  = "";

if (!isset($method)) {

$method = 'POST';
}

$REQUEST_URL = $web_service_host.":".$web_service_port.'/'.$request;

$curl = curl_init();

if (empty($data)) {

curl_setopt_array($curl, array(

CURLOPT_PORT => $web_service_port,
CURLOPT_URL => $REQUEST_URL,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => $method,
CURLOPT_POSTFIELDS => "",            
CURLOPT_HTTPHEADER => array(
    "apiKey: ".$web_service_key,
    "Content-Type: application/json" 
),

));
    
} else {

curl_setopt_array($curl, array(

CURLOPT_PORT => $web_service_port,
CURLOPT_URL => $REQUEST_URL,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => $method,
CURLOPT_POSTFIELDS => json_encode($data),            
CURLOPT_HTTPHEADER => array(
    "apiKey: ".$web_service_key,
    "Content-Type: application/json" 
),

));

}       

$response = curl_exec($curl);

if (!$response) {
$response = 500;
} 

$err = curl_error($curl);

curl_close($curl);

if ($err) {
$response = 500;
}

//echo $response;
session_start();

$_SESSION['loginresponse'] = $response;


//echo "Response DATA: " . $_SESSION["loginresponse"];

//$time = time();


?>

<script>
	 	var jason_data_object;

   		console.log(<?php echo $response; ?>);



		var jdset = <?php echo $response; ?>;

		var LoginStatus = jdset.LoginStatus;
        var LoginSessionId = jdset.SessionID;

		if(LoginStatus === "Success"){
		var LoginData = jdset.LoginData;
        var size = LoginData.length;                     
            for(var i = 0; i < size; i++) {

                    var name = LoginData[i].FirstName;
                    var pf = LoginData[i].ADUserID;
			 }

        //window.alert(name);
        //window.alert(LoginStatus);
        //window.alert(LoginSessionId);
        //console.log(jdset.SessionID);
        sessionStorage.username = name;
        sessionStorage.pfno = pf;
        sessionStorage.loginres = LoginStatus;


    	}

    	else if(LoginStatus === "Failed"){

    		var Msgdescription = jdset.Description;
    		//window.alert(Msgdescription);
    		sessionStorage.loginres = LoginStatus;
    		sessionStorage.faildesc = Msgdescription;
    	}


</script>