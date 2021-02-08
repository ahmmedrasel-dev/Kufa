<?php
ob_start();
include 'session.php';
require_once '../database.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $websiteTitle = mysqli_real_escape_string($db_connect, $_POST['websiteTitle']);
  $footerText = mysqli_real_escape_string($db_connect, $_POST['footerText']);
  // Website Title Validation.
  if(empty($websiteTitle)){
    $_SESSION['websiteTitle_error'] = "Please Write your Website title.";
    header('location: setting-edit.php');
  }else{
    $validTitle = $websiteTitle;
  }
  // Website Title Validation.
  if(empty($footerText)){
    $_SESSION['footerText_error'] = "Please Write your Website title.";
    header('location: setting-edit.php');
  }else{
    $validText = $footerText;
  }

  $dataUpdate = " UPDATE setting SET websiteTitle = '$validTitle', footerText = '$validText' ";
  if (mysqli_query($db_connect, $dataUpdate)) {
    $_SESSION['message'] = " Update Successfully.";
    header('location: setting.php');
  }

  $headerLogo = $_FILES['headerLogo'];
  $extention= end(explode('.', $headerLogo['name']));
  $allowType = array( 'jpeg', 'jpg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');
  if (in_array($extention, $allowType)) {
    if($headerLogo['size'] < 100000) {
      $dataSelect = " SELECT * FROM setting ";
      $dataQuery = mysqli_query($db_connect, $dataSelect);
      $dataAssoc = mysqli_fetch_assoc($dataQuery);

      $imgSourse1 = "../assets/images/".$dataAssoc['headerLogo'];
      if(file_exists($imgSourse1)){
        unlink($imgSourse1);
      }

      $newFileName = rand().'.'.$extention;
      $newlocation = "../assets/images/".$newFileName;
      move_uploaded_file($headerLogo['tmp_name'], $newlocation );

      $updatePhoto = " UPDATE setting SET headerLogo = '$newFileName' ";
      if(mysqli_query($db_connect, $updatePhoto)){
        $_SESSION['message']= "Logo Updated Successfully";
        header('location:setting.php');
      }else{
        echo "Something Error ".mysqli_error($db_connect);
      }


    }else{
      $_SESSION['headerLogo_error'] = "Your File Size too big";
      header('location: setting-edit.php');
    }
  }


  $favIcon = $_FILES['favIcon'];
  $extention= end(explode('.', $favIcon['name']));
  $allowType = array( 'jpeg', 'jpg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');
  if (in_array($extention, $allowType)) {
    if ($favIcon['size'] < 100000) {
      $dataSelect = " SELECT * FROM setting ";
      $dataQuery = mysqli_query($db_connect, $dataSelect);
      $dataAssoc = mysqli_fetch_assoc($dataQuery);

      $imgSourse1 = "../assets/images/".$dataAssoc['favIcon'];
      if(file_exists($imgSourse1)){
        unlink($imgSourse1);
      }

      $newFileName = rand().'.'.$extention;
      $newlocation = "../assets/images/".$newFileName;
      move_uploaded_file($favIcon['tmp_name'], $newlocation );

      $updatePhoto = " UPDATE setting SET favIcon = '$newFileName' ";
      if(mysqli_query($db_connect, $updatePhoto)){
        $_SESSION['message']= "Logo Updated Successfully";
        header('location:setting.php');
      }else{
        echo "Something Error ".mysqli_error($db_connect);
      }


    }else{
      $_SESSION['favIcon_error'] = "Your File Size too big";
      header('location: setting-edit.php');
    }
  }


}







?>