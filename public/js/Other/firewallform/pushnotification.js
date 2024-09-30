/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * created by lakmal
 **/

function Pageload(formmodelid){
    var pointed_webservice = localStorage.getItem("UserServer_IP");
    var ipwithport = sessionStorage.UserServer_IP;
    var webservice = sessionStorage.UserWebservice;
 
    Setlabelvalue();
}


function savepushdata(arraypush_data,serverip,servicename){
    try{
        alert(serverip,servicename);
        var savepushdata_pointed_web_service = servicename;
        var pushnotifjasonobject = {"pfno":arraypush_data[0], "notiftitle":arraypush_data[1], "notif":arraypush_data[2], "senddate":arraypush_data[3]};
        var userJSON = JSON.stringify(pushnotifjasonobject);
    
        var settings = {
         "async": false,
         "crossDomain": true,
         "url": "http://"+serverip+"/"+savepushdata_pointed_web_service+"/webresources/GenericResource_Pushnotification/Insertpushnotificationdata/",
         "url": "",
         "contentType": "application/json",
         "method": "POST",
         "credentials": false,
         "data":userJSON,
         "headers":{
             'Access-Control-Allow-Origin': '*'},
        }
        
         $.ajax(settings).done(function (response) { 
          //jason_data_object = response;   
          //var jdset = jason_data_object; 
         //alert("Record Added !");  
            
         });
        
    }catch(e){
        alert(e);
    }
    
    //alert(userJSON);
}


function sendpushmessage()
            {
                  var settings = {
                      "async": true,
                      "crossDomain": true,
                      "url": "https://fcm.googleapis.com/fcm/send",
                      "method": "POST", 
                      "headers": {
                        "content-type": "application/json",
                        "authorization": "key=AIzaSyAlWnkdbxz4XkLoIMmig24eU_M5UEZqU0M",
                        //"cache-control": "no-cache",
                        //"postman-token": "a83e1d76-1eb6-c30b-d450-0ad3b2c5b324",
                        //"Access-Control-Allow-Origin": "https://localhost:8383"
                      },
                      "processData": false,
                      "data": "{\n\t\"to\":\"e0rbApN6e_g:APA91bF69dPzlQgHxhjnEVD9cuI2OwOJoXoMPX85V2oUbb7mAnmx7FEqgCldWQ5XPKo8XboKV628_56TJlgmqowurw_jkFN6G34CnWwxggn2jYxhdNOynIa1ZzxKdCYa4xqzJiDvJkla\",\n\t\"content_available\":true,\n\t\"notification\":{\n\t\t\"title\": \"BOC SMART PASSBOOK\",\n\t\t\"body\":\"Postman Push Notification Check_11\",\n\t\t\"click_action\":\"fcm.ACTION.HELLO\"\n\t},\n\t\"data\":{\n\t\t\"extra\":\"juice\"\n\t}\n\t\n}"
                    }

                  $.ajax(settings).done(function (response) {
                  console.log(response);
                });    
                            }


