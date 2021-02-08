<?php 
 include 'session.php';
 require_once '../database.php';
 $socialId = $_GET['socialId'];

 $delete = " DELETE FROM socialmedia WHERE id = $socialId";
 if(mysqli_query($db_connect, $delete)){
   $_SESSION['message'] = "Social Media Icon Delete Successfully.";
   header('location:socialmedia.php');
 }else{
  $_SESSION['message'] = "Something is wrong.".mysqli_error($db_connect);
  header('location:socialmedia.php');
 }

?>