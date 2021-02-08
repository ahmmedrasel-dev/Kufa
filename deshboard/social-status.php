<?php 
  include 'session.php';
  require_once '../database.php';
  $socialId = $_GET['socialId'];

  $select = "SELECT * FROM socialmedia WHERE id = $socialId";
  $query = mysqli_query($db_connect, $select);
  $assoc = mysqli_fetch_assoc($query);

  if($assoc['status'] == 1 ){
    $update = "UPDATE socialmedia SET status = 2 WHERE id = $socialId";
    if(mysqli_query($db_connect, $update)){
      $_SESSION['message'] = "Socail Media Status Deavtive Successfully.";
      header('location: socialmedia.php');
    }else{
      $_SESSION['message'] = "Something is Wrong.".mysqli_error($db_connect);
      header('location: socialmedia.php');
    }
  }else{
    $update = "UPDATE socialmedia SET status = 1 WHERE id = $socialId";
    if(mysqli_query($db_connect, $update)){
      $_SESSION['message'] = "Socail Media Status Active Successfully.";
      header('location: socialmedia.php');
    }else{
      $_SESSION['message'] = "Something is Wrong.".mysqli_error($db_connect);
      header('location: socialmedia.php');
    }
  }

?>