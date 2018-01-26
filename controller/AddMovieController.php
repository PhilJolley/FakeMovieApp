<?php

  require_once '../model/MovieModel.php';
  require_once '../CheckSession.php';

  if(isset($_POST['title'])){
    if(empty($_POST['title']) && empty($_POST['genre']) && empty($_POST['release_date']) && empty($_POST['rating']) && empty($_POST['review'])){
      $msg = "You need to fill out all the boxes";
      function redirect_to($location) {
        header("Location: " . $location);
        //exit;
      }

      //$result->close(); //not required, but good practice or it will eat your resources
    	//header("Location: viewRecord.php");//this will return you to the view all page
      redirect_to('../MovieAddView.php');
    } elseif($_POST['title'] != ''  && $_POST['genre'] != '' && $_POST['release_date'] != '' && $_POST['rating'] != '' && $_POST['review'] != ''){


      $title = $_POST['title'];
      $cust_id = 5;
    	$genre = $_POST['genre'];
    	$release_date = $_POST['release_date'];
    	$rating = $_POST['rating'];
    	$review = $_POST['review'];

      /*$obj = new BookListModel();
        $obj->selectAll();
        $list = $obj->bookList;
        print_r($list);
        echo "<br />";

        $book = new BookModel('JK Rowlings','Harry Potter & the Prisoner of Azkaban','Fiction','1999','22222');
        $book->insert();
        print_r($book);
       */

       $movie = new MovieModel($title, $cust_id, $genre, $release_date, $rating, $review);
       $movie->insertMovie();

    	//echo $isbn.'<br>';

    	/*$query = "INSERT INTO movie (title, cust_id, genre, release_date, rating, review) VALUES ('$title', '$cust_id', '$genre','$release_date', '$rating', '$review')";
    	//echo $query.'<br>';
    	$result = $conn->query($query);
    	if(!$result) die($conn->error); */

      function redirect_to($location) {
        header("Location: " . $location);
        //exit;
      }

      //$result->close(); //not required, but good practice or it will eat your resources
    	//header("Location: viewRecord.php");//this will return you to the view all page
      redirect_to('../view/MovieListView.php');

    }
}
?>
