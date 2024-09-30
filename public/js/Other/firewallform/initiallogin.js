var pointed_web_service;
var server_ip_withport;

function checkinitiallogin(userid,pwd,Pointedwebservice,Serveripwithport){
    
    setloginparameters(userid,pwd,Pointedwebservice,Serveripwithport)
    CheckAD (Pointedwebservice,Serveripwithport)    
    
}


function setloginparameters(userid,pwd,Pointedwebservice,Serveripwithport){
    
    var unamecount = userid.length;
    var ADuser = "";
    var ADpwd = "";
    var ADuserfull = "";
    
    ADpwd = pwd;
    ADuserfull = userid;     
    if(unamecount >= 10)
    {
        //ADuser = ADuserfull.substring(0,(ADuserfull.length - 1));
        ADuser = ADuserfull;
    }if(unamecount < 10){
        ADuser = ADuserfull.substring(2,(ADuserfull.length));        
        //ADuser = ADuserfull.substring(0,(ADuserfull.length - 1));
    }
    ADpwd = pwd;
    sessionStorage.ADusername= ADuser;
    sessionStorage.ADFullusername = ADuserfull;
    sessionStorage.ADpassword =ADpwd;   
    var jason_data_object;
    var jdset;
    var status = "";
    try {
        
    
    } catch (e) {
        
    }

    }



function CheckAD(Pointedwebservice,Serveripwithport){
    

        var aduname = sessionStorage.ADusername;
        var adpwd = sessionStorage.ADpassword;
        var adfulluname = sessionStorage.ADFullusername;
        pfno = sessionStorage.ADusername;
        pointed_web_service = Pointedwebservice;
        server_ip_withport = Serveripwithport;
        //alert("localstorage_said"+localStorage.getItem("serveripwithport"));
        var jason_data_object;
        var adresult = "";
        
        
         var ADsettings = {
         "async": false,
         "crossDomain": true,
         "url": "http://"+server_ip_withport+"/"+pointed_web_service+"/webresources/GenericResource_Loginmanagement/requestmasterloginaccess/?ADUserID="+adfulluname+"&ADPwd="+adpwd,
         "contentType": "application/json",
         "method": "GET",
         "credentials": false,
         "headers":{
            'Access-Control-Allow-Origin': '*'},
        }

            $.ajax(ADsettings).done(function (response) { 
            jason_data_object = response[0];             
            var jdset = jason_data_object;

                if(jdset !==null){
                    adresult = jason_data_object.ADRESULT;
                    sessionStorage.Loginservicereponse =adresult;
               }


         });
         
             if(adresult === "OK"){ 
                
                
                console.log("manageADlogindata"+pointed_web_service,server_ip_withport);                
                checkuserwebportaluserstatus(pfno,server_ip_withport,pointed_web_service);
                
                

            }else{
                
                alert("Login Failed:UserName/Password mismatch.Please Try Again !");    
                //window.location = 'http://'+server_ip_withport+'/passbook/production/index.html';
                var path = 'http://'+server_ip_withport+'/passbook/production/index.html';            
                $("#form-1").attr('action', path);
                //sessionStorage.clear();
                
            }
       
        }
        
function checkuserwebportaluserstatus(pfno,server_ip_withport,pointed_web_service){
    
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
                   var path = 'http://'+Serveripwithport+'/passbook/production/index1.html';            
                   $("#form-1").attr('action', path);
                   
 
                                }

                else if (response === ""){
                    
                       var redirectid = localStorage.getItem("serveripwithport");
                       alert("You are not registerd with Smartpassbook web portal.Please contact your administrator !");
                       var path = 'http://'+Serveripwithport+'/passbook/production/index.html';            
                       $("#form-1").attr('action', path);
                }
                }); 
                
                                          
    } catch (e) {
        console.log("error"+e);
    }
    
    
}
        
