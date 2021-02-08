<?php
session_start();
require_once('database.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $select = "SELECT COUNT(*) as total, name, email, password FROM users WHERE email = '$email' ";
    $selectQuery = mysqli_query($db_connect, $select);
    $assoc= mysqli_fetch_assoc($selectQuery);

    if($assoc['total'] > 0 ){
        $userPassword = $assoc['password'];
        if( password_verify($password, $userPassword)){
            $_SESSION['name'] = $assoc['name'];
            $_SESSION['email'] = $assoc['email'];
            header('location:deshboard/deshboard.php');
        }else{
            $_SESSION['password-error'] = 'Your Password Doesn\'t match';
        header('location:login.php');
        }
    }else{
        $_SESSION['login-error'] = 'Your Email Doesn\'t match';
        header('location:login.php');
    }
    die();
}