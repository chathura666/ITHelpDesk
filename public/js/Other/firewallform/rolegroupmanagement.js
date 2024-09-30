/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function LoadrolegroupRoleMgt(pointed_web_service,server_ip){

    var jason_data_object;
    try {
         
         var settings = {
         "async": false,
         "crossDomain": true,
         "url": "http://"+server_ip+"/"+pointed_web_service+"/webresources/GenericResource_Rolemanagement/getuserrole/",
         "contentType": "application/json",
         "method": "GET",
         "credentials": false,
         "headers":{
             'Access-Control-Allow-Origin': '*'},
        }
            $.ajax(settings).done(function (response) { 
            jason_data_object = response;   
            var jdset = jason_data_object;
                if(jdset != null){
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

function LoadModuleTable(pointed_web_service,server_ip){
    

    
    try {
        
        var settings = {
         "async": false,
         "crossDomain": true,
         "url": "http://"+server_ip+"/"+pointed_web_service+"/webresources/GenericResource_Rolemanagement/getmodel/",
         "contentType": "application/json",
         "method": "GET",
        }
        $.ajax(settings).done(function (response) {
                json_data_object = response;   
                var jdset = json_data_object;
                    
                    if(jdset !==null){
                                        
                        generateUserTable(json_data_object);
                        }
                    if(jdset === null)
                        {
                            window.alert("No such\n\
             user !")
                        }
                                 });
        
    } catch (e) {
        console.log("error"+e);
    }

}


function Savemodelmgtdata(rolegroup, Pointedwebservice){
    
    if(sessionStorage.RolegrpmgtServer_IP !== "" && sessionStorage.RolegrpmgtWebservice !== ""){
        var jsonchekval = [];
        jsonchekval=createJSON(rolegroup);   
        Sendrolemgtdata(jsonchekval,Pointedwebservice);
        console.log(jsonchekval);
    }
    else{
        var redirectid = localStorage.getItem("serveripwithport");        
        window.location = 'http://'+redirectid+'/smartpassbook/production/index.html';
    }
}

 function createJSON(rolegroup){
            var jsonArr = [];
            var isChecked;
            var id;
            var roleid;
            var mid;
            var mname;
            var lastPart;
            
             $('#tblmodel').find('input[type="checkbox"]').each(function() {
                if ($(this).prop("checked") == true){                    
                    id = $(this).attr('id'); 
                    lastPart = id.split('_')[1];
                    roleid = rolegroup;
                    isChecked = "1";
                    mid = $("#mid_"+lastPart).text();
                    mname = $("#mname_"+lastPart).text();
                    jsonArr.push({"rlgrpid":roleid,"id":id,"isChecked":isChecked,"mid":mid,"mname":mname});
                    
  
                }
                else{
                    id = $(this).attr('id');
                    lastPart = id.split('_')[1];
                    roleid = rolegroup;
                    isChecked = "0";
                    mid = $("#mid_"+lastPart).text();
                    mname = $("#mname_"+lastPart).text();
                    jsonArr.push({"rlgrpid":roleid,"id":id,"isChecked":isChecked,"mid":mid,"mname":mname});
                }
            });
           console.log(jsonArr);
           return jsonArr;
        }
        
        
function Sendrolemgtdata(arrayrolemgt_data, Pointedwebservice){
     
    var pointed_webs_ervice = sessionStorage.RolegrpmgtWebservice;
    var server_ip = sessionStorage.RolegrpmgtServer_IP;
    
        if(pointed_webs_ervice !== "" && server_ip !== ""){
                try{

                    var RolemgtJSON = JSON.stringify(arrayrolemgt_data);


                    var settings = {
                     "async": false,
                     "crossDomain": true,
                     "url": "http://"+server_ip+"/"+pointed_webs_ervice+"/webresources/GenericResource_Rolemanagement/Insertrolemanagement/", 
                     "contentType": "application/json",
                     "method": "POST",
                     "credentials": false,
                     "data":RolemgtJSON,
                     "headers":{
                         'Access-Control-Allow-Origin': '*'},
                    }

                     $.ajax(settings).done(function (response) { 
                      jason_data_object = response;   
                      var jdset = jason_data_object; 


                     });

                }catch(e){
                    alert(e);
                }

        } 
        
        else{
            var redirectid = localStorage.getItem("serveripwithport");        
            window.location = 'http://'+redirectid+'/smartpassbook/production/index.html';
        }
 
 }


            //function LoadAssignedModel(usergroup){
function LoadModeltorole(usergroup){    

                var modelserverip = sessionStorage.RolegrpServer_IP;
                var modelwebservice = sessionStorage.RolegrpWebservice;                
                if((typeof modelserverip === 'undefined') || (typeof modelwebservice === 'undefined')){
                     var modelserverip = sessionStorage.RolegrpmgtServer_IP;
                     var modelwebservice = sessionStorage.RolegrpmgtWebservice;
                }
                var jason_data_object;
                try {

                     var settings = {
                     "async": false,
                     "crossDomain": true,
                     "url": "http://"+modelserverip+"/"+modelwebservice+"/webresources/GenericResource_Rolemanagement/getassignmodel/?usergroup="+usergroup,
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
                               //$("#tbody").empty()
                               //$("#tblmodel").empty();
                               $("#tbody").empty();
                               generateAssignModelTable(jason_data_object);

                                            }
                            if(jdset == null){
                                window.alert("No Models for selected role !")
                                            }
                            }); 


                } catch (e) {
                    console.log("error"+e);
                }
    
}


function Loadassignmodel(usergroup){    

                var modelserverip = sessionStorage.RolegrpServer_IP;
                var modelwebservice = sessionStorage.RolegrpWebservice;                
                if((typeof modelserverip === 'undefined') || (typeof modelwebservice === 'undefined')){
                     var modelserverip = sessionStorage.RolegrpmgtServer_IP;
                     var modelwebservice = sessionStorage.RolegrpmgtWebservice;
                }
                var jason_data_object;
                try {

                     var settings = {
                     "async": false,
                     "crossDomain": true,
                     "url": "http://"+modelserverip+"/"+modelwebservice+"/webresources/GenericResource_Rolemanagement/getassignmodeltoroll/?rolegroup="+usergroup,
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
                               //$("#tbody").empty()
                               //$("#tblmodel").empty();
                               $("#tbody").empty();
                               generateAllocatedModelTable(jason_data_object);

                                            }
                            if(jdset == null){
                                window.alert("No Models for selected role !")
                                            }
                            }); 


                } catch (e) {
                    console.log("error"+e);
                }
    
}