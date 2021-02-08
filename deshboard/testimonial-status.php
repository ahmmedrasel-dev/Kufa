<?php 
include 'session.php';
require_once '../database.php';
$testimonialId = $_GET['testimonialId'];

$dataSelect = " SELECT * FROM testimonial WHERE id = $testimonialId";
$dataQuery = mysqli_query($db_connect, $dataSelect);
$dataAssoc = mysqli_fetch_assoc($dataQuery);

if($dataAssoc['status'] == 1){
  $dataUpdate = "UPDATE testimonial SET status = 2 WHERE id = $testimonialId";
  if(mysqli_query($db_connect, $dataUpdate)){
    $_SESSION['message'] = "Testimonial Status Deactivated Successfully.";
    header('location: testimonial.php');
  }else{
    echo "Someting Error".mysqli_error($db_connect);
  }

}else{
  $dataUpdate = "UPDATE testimonial SET status = 1 WHERE id = $testimonialId";
  if(mysqli_query($db_connect, $dataUpdate)){
    $_SESSION['message'] = "Testimonial Status Activated Successfully.";
    header('location: testimonial.php');
  }else{
    echo "Someting Error".mysqli_error($db_connect);
  }
}



?>