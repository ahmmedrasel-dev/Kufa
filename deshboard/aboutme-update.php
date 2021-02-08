<?php 
  ob_start();
  include 'session.php';
  require_once '../database.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $summary = mysqli_real_escape_string($db_connect, $_POST['summary']);

    // About Summary Validation Here..
    if(empty($summary)){
      $_SESSION['aboutSummary_error'] = "About summary Must be Filed with Test.";
      header('location: aboutme-edit.php');
    }else{
      $insert = " UPDATE about SET summary = '$summary' ";
      if(mysqli_query($db_connect, $insert)){
        $_SESSION['message'] = "About Update Successfully.";
        header('location: aboutme.php');
      }     
    }

    // About Photo Validation.. 
    $aboutPhoto = $_FILES['aboutPhoto'];
    $extention= end(explode('.', $aboutPhoto['name']));
    $allowType = array( 'jpeg', 'jpg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');
    if (in_array($extention, $allowType)) {
      if($aboutPhoto['size'] < 2000000) {
        $dataSelect = " SELECT * FROM summary ";
        $dataQuery = mysqli_query($db_connect, $dataSelect);
        $dataAssoc = mysqli_fetch_assoc($dataQuery);

        $imgSourse1 = "../assets/images/".$dataAssoc['aboutPhoto'];
        if(file_exists($imgSourse1)){
          unlink($imgSourse1);
        }

        $newFileName = rand().'.'.$extention;
        $newlocation = "../assets/images/".$newFileName;
        move_uploaded_file($aboutPhoto['tmp_name'], $newlocation );

        $updatePhoto = " UPDATE about SET aboutPhoto = '$newFileName' ";
        if(mysqli_query($db_connect, $updatePhoto)){
          $_SESSION['message']= "About Content Updated Successfully";
          header('location: about.php');
        }else{
          echo "Something Error ".mysqli_error($db_connect);
        }


      }else{
        $_SESSION['bannerPhoto_error'] = "Your File Size too big";
        header('location: about-edit.php');
      }
    }

  }



?>