<?php
  require_once '../util/dbinfo.php';

  $conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);

  class ReviewModel{
    public $cust_id, $movie_id, $rating, $review, $rewatch;

  	function __construct($cust_id, $movie_id, $rating, $review, $rewatch, $city, $state, $zipcode, $create_date, $user_name){ //__construct creates a new object
  		$this->cust_id=$cust_id; //this is setting in public $cust_id
  		$this->movie_id=$movie_id;
  		$this->rating=$rating;
  		$this->review=$review;
  		$this->rewatch=$rewatch;
  	}

  	function insertReview(){
  		global $conn;
      $cust_id = $this->cust_id;
  		$movie_id = $this->movie_id;
  		$rating = $this->rating;
  		$review = $this->review;
  		$rewatch = $this->rewatch;

  		$query = "insert into Review (cust_id, movie_id, rating, review, rewatch)
  			values ('$cust_id', '$movie_id', '$rating', '$review', '$rewatch') ";
  		$result=$conn->query($query);
  		if(!$result) die ($conn->error);
  	}

    function updateReview(){
		global $conn;
    $cust_id = $this->cust_id;
    $movie_id = $this->movie_id;
    $rating = $this->rating;
    $review = $this->review;
    $rewatch = $this->rewatch;

		$query = "Update Review set cust_id='$cust_id', movie_id='$movie_id', rating='$rating', review='$review', rewatch='$rewatch'";
		$result=$conn->query($query);
		if(!$result) die ($conn->error);
	}

	function deleteReview(){
		global $conn;
		$query = "delete from Review where cust_id='$cust_id'";
		$result=$conn->query($query);
		if(!$result) die ($conn->error);
	}

	function flush(){
    $this->cust_id='';
    $this->movie_id='';
    $this->rating='';
    $this->review='';
    $this->rewatch='';
	}


}

class ReviewListModel{
    public $ReviewList = array();

    function selectAll(){
      global $conn, $ReviewList;
      $query = "SELECT * FROM Review";
      $result = $conn->query($query);
      if(!$result) die ($conn->error);

  		$rows=$result->num_rows;
  		for($j=0; $j<$rows; $j++) {
  			$result->data_seek($j);
  			$row=$result->fetch_array(MYSQLI_NUM);
  			//print_r($row);
  			$Review = new ReviewModel($row[1],$row[2],$row[3],$row[4], $row[5],$row[6],$row[7],$row[8],$row[9],$row[10]);
  			$this->ReviewList[] = $ReviewList;// you have to have [] in order for it to be inserted into the array correctly
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
