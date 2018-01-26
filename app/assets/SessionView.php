<?php

session_start();

if(!isset($_SESSION['email']))//if the username is NOT in session
{
  function redirect_to($location) {
    header("Location: " . $location);
    exit;
  }

  //$result->close(); //not required, but good practice or it will eat your resources
  //header("Location: viewRecord.php");//this will return you to the view all page
  redirect_to('../index.php');
}


?>
