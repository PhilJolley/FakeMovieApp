<?php
  require_once '../app/assets/SessionView.php';
  session_start();
  $verifytime = $_SESSION['time'];

  require_once '../util/dbinfo.php';

  $conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);

  if(isset($_POST['verify'])){

    $ticket_num = $_POST['ticket_num'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $cc = $_POST['cc'];

    $emailuser = $_SESSION['email'];
    $query5 = "SELECT cust_id FROM customer WHERE email = '$emailuser'";
		$result5 = $conn->query($query5); // -> means "run"
		if(!$result5) die($conn->error);

		$rows5 = $result5->num_rows;
		for($j=0; $j<$rows5; $j++){
			$result5->data_seek($j);
			$row = $result5->fetch_array(MYSQLI_ASSOC);
			$cust_id = $row['cust_id'];//name of column for MYSQLI_ASSOC, MYSQLI_NUM would be 3 for the 3rd column in database
		}
    $query2 = "UPDATE ticket_sales SET ticket_num = '$ticket_num' WHERE cust_id = '$cust_id'";
		$result2 = $conn->query($query2); // -> means "run"
		if(!$result2) die($conn->error);

    if($ticket_num < strlen("1234567891123456")){
      $query3 = "UPDATE customer SET first_name = '$firstname', last_name = '$lastname', email = '$email', cc_no = '$cc' where email='$emailuser'";
  		$result3 = $conn->query($query3); // -> means "run"
  		if(!$result3) die($conn->error);
    } else{
      $msg = "Credit Card is too long";
    }


    $query4 = "SELECT ticket_num FROM ticket_sales WHERE cust_id = '$cust_id'";
  	$result4 = $conn->query($query4); // -> means "run"
  	if(!$result4) die($conn->error);
  	$rows4 = $result4->num_rows;
  	for($j=0; $j<$rows4; $j++){
  		$result4->data_seek($j);
  		$row = $result4->fetch_array(MYSQLI_ASSOC);
  		$ticket_num = $row['ticket_num'];//name of column for MYSQLI_ASSOC, MYSQLI_NUM would be 3 for the 3rd column in database
  	}

  }
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

    <?php
    $emailuser = $_SESSION['email'];
    require_once '../util/dbinfo.php';

    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error) die($conn->connect_error);

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

      <div class="container text-center">
        <h2>Receipt</h2>
        <p>Here is your Receipt and Movie Ticket</p>
        <table class="table">
          <thead>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Credit Card</th>
              <th>Movie Time</th>
              <th># of Tickets</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>$firstname</td>
              <td>$lastname</td>
              <td>$email</td>
              <td>$cc</td>
              <td>$verifytime</td>
              <td>$ticket_num</td>
            </tr>
          </tbody>
        </table>
      </div>


_END;

		}

?>

<section>
  <div class="row">
    <div class='col-sm-12 text-center'>
      <a href="JasonMovieTimes.php" class="btn btn-primary" role="button">Buy Tickets Again</a>
    </div>
  </div>
</section>







    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <!-- jQuery has to be loaded before js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
