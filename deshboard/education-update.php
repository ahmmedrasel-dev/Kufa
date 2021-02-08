<?php 
include 'session.php';
require_once '../database.php';

if($_SERVER['REQUEST_METHOD'] == "POST" ){
  $educationId = $_POST['educationId'];
  $year = $_POST['year'];
  $subject = $_POST['subject'];

  //Year Validation.
  if(empty($year)){
    $_SESSION['educationYear_error'] = "Year Must Be Field";
    header('location: education-edit.php?educationId='.$educationId);
  }else{
    $regex = '@[0-1]@';
    $number = preg_match($regex, $year);
    if($number){
      $validYear = $year;
    }else{
      $_SESSION['educationYear_error'] = "Only Number Allow Here.";
      header('location: education-edit.php?educationId='.$educationId);
    } 
  }

  // subject Validation.
  if(empty($subject)){
    $_SESSION['eductionSubject_error'] = "Subject Must Be Field";
    header('location: education-edit.php?educationId='.$educationId);
  }else{
    $validSubject = $subject;
  }

  $update = " UPDATE education SET year = '$validYear', subject = '$validSubject' WHERE id = $educationId ";
    if(mysqli_query($db_connect, $update)){
      $_SESSION['message'] = "Education Update Successfully.";
      header('location:education.php');
    }else{
      $_SESSION['message'] = "Something is Wrong.".mysqli_error($db_connect);
      header('location:education.php');
    }
}



?>