<?php 
include 'session.php';
require_once '../database.php';
$partnerId = $_GET['partnerId'];

$selectData = " SELECT * FROM partner WHERE id $partnerId ";
$dataQuery = mysqli_query($db_connect, $selectData);
$dataAssoc = mysqli_fetch_assoc($dataQuery);

$imgsourse = "../assets/feature-img/".$dataAssoc['brand_logo'];

if(file_exists($imgsourse)){
  unlink($imgsourse);
  
  $deleteData = " DELETE FROM partner WHERE id = $partnerId";
  if(mysqli_query($db_connect, $deleteData)){
    $_SESSION['message']= "Portfolio Delete Successfully";
    header('location:partner.php');
  }else{
    echo "Delete hoy nai";
  }
}



?>