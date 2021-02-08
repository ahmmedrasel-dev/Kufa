
<?php
ob_start();
include 'session.php';
require_once '../database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $subTitle = mysqli_real_escape_string($db_connect, $_POST['subTitle']);
  $title = mysqli_real_escape_string($db_connect, $_POST['title']);
  $summary = mysqli_real_escape_string($db_connect, $_POST['summary']);

  // Banner Sub Title Validation.
  if(empty($subTitle)){
    $_SESSION['subTitle_error'] = "Banner Sub-title Must be Filed with Test.";
    header('location: banner-edit.php');
  }else{
    $validSubTitle = $subTitle;
  }
  
  // Banner Title Validation.
  if(empty($title)){
    $_SESSION['title_error'] = "Banner title Must be Filed with Test.";
    header('location: banner-edit.php');
  }else{
    $validTitle = $title;
  }

    
  // Banner Title Validation.
  if(empty($summary)){
    $_SESSION['bannerDesc_error'] = "Banner Summary Must be Filed with Test.";
    header('location: banner-edit.php');
  }else{
    $validsummary = $summary;
  }


  $dataUpdate = " UPDATE banner SET subTitle = '$validSubTitle', title = '$validTitle', summary = '$validsummary' ";
  if (mysqli_query($db_connect, $dataUpdate)) {
    $_SESSION['message'] = " Banner Content Update Successfully.";
    header('location: banner.php');
  }

  $bannerPhoto = $_FILES['bannerPhoto'];
  $extention= end(explode('.', $bannerPhoto['name']));
  $allowType = array( 'jpeg', 'jpg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');
  if (in_array($extention, $allowType)) {
    if($bannerPhoto['size'] < 2000000) {
      $dataSelect = " SELECT * FROM banner ";
      $dataQuery = mysqli_query($db_connect, $dataSelect);
      $dataAssoc = mysqli_fetch_assoc($dataQuery);

      $imgSourse1 = "../assets/images/".$dataAssoc['bannerPhoto'];
      if(file_exists($imgSourse1)){
        unlink($imgSourse1);
      }

      $newFileName = rand().'.'.$extention;
      $newlocation = "../assets/images/".$newFileName;
      move_uploaded_file($bannerPhoto['tmp_name'], $newlocation );

      $updatePhoto = " UPDATE banner SET bannerPhoto = '$newFileName' ";
      if(mysqli_query($db_connect, $updatePhoto)){
        $_SESSION['message']= "Banner Content Updated Successfully";
        header('location: banner.php');
      }else{
        echo "Something Error ".mysqli_error($db_connect);
      }


    }else{
      $_SESSION['bannerPhoto_error'] = "Your File Size too big";
      header('location: banner-edit.php');
    }
  }

}

?>