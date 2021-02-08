<?php 
include 'session.php';
$service_id = $_GET['services-id'];
require ('../database.php');

$services_status = "SELECT * FROM services WHERE id = $service_id ";
$services_query = mysqli_query($db_connect, $services_status);
$services_assoc = mysqli_fetch_assoc($services_query);

if($services_assoc['services_status'] == 1){
    $status_update = "UPDATE services SET services_status = 2 WHERE id = $service_id";
    if(mysqli_query($db_connect, $status_update)){
        $_SESSION['message'] = "Services Deactive Successfully";
        header('location:services.php');
    }
}else{
    $status_update = "UPDATE services SET services_status = 1 WHERE id = $service_id";
    if(mysqli_query($db_connect, $status_update)){
        $_SESSION['message'] = "Services Active Successfully";
        header('location:services.php');
    }
}



?>