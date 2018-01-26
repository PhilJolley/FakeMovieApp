<?php

  require_once '../util/dbinfo.php';
  require_once '../CheckSession.php';

  $conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);

  class MovieModel{
    public $title, $cust_id, $genre, $release_date, $rating, $review;

  	function __construct($title, $cust_id, $genre, $release_date, $rating, $review){ //__construct creates a new object
  		$this->title=$title; //this is setting in public $title
  		$this->cust_id=$cust_id;
  		$this->genre=$genre;
  		$this->release_date=$release_date;
  		$this->rating=$rating;
      $this->review=$review;
  	}

  	function insertMovie(){
  		global $conn;
      $title = $this->title;
  		$cust_id = $this->cust_id;
  		$genre = $this->genre;
  		$release_date = $this->release_date;
  		$rating = $this->rating;
      $review = $this->review;

  		$query = "insert into movie (title, cust_id, genre, release_date, rating, review)
  			values ('$title', '$cust_id', '$genre', '$release_date', '$rating', '$review') ";
  		$result=$conn->query($query);
  		if(!$result) die ($conn->error);
  	}

    function updateMovie(){
		global $conn;
    $title = $this->title;
    $cust_id = $this->cust_id;
    $genre = $this->genre;
    $release_date = $this->release_date;
    $rating = $this->rating;
    $review = $this->review;

    $query2 = "SELECT movie_id FROM movie WHERE title = '$title'";
      $result = $conn->query($query2);
      if(!$result) die($conn->error);
      $rows = $result->num_rows;
      for($j=0; $j<$rows; $j++){
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $movieID = $row['movie_id'];
      }

		$query = "UPDATE movie SET title='$title', cust_id='$cust_id', genre='$genre', review='$review' WHERE  movie_id = '$movieID'";
		$result=$conn->query($query);
		if(!$result) die ($conn->error);
	}

	function deleteMovie(){
		global $conn;

    $query2 = "SELECT movie_id FROM movie WHERE title = '$title'";
      $result = $conn->query($query2);
      if(!$result) die($conn->error);
      $rows = $result->num_rows;
      for($j=0; $j<$rows; $j++){
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $movieID = $row['movie_id'];
      }

		$query = "delete from movie where title = '$title' ";
		$result=$conn->query($query);
		if(!$result) die ($conn->error);
	}

	function flush(){
    $this->title='';
    $this->cust_id='';
    $this->genre='';
    $this->release_date='';
    $this->rating='';
    $this->review='';
	}


}

class MovieListModel{
    public $movieList = array();

    function selectAll(){
      global $conn, $movieList;
      $query = "SELECT * FROM movie";
      $result = $conn->query($query);
      if(!$result) die ($conn->error);

  		$rows=$result->num_rows;
  		for($j=0; $j<$rows; $j++) {
  			$result->data_seek($j);
  			$row=$result->fetch_array(MYSQLI_NUM);
  			//print_r($row);
  			$movie = new MovieModel($row[1],$row[2],$row[3],$row[4], $row[5], $row[10]);
  			$this->movieList[] = $movieList;// you have to have [] in order for it to be inserted into the array correctly
    }
  }

  function selectTitle(){
    global $conn;

    $query = "SELECT * FROM movie ORDER BY title ASC";
    $result = $conn->query($query);
    if(!$result) die($conn->error);

    $rows = $result->num_rows;
    for($j=0; $j<$rows; $j++){
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo $row['title'];
    echo "<br />";
    }
  }

  function selectReleaseDate(){
    global $conn;

    $query = "SELECT * FROM movie ORDER BY title ASC";
    $result = $conn->query($query);
    if(!$result) die($conn->error);

    $rows = $result->num_rows;
    for($j=0; $j<$rows; $j++){
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo $row['release_date'];
    echo "<br />";
    }
  }

  function selectRating(){

    global $conn;

    $query = "SELECT * FROM movie ORDER BY title ASC";
    $result = $conn->query($query);
    if(!$result) die($conn->error);

    $rows = $result->num_rows;
    for($j=0; $j<$rows; $j++){
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    echo $row['rating'];
    echo "<br />";

    }

  }
}


/*$obj = new BookListModel();
  $obj->selectAll();
  $list = $obj->bookList;
  print_r($list);
  echo "<br />";

  $book = new BookModel('JK Rowlings','Harry Potter & the Prisoner of Azkaban','Fiction','1999','22222');
  $book->insert();
  print_r($book);
 */


?>
