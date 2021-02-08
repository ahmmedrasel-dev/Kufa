<?php 
include 'session.php';
require '../database.php';
$counterId = $_GET['counterId'];

$selectData = " SELECT * FROM counter WHERE id = $counterId";
$dataQuery = mysqli_query($db_connect, $selectData);
$dataAssoc = mysqli_fetch_assoc($dataQuery);

if( $dataAssoc['counter_status'] == 1 ){
  $statusUpdate = " UPDATE counter SET counter_status = 2 WHERE id = $counterId";
  if(mysqli_query($db_connect, $statusUpdate)){
    $_SESSION['message'] = "Counter Deactivated Successfully";
    header('location:counter.php');
  }else{
    echo "Something Problem.".mysqli_error($db_connect);
  }
}else{
  $statusUpdate = " UPDATE counter SET counter_status = 1 WHERE id = $counterId";
  if(mysqli_query($db_connect, $statusUpdate)){
    $_SESSION['message'] = "Counter Activated Successfully";
    header('location:counter.php');
  }else{
    echo "Something Problem.".mysqli_error($db_connect);
  }
}


?>