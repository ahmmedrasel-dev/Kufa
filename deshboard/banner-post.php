<?php 
include 'session.php';
require_once '../database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $subtitle = mysqli_real_escape_string($db_connect, $_POST['subtitle']);
  $bannertitle = mysqli_real_escape_string($db_connect,$_POST['bannertitle']);
  $bannerDesc = mysqli_real_escape_string($db_connect, $_POST['bannerDesc']);

  // Banner Sub Title
  if(empty($subtitle)){
    $_SESSION['subTitle_error'] = "Banner Sub-title Must be Filed with Test.";
    header('location: banner-add.php');
  }else{
    $validSubtitle =  $subtitle;    
  }
  
  // Banner Title Validation Here..
  if(empty($bannertitle)){
    $_SESSION['title_error'] = "Banner Title Must be Filed with Test.";
    header('location: banner-add.php');
  }else{
    $validTitle =  $bannertitle;    
  }

  // Banner Title Validation Here..
  if(empty($bannerDesc)){
    $_SESSION['bannerDesc_error'] = "Banner summary Must be Filed with Test.";
    header('location: banner-add.php');
  }else{
    $bannerlen = strlen($bannerDesc);
    if($bannerlen > 255){
      $_SESSION['bannerDesc_error'] = "Banner text is to much.";
      header('location: banner-add.php');
    }else{
      $validDesc =  $bannerDesc;
      
    }   
  }

  //Banner Photo Validation.
  $bannerPhoto = $_FILES['bannerPhoto'];
  $extention = end(explode('.', $bannerPhoto['name']));
  $allowType = array ( 'jpg', 'jpeg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');

  if(in_array($extention, $allowType)){
    if($bannerPhoto['size'] <= 2000000){
      $newFileName = rand().'.'.$extention;
      $newLocation = '../assets/images/'.$newFileName;
      move_uploaded_file($bannerPhoto['tmp_name'], $newLocation);

      $insertData = "INSERT INTO banner( subTitle, title, summary, bannerPhoto ) VALUES ('$validSubtitle', '$validTitle','$validDesc', '$newFileName' )";
      if(mysqli_query($db_connect, $insertData)){
        $_SESSION['message'] = "Banner Add Successfully.";
        header('location: banner.php');
      }else{
        $_SESSION['message'] = "Something is wrong.".mysqli_error($db_connect);
        header('location: banner.php');
      }
    }else{
      $_SESSION['bannerPhoto_error'] = "Maxium Image Size allow 2MB.";
      header('location: banner-add.php');
    }
  }else{
    $_SESSION['bannerPhoto_error'] = "May be you submait empty or invalid image.";
    header('location: banner-add.php');
  }
}

?>