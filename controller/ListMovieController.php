<?php

  require_once '../model/MovieModel.php';
  require_once '../CheckSession.php';

  //code to create book list
  $obj = new MovieListModel();
  $obj->selectAll();
  $list = $obj->movieList;

  //TEST
  //print_r($list);


  //add list to session
  session_start();
  $_SESSION['movieList'] = $list;

  function redirect_to($location) {
    header("Location: " . $location);
    exit;
  }
  //forward to view page
  //header("Location: ../view/ListBookView.php");
  redirect_to("../view/MovieListView.php");
  //exit();

?>
