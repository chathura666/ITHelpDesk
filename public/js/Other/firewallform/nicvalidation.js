/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * coded by lakmal
 */
function ValidateNIC(){
    
 var newnic = document.forms["Customerdata"]["confirmnic"].value;
 var fistInput = document.forms["Customerdata"]["newnic"].value;
 var secondInput = document.forms["Customerdata"]["confirmnic"].value;
 var numberspart = newnic.substring(0, 9);

 if(newnic.length === 10)
 {
     
     var lastdigit = newnic.toString().split('').pop();
        if((lastdigit === "V")||(lastdigit === "X")||(lastdigit === "v")||(lastdigit === "x"))
        {
           if(numberspart.match(/[a-z]/i))
            {
                $('#confirmnic').css({ "border":"2px solid red"  });
                $('#newnic').css({ "border":"2px solid red"  });                        
                event.preventDefault();
                return false;
            }
            
            return true;
        }
        
        else{
                $('#confirmnic').css({ "border":"2px solid red"  });
                $('#newnic').css({ "border":"2px solid red"  });                       
                event.preventDefault();
                return false;
        }
        
}
if(newnic.length === 12)
{
    if (newnic.match(/[a-z]/i))
    {
        $('#confirmnic').css({ "border":"2px solid red"  });
        $('#newnic').css({ "border":"2px solid red"  });                       
        event.preventDefault();
        return false;
    }
    
    else{
        if (fistInput === secondInput) {
            return true;
        } else if (fistInput > secondInput) {
            $('#confirmnic').css({ "border":"2px solid red"});
            $('#newnic').css({ "border":"2px solid red"});                       
            event.preventDefault();
            return false;
        } else {
            $('#confirmnic').css({ "border":"2px solid red"});
            $('#newnic').css({ "border":"2px solid red"});                       
            event.preventDefault();
           return false;
        }
        
        return false;
    }
}
if(newnic.length !== 10)
 {
        $('#confirmnic').css({ "border":"2px solid red"  });
        $('#newnic').css({ "border":"2px solid red"  });                        
        event.preventDefault();
        return false;
 }
}


function Getuserdata(searchval,searchop){
                            $("#tbody").text("");
                            var json_data_object;
                                try{
                                    var nic,mobile='';
                                    if(searchop==='nic' && searchop!=='mobile')
                                    {
                                        nic = searchval;
                                        mobile = ''
                                                    var settings = {
                                                        "async": false,
                                                        "crossDomain": true,
                                                        //"url": "https://passbook.boc.lk/BOCPassbook_UAT/webresources/customerService/getCustomerByMobile/0765414681",
                                                        //"url": "https://passbook.boc.lk/BOCPassbook_UAT/webresources/customerService/getCustomerByNic/"+nic,
                                                        "url": "https://172.20.50.171/BOCPassbook/webresources/customerService/getCustomerByNic/"+nic,                                                     
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
                                                        //"url": "https://passbook.boc.lk/BOCPassbook_UAT/webresources/customerService/getCustomerByMobile/"+mobile,
                                                        "url": "https://172.20.50.171/BOCPassbook/webresources/customerService/getCustomerByMobile/"+mobile,
                                                        //"url": "https://passbook.boc.lk/BOCPassbook_UAT/webresources/customerService/getCustomerByNic/"+nic,
                                                        "method": "GET",
                                                        "content-type": "application/json",
                                                    }
                                    }

				 $.ajax(settings).done(function (response) {
                                   json_data_object = response;   
                                   var jdset = json_data_object;                                  
                                    if(jdset !==null){                                         
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