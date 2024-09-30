/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function TermsandConditionPageload(formmodelid){
    
    managelogindata(formmodelid);
    Gettermscondition();
    Setlabelvalue();
    
}

function managelogindata(formmodelid){

            if(typeof(Storage) !== "undefined") {                
                var aduname = sessionStorage.ADusername;
                var adpwd = sessionStorage.ADpassword;
                var serverip = sessionStorage.Globalserverip;
                var webservice = sessionStorage.Globalwebservice;
                Getloginuserdata(aduname,serverip,webservice);
                var rolegroupid = sessionStorage.RoleID;
                var arrayloginuser_data = [aduname,adpwd,rolegroupid];
                
                var modelid = formmodelid;
                CheckPageisaccess(modelid,rolegroupid,webservice,serverip);
   
            } 
            else {
                alert("sessionemty");
            }
        }


function Gettermscondition(){
                            $("#tbltermbody").text("");
                            var json_data_object;
                                try{
                                        var settings = {
                                        "async": false,
                                        "crossDomain": true,
                                        "url": "https://172.20.50.171/BOCPassbook/webresources/commonService/termsAndConditions",                                                    
                                        "method": "GET",
                                        "content-type": "application/json",
                                                    }

				 $.ajax(settings).done(function (response) {
                                   json_data_object = response;   
                                   var jdset = json_data_object;
                                   //window.alert(jdsize);
                                    if(jdset !=null){
                                         
                                            generateTable(json_data_object);
                                             
                                        }
                                        if(jdset == null)
                                        {
                                            window.alert("No role group  !")
                                        }
                                    //}
                                    //else{window.alert("No such user !");}
                                 });
                                   }catch(e){
                                       console.log("error"+e);
                                       //window.alert("AA");
                                   }
                                }
