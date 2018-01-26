function FormValidationColor2(){
//First Name Validation
    var fn=document.getElementById('first_name').value;
    var fn2=document.getElementById('last_name').value;
    var fn3=document.getElementById('email').value;
    var fn4=document.getElementById('hashed_password').value;
    if(fn == "" && fn2 == "" && fn3 == "" && fn4 == ""){
        //alert('Please Enter First Name');
        alert("The whole form must be filled out");
        //document.getElementsByTagName('input')[0].style.borderColor = "red";
        //document.getElementsByTagName('input')[0].style.borderWidth = "4px";
        return false;
    } else if(fn == "" || fn2 == "" || fn3 == "" || fn4 == ""){
      alert("One or more fields must be filled out");
      //document.getElementById('hashed_password').style.borderColor = "red";
      return false;
    } else{
        document.getElementById('email').style.borderColor = "green";
        document.getElementById('hashed_password').style.borderColor = "green";
    }

}
