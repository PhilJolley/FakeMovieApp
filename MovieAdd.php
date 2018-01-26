<?php
  include("app/assets/header.php");
?>

<header>
      <div class="jumbotron text-center">
        <h1><strong>Add Movie</strong></h1>
        <img id ="AndAction" src="app/assets/Img/clapper.svg">
      </div>
</header>

<div class="container">
  <div class="col-sm-12 text-center">
    <?php
    if(isset($msg)){ ?>
    <div class="alert alert-danger">
      <strong>Error!</strong>
      <?  print_r($msg);
     }
      ?>
    </div>
  </div>
</div>


<form class="form-inline text-center" method="post" action="controller/AddMovieController.php">
  <div class="form-group">
    <label for="title"><span class="glyphicon glyphicon-asterisk"></span>Title:</label>
    <input type="title" class="form-control" name="title" id="title">
  </div>
  <div class="form-group">
    <label for="GNRE"><span class="glyphicon glyphicon-asterisk"></span>Genre:</label>
    <input type="gnre" class="form-control" name="genre" id="GNRE">
  </div>
  <br />
  <br />
  <div class="form-group">
    <label for="example-date-input"><span class="glyphicon glyphicon-asterisk"></span>Release Date:</label>
    <input type="date" class="form-control" name="release_date" id="date">
  </div>
  <div class="form-group">
    <label for="rate"><span class="glyphicon glyphicon-asterisk"></span>Rating:</label>
    <input type="rate" class="form-control" name="rating" id="rate">
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
  <button type="submit" class="btn btn-default">Add Movie</button>
</form>



<?php
  include("app/assets/footer.php");
?>
