<?php
ob_start();
include 'session.php';
require_once '../database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $partnerLogo = $_FILES['thumbnail'];
  $extention = end(explode('.', $partnerLogo['name']));
  $allowType = array( 'jpeg', 'jpg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');
  if(in_array($extention, $allowType)){
    if($partnerLogo['size'] <= 2000000 ){
      $newFileName = rand().'.'.$extention;
      $newLocation = "../assets/images/".$newFileName;
      move_uploaded_file($partnerLogo['tmp_name'], $newLocation);
      $InsertThumbnail = " INSERT INTO partner ( brand_logo ) VALUES ('$newFileName')";
        if(mysqli_query($db_connect, $InsertThumbnail)){
          $_SESSION['message']= "Portfolios Add Successfully";
          header('location:partner.php');
        }else{
          echo "Something Error ".mysqli_error($db_connect);
        }
    }
  }else{
    $_SESSION['partnerThumb_error'] = "This Type of File Not Allow.";
    header('location: partner-add.php');
  }

}



?>