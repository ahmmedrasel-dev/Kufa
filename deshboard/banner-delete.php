<?php 
include "session.php";
require "../database.php";

$selectData = " SELECT * FROM banner ";
$dataQuery = mysqli_query($db_connect, $selectData);
$dataAssoc = mysqli_fetch_assoc($dataQuery);

$imgSourse1 = "../assets/images/".$dataAssoc['bannerPhoto'];
if(file_exists($imgSourse1)){
  unlink($imgSourse1);
  unlink($imgSourse2);

  $deleteData = " DELETE FROM banner ";
  if(mysqli_query($db_connect, $deleteData)){
    $_SESSION['message']= "Banner Delete Successfully";
    header('location:banner.php');
  }else{
    $_SESSION['message']= "Something is wrong.";
    header('location:banner.php');
  }

}