function FormValidationColor(){
//First Name Validation
    var fn=document.getElementById('email').value;
    var fn2=document.getElementById('hashed_password').value;
    if(fn == "" && fn2 == ""){
        //alert('Please Enter First Name');
        alert("Email and Password must be filled out");
        //document.getElementsByTagName('input')[0].style.borderColor = "red";
        //document.getElementsByTagName('input')[0].style.borderWidth = "4px";
        return false;
    } else if(fn2 == ""){
      alert("Password must be filled out");
      document.getElementById('hashed_password').style.borderColor = "red";
      return false;
    } else if(fn == ""){
      alert("Email must be filled out");
      document.getElementById('hashed_password').style.borderColor = "red";
      return false;
    } else{
        document.getElementById('email').style.borderColor = "green";
        document.getElementById('hashed_password').style.borderColor = "green";
    }

}
