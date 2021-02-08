<?php 
include 'session.php';
require_once '../database.php';
$educationId = $_GET['educationId'];

$deleteData = " DELETE FROM education WHERE id = $educationId";
if(mysqli_query($db_connect, $deleteData)){
  $_SESSION['message'] = "Education Delete Successfully.";
  header('location:education.php');
}else{
  $_SESSION['message'] = "Something is Wrong.";
  header('location:education.php');
}

?>