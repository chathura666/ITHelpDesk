/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var pointed_web_service;
var server_ip_withport;
var pfno;
function CheckUserLogin(Pointedwebservice,ServerIPwithport){
    CheckADLogin(Pointedwebservice,ServerIPwithport);
}

function CheckADLogin(Pointedwebservice,ServerIPwithport){

        var aduname = sessionStorage.ADusername;
        var adpwd = sessionStorage.ADpassword;
        var adfulluname = sessionStorage.ADFullusername;
        pfno = sessionStorage.ADusername;
        localStorage.setItem("pointedservice",Pointedwebservice);
        localStorage.setItem("serveripwithport",ServerIPwithport);
        pointed_web_service = localStorage.getItem("pointedservice");
        server_ip_withport = localStorage.getItem("serveripwithport");
        var jason_data_object;

            
                console.log("manageADlogindata"+pointed_web_service,server_ip_withport);
                manageADlogindata(pfno,pointed_web_service,server_ip_withport);

        }



        function manageADlogindata(pfno,pointed_web_service,server_ip_withport){

            if(typeof(Storage) !== "undefined") {                
                var aduname = sessionStorage.ADusername;
                var adpwd = sessionStorage.ADpassword;
                var adfulluname = sessionStorage.ADFullusername;
                Getloginuserdata(pfno,server_ip_withport,pointed_web_service);

                    var rolegroupid = sessionStorage.RoleID;
                    var arrayloginuser_data = [aduname,adpwd,rolegroupid,pointed_web_service,server_ip_withport];                
                    var modelid = 4;                
                    CheckPageisaccess(modelid,rolegroupid,pointed_web_service,server_ip_withport);
                    var Username = sessionStorage.UserName;
                    var UserID = sessionStorage.UserID;
                    var Pfno = sessionStorage.ADFullusername;
                    Insertloginuserdata(aduname,adfulluname,Username,rolegroupid,UserID,pointed_web_service,server_ip_withport)
                    document.getElementById('lblLoginuser').innerHTML = '&nbsp;'+Pfno;
                    document.getElementById('lblmenupaneluser').innerHTML = Username;
      
            } 
            else {
                alert("sessionemty");
            }
            
        }
        


function Insertloginuserdata(arrayloginuser_data){
     try{
        var loginuserjasonobject = {"aduname":arrayloginuser_data[0], "adpwd":arrayloginuser_data[1]};
        var userloginJSON = JSON.stringify(arrayloginuser_data);
        alert("before call link");
        var settings = {
         "async": false,
         "crossDomain": true,
         "url": "http://"+arrayloginuser_data[4]+"/"+arrayloginuser_data[3]+"/webresources/GenericResource_Loginmanagement/Insertloginuserdata/",
         "contentType": "application/json",
         "method": "POST",
         "credentials": false,
         "data":userloginJSON,
         "headers":{
             'Access-Control-Allow-Origin': '*'},
        }
        
         $.ajax(settings).done(function (response) { 

            
         });
        
    }catch(e){
        alert(e);
    }
}



function Insertloginuserdata(ADUName,UserName,RoleGroupid,UserID,pointed_web_service,server_ip_withport){
    
    try{

        var settings = {
         "async": false,
         "crossDomain": true,
         "url": "http://"+server_ip_withport+"/"+pointed_web_service+"/webresources/GenericResource_Loginmanagement/Insertloginuserdata/?adusernm="+ADUName+"&firstname="+UserName+"&roleid="+RoleGroupid+"&userid="+UserID,
         "contentType": "application/json",
         "method": "POST",
         "credentials": false,
         "headers":{
             'Access-Control-Allow-Origin': '*'},
        }
        
         $.ajax(settings).done(function (response) { 

            
         });
        
    }catch(e){
        alert(e);
    }
    
}


function Insertloginuserdata(ADUName,PfNo,UserName,RoleGroupid,UserID,pointed_web_service,server_ip_withport){
    
    try{

        var settings = {
         "async": false,
         "crossDomain": true,
         "url": "http://"+server_ip_withport+"/"+pointed_web_service+"/webresources/GenericResource_Loginmanagement/Insertloginuserdata/?adusernm="+ADUName+"&pfno="+PfNo+"&firstname="+UserName+"&roleid="+RoleGroupid+"&userid="+UserID,
         "contentType": "application/json",
         "method": "POST",
         "credentials": false,
         "headers":{
             'Access-Control-Allow-Origin': '*'},
        }
        
         $.ajax(settings).done(function (response) { 

            
         });
        
    }catch(e){
        alert(e);
    }
    
}


function Getloginuserdata(pfno,server_ip_withport,pointed_web_service){
    
    var jason_data_object;
    var usersatatus;
    
    try {
         
         var settings = {
         "async": false,
         "crossDomain": true,
         "url": "http://"+server_ip_withport+"/"+pointed_web_service+"/webresources/GenericResource_Select/getuserdetail/?pfno="+pfno,
         "contentType": "application/json",
         "method": "GET",
         "credentials": false,
         "headers":{
             'Access-Control-Allow-Origin': '*'},
        }
        

            $.ajax(settings).done(function (response) { 
            
            jason_data_object = response[0];             
            var jdset = jason_data_object;
                if(response !==""){
                   var userid = jason_data_object.userid;
     
                   sessionStorage.RoleID = jason_data_object.role_id;
                   sessionStorage.UserName = jason_data_object.username;
                   sessionStorage.PFNO = jason_data_object.pfno;
                   sessionStorage.UserID = jason_data_object.userid;
                   
 
                                }

                else if (response === ""){
                    
                       var redirectid = localStorage.getItem("serveripwithport");
                       alert("You are not registerd with Smartpassbook web portal.Please contact your administrator !");
                       window.location = 'http://'+redirectid+'/passbook/production/index.html';
                }
                }); 
                
                                          
    } catch (e) {
        console.log("error"+e);
    }
       
    
}




function Getloginuserdata_formload(pfno,formloadServeripwithport,formloadPointedwebservice){
    
    var jason_data_object;
    
    try {
         
         var settings = {
         "async": false,
         "crossDomain": true,
         "url": "http://"+formloadServeripwithport+"/"+formloadPointedwebservice+"/webresources/GenericResource_Select/getuserdetail/?pfno="+pfno,
         "contentType": "application/json",
         "method": "GET",
         "credentials": false,
         "headers":{
             'Access-Control-Allow-Origin': '*'},
        }
        

            $.ajax(settings).done(function (response) { 
            
            jason_data_object = response[0];             
            var jdset = jason_data_object;
                if(jdset !==null){
                   var userid = jason_data_object.userid;
     
                   sessionStorage.RoleID = jason_data_object.role_id;
                   sessionStorage.UserName = jason_data_object.username;
                   sessionStorage.PFNO = jason_data_object.pfno;
                   sessionStorage.UserID = jason_data_object.userid;
                   
 
                                }
                if(jdset === null){
                   // window.alert("No role group available !")
                                }
                }); 
                
                                          
    } catch (e) {
        console.log("error"+e);
    }
       
    
}




    function CheckPageisaccess(modelid,rolegroupid,pointed_web_service,server_ip_withport){
    
    //alert("after pageaccess"+pointed_web_service);
    console.log("after pageaccess"+pointed_web_service+pointed_web_service,server_ip_withport)
    var pointed_webservice = localStorage.getItem("pointedservice")
    //alert("localstorage_said"+localStorage.getItem("pointedservice"));
    var pointed
    var jason_data_object;
    var status = "";
    try {
         
         var settings = {
         "async": false,
         "crossDomain": true,
         "url": "http://"+server_ip_withport+"/"+pointed_webservice+"/webresources/GenericResource_Loginmanagement/getuseraccesslevel/?ModelID="+modelid+"&RoleID="+rolegroupid,
         "contentType": "application/json",
         "method": "GET",
         "credentials": false,
         "headers":{
             'Access-Control-Allow-Origin': '*'},
        }
         
    
            $.ajax(settings).done(function (response) { 
            
            jason_data_object = response[0];             
            var jdset = jason_data_object;
                if(jdset !==null){

                   status =  jason_data_object.is_access;
               }

                });
                
                if(status !== true){
                       var redirectid = localStorage.getItem("serveripwithport");
                       alert("You are not registerd with Smartpassbook web portal.Please contact your administrator !");
                       window.location = 'http://'+redirectid+'/passbook/production/index1.html';
                   }
        
                                               
    } catch (e) {
        console.log("error"+e);
    }
       
    
}









