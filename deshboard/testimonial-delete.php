<?php 
include 'session.php';
require_once '../database.php';
$testimonialId = $_GET['testimonialId'];

$deleteData = " DELETE FROM  testimonial WHERE id = $testimonialId";
if(mysqli_query($db_connect, $deleteData)){
  $_SESSION['message'] = "Delete Testimonail Successfully.";
  header('location: testimonial.php');
}else{
  echo "Something is error".mysqli_error($db_connect);
}

?>