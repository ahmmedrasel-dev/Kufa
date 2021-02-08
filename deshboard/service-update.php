<?php 
include('session.php');
require_once('../database.php');
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $service_title = $_POST['service_title'];
    $service_summary = $_POST['service_summary'];
    $service_icon = $_POST['service_icon'];
    $service_id = $_POST['service_id'];

    //Service Title Validation.
    if(empty($service_title)){
        $_SESSION['serviceTitle_error'] = "Write your services title properly.";
        header('location:services-edit.php?services-id='.$service_id);
    }else{
        $titleLen = strlen($service_title);
        if($titleLen > 100){
            $_SESSION['serviceTitle_error'] = "Service title is to long.";
            header('location:services-edit.php?services-id='.$service_id);
        }else{
            $validTitle = $service_title;
        }
    }

    //Service Short Summary Validation.
    if(empty($service_summary)){
        $_SESSION['serviceSummary_error'] = "Write your services short summary here properly.";
        header('location:services-edit.php?services-id='.$service_id);
    }else{
        $titleLen = strlen($service_summary);
        if($titleLen > 255){
            $_SESSION['serviceSummary_error'] = "Service short summary is to long.";
            header('location:services-edit.php?services-id='.$service_id);
        }else{
            $validSummary = $service_summary;
        }
    }

    // Service Icon Validation.
    if(empty($service_icon)){
        $_SESSION['serviceIcon_error'] = "Select your icon.";
        header('location:services-edit.php?services-id='.$service_id);
    }else{
        $validIcon = $service_icon;
    }

    // Data Update Into Database
    $updateService = " UPDATE services SET services_title = '$validTitle', services_summary = '$validSummary', services_icon = '$validIcon' WHERE id = $service_id";
    if(mysqli_query($db_connect, $updateService)){
        $_SESSION['message']= "Services Updated Successfully";
        header('location:services.php');
    };
}


?>