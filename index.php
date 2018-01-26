<?php
require_once 'util/dbinfo.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['verify'])){
  if(empty($_POST['email']) && empty($_POST['hashed_password'])){
    $msg = "You need to fill out all the boxes";
  } elseif($_POST['email'] != ''  && $_POST['hashed_password'] != '' ){

    function mysql_entities_fix_string($conn, $string){
    	return htmlentities(mysql_fix_string($conn, $string));
    }

    function mysql_fix_string($conn, $string){
    	if(get_magic_quotes_gpc()) $string = stripslashes($string);
    	return $conn->real_escape_string($string);
    }

    $tmp_email = mysql_entities_fix_string($conn, $_POST['email']);
  	$tmp_password = mysql_entities_fix_string($conn, $_POST['hashed_password']);

  	//get password from DB w/ SQL
  	$query = "SELECT hashed_password FROM customer WHERE email = '$tmp_email'";

  	$result = $conn->query($query); // -> means "run"
  	if(!$result) die($conn->error);

  	$rows = $result->num_rows;
  	$hashed_password="";
  	for($j=0; $j<$rows; $j++){
  		$result->data_seek($j);
  		$row = $result->fetch_array(MYSQLI_ASSOC);
  		$hashed_password = $row['hashed_password'];//name of column for MYSQLI_ASSOC, MYSQLI_NUM would be 3 for the 3rd column in database
  	}

    //Salt and Hash incoming password
  	$salt1 = 'qm&h*';
  	$salt2 = 'pg!@';
  	$token = hash('ripemd128',"$salt1$tmp_password$salt2"); //hash is what hashes the password with the salt

  	//Compare passwords
  	if($token == $hashed_password){

  		session_start();//this must be called anywhere you want to use a session
  		$_SESSION['email'] = $tmp_email;
  		$_SESSION['hashed_password'] = $hashed_password; //this is the plaintext, not hashed password
  		//$_SESSION['forename'] = $tmp_username;
  		//$_SESSION['surname'] = $tmp_username;

      function redirect_to($location) {
        header("Location: " . $location);
        //exit;
      }

      //$result->close(); //not required, but good practice or it will eat your resources
      //header("Location: viewRecord.php");//this will return you to the view all page
      redirect_to('view/MovieListView.php');

    } else{
      $msg = "Email or Password is incorrect";
      function redirect_to($location) {
        header("Location: " . $location);
        //exit;
      }

      //$result->close(); //not required, but good practice or it will eat your resources
      //header("Location: viewRecord.php");//this will return you to the view all page
      redirect_to('index.php');
    }

  } else{
    function redirect_to($location) {
      header("Location: " . $location);
      //exit;
    }

    //$result->close(); //not required, but good practice or it will eat your resources
    //header("Location: viewRecord.php");//this will return you to the view all page
    redirect_to('index.php');
  }
}


?>



<html>
  <head>
    <title>UA Cinemas</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <link rel="stylesheet" href="app/assets/css/mystylesPJJ.css">
  </head>
  <body>
  <!-- Navbar -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a id= "brand" class="navbar-brand page-scroll" href="index.php">UA Cinemas</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                  <li>
                      <a class="page-scroll" href="CreateUser.php">Sign Up</a>
                  </li>

              </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header id ="try">
      <div class="jumbotron text-center">
        <h1>Movie List</h1>
        <img id ="AndAction" src="app/assets/img/clapper.svg">
      </div>
    </header>

    <div class="container">
      <div class="col-sm-12 text-center">
        <?php if(isset($msg)){ ?>
        <div class="alert alert-danger">
          <strong>Error!</strong>
          <?  print_r($msg);
         }
          ?>
        </div>
      </div>
    </div>

    <!--Form-->
<div class="container text-center">
  <h2>Sign In</h2>
  <form class="form-horizontal" method="POST" action="index.php">
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" readonly
     onfocus="this.removeAttribute('readonly');">
        *Enter Email
      </div>

    </div>
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <input type="password" class="form-control" id="hashed_password" placeholder="Enter password" name="hashed_password" autocomplete="off">
        *Enter Password
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <a href="CreateUser.php">Don't have an account?</a><br /><br />
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-6">
        <input type='hidden' name='verify' value='yes'>
        <button type="submit" class="btn btn-default" onclick="FormValidationColor()">Submit</button>
      </div>
    </div>
  </form>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <!-- jQuery has to be loaded before js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type='text/javascript' src='app/assets/js/validateSignIn.js'></script>
  </body>
</html>
