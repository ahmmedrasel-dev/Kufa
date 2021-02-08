<?php
session_start();
require_once('database.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $userId = $_POST['user_id'];
    // Name Validations
    if(!empty($name)){
        $validName = $name;
        //die($validName);
    }else{
        $_SESSION['name-error'] = "Your name will not be empty.";
        header('location:user-edit.php');
    }

    // Phone Validations
    if(!empty($phone)){
        $phoneLen = strlen($phone);
        if($phoneLen > 10 && $phoneLen < 14){
            $upper = preg_match('@[A-Z]@', $phone);
            $lower = preg_match('@[a-z]@', $phone);
            if(!$upper && !$lower){
                $validPhone = $phone;
                //die($validPhone);
            }else{
                $_SESSION['phone-error'] = "Your mobile number is invalid.";
                header('location:user-edit.php');
            }
        }else{
            $_SESSION['phone-error'] = "Your mobile number is invalid.";
            header('location:user-edit.php');
        }
        
    }else{
        $_SESSION['phone-error'] = "Your mobile number must be required.";
        header('location:user-edit.php');
    }

    // Email Validation 
    if(!empty($email)){
        $regex = '/^[_A-za-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/';
        $emailRegex = preg_match($regex, $email);
        if($emailRegex){
            $validEmail = $email;
        }else{
            $_SESSION['email-error'] = "Your email address is invalid.";
            header('location:user-edit.php');
        }
    }else{
        $_SESSION['email-error'] = "Your email address must be required.";
        header('location:user-edit.php');
    }

    // Data Insert Into Database
    if ( $validName && $validPhone && $validEmail ){
        $updateUser = " UPDATE users SET name = '$validName', phone = '$validPhone', email = '$validEmail' WHERE id = $userId";
        if(mysqli_query($db_connect, $updateUser)){
            $_SESSION['message']= "Users Updated Successfully";
            header('location:user.php');
        };
    }

}