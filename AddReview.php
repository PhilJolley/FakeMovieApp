<?php
  require_once 'util/dbinfo.php';
  require_once 'CheckSession.php';

  $conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);

  if(isset($_POST['verify'])){
    if(empty($_POST['title']) && empty($_POST['rating']) && empty($_POST['rewatch']) && empty($_POST['review'])){
      $msg = "You need to fill out all the boxes";
    } elseif($_POST['title'] != ''  && $_POST['rating'] != '' && $_POST['rewatch'] != '' && $_POST['review'] != ''){

      $cust_id = 5;
      $title = $_POST['title'];
      $rating = $_POST['rating'];
      $review = $_POST['review'];
      $rewatch = $_POST['rewatch'];
      //$movieID = 5;
      $query2 = "SELECT movie_id FROM movie WHERE title = '$title'";
      $result = $conn->query($query2);
      if(!$result) die($conn->error);
      $rows = $result->num_rows;
      for($j=0; $j<$rows; $j++){
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $movieID = $row['movie_id'];
      }
    	//echo $isbn.'<br>';

    	$query = "INSERT INTO review(cust_id, movie_id, rating, review, rewatch) VALUES ('$cust_id', '$movieID', '$rating', '$review', '$rewatch')";
    	//echo $query.'<br>';
    	$result2 = $conn->query($query);
    	if(!$result2) die($conn->error);

      function redirect_to($location) {
        header("Location: " . $location);
        //exit;
      }

      //$result->close(); //not required, but good practice or it will eat your resources
    	//header("Location: viewRecord.php");//this will return you to the view all page
      redirect_to('ReviewList.php');
    }

  }


?>




<html>
<head>
  <title>UA Cinemas-Add Review</title>
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

    <header>
      <div class="jumbotron text-center">
        <h1><strong>Add Review</strong></h1>
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

    <form class="form-inline text-center" method="POST" action="AddReview.php">
      <div class="form-group">
        <label for="title"><span class="glyphicon glyphicon-asterisk"></span>Title:</label>
        <input type="title" class="form-control" name="title" id="title2">
      </div>
      <br />
      <br />
      <div class="form-group">
        <label for="sel1"><span class="glyphicon glyphicon-asterisk"></span>Add Rating:</label>
      <select class="form-control" name="rating" id="sel1">
        <option name="rating">1 Star</option>
        <option name="rating">2 Star</option>
        <option name="rating">3 Star</option>
        <option name="rating">4 Star</option>
        <option name="rating">5 Star</option>
      </select>
      </div>
      <br />
      <br />
      <div class="form-group">
        <label for="UN"><span class="glyphicon glyphicon-asterisk"></span>Watch Again?</label>
        <label class="radio-inline"><input type="radio" name="rewatch" value="Yes">Yes</label>
        <label class="radio-inline"><input type="radio" name="rewatch" value="Maybe">Maybe</label>
        <label class="radio-inline"><input type="radio" name="rewatch" value="No">No</label>
      </div>
      <br />
      <br />
      <div class="form-group">
      <label for="comment"><span class="glyphicon glyphicon-pencil"></span>Add a Review:</label>
      <textarea class="form-control" rows="5" name="review" id="review"></textarea>
      </div>
      <br />
      <br />
        <input type='hidden' name='verify' value='yes'>
      <button type="submit" class="btn btn-default">Add Review</button>
    </form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
