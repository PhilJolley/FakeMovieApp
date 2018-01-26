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
        <h1><strong>Movie Times</strong></h1>
        <img id ="AndAction" src="../app/assets/Img/clapper.svg">
      </div>
</header>

<section>
  <div class='row'>
    <div class='col-sm-4'>
      <div class="list-group">
        <li class="list-group-item">Movies</li>
        <a href="JasonMovieTimes.php" id="MovieList" class="list-group-item">Jason Bourne</a>
        <a href="ItMovieTimes.php" id="MovieList" class="list-group-item active">It</a>
        <a href="FridayMovieTimes.php" id="MovieList" class="list-group-item">Friday Night Lights</a>
        <a href="RiverdaleMovieTimes.php" id="MovieList" class="list-group-item">Riverdale</a>
      </div>
    </div>

    <form class="form" method="post" action="MovieTicketOptions.php">
      <div class="col-sm-4">
        <div class="thumbnail">
          <div class="caption">
            <h3><?php
            $today = date('m/d/y');
            echo $today;

            ?></h3>
            <p>Movie Times</p>
            <div class="form-group">
              <input type='hidden' name='verifytime' value='yes'>
              <button class="btn btn-primary" name="time" value="It at 11:00 am" type="submit">11:00 am</button> <button class="btn btn-primary" name="time" value="It at 1:30 pm" type="submit">1:30 pm</button> <button class="btn btn-primary" name="time" value="It at 4:00 pm" type="submit">4:00 pm</button> <button class="btn btn-primary" name="time" value="It at 6:00 pm" type="submit">6:00 pm</button>
              <button class="btn btn-primary" name="time" value="It at 9:00 pm" type="submit">9:00 pm</button>
            </div>
          </div>
        </div>
    </div>
  </form>
  </div>
</section>



  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <!-- jQuery has to be loaded before js -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type='text/javascript' src='../app/assets/js/validateSignIn.js'></script>
</body>
</html>
