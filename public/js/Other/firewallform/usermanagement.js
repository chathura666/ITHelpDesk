/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function Pageload(formmodelid) {
    
    if(formmodelid !== "13"){
        if(formmodelid !== "2"){
                var rol_id = sessionStorage.RoleID;
                var pointed_webservice = localStorage.getItem("UserServer_IP");
                var ipwithport = sessionStorage.UserServer_IP;
                var webservice = sessionStorage.UserWebservice;
                var usredtserverip = sessionStorage.UsereditServer_IP;
                var usredtwebservice = sessionStorage.UsereditWebservice;
                managelogindata(formmodelid);
                if (ipwithport !== null && webservice !== null) {
                    Loadrolegroup(ipwithport, webservice, rol_id);
                    LoadDepartment(ipwithport, webservice);
                }
                if (usredtserverip !== null && usredtwebservice !== null) {
                    Loadrolegroup(usredtserverip, usredtwebservice, rol_id);
                    LoadDepartment(usredtserverip, usredtwebservice);
                }
                Setlabelvalue();
        }
    }
     if(formmodelid === "13"){
         
         var rol_id = sessionStorage.RoleID;
        var pointed_webservice = localStorage.getItem("UserServer_IP");
        var ipwithport = sessionStorage.UserServer_IP;
        var webservice = sessionStorage.UserWebservice;
        managelogindata(formmodelid);        
        Setlabelvalue();
        LoadDepartment(ipwithport,webservice);

     }
     if(formmodelid === "2"){
        var rol_id = sessionStorage.RoleID;
        var pointed_webservice = localStorage.getItem("UserServer_IP");
        var ipwithport = sessionStorage.UserServer_IP;
        var webservice = sessionStorage.UserWebservice;
        var usredtserverip = sessionStorage.UsereditServer_IP;
        var usredtwebservice = sessionStorage.UsereditWebservice;
        managelogindata(formmodelid);
        if (ipwithport !== null && webservice !== null) {
            Loadrolegroup(ipwithport, webservice);
//            LoadDepartment(ipwithport, webservice);
        }
        if (usredtserverip !== null && usredtwebservice !== null) {
            Loadrolegroup(usredtserverip, usredtwebservice);
//            LoadDepartment(usredtserverip, usredtwebservice);
        }
        Setlabelvalue();
    }
}

function managelogindata(formmodelid) {

    if (typeof (Storage) !== "undefined") {
        var aduname = sessionStorage.ADusername;
        var adpwd = sessionStorage.ADpassword;
        var ipwithport = sessionStorage.UserServer_IP;
        var webservice = sessionStorage.UserWebservice;
        var usredtipwithport = sessionStorage.UserServer_IP;
        var usredtwebservice = sessionStorage.UsereditWebservice;
        if (ipwithport != null && webservice != null) {
            Getloginuserdata(aduname, ipwithport, webservice);
        } else if (usredtipwithport != null && usredtwebservice != null) {

            Getloginuserdata(aduname, usredtipwithport, usredtwebservice);
        }
        var rolegroupid = sessionStorage.RoleID;
        var arrayloginuser_data = [aduname, adpwd, rolegroupid];

        var modelid = formmodelid;

        if (ipwithport != null && webservice != null) {

            CheckPageisaccess(modelid, rolegroupid, webservice, ipwithport);
        } else if (usredtipwithport != null && usredtwebservice != null) {

            CheckPageisaccess(modelid, rolegroupid, usredtwebservice, usredtipwithport);
        }

    } else {
        alert("sessionemty");
    }
}





function Loadrolegroup(serverip, pointed_webservice) {

    var jason_data_object;
    try {

        var settings = {
            "async": false,
            "crossDomain": true,
            "url": "http://" + serverip + "/" + pointed_webservice + "/webresources/GenericResource_Select/getalluserrole/",
            "contentType": "application/json",
            "method": "GET",
            "credentials": false,
            "headers": {
                'Access-Control-Allow-Origin': '*'},
        }


        $.ajax(settings).done(function (response) {

            jason_data_object = response;
            var jdset = jason_data_object;
            if (jdset != null) {
                loaddropdownlist(jason_data_object);

            }
            if (jdset == null) {
                window.alert("No role group available !")
            }
        });

    } catch (e) {
        console.log("error" + e);
    }

}

function LoadDepartment(serverip, pointed_webservice){
    
    var jason_depdata_object; 
    try {
         
         var settings = {
            "async": false,
            "crossDomain": true,
            "url": "http://" + serverip + "/" + pointed_webservice + "/webresources/GenericResource_Department/getdepartment/",
            "contentType": "application/json",
            "method": "GET",
            "credentials": false,
            "headers": {
                'Access-Control-Allow-Origin': '*'},
        }
        
         $.ajax(settings).done(function (response) {
             
            jason_depdata_object = response;
            var jdset = jason_depdata_object;
            if (jdset !== null) {
                loaddepdropdownlist(jason_depdata_object);

            }
            if (jdset === null) {
                window.alert("No department available !")
            }
             
         });
         
     }catch (e) {
        console.log("error" + e);
    }
     
    
}

function LoadrolegroupRoleusr(serverip, pointed_webservice) {

    var jason_data_object;
    try {

        var settings = {
            "async": false,
            "crossDomain": true,
            "url":  "http://"+serverip+"/"+pointed_webservice+"/webresources/GenericResource_Rolemanagement/getuserrole/",
            "contentType": "application/json",
            "method": "GET",
            "credentials": false,
            "headers": {
                'Access-Control-Allow-Origin': '*'},
        }


        $.ajax(settings).done(function (response) {

            jason_data_object = response;
            var jdset = jason_data_object;
            if (jdset !== null) {
                loaddropdownlist(jason_data_object);

            }
            if (jdset === null) {
                window.alert("No role group available !")
            }
        });

    } catch (e) {
        console.log("error" + e);
    }

}

function saveuserdata(arrayuser_data, serverip, Pointedwebservice) {
    try {
        var saveuserdata_pointed_web_service = Pointedwebservice;
        var userjasonobject = {"pfno": arrayuser_data[0], "userName": arrayuser_data[1], "lastname": arrayuser_data[2], "department": arrayuser_data[3], "mobileno": arrayuser_data[4], "email": arrayuser_data[5], "rolegroupid": arrayuser_data[6], "status": arrayuser_data[7]};
        var userJSON = JSON.stringify(userjasonobject);

        var settings = {
            "async": false,
            "crossDomain": true,
            "url": "http://" + serverip + "/" + saveuserdata_pointed_web_service + "/webresources/GenericResource_Select/Insertuserdata/",
            "contentType": "application/json",
            "method": "POST",
            "credentials": false,
            "data": userJSON,
            "headers": {
                'Access-Control-Allow-Origin': '*'},
        }

        $.ajax(settings).done(function (response) {
            //jason_data_object = response;   
            //var jdset = jason_data_object; 
            //alert("Record Added !");  

        });

    } catch (e) {
        alert(e);
    }

    //alert(userJSON);
}



function GetExistinguserdata(pfno) {
    var Userdata_pointed_webservice = sessionStorage.UsereditWebservice;
    var usredtserverip = sessionStorage.UsereditServer_IP;
    var jason_data_object;
    try {

        var settings = {
            "async": false,
            "crossDomain": true,
            "url": "http://" + usredtserverip + "/" + Userdata_pointed_webservice + "/webresources/GenericResource_Select/getuserdetail/?pfno=" + pfno,
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
                var userid = jason_data_object.userid;
                var firstname = jason_data_object.username;
                var lastname = jason_data_object.lastname;
                var department = jason_data_object.department;
                var mobile_no = jason_data_object.mobileno;
                var email = jason_data_object.email;
                var rolegrp = jason_data_object.role_id;
                var status = jason_data_object.status;

                $("#UserID").val(userid);
                $("#first_name").val(firstname);
                //$("#last_name").val(lastname);
                $("#department").val(department);
                $("#mobile_no").val(mobile_no);
                $("#e_mail").val(email);
                $("#usergroup").val(rolegrp);
                SetStatus(status);



            }
            if (jdset == null) {
                window.alert("User Not Found !")
            }
        });


    } catch (e) {
        console.log("error" + e);
    }


}


function Updateuserdata(arrayuser_data, serverip, Pointedwebservice) {
    try {

        var userjasonobject = {"userid": arrayuser_data[0], "pfno": arrayuser_data[1], "userName": arrayuser_data[2], "lastname": arrayuser_data[3], "department": arrayuser_data[4], "mobileno": arrayuser_data[5], "email": arrayuser_data[6], "rolegroupid": arrayuser_data[7], "status": arrayuser_data[8]};
        var userJSON = JSON.stringify(userjasonobject);
        //alert(userJSON);
        var settings = {
            "async": false,
            "crossDomain": true,
            "url": "http://" + serverip + "/" + Pointedwebservice + "/webresources/GenericResource_Select/Updateuserdata/",
            "contentType": "application/json",
            "method": "POST",
            "credentials": false,
            "data": userJSON,
            "headers": {
                'Access-Control-Allow-Origin': '*'},
        }

        $.ajax(settings).done(function (response) {
            alert("Record Updated !");
            //alert("done");  

        });

    } catch (e) {
        alert(e);
    }
}


function loaduserlist(deporbr){
    
    var ipwithport = sessionStorage.UserServer_IP;
    var webservice = sessionStorage.UserWebservice;
    
    if(webservice !== "" && ipwithport !==""){
            var jason_data_object;
            try {

                var settings = {
                    "async": false,
                    "crossDomain": true,
                    "url": "http://" + ipwithport + "/" + webservice + "/webresources/GenericResource_Select/getuserbybrdep/?branchdep=" + deporbr,
                    "contentType": "application/json",
                    "method": "GET",
                    "credentials": false,
                    "headers": {
                        'Access-Control-Allow-Origin': '*'},
                }


                $.ajax(settings).done(function (response) { 
                jason_data_object = response;   
                var jdset = jason_data_object;
                if(jdset !== null){
                    $("#usertbody").empty();
                    generateUserTable(jason_data_object);
                                             
                                }
                if(jdset === null){
                    window.alert("No Users !")
                                }
                }); 


            } catch (e) {
                console.log("error" + e);
            }
    }
    
}





