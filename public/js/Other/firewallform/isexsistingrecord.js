/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function Isexsistinguser(pfno){
    
    var jason_data_object;
    var vexresult = "";
    var ipwithport = sessionStorage.UserServer_IP;
    var webservice = sessionStorage.UserWebservice;
    try {
         
         var settings = {
         "async": false,
         "crossDomain": true,
         "url": "http://"+ipwithport+"/"+webservice+"/webresources/GenericResource_Select/getuserdetail/?pfno="+pfno,
         "contentType": "application/json",
         "method": "GET",
         "credentials": false,
         "headers":{
             'Access-Control-Allow-Origin': '*'},
        }
         
            
            $.ajax(settings).done(function (response) { 
            
            jason_data_object = response[0];             
            var jdset = jason_data_object;
                if(jdset !=null){
                    
                    vexresult = "1";
                    alert("Pfno number has already been entered !");
                    $('#PF').css({ "border":"2px solid red"  });
                    event.preventDefault();
                    
                                }
                                
                if(jdset == null){
                    
                    vexresult = "0";
                    $('#PF').css({ "border":"2px solid green"  });
                    
                                }
                }); 
        
                                               
    } catch (e) {
        console.log("error"+e);
    }
    
    
    return(vexresult);
       
    
}


