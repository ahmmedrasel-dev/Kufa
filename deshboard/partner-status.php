<?php 
include 'session.php';
require_once '../database.php';
$partnerId = $_GET['partnerId'];

$selectData = " SELECT * FROM partner WHERE id = $partnerId";
$dataQuery = mysqli_query($db_connect, $selectData);
$dataAssoc = mysqli_fetch_assoc($dataQuery);

if( $dataAssoc['status'] == 1 ){
  $dataUpdate = " UPDATE partner SET status = 2 WHERE id = $partnerId ";
  if(mysqli_query($db_connect, $dataUpdate)){
    $_SESSION['message'] = " Partner Deactivted Successfully";
    header('location: partner.php');
  }
}else{
  $dataUpdate = " UPDATE partner SET status = 1 WHERE id = $partnerId ";
  if(mysqli_query($db_connect, $dataUpdate)){
    $_SESSION['message'] = " Partner Activeted Successfully";
    header('location: partner.php');
  }
}


?>