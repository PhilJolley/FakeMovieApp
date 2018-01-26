<?php
  require_once '../util/dbinfo.php';

  $conn = new mysqli($hn, $un, $pw, $db);
  if($conn->connect_error) die($conn->connect_error);

  class CustomerModel{
    public $hashed_password, $first_name, $last_name, $email, $street, $city, $state, $zipcode, $create_date, $user_name;

  	function __construct($hashed_password, $first_name, $last_name, $email, $street, $city, $state, $zipcode, $create_date, $user_name){ //__construct creates a new object
  		$this->hashed_password=$hashed_password; //this is setting in public $hashed_password
  		$this->first_name=$first_name;
  		$this->last_name=$last_name;
  		$this->email=$email;
  		$this->street=$street;
      $this->city=$city;
      $this->state=$state;
      $this->zipcode=$zipcode;
      $this->create_date=$create_date;
      $this->user_name=$user_name;
  	}

  	function insertCustomer(){
  		global $conn;
      $hashed_password = $this->hashed_password;
  		$first_name = $this->first_name;
  		$last_name = $this->last_name;
  		$email = $this->email;
  		$street = $this->street;
      $city = $this->city;
      $state = $this->state;
      $zipcode = $this->zipcode;
      $create_date = $this->create_date;
      $user_name = $this->user_name;

  		$query = "insert into Customer (hashed_password, first_name, last_name, email, street, city, state, zipcode, create_date, user_name)
  			values ('$hashed_password', '$first_name', '$last_name', '$email', '$street', '$city', '$state', '$zipcode', '$create_date', '$user_name') ";
  		$result=$conn->query($query);
  		if(!$result) die ($conn->error);
  	}

    function updateCustomer(){
		global $conn;
    $hashed_password = $this->hashed_password;
    $first_name = $this->first_name;
    $last_name = $this->last_name;
    $email = $this->email;
    $street = $this->street;
    $city = $this->city;
    $state = $this->state;
    $zipcode = $this->zipcode;
    $create_date = $this->create_date;
    $user_name = $this->user_name;

		$query = "Update Customer set hashed_password='$hashed_password', first_name='$first_name', last_name='$last_name', email='$email', street='$street', city='$city', state='$state', zipcode='$zipcode', create_date='$create_date', user_name='$user_name'";
		$result=$conn->query($query);
		if(!$result) die ($conn->error);
	}

	function deleteCustomer(){
		global $conn;
		$query = "delete from Customer where user_name = '$user_name' ";
		$result=$conn->query($query);
		if(!$result) die ($conn->error);
	}

	function flush(){
    $this->hashed_password='';
    $this->first_name='';
    $this->last_name='';
    $this->email='';
    $this->street='';
    $this->city='';
    $this->state='';
    $this->zipcode='';
    $this->create_date='';
    $this->user_name='';
	}


}

class CustomerListModel{
    public $CustomerList = array();

    function selectAll(){
      global $conn, $CustomerList;
      $query = "SELECT * FROM Customer";
      $result = $conn->query($query);
      if(!$result) die ($conn->error);

  		$rows=$result->num_rows;
  		for($j=0; $j<$rows; $j++) {
  			$result->data_seek($j);
  			$row=$result->fetch_array(MYSQLI_NUM);
  			//print_r($row);
  			$Customer = new CustomerModel($row[1],$row[2],$row[3],$row[4], $row[5],$row[6],$row[7],$row[8],$row[9],$row[10]);
  			$this->CustomerList[] = $CustomerList;// you have to have [] in order for it to be inserted into the array correctly
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
