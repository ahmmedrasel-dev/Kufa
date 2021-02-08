<?php
    session_start();
    require_once('database.php');
    $user_id = $_GET['status_id'];
    
    $selectUser = "SELECT * FROM users WHERE id = '$user_id' ";
    $userQuery = mysqli_query($db_connect, $selectUser);
    $user_assoc = mysqli_fetch_assoc($userQuery);

    if($user_assoc['status'] == 1 ){
        $updateUser = "UPDATE users SET status = 2 WHERE id = '$user_id '";
        if(mysqli_query($db_connect, $updateUser)){
            $_SESSION['message']= "Users Deactivated Successfully";
            header('location:user.php');
        }
    }else{
        $updateUser = "UPDATE users SET status = 1 WHERE id = '$user_id' ";
        if(mysqli_query($db_connect, $updateUser)){
            $_SESSION['message']= "Users Activated Successfully";
            header('location:user.php');
        }
    }

?>