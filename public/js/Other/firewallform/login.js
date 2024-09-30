


	function manageloginresponse(){

		var uname = sessionStorage.username;
		// var loginresponse = sessionStorage.loginres;
        var loginresponse = "Success";


	//window.alert(loginresponse);
		if(loginresponse === "Success"){

			//setloginparameters(uname);
			window.location.href = 'http://172.20.106.159/FWallform_management/index.php';
		}

		if(loginresponse === "Failed"){

			var faildesc = sessionStorage.faildesc;
			window.alert(faildesc);
			window.location.href = 'http://172.20.106.159/FWallform_management/index.php';
		}

	}

	function setloginparameters(uname){


	}




