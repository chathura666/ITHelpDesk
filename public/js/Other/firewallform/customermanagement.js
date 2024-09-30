/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



function CustomerPageload(formmodelid){   
    
    var ipwithport = sessionStorage.CMserverip;
    var webservice = sessionStorage.CMpointedservice;
    managelogindata(formmodelid);
    Loadrolegroup(ipwithport,webservice); 
    Setlabelvalue();
}


function managelogindata(formmodelid){

            if(typeof(Storage) !== "undefined") {                
                var aduname = sessionStorage.ADusername;
                var adpwd = sessionStorage.ADpassword;
                var ipwithport = sessionStorage.CMserverip;
                var webservice = sessionStorage.CMpointedservice;
                var ipwithportCUP = sessionStorage.CMUserverip;
                var PwebserviceCUP = sessionStorage.CMUpointedservice;
                
                if(ipwithport != null && webservice != null){                    
                    Getloginuserdata(aduname,ipwithport,webservice);
                } 
                else if(ipwithportCUP != null && PwebserviceCUP != null){
                    
                    Getloginuserdata(aduname,ipwithportCUP,PwebserviceCUP);
                }                
                var rolegroupid = sessionStorage.RoleID;
                var arrayloginuser_data = [aduname,adpwd,rolegroupid];
                
                var modelid = formmodelid;
                if(ipwithport != null && webservice != null){
                    CheckPageisaccess(modelid,rolegroupid,webservice,ipwithport);   
                } 
                else if(ipwithportCUP != null && PwebserviceCUP != null){
                    CheckPageisaccess(modelid,rolegroupid,PwebserviceCUP,ipwithportCUP);   
                }                
            } 
            else {
                alert("sessionemty");
            }
        }


function Loadrolegroup(serverip,pointed_webservice){
        
    var jason_data_object;
    try {
         
         var settings = {
         "async": false,
         "crossDomain": true,
         "url": "http://"+serverip+"/"+pointed_webservice+"/webresources/GenericResource_Select/getuserrole/",
         "contentType": "application/json",
         "method": "GET",
         "credentials": false,
         "headers":{
             'Access-Control-Allow-Origin': '*'},
        }
         
    
            $.ajax(settings).done(function (response) { 
           
            jason_data_object = response;   
            var jdset = jason_data_object;
                if(jdset !=null){
                    loaddropdownlist(jason_data_object);
                                             
                                }
                if(jdset == null){
                    window.alert("No role group available !")
                                }
                }); 
                                              
    } catch (e) {
        console.log("error"+e);
    }
           
}