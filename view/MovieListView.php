<?php
  include("../app/assets/ViewHeader.php");
?>

<header>
      <div class="jumbotron text-center">
        <h1><strong>Add Movie</strong></h1>
        <img id ="AndAction" src="../app/assets/Img/clapper.svg">
      </div>
</header>

<section>
          <div class="container text-center">
            <h2>Recently Added Movie</h2>
            <p>Here are the recently added movies</p>
            <table class="table">
              <thead>
                <tr>
                  <th>Movie Title</th>
                  <th>Genre</th>
                  <th>Rating</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>
                    <?php
                      require_once '../model/MovieModel.php';

                      $obj = new MovieListModel();
	                    $obj->selectTitle();

                    ?>
                  </td>
                  <td>
                    <?php
                      require_once '../model/MovieModel.php';

                      $obj = new MovieListModel();
	                    $obj->selectReleaseDate();

                    ?>
                  </td>
                  <td>
                    <?php
                      require_once '../model/MovieModel.php';

                      $obj = new MovieListModel();
	                    $obj->selectRating();

                    ?>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
</section>

<section id="Bkg">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 text-left">
        <h1><strong>A</strong></h1>
      </div>
    </div>
  </div>
</section>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  <li data-target="#myCarousel" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
  <div class="item active">
    <a href="movie-details.php"><img id="AA" src="../app/assets/Img/American Assasin.jpg" alt="AA"></a>
    <div class="carousel-caption">
      <h3>American Assasin</h3>
    </div>
  </div>

  <div class="item">
    <a href="movie-details.php"><img id="AEOM" src="../app/assets/Img/All Eyez on me.jpg" alt="AEOM"></a>
    <div class="carousel-caption">
      <h3>All Eyez on me</h3>
    </div>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" data-slide="prev">
  <span class="glyphicon glyphicon-chevron-left"></span>
  <span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarousel" data-slide="next">
  <span class="glyphicon glyphicon-chevron-right"></span>
  <span class="sr-only">Next</span>
</a>
</div>

<!--individual sections -->
<section id="Bkg">
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 text-left">
      <h1><strong>B</strong></h1>
    </div>
  </div>
</div>
</section>
<div id="myCarouselB" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselB" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselB" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="BA" src="../app/assets/Img/Be Afraid.jpg" alt="BA"></a>
  <div class="carousel-caption">
    <h3>Be Afraid</h3>
  </div>
</div>

<div class="item">
  <a href="movie-details.php"><img id="BF" src="../app/assets/Img/Before I fall.jpg" alt="BF"></a>
  <div class="carousel-caption">
    <h3>Before I Fall</h3>
  </div>
</div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselB" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselB" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>C</strong></h1>
        </div>
      </div>
    </div>
  </section>
<div id="myCarouselC" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselC" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselC" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="C3" src="../app/assets/Img/Cars 3.jpeg" alt="C3"></a>
  <div class="carousel-caption">
    <h3>Cars 3</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselC" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselC" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>D</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselD" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselD" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselD" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="DM" src="../app/assets/Img/Despicable Me 3.jpg" alt="DM"></a>
  <div class="carousel-caption">
    <h3>Despicable Me</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselD" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselD" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>E</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselE" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselE" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselE" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="EM" src="../app/assets/Img/Extraordinary-Mission_poster.jpg" alt="EM"></a>
  <div class="carousel-caption">
    <h3>Extraordinary Mission</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselE" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselE" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>F</strong></h1>
        </div>
      </div>
    </div>
  </section>
<div id="myCarouselF" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselF" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselF" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="FF" src="../app/assets/Img/Fist Fight.jpg" alt="FF"></a>
  <div class="carousel-caption">
    <h3>Fist Fight</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselF" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselF" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>G</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselG" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselG" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselG" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="GO" src="../app/assets/Img/Get Out.jpg" alt="GO"></a>
  <div class="carousel-caption">
    <h3>Get Out</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselG" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselG" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>H</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselH" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselH" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselH" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="HA" src="../app/assets/Img/Hello Again.jpg" alt="HA"></a>
  <div class="carousel-caption">
    <h3>Hello Again</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselH" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselH" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>I</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselI" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselI" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselI" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="It" src="../app/assets/Img/Stephen-Kings-IT-Movie-Poster.jpg" alt="It"></a>
  <div class="carousel-caption">
    <h3>It</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselI" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselI" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>J</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselJ" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselJ" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselJ" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="JB" src="../app/assets/Img/jason-bourne-poster.jpg" alt="JB"></a>
  <div class="carousel-caption">
    <h3>Jason Bourne</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselJ" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselJ" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>K</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselK" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselK" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselK" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="KS" src="../app/assets/Img/Kill Switch.jpg" alt="KS"></a>
  <div class="carousel-caption">
    <h3>Kill Switch</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselK" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselK" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>L</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselL" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselL" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselL" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="LB" src="../app/assets/Img/Lego Batman.jpg" alt="LB"></a>
  <div class="carousel-caption">
    <h3>Lego Batman Movie</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselL" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselL" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>M</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselM" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselM" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselM" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="TM" src="../app/assets/Img/The Missing.jpg" alt="TM"></a>
  <div class="carousel-caption">
    <h3>The Missing</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselM" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselM" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>N</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselN" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselN" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselN" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="NER" src="../app/assets/Img/nerve-poster.jpg" alt="NER"></a>
  <div class="carousel-caption">
    <h3>Nerve</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselN" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselN" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>O</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselO" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselO" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselO" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="OV" src="../app/assets/Img/Once upon a time in Venice.jpg" alt="OV"></a>
  <div class="carousel-caption">
    <h3>Once upon a time in Venice</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselO" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselO" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>P</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselP" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselP" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselP" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="P" src="../app/assets/Img/Pirates.jpg" alt="P"></a>
  <div class="carousel-caption">
    <h3>Pirates of the Caribbean: Dead men tell no tales</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselP" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselP" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>Q</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselQ" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselQ" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselQ" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="Q" src="../app/assets/Img/Quest.jpg" alt="Q"></a>
  <div class="carousel-caption">
    <h3>The Quest</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselQ" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselQ" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>R</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselR" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselR" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselR" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="R" src="../app/assets/Img/ReLIFE.jpg" alt="R"></a>
  <div class="carousel-caption">
    <h3>ReLIFE</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselR" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselR" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>S</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselS" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselS" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselS" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="S" src="../app/assets/Img/Shack.jpg" alt="S"></a>
  <div class="carousel-caption">
    <h3>The Shack</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselS" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselS" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>T</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselT" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselT" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselT" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="T19" src="../app/assets/Img/Table 19.jpg" alt="T19"></a>
  <div class="carousel-caption">
    <h3>Table 19</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselT" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselT" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>U</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselU" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselU" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselU" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="U" src="../app/assets/Img/Unrest.jpg" alt="U"></a>
  <div class="carousel-caption">
    <h3>The Unrest</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselU" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselU" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>V</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselV" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselV" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselV" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="V" src="../app/assets/Img/The Village of No Return.jpg" alt="V"></a>
  <div class="carousel-caption">
    <h3>The Village of No Return</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselV" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselV" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>W</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselW" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselW" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselW" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="W" src="../app/assets/Img/Wonder Woman.jpg" alt="W"></a>
  <div class="carousel-caption">
    <h3>Wonder Woman</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselW" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselW" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>X</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselX" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselX" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselX" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="X" src="../app/assets/Img/X-Men Apocalypse.jpg" alt="X"></a>
  <div class="carousel-caption">
    <h3>X-Men: Apocalypse</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselX" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselX" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>Y</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselY" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselY" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselY" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="Y" src="../app/assets/Img/Your Name.jpg" alt="Y"></a>
  <div class="carousel-caption">
    <h3>Your Name</h3>
  </div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselY" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselY" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>

  <!--individual sections -->
  <section id="Bkg">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-left">
          <h1><strong>Z</strong></h1>
        </div>
      </div>
    </div>
  </section>
  <div id="myCarouselZ" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarouselZ" data-slide-to="0" class="active"></li>
<li data-target="#myCarouselZ" data-slide-to="1"></li>
</ol>

<!-- Wr../apper for slides -->
<div class="carousel-inner">
<div class="item active">
  <a href="movie-details.php"><img id="Z" src="../app/assets/Img/Zoolander.jpg" alt="Z"></a>
  <div class="carousel-caption">
    <h3>Zoolander</h3>
  </div>
</div>

<div class="item">
    <a href="movie-details.php"><img id="Z2" src="../app/assets/Img/Zoolander-2-2016.jpg" alt="Z2"></a>
    <div class="carousel-caption">
      <h3>Zoolander 2</h3>
    </div>
  </div>
<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarouselZ" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#myCarouselZ" data-slide="next">
<span class="glyphicon glyphicon-chevron-right"></span>
<span class="sr-only">Next</span>
</a>
</div>


<?php
  include("../app/assets/footer.php");
?>
