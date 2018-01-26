<?php
  require_once 'util/dbinfo.php';
  require_once 'CheckSession.php';

  $conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);

  if(isset($_POST['verify_update'])){
    if(empty($_POST['user_name']) && empty($_POST['review'])){
      $msg = 'Please fill in the blank rows.';
    } elseif($_POST['user_name'] != '' && $_POST['title'] != '' && $_POST['review'] != ''){

      $username = 5;
      $title = $_POST['title'];
      $review = $_POST['review'];

      $query2 = "SELECT movie_id FROM movie WHERE title = '$title'";
      $result = $conn->query($query2);
      if(!$result) die($conn->error);
      $rows = $result->num_rows;
      for($j=0; $j<$rows; $j++){
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $movieID = $row['movie_id'];
      }

      $query = "UPDATE review SET review = '$review' WHERE cust_id = '$username' AND movie_id = '$movieID'";
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


  if(isset($_POST['verify_delete'])){
    if(empty($_POST['user_name'])){
      $msg2 = 'Please fill in the blank rows.';
    } elseif($_POST['user_name'] != '' && $_POST['title'] != ''){

      $username = 5;
      $title = $_POST['title'];
      $review = $_POST['review'];

      $query2 = "SELECT movie_id FROM movie WHERE title = '$title'";
      $result = $conn->query($query2);
      if(!$result) die($conn->error);
      $rows = $result->num_rows;
      for($j=0; $j<$rows; $j++){
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $movieID = $row['movie_id'];
      }

      $query = "DELETE FROM review WHERE cust_id = '$username' AND movie_id = '$movieID'";
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
        <div class="jumbotron text-center" method="POST" action="UpdateReview.php">
          <h1><strong>Update/Delete Movie Review</strong></h1>
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

      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 text-left">
            <h1><strong>Update Review</strong></h1>
          </div>
          <div class="col-lg-12">
            <form class="form-inline" method="POST" action="UpdateReview.php">
              <div class="form-group">
                <label for="title"><span class="glyphicon glyphicon-user"></span>User Name:</label>
                <input type="title" class="form-control" name = 'user_name' id="title">
              </div>
              <div class="form-group">
              <label for="sel1"><span class="glyphicon glyphicon-asterisk"></span>Choose Movie:</label>
              <select class="form-control" name="title" id="sel2">
                <option name="title">Thirteen Women</option>
                <option name="title">Kaboom</option>
                <option name="title">Wish I Was Here</option>
                <option name="title">Catastroika</option>
                <option name="title">Feast at Midnight, A</option>
                <option name="title">All Eyez on Me</option>
                <option name="title">It</option>
                <option name="title">Jason Bourne</option>
                <option name="title">The Missing</option>
              </select>
              </div>
              <br />
              <br />
              <div class="form-group">
              <label for="comment"><span class="glyphicon glyphicon-asterisk"></span>Add a Review:</label>
              <textarea class="form-control" rows="5" name="review" id="review"></textarea>
              </div>
              <br />
              <br />
              <input type='hidden' name='verify_update' value='yes'>
              <button type="submit" class="btn btn-default">Update Review</button>
            </form>

            <br />
            <br />
            <h1><strong><u>OR</u></strong></h1>
            <br />
            <br />



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

          </div>
          <div class="col-lg-12 text-left">
            <h1><strong>Delete Movie Review</strong></h1>
          </div>
              <div class="col-lg-12 text-left">
                <form class="form-inline" method="POST" action="UpdateReview.php">
                  <div class="form-group">
                    <label for="title">User Name:</label>
                    <input type="title" class="form-control" name = 'user_name' id="title">
                  </div>
                  <div class="form-group">
                  <label for="sel3">Choose Movie:</label>
                  <select class="form-control" name="title" id="sel3">
                    <option name="title">Thirteen Women</option>
                    <option name="title">Kaboom</option>
                    <option name="title">Wish I Was Here</option>
                    <option name="title">Catastroika</option>
                    <option name="title">Feast at Midnight, A</option>
                    <option name="title">All Eyez on Me</option>
                    <option name="title">It</option>
                    <option name="title">Jason Bourne</option>
                    <option name="title">The Missing</option>
                  </select>
                </div>
                <br />
                <br />
                <input type='hidden' name='verify_delete' value='yes'>
                <button type="submit" class="btn btn-default">Delete Movie Review</button>
              </div>
          </div>


        </div>
      </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>

  </html>
