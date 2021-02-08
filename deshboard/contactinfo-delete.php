<?php 
  include 'session.php';
  require_once '../database.php';

  $deleteService = " DELETE FROM contactInfo ";
  if(mysqli_query($db_connect, $deleteService)){
      $_SESSION['message']= "Contact info Delete Successfully";
      header('location:contactinfo.php');
  }


?>