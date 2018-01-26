<?php
  require_once 'SessionView.php';
 ?>

<html>
  <head>
    <title>UA Cinemas-Movie Details</title>
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
                        <a class="page-scroll" href="../MovieTickets/JasonMovieTimes.php">Buy Tickets</a>
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
