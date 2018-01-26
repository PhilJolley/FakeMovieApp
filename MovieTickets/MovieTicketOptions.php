<?php
require_once '../util/dbinfo.php';
session_start();

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);
if(isset($_POST['verifytime'])){
	$verifytime = $_POST['time'];
	$_SESSION['time']=$verifytime;
}

//session_start();
//$cust_id = $_SESSION['cust_id'];

//echo $cust_id.'<br>';
$query = "select * from tickets where type='add'";
$result = $conn->query($query);
if(!$result) die($conn->error);

$rows = $result->num_rows;
if(isset($_POST['verify'])){
	if(isset($_POST['moreServices'])){

		$emailuser = $_SESSION['email'];
		$query = "SELECT cust_id FROM customer WHERE email = '$emailuser'";
		$result = $conn->query($query); // -> means "run"
		if(!$result) die($conn->error);

		$rows = $result->num_rows;
		$hashed_password="";
		for($j=0; $j<$rows; $j++){
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_ASSOC);
			$cust_id = $row['cust_id'];//name of column for MYSQLI_ASSOC, MYSQLI_NUM would be 3 for the 3rd column in database
		}
		$moreServices = $_POST['moreServices'];
		$ticket_num = $_POST['ticket_num'];

		for($i=0; $i<count($moreServices); $i++){
			$ticket_id = $moreServices[$i];
			$today = date('Y-m-d');
			$query3 = "insert into ticket_sales (sales_date, ticket_id, cust_id, ticket_num)
				values ('$today','$ticket_id', '$cust_id', '$ticket_num') ";

			$result = $conn->query($query3);
			if(!$result) die($conn->error);
		}
		function redirect_to($location) {
			header("Location: " . $location);
			//exit;
		}

		//$result->close(); //not required, but good practice or it will eat your resources
		//header("Location: viewRecord.php");//this will return you to the view all page
		redirect_to('TicketCheckout.php');


		//header("Location: BS-ViewService.php");
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
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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

<header>
      <div class="jumbotron text-center">
        <h1><strong>Movie Ticket Options</strong></h1>
        <img id ="AndAction" src="../app/assets/Img/clapper.svg">
      </div>
</header>

<div id="addService" class="container-fluid bg-grey">
  <h2 class="text-center">Please Select Number of Tickets</h2>
  <form method='post' action='MovieTicketOptions.php'>
  <div class="row">
    <div class="col-sm-12">
      <div class="row">
        <div class="col-sm-4 form-group">
        </div>
        <div class="col-sm-4 form-group">


<?php
		//echo $verifytime;
		for($j=0; $j < $rows; ++$j){
			$result->data_seek($j);
			$row = $result->fetch_array(MYSQLI_ASSOC);

			$id = $row['ticket_id'];
			$service = $row['ticket_type'];
			$price = $row['ticket_price'];

			echo <<<_END

			<div class="checkbox">
				<label><input type="checkbox" name='moreServices[]' value="$id">$service ($$price)</label>
			</div>

_END;

		}

		?>

        </div>
		<div class="col-sm-4 form-group">
        </div>
      </div>
			<form class="form-inline" method = "post" action="MovieTicketOptions.php">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Enter # of Tickets" name='ticket_num' id="ticket">
				</div>
			</form>

	  <div class="row">
        <div class="col-sm-12 form-group text-center">
					<input type='hidden' name='verify' value='yes'>
			<button class="btn btn-default" type="submit">Submit</button>
        </div>
      </div>
    </div>
  </div>
  </form>
</div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <!-- jQuery has to be loaded before js -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type='text/javascript' src='../app/assets/js/validateSignIn.js'></script>
</body>
</html>
