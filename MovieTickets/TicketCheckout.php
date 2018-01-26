<?php
  require_once '../app/assets/SessionView.php';
 ?>

<html>
  <head>
    <title>UA Cinemas-Movie Times</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="../app/assets/css/mystylesPJJ.css">
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
                  <a id= "brand" class="navbar-brand page-scroll" href="../view/MovieListView.php">UA Cinemas</a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="../view/MovieListView.php">Home</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../MovieTimes.php">Buy Tickets</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../MovieAdd.php">Add Movie</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../AddReview.php">Add Review</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../ReviewList.php">Movie Reviews</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../UpdateMovie">Update/Delete</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../logout.php">Log out</a>
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
        <h1>Checkout</h1>
        <img id ="AndAction" src="../app/assets/img/clapper.svg">
      </div>
    </header>

    <?php
    $emailuser = $_SESSION['email'];
    require_once '../util/dbinfo.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error) die($conn->connect_error);

    $emailuser = $_SESSION['email'];
    $query3 = "SELECT cust_id FROM customer WHERE email = '$emailuser'";
  	$result3 = $conn->query($query3); // -> means "run"
  	if(!$result3) die($conn->error);

  	$rows3 = $result3->num_rows;
  	for($j=0; $j<$rows3; $j++){
  		$result3->data_seek($j);
  		$row = $result3->fetch_array(MYSQLI_ASSOC);
  		$cust_id = $row['cust_id'];//name of column for MYSQLI_ASSOC, MYSQLI_NUM would be 3 for the 3rd column in database
  	}

    $query2 = "SELECT ticket_num FROM ticket_sales WHERE cust_id = '$cust_id'";

  	$result2 = $conn->query($query2); // -> means "run"
  	if(!$result2) die($conn->error);

  	$rows2 = $result2->num_rows;
  	for($j=0; $j<$rows2; $j++){
  		$result2->data_seek($j);
  		$row = $result2->fetch_array(MYSQLI_ASSOC);
  		$ticket_num = $row['ticket_num'];//name of column for MYSQLI_ASSOC, MYSQLI_NUM would be 3 for the 3rd column in database
  	}

		$query = "select * from customer where email='$emailuser'";
		$result = $conn->query($query);
		if(!$result) die($conn->error);

		$rows = $result->num_rows;

		for($j=0; $j < $rows; ++$j){
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_ASSOC);

			$lastname = $row['last_name'];
			$firstname = $row['first_name'];
			$email = $row['email'];
			$cc = $row['cc_no'];

			echo <<<_END
      <form class="form-horizontal" method="POST" action="TicketReceipt.php">
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <input type="text" class="form-control" id="email" name='firstname' value='$firstname'>
            *First Name
          </div>

        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <input type="text" class="form-control" id="hashed_password" name='lastname' value='$lastname'>
            *Last Name
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <input type="text" class="form-control" id="hashed_password" name='email' value='$email'>
            *Email
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <input type="text" class="form-control" id="hashed_password" name='cc' value='$cc'>
            *Credit Card
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <input type="text" class="form-control" id="hashed_password" name='ticket_num' value='$ticket_num'>
            *Number of Tickets
          </div>
        </div>

        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-6">
            <input type='hidden' name='verify' value='yes'>
            <button type="submit" class="btn btn-default">Submit</button>
          </div>
        </div>
      </form>
_END;

		}

?>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <!-- jQuery has to be loaded before js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
