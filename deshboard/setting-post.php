<?php 
include 'session.php';
require_once '../database.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $websiteTitle = mysqli_real_escape_string($db_connect, $_POST['websiteTitle']);
  $footerText = mysqli_real_escape_string($db_connect, $_POST['footerText']);
  // Website Title Validation.
  if(empty($websiteTitle)){
    $_SESSION['websiteTitle_error'] = "Please Write your Website title.";
    header('location: setting-add.php');
  }else{
    $validTitle = $websiteTitle;
  }
  // Website Title Validation.
  if(empty($footerText)){
    $_SESSION['footerText_error'] = "Please Write your Website title.";
    header('location: setting-add.php');
  }else{
    $validText = $footerText;
  }

  // Media File Validation Start Here.
  $favIcon = $_FILES['favIcon'];
  $extention= end(explode('.', $favIcon['name']));
  $allowType = array( 'jpeg', 'jpg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');

  if(in_array($extention, $allowType)){

    if($favIcon['size'] <= 100000 ){
      $newFileName = rand().".".$extention;
      $newLocation = "../assets/images/".$newFileName;
      move_uploaded_file($favIcon['tmp_name'], $newLocation);

      $insertFavicon = " INSERT INTO setting ( websiteTitle, footerText, favIcon) VALUES ( '$validTitle', '$validText', '$newFileName') ";
      if(mysqli_query($db_connect, $insertFavicon)){
        $_SESSION['message']= "Setting Content Add Successfully";
        header('location:setting.php'.mysqli_error($db_connect));
      }else{
        echo "Something Error ".mysqli_error($db_connect);
      }

      // Header Images Insert Here
      $headerLogo = $_FILES['headerLogo'];
      $logoExten = end(explode('.',$headerLogo['name']));
      $allowType = array( 'jpeg', 'jpg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');
      if(in_array($logoExten, $allowType)){
        if($headerLogo['size'] < 2000000){
          $newfileName2 = rand().'.'.$logoExten;
          $newLocation2 = "../assets/images/".$newfileName2;
          move_uploaded_file($headerLogo['tmp_name'], $newLocation2);

          $updateHeaderLogo = " UPDATE setting SET headerLogo = '$newfileName2' ";
          if(mysqli_query($db_connect, $updateHeaderLogo)){
            $_SESSION['message']= "Setting Content Add Successfully";
            header('location:setting.php');
          }else{
            echo "Something Error ".mysqli_error($db_connect);
          }

        }else{
          echo "Data inser hoitechy na.".mysqli_error($db_connect);
        }
      }else{
        $_SESSION['portfolioFeature_error']= 'This type of file not allow.';
        header('location:setting-add.php'.mysqli_error($db_connect));
      }

    }else{
      $_SESSION['portfolioThumbnail_error']= 'Image size maximum 2MB allow.';
      header('location:setting-add.php'.mysqli_error($db_connect));
    }
  }else{
    $_SESSION['portfolioThumbnail_error']= 'This type of file not allow.';
    header('location:setting-add.php'.mysqli_error($db_connect));
  }


}

?>