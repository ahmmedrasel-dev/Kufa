<?php
session_start();
require_once('../database.php');
$service_id = $_GET['services-id'];

$deleteService = "DELETE FROM services WHERE id = $service_id";
if(mysqli_query($db_connect, $deleteService)){
    $_SESSION['message']= "Users Delete Successfully";
    header('location:services.php');
}

?>