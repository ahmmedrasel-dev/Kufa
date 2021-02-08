<?php
session_start();
require_once('database.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Name Validations
    if(!empty($name)){
        $validName = $name;
        //die($validName);
    }else{
        $_SESSION['name-error'] = "Your name will not be empty.";
        header('location:register.php');
    }

    // Phone Validations
    if(!empty($phone)){
        $phoneLen = strlen($phone);
        if($phoneLen > 10 && $phoneLen < 14){
            $upper = preg_match('@[A-Z]@', $phone);
            $lower = preg_match('@[a-z]@', $phone);

            if(!$upper && !$lower){
                $select = "SELECT COUNT(*) as total FROM users WHERE phone = $phone ";
                $selectQuery = mysqli_query($db_connect, $select);
                $assoc= mysqli_fetch_assoc($selectQuery);
                if($assoc['total'] > 0 ){
                    $_SESSION['phone-error'] = 'Mobile Number Already Exist.';
                    header('location:register.php');
                }else{
                    $validPhone = $phone;
                }
                //die($validPhone);
            }else{
                $_SESSION['phone-error'] = "Your mobile number is invalid.";
                header('location:register.php');
            }
        }else{
            $_SESSION['phone-error'] = "Your mobile number is invalid.";
            header('location:register.php');
        }
        
    }else{
        $_SESSION['phone-error'] = "Your mobile number must be required.";
        header('location:register.php');
    }

    // Email Validation 
    if(!empty($email)){
        $regex = '/^[_A-za-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/';
        $emailRegex = preg_match($regex, $email);
        if($emailRegex){
            $select = "SELECT COUNT(*) as total FROM users WHERE email = '$email' ";
            $selectQuery = mysqli_query($db_connect, $select);
            $assoc= mysqli_fetch_assoc($selectQuery);
            if($assoc['total'] > 0 ){
                $_SESSION['email-error'] = 'Email Already Exist try new email.';
                header('location:register.php');
            }else{
                $validEmail = $email;
            }
        }else{
            $_SESSION['email-error'] = "Your email address is invalid.";
            header('location:register.php');
        }
    }else{
        $_SESSION['email-error'] = "Your email address must be required.";
        header('location:register.php');
    }

    // Password Validation
    if(!empty($password)){
        $passLen = strlen($password);
        // password lenght 8 charecter theke besi hote hobe.
        if($passLen >= 8){
            $upperCase = preg_match('@[A-Z]@', $password);
            $lowerCase = preg_match('@[a-z]@', $password);
            $number = preg_match('@[0-9]@', $password);
            $specialChar = preg_match('@[^\w]@', $password);
            if($upperCase && $lowerCase && $number && $specialChar){
                $validPassword = password_hash($password, PASSWORD_BCRYPT);
                //die($validPassword);
            }else{
                $_SESSION['password-error'] = "Your password must be one special characters, uppercase number and lowercase.";
                header('location:register.php');  
            }
        }else{
            $_SESSION['password-error'] = "Your password must be atleast 8 characters.";
            header('location:register.php');  
        }
    }else{
        $_SESSION['password-error'] = "Your password must be required.";
        header('location:register.php'); 
    }
    // Data Insert Into Database
    if ( $validName && $validPhone && $validEmail && $validPassword ){
        $insert = "INSERT INTO users ( name, phone, email, password ) VALUES('$validName', '$validPhone', '$validEmail', '$validPassword')";
        if(mysqli_query($db_connect, $insert)){
            $_SESSION['message']= "Register Done Successfully";
            header('location:login.php');
        }
    }

}