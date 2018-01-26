<?php
  require_once 'util/dbinfo.php';
  require_once 'CheckSession.php';

  $conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);

  $query = "SELECT * FROM review ORDER BY movie_id ASC";
  $result = $conn->query($query);
  if(!$result) die($conn->error);

  $rows = $result->num_rows;

?>



<html>
  <head>
    <title>UA Cinemas-Movie Review</title>
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
                  <a id= "brand" class="navbar-brand page-scroll" href="view/MovieListView.php">UA Cinemas</a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav navbar-right">
                      <li>
                          <a class="page-scroll" href="view/MovieListView.php">Home</a>
                      </li>
                      <li>
                          <a class="page-scroll" href="MovieAdd.php">Add Movie</a>
                      </li>
                      <li>
                          <a class="page-scroll" href="AddReview.php">Add Review</a>
                      </li>
                      <li>
                          <a class="page-scroll" href="ReviewList.php">Movie Reviews</a>
                      </li>
                      <li>
                          <a class="page-scroll" href="UpdateMovie.php">Update/Delete</a>
                      </li>
                      <li>
                          <a class="page-scroll" href="logout.php">Log out</a>
                      </li>
                  </ul>
              </div>
              <!-- /.navbar-collapse -->
          </div>
          <!-- /.container-fluid -->
      </nav>
      <!-- Header -->
      <header>
        <div class="jumbotron text-center">
          <h1><strong>Movie Review</strong></h1>
          <img id ="AndAction" src="app/assets/img/clapper.svg">
        </div>
      </header>

      <section>
            <div class="container text-center">
              <h2>Recently Added Reviews</h2>
              <p>The table class adds basic styling (light padding and only horizontal dividers) to a table:</p>
              <table class="table">
                <thead>
                  <tr>
                    <th>Movie</th>
                    <th>Rating</th>
                    <th>Review</th>
                    <th>Rewatch</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <?php
                      $rows = $result->num_rows;

                      for($j=0; $j<$rows; $j++){
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo $row['movie_id'];
                        echo "<br />";
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      $rows = $result->num_rows;

                      for($j=0; $j<$rows; $j++){
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo $row['rating'];
                        echo "<br />";
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      $rows = $result->num_rows;

                      for($j=0; $j<$rows; $j++){
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo $row['review'];
                        echo "<br />";
                      }
                      ?>
                    </td>
                    <td>
                      <?php
                      $rows = $result->num_rows;

                      for($j=0; $j<$rows; $j++){
                        $result->data_seek($j);
                        $row = $result->fetch_array(MYSQLI_ASSOC);
                        echo $row['rewatch'];
                        echo "<br />";
                      }
                      ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
      </section>

    <div class="col-lg-12 text-left">
      <div class="row">
        <h1><strong><span class="glyphicon glyphicon-film"></span>It</strong></h1>
      </div>
      <div class="panel-group">
        <div class="panel panel-default">
          <div id="panel" class="panel-heading"><h3><strong>@movie-watcher</strong></h3></div>
          <div class="panel-body"><h4><u>Rating:</u> 5 <span class="glyphicon glyphicon-star"></span></h4></div>
          <div class="panel-body"><p>This movie is awesome! I was on the edge of my seat the whole time!</p></div>
        </div>
      </div>
      <div class="panel-group">
        <div class="panel panel-default">
          <div id="panel" class="panel-heading"><h3><strong>@movie-goer</strong></h3></div>
          <div class="panel-body"><h4><u>Rating:</u> 3 <span class="glyphicon glyphicon-star"></span></h4></div>
          <div class="panel-body"><p>Don't go, it wasn't great.</p></div>
        </div>
      </div>
    </div>
    </div>


    <a href="movie-list.php"><button type="button" class="btn btn-default">Movie List</button></a>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>
