<?php 
session_start();

if(!isset($_SESSION['email'])){
    $_SESSION['name'];
    header('location:../login.php');
}

?>