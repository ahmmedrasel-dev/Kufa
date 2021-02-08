<?php 
  include 'session.php';
  require_once '../database.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $summary = mysqli_real_escape_string($db_connect,$_POST['summary']);

    // About Summary Validation Here..
    if(empty($summary)){
      $_SESSION['aboutSummary_error'] = "About summary Must be Filed with Test.";
      header('location: about-add.php');
    }else{
      $validSummary = $summary;    
    }

    // About Photo Validation.. 
    $aboutPhoto = $_FILES['aboutPhoto'];
    $fileExten = end(explode('.',$aboutPhoto['name']));
    $allowType = array ( 'jpg', 'jpeg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');
    if(in_array($fileExten, $allowType)){
      if($aboutPhoto['size'] <= 2000000){

        $newFileName = rand().'.'.$fileExten;
        $newLocation = '../assets/images/'.$newFileName;
        move_uploaded_file($aboutPhoto['tmp_name'], $newLocation); 

        $insertData = "INSERT INTO about ( summary, aboutPhoto ) VALUES ('$validSummary', '$newFileName' )";
        if(mysqli_query($db_connect, $insertData)){
          $_SESSION['message'] = "About Update Successfully.";
          header('location: aboutme.php');
        }else{
          $_SESSION['message'] = "About Not Update Successfully.".mysqli_error($db_connect);
          header('location: aboutme.php');
        }

      }else{
        $_SESSION['aboutPhoto_error'] = "Maxium Image Size allow 2MB.";
        header('location: aboutme-edit.php');
      }
    }else{
      $_SESSION['aboutPhoto_error'] = "May be you submait empty or invalid image.";
      header('location: aboutme-edit.php');
    }

  }



?>