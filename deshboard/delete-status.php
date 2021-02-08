<?php 
include 'session.php';
$deleteStatusId = $_GET['deleteStatusId'];
require ('../database.php');

$selectStatus = "SELECT * FROM contact WHERE id = $deleteStatusId";
$query = mysqli_query($db_connect, $selectStatus);
$assoc = mysqli_fetch_assoc($query);

if($assoc['deleteStatus'] == 1){
    $status_update = "UPDATE contact SET deleteStatus = 2 WHERE id = $deleteStatusId";
    if(mysqli_query($db_connect, $status_update)){
        $_SESSION['message'] = "Message in trash".mysqli_error($db_connect);
        header('location:messages.php');
    }
}else{
    $status_update = "UPDATE contact SET deleteStatus = 1 WHERE id = $deleteStatusId";
    if(mysqli_query($db_connect, $status_update)){
        $_SESSION['message'] = "Message in Undo".mysqli_error($db_connect);
        header('location:messages.php');
    }
}

?>