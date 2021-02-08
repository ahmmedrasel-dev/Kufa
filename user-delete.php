<?php
session_start();
require_once('database.php');
$user_id = $_GET['delete_id'];

$deleteUser = "DELETE FROM users WHERE id = $user_id";
if(mysqli_query($db_connect, $deleteUser)){
    $_SESSION['message']= "Users Delete Successfully";
    header('location:user.php');
}




?>