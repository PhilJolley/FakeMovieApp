<?php
  require_once 'util/dbinfo.php';
  require_once 'CheckSession.php';

  $conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);

  if(isset($_POST['verify'])){
    if(empty($_POST['title']) && empty($_POST['genre']) && empty($_POST['release_date']) && empty($_POST['rating']) && empty($_POST['director']) && empty($_POST['writers']) && empty($_POST['stars']) && empty($_POST['review'])){
      $msg = "You need to fill out all the boxes";
    } elseif($_POST['title'] != ''  && $_POST['genre'] != '' && $_POST['release_date'] != '' && $_POST['rating'] != '' && $_POST['director'] != '' && $_POST['writers'] != ''){

      $username = 5;
      $title = $_POST['title'];
    	$genre = $_POST['genre'];
    	$release_date = $_POST['release_date'];
    	$rating = $_POST['rating'];
      $director= $_POST['director'];
      $writers = $_POST['writers'];
      $stars = $_POST['stars'];
    	$review = $_POST['movie_description'];

    	//echo $isbn.'<br>';
      $query2 = "SELECT movie_id FROM movie WHERE title = '$title'";
      $result = $conn->query($query2);
      if(!$result) die($conn->error);
      $rows = $result->num_rows;
      for($j=0; $j<$rows; $j++){
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $movieID = $row['movie_id'];
      }

    	$query = "UPDATE movie SET title = '$title', cust_id = '$username', genre = '$genre', release_date = '$release_date', rating = '$rating', movie_description = '$review', director = '$director', writers = '$writers', stars = '$stars', review = '$review' WHERE  movie_id = '$movieID'";
    	//echo $query.'<br>';
    	$result = $conn->query($query);
    	if(!$result) die($conn->error);

      function redirect_to($location) {
        header("Location: " . $location);
        //exit;
      }

      //$result->close(); //not required, but good practice or it will eat your resources
    	//header("Location: viewRecord.php");//this will return you to the view all page
      redirect_to('view/MovieListView.php');

    }
  }

  if(isset($_POST['verify2'])){
    if(empty($_POST['title']) && empty($_POST['genre']) && empty($_POST['release_date']) && empty($_POST['rating'])){
      $msg2 = 'Please fill in the blank rows.';
    } elseif($_POST['title'] != ''  && $_POST['genre'] != '' && $_POST['release_date'] != '' && $_POST['rating'] != ''){

      $username = 5;
      $title = $_POST['title'];
    	$genre = $_POST['genre'];
    	$release_date = $_POST['release_date'];
    	$rating = $_POST['rating'];

    	//echo $isbn.'<br>';
      $query2 = "SELECT movie_id FROM movie WHERE title = '$title'";
      $result = $conn->query($query2);
      if(!$result) die($conn->error);
      $rows = $result->num_rows;
      for($j=0; $j<$rows; $j++){
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $movieID = $row['movie_id'];
      }

    	$query = "DELETE FROM movie WHERE movie_id ='$movieID'";
    	//echo $query.'<br>';
    	$result = $conn->query($query);
    	if(!$result) die($conn->error);

      function redirect_to($location) {
        header("Location: " . $location);
        //exit;
      }

      //$result->close(); //not required, but good practice or it will eat your resources
    	//header("Location: viewRecord.php");//this will return you to the view all page
      redirect_to('view/MovieListView.php');

    }
}

?>


<html>
<head>
  <title>UA Cinemas-Movie Update</title>
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
                <a id= "brand" class="navbar-brand page-scroll" href="movie-list.php">UA Cinemas</a>
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
        <h1><strong>Update/Delete Movie</strong></h1>
        <img id ="AndAction" src="app/assets/Img/clapper.svg">
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

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>Update Movie Details</strong></h1>
        </div>
      </div>



      <form class="form-inline text-left" method="post" action="UpdateMovie.php">
        <div class="form-group">
          <label for="title"><span class="glyphicon glyphicon-user"></span>User Name:</label>
          <input type="title" class="form-control" name = 'user_name' id="title">
        </div>
        <div class="form-group">
          <label for="title"><span class="glyphicon glyphicon-asterisk"></span>Title:</label>
          <input type="title" class="form-control" name = 'title' id="title">
        </div>
        <br />
        <br />
        <div class="form-group">
          <label for="GNRE"><span class="glyphicon glyphicon-asterisk"></span>Genre:</label>
          <input type="gnre" class="form-control" name = 'genre' id="GNRE">
        </div>
        <div class="form-group">
          <label for="example-date-input"><span class="glyphicon glyphicon-asterisk"></span>Release Date:</label>
          <input type="date" class="form-control" name='release_date' id="date">
        </div>
        <br />
        <br />
        <div class="form-group">
          <label for="rate"><span class="glyphicon glyphicon-asterisk"></span>Rating:</label>
          <input type="rate" class="form-control" name='rating' id="rate">
        </div>
        <div class="form-group">
          <label for="title"><span class="glyphicon glyphicon-facetime-video"></span>Director:</label>
          <input type="title" class="form-control" name = 'director' id="Director">
        </div>
        <br />
        <br />
        <div class="form-group">
          <label for="GNRE"><span class="glyphicon glyphicon-pencil"></span>Writer(s):</label>
          <input type="gnre" class="form-control" name = 'writers' id="Writers">
        </div>
        <div class="form-group">
          <label for="GNRE"><span class="glyphicon glyphicon-star-empty"></span>Star(s):</label>
          <input type="gnre" class="form-control" name = 'stars' id="Stars">
        </div>
        <br />
        <br />
        <div class="form-group">
        <label for="comment"><span class="glyphicon glyphicon-asterisk"></span>Movie Details:</label>
        <textarea class="form-control" rows="5" name = 'movie_description' id="details"></textarea>
        </div>
        <br />
        <br />
          <input type='hidden' name='verify' value='yes'>
        <button type="submit" class="btn btn-default">Update Movie</button>

      </form>

      <div class="container-fluid">
        <div class="col-sm-12 text-center">
          <?php if(isset($msg2)){ ?>
          <div class="alert alert-danger">
            <strong>Error!</strong>
            <?  print_r($msg2);
           }
            ?>
          </div>
        </div>
      </div>

        <div class="row">
          <div class="col-lg-12 text-left">
            <h1><strong>Delete Movie Details</strong></h1>
          </div>
        </div>
          <form class="form-inline text-left" method="post" action="UpdateMovie.php">
            <div class="form-group">
              <label for="title"><span class="glyphicon glyphicon-user"></span>User Name:</label>
              <input type="title" class="form-control" name = 'user_name' id="title">
            </div>
            <div class="form-group">
              <label for="title"><span class="glyphicon glyphicon-asterisk"></span>Title:</label>
              <input type="title" class="form-control" name = 'title' id="title">
            </div>
            <div class="form-group">
              <label for="GNRE"><span class="glyphicon glyphicon-asterisk"></span>Genre:</label>
              <input type="gnre" class="form-control" name = 'genre' id="GNRE">
            </div>
            <br />
            <br />
            <div class="form-group">
              <label for="example-date-input"><span class="glyphicon glyphicon-asterisk"></span>Release Date:</label>
              <input type="date" class="form-control" name='release_date' id="date">
            </div>
            <div class="form-group">
              <label for="rate"><span class="glyphicon glyphicon-asterisk"></span>Rating:</label>
              <input type="rate" class="form-control" name='rating' id="rate">
            </div>
            <br />
            <br />
            <input type='hidden' name='verify2' value='yes'>
            <button type="submit" class="btn btn-default">Delete Movie</button>
          </form>
    </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
