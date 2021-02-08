<?php 

include 'session.php';
  require_once '../database.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $summary = mysqli_real_escape_string($db_connect, $_POST['summary']);
    $address = mysqli_real_escape_string($db_connect, $_POST['address']);
    $phone = mysqli_real_escape_string($db_connect, $_POST['phone']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);

    // Banner Sub Title
    if(empty($summary)){
      $_SESSION['summary_error'] = "About summary Must be Filed with Test.";
      header('location: banner-edit.php');
    }else{
      $insert = "UPDATE contactInfo SET summary = '$summary' ";
      if(mysqli_query($db_connect, $insert)){
        $_SESSION['message'] = "About Update Successfully.";
        header('location: contactinfo.php');
      }   
    }
    // Address Validation Here..
    if(empty($address)){
      $_SESSION['message'] = "About address must be field with text.";
      header('location: banner-edit.php');
    }else{
      $insert = " UPDATE contactInfo SET address = '$address' ";
      if(mysqli_query($db_connect, $insert)){
        $_SESSION['message'] = "About Update Successfully.";
        header('location: contactinfo.php');
      }     
    }

    // Banner Title Validation Here..
    if(empty($phone)){
      $_SESSION['bannerDesc_error'] = "Phone must be field with text.";
      header('location: banner-edit.php');
    }else{
      $insert = " UPDATE contactInfo SET phone = '$phone' ";
      if(mysqli_query($db_connect, $insert)){
        $_SESSION['message'] = "About Update Successfully.";
        header('location: contactinfo.php');
      }    
    }

    // Banner Title Validation Here..
    if(empty($email)){
      $_SESSION['bannerDesc_error'] = "Email must be field with text.";
      header('location: banner-edit.php');
    }else{
      $insert = " UPDATE contactInfo SET email = '$email' ";
      if(mysqli_query($db_connect, $insert)){
        $_SESSION['message'] = "About Update Successfully.";
        header('location: contactinfo.php');
      }    
    }



  }



?>