/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * script for get customer data using webservice.
 */
function Pageload(formmodelid){
    
    managelogindata(formmodelid); 
    Setlabelvalue();
   
}

function managelogindata(formmodelid){

            if(typeof(Storage) !== "undefined") {                
                var aduname = sessionStorage.ADusername;
                var adpwd = sessionStorage.ADpassword;
                Getloginuserdata(aduname);
                var rolegroupid = sessionStorage.RoleID;
                var arrayloginuser_data = [aduname,adpwd,rolegroupid];
                
                var modelid = formmodelid;
                CheckPageisaccess(modelid,rolegroupid);
   
            } 
            else {
                alert("sessionemty");
            }
        }


function UserAction(searchval,searchop){
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
                                                        "url": "https://172.20.50.171/BOCPassbook/webresources/customerService/getCustomerByNic/"+nic,    //LIVE
                                                        //"url": "https://172.20.50.171/BOCPassbookUAT/webresources/customerService/getCustomerByNic/"+nic,    //UAT
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
                                                        "url": "https://172.20.50.171/BOCPassbook/webresources/customerService/getCustomerByMobile/"+mobile,  // Live
                                                        //"url": "https://172.20.50.171/BOCPassbookUAT/webresources/customerService/getCustomerByMobile/"+mobile, //UAT
                                                        "method": "GET",
                                                        "content-type": "application/json",
                                                    }
                                    }

				 $.ajax(settings).done(function (response) {
                                   json_data_object = response;   
                                   var jdset = json_data_object;
                                    if(jdset !== null){                                         
                                            generateTable(json_data_object);
                                            var title = json_data_object.salutation;
                                            var name = json_data_object.name;
                                            var nicno = json_data_object.nicNumber;
                                            var cifno = json_data_object.cifNumber;
                                            var dob = json_data_object.dateofbirth;
                                            var sex = json_data_object.sex;
                                            var status = json_data_object.status;
                                            var noofdevice = json_data_object.noOfDevices;
                                            var mobileno = json_data_object.mobileNo;

                                            $("#title").val(title);
                                            $("#name").val(name);
                                            $("#nic").val(nicno);
                                            $("#cifno").val(cifno);
                                            $("#mobile").val(mobileno);
                                            $("#dob").val(dob);
                                            $("#sex").val(sex);
                                            $("#status").val(status);
                                            $("#noofdevice").val(noofdevice);
                                        }
                                        if(jdset === null)
                                        {
                                            window.alert("No such user !")
                                        }
                                 });
                                   }catch(e){
                                       console.log("error"+e);                                   
                                   }
                                }  

