<?php 
include 'session.php';
$readStatusId = $_GET['readStatusId'];
require ('../database.php');

$selectStatus = "SELECT * FROM contact WHERE id = $readStatusId";
$query = mysqli_query($db_connect, $selectStatus);
$assoc = mysqli_fetch_assoc($query);

if($assoc['readStatus'] == 1){
    $status_update = "UPDATE contact SET readStatus = 2 WHERE id = $readStatusId";
    if(mysqli_query($db_connect, $status_update)){
        $_SESSION['message'] = "Message read";
        header('location:messages.php');
    }
}else{
    $status_update = "UPDATE contact SET readStatus = 1 WHERE id = $readStatusId";
    if(mysqli_query($db_connect, $status_update)){
        $_SESSION['message'] = "Message Unread";
        header('location:messages.php');
    }
}

?>