<?php
ob_start();
include 'session.php';
require_once '../database.php';

if($_SERVER['REQUEST_METHOD'] == "POST"){
  $socailIconId = $_POST['socailIconId'];
  $socailIcon = $_POST['socailIcon'];
  $sociallink = $_POST['sociallink'];

  // Social Icon Validation.
  if(empty($socailIcon)){
    $_SESSION['socialIcon_error'] = "Select your icon.";
    header('location:social-edit.php?socialId='.$socialId);
  }else{
    $validIcon = $socailIcon;
  }
  // Social Profile Link Validation.
  if(empty($sociallink)){
    $_SESSION['socialIcon_error'] = "Select your icon.";
    header('location:social-edit.php?socialId='.$socialId);
  }else{
    $validLink = $sociallink;
  }

  $update = " UPDATE socialmedia SET icon = '$validIcon', sociallink = '$validLink' WHERE id = $socailIconId";
    if(mysqli_query($db_connect, $update)){
      $_SESSION['message'] = "Social Media Icon Update Successfully.";
      header('location:socialmedia.php');
    }else{
      echo "Something is wrong.".mysqli_error($db_connect);
    }
}
?>