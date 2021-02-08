<?php
ob_start();
include "includes/header.php";
require "../database.php";
$counterId = $_GET['counterId'];

$deleteData = " DELETE FROM counter WHERE id = $counterId";
  if(mysqli_query($db_connect, $deleteData)){
    $_SESSION['message']= "Counter Delete Successfully";
    header('location:counter.php');
  }else{
    echo "Delete hoy nai";
  }

?>