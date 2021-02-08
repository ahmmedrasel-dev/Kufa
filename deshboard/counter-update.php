<?php 
include 'session.php';
require_once '../database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $counterId = $_POST['counterId'];
  $counter_title = $_POST['counter_title'];
  $counter_number = $_POST['counter_number'];
  $counter_icon = $_POST['counter_icon'];

  if(empty($counter_title)){
    $_SESSION['counterTitle_error'] = "Write Your Counter Title.";
    header('location:counter-edit.php?counterId='.$counterId);
  }else{
    $validTitle = $counter_title;
  }

  if(empty($counter_number)){
    $_SESSION['counterTitle_error'] = "Write Your Counter Number.";
    header('location:counter-edit.php?counterId='.$counterId);
  }else{
    $validNumber = $counter_number;
  }

  if(empty($counter_icon)){
    $_SESSION['counterTitle_error'] = "Select Icon Frem Dromdown.";
    header('location:counter-edit.php?counterId='.$counterId);
  }else{
    $validIcon = $counter_icon;
  }

  if( $validTitle && $validNumber && $validIcon) {
    $dataUpdate = " UPDATE counter SET counter_icon = '$validIcon' , counter_number ='$validNumber', counter_title ='$validTitle' WHERE id = $counterId ";
    if(mysqli_query($db_connect, $dataUpdate)){
      $_SESSION['message']= "Counter Updated Successfully";
      header('location:counter.php');
    }else{
      echo "Update hoy nai".mysqli_error($db_connect);
    }
  }



}


?>