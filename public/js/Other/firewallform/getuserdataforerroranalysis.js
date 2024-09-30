/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        function Pageload(formmodelid,Serveripwithport,Pointedwebservic){
            
                $("#title").val("");
                $("#name").val("");
                $("#nic").val("");                                            
                $("#mobile").val("");
                $("#dob").val("");
                $("#sex").val("");
                $("#terbody").text("");
    
                managelogindata(formmodelid,formloadServeripwithport,formloadPointedwebservice); 
                Setlabelvalue();
   
        }



        function GetErrorLogAction(searchval,searchop){
            
                $("#title").val("");
                $("#name").val("");
                $("#nic").val("");                                            
                $("#mobile").val("");
                $("#dob").val("");
                $("#sex").val("");
    
                var Userdata_pointed_webservice = sessionStorage.ErrorlogWebservice;
                var usredtserverip = sessionStorage.ErrorlogServer_IP;
    
                            $("#terbody").text("");
                            $("#tbody").text("");
                            var json_data_object;
                                try{
                                    var nic,mobile='';
                                    if(searchop ==='nic' && searchop !=='mobile')
                                    {
                                        nic = searchval;
                                        mobile = ''
                                                    var settings = {
                                                        "async": false,
                                                        "crossDomain": true,
                                                        "url": "http://" + usredtserverip + "/" + Userdata_pointed_webservice + "/webresources/GenericResource_Select_Localdb/geterrordetailbynic/?RegNicMob="+nic,    //UAT
                                                        "method": "GET",
                                                        "content-type": "application/json",
                                                    }
                                    }
                                    if(searchop!=='nic' && searchop==='mobile')
                                    {
                                         nic = '';
                                         mobile = searchval;                                    
                                                    var settings = {
                                                        "async": false,
                                                        "crossDomain": true,
                                                        "url": "http://" + usredtserverip + "/" + Userdata_pointed_webservice + "/webresources/GenericResource_Select_Localdb/geterrordetailbymobile/?RegNicMob="+mobile,  //UAT 
                                                        "method": "GET",
                                                        "content-type": "application/json",
                                                    }
                                    }

				 $.ajax(settings).done(function (response) {
                                   json_data_object = response;   
                                   var jdset = json_data_object;
                                    if(jdset !== null){                                         
                                            generateErrordestbl(json_data_object);

                                        }
                                        if(jdset === null || jdset.data ==="")
                                        {
                                            window.alert("No Error Record Found!")
                                        }
                                 });
                                   }catch(e){
                                       console.log("error"+e);                                   
                                   }
                                }
                                
        function Geterrorhint(errorid){
            
                var Userdata_pointed_webservice = sessionStorage.ErrorlogWebservice;
                var usredtserverip = sessionStorage.ErrorlogServer_IP;
                var jason_data_object;
                
                try {

                        var settings = {
                            "async": false,
                            "crossDomain": true,
                            "url": "http://" + usredtserverip + "/" + Userdata_pointed_webservice + "/webresources/GenericResource_Select_Localdb/geterrorhint/?errorid=" + errorid,
                            "contentType": "application/json",
                            "method": "GET",
                            "credentials": false,
                            "headers": {
                                'Access-Control-Allow-Origin': '*'},
                        }


        $.ajax(settings).done(function (response) {

            jason_data_object = response[0];
            var jdset = jason_data_object;
            if (jdset !== null) {
                // loaduserdata(jason_data_object);
                var hintname = jason_data_object.hint_name;                
                sessionStorage.Hintdesc = hintname;
                //$("#Hintdesc").val(hintname);
                
            }
            if (jdset === null) {
                window.alert("User Not Found !")
            }
        });


        } catch (e) {
            console.log("error" + e);
        }
                
                           
        }               
        
        
        
        
        
        function Loadexistingcustomerdata(existinguserid){
                var Userdata_pointed_webservice = sessionStorage.ErrorlogWebservice;
                var usredtserverip = sessionStorage.ErrorlogServer_IP;
    
                            //$("#terbody").text("");
                            var json_data_object;
                                try{
                                    var settings = {
                                            "async": false,
                                            "crossDomain": true,
                                            "url": "http://" + usredtserverip + "/" + Userdata_pointed_webservice + "/webresources/GenericResource_Select_Localdb/getexistinguserdata/?ExisUID="+existinguserid,
                                            "contentType": "application/json",
                                            "method": "GET",
                                            "credentials": false,
                                            "headers": {
                                                'Access-Control-Allow-Origin': '*'},
                                        }


                                         $.ajax(settings).done(function (response) {
                                    
                                                                  
                                    jason_data_object = response[0];
                                    var jdset = jason_data_object;
                                    if (jdset !== null) 
                                            {
                                            $("#title").val("");
                                            $("#name").val("");
                                            $("#nic").val("");                                            
                                            $("#mobile").val("");
                                            $("#dob").val("");
                                            $("#sex").val("");
                                            var title = jason_data_object.salutation;
                                            var name = jason_data_object.name;
                                            var nicno = jason_data_object.nicNumber;
                                            
                                            var dob = jason_data_object.dateofbirth;
                                            var sex = jason_data_object.sex;
                                            
                                            var noofdevice = jason_data_object.noOfDevices;
                                            var mobileno = jason_data_object.mobileNo;

                                            $("#title").val(title);
                                            $("#name").val(name);
                                            $("#nic").val(nicno);                                            
                                            $("#mobile").val(mobileno);
                                            $("#dob").val(dob);
                                            $("#sex").val(sex);

                                            }
                                        if(jdset === null)
                                        {
                                            window.alert("No such user !");
                                        }
                                    
                                        });
                                   }
                                   catch(e){
                                       console.log("error"+e);
                                   }
                                   
                                }
                                
                                
        function Loadeolduserdevicedata(deviceid,errorid){
            
                var Userdata_pointed_webservice = sessionStorage.ErrorlogWebservice;
                var usredtserverip = sessionStorage.ErrorlogServer_IP;
    
                            $("#tbody").text("");
                            var json_data_object;
                                try{
                                    
                                        var settings = {
                                            "async": false,
                                            "crossDomain": true,
                                            "url": "http://" + usredtserverip + "/" + Userdata_pointed_webservice + "/webresources/GenericResource_Select_Localdb/getolduserdevdata/?ExisDivID="+deviceid,
                                            "method": "GET",
                                            "content-type": "application/json",
                                        }
                                   

                                   $.ajax(settings).done(function (response) {
                                   json_data_object = response;   
                                   var jdset = json_data_object;
                                    if((jdset != null) && (errorid!=4)){                                         
                                            generateexistingdatatable(json_data_object);

                                        }
                                        if((jdset != null) && (errorid==4)){                                         
                                            generateMax9table(json_data_object);

                                        }
                                        if(jdset === null || jdset.data ==="")
                                        {
                                            window.alert("No Error Record Found!")
                                        }
                                 });
                                   }catch(e){
                                       console.log("error"+e);                                   
                                   }
            
                    
        }
        
                                
                                
                                
       