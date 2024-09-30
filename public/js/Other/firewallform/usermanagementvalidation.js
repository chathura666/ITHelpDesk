
function validateemail() {

    //var x = document.forms["Userdata"]["ne_mail"].value;
    var mailformat = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (document.forms["Userdata"]["ne_mail"].value.match(mailformat)) { 
        $('#e_mail').css({ "border":"2px solid green"  });
        return true;
        
    }else{    
        //alert("You have entered an invalid email address! e.g. username@example.com");
//        $('#e_mail').css({ "border":"2px solid red"  });
//        document.forms["Userdata"]["ne_mail"].focus();
        //return false;
        return true;
    }

}

function validatepfno(){
    
     var pfno=document.forms["Userdata"]["nPFNo"].value;
     
     var lpfno = pfno.length;
     var pffirstdig = pfno.toString()[0];
     //alert(lpfno);
     
       if (lpfno ===0)
       {
           //document.getElementById('<%=TextBox1.ClientID %>').value="";
            alert("Please enter pf number or Nic !");
            document.forms["Userdata"]["nPFNo"].focus();
            $('#PF').css({ "border":"2px solid red"  });
            return false;
       }
       if(pffirstdig ==="-"){
           
            alert("Pf No cannot be negative !");
            document.forms["Userdata"]["nPFNo"].focus();
            $('#PF').css({ "border":"2px solid red"  });
            return false;
       }
       if(lpfno < 6)
       {
            alert("Please enter valid pf number or Nic !");
            document.forms["Userdata"]["nPFNo"].focus();
            $('#PF').css({ "border":"2px solid red"  });
            return false;
       }
       
       if(lpfno <lpfno <= 12)
       {
             $('#PF').css({ "border":"2px solid green"  });
             return true;
       }
       else{                
              alert("Not a valid PF Number.Please enter 6 Digits !");
//            $('#PF').css({ "border":"2px solid red"  });
        return false;
        }
   }
   
   function validatephoneno(){
       
       //var phoneno = document.forms["Userdata"]["nphoneno"].value;
       var filter = /^\d{10}$/;
       if(document.forms["Userdata"]["nphoneno"].value.match(filter)){
           $('#mobile_no').css({ "border":"2px solid green"  });
           return true;          
       }
       else{
           //alert("Not a valid Phone Number !");           
           //return false;
           return true;
       }
   }
   
   function validateusername(){
       
       var fname = document.forms["Userdata"]["nmfname"].value;
       //var filter=/^[a-zA-Z0-9]+$/;
       var filter=/^[a-zA-Z]+$/;
       if(!filter.test(fname))
       {
        alert("Numbers and space not allowed for first name !");
        //document.getElementById('<%=TextBox1.ClientID %>').value="";
        document.forms["Userdata"]["nmfname"].focus();
        $('#first_name').css({ "border":"2px solid red"  });
        return false;
       }

        if (fname !== "")
        {
            $('#first_name').css({ "border":"2px solid green"  });
            return true; 
        }
        else 
        {
            alert("Please input first name !");
            return false;
        }
   }
   
//   function validatelastname(){
//       var fname = document.forms["Userdata"]["nlname"].value;
//        if (fname !== "")
//        {
//            $('#last_name').css({ "border":"2px solid green"  });
//            return true; 
//        }
//        else 
//        {
//            //alert("Please input last name !");
//            //return false;
//            return true;
//        }
//   }
   
   function validatedepartment(){
       var dept = document.forms["Userdata"]["ndep"].value;
       var ldept = dept.length;
       var deptfirstdig = dept.toString()[0];
        
        if(ldept > 5)
        {
            alert("Department number Only allowed 5 digit !");
            document.forms["Userdata"]["ndep"].focus();
            $('#department').css({ "border":"2px solid red"  });
            return false;
        }
        if(deptfirstdig ==="-"){
           
            alert("Department numbe cannot be negative !");
            document.forms["Userdata"]["ndep"].focus();
            $('#department').css({ "border":"2px solid red"  });
            return false;
       }
        if (dept === "")
        {
            $('#department').css({ "border":"2px solid green"  });
            return true; 
        }
        else 
        {
           return true;
        }
   }

   



