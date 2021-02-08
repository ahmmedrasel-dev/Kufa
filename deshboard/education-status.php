<?php 
  include 'session.php';
  $educationId = $_GET['educationId'];
  require_once '../database.php';
  
  $select = "SELECT * FROM education WHERE id = $educationId";
  $query = mysqli_query($db_connect, $select);
  $assoc = mysqli_fetch_assoc($query);

  if($assoc['status'] == 1){
    $status_update = "UPDATE education SET status = 2 WHERE id = $educationId";
    if(mysqli_query($db_connect, $status_update)){
        $_SESSION['message'] = "Education Deactive Successfully";
        header('location: education.php');
        }else{
          echo "Some thing is wrong".mysqli_error($db_connect);
        }
    }else{
      $status_update = "UPDATE education SET status = 1 WHERE id = $educationId";
      if(mysqli_query($db_connect, $status_update)){
          $_SESSION['message'] = "Education Active Successfully";
          header('location:education.php');
      }
    }
?>