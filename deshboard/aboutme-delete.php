<?php 

  include 'session.php';
  require_once '../database.php';

  $deleteData = "DELETE FROM about";
  if(mysqli_query($db_connect, $deleteData)){
    $_SESSION['message']= "About Content Delete Successfully";
    header('location: aboutme.php');
  }else{
    $_SESSION['message']= "Something is wrong.";
    header('location: aboutme.php');
  }

?>