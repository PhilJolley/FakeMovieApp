<?php
session_start(); //this must be used every time you want to use the session. Even to end it.


if(isset($_SESSION['email']))
{
	$_SESSION = array();
	setCookie(session_name(), '', time()-2592000, '/');
	session_destroy();
	function redirect_to($location) {
		header("Location: " . $location);
		//exit;
	}

	//$result->close(); //not required, but good practice or it will eat your resources
	//header("Location: viewRecord.php");//this will return you to the view all page
	redirect_to('index.php');
}





?>
