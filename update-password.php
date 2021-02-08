<?php 
session_start();
require_once('database.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $userId = $_POST['user_id'];
    $oldPassword = filter_input(INPUT_POST, 'oldpass', FILTER_SANITIZE_STRING);
    $newPassword = filter_input(INPUT_POST, 'newpass', FILTER_SANITIZE_STRING);
    $confirmPassword = filter_input(INPUT_POST, 'newcpass', FILTER_SANITIZE_STRING);

    $selectUser = " SELECT * FROM users WHERE id = $userId ";
    $userQuery = mysqli_query( $db_connect, $selectUser);
    $userAssoc = mysqli_fetch_assoc($userQuery);
    $user_password = $userAssoc['password'];

    // Old Password Check.
    if(empty($oldPassword)){
        $_SESSION['update-error'] = 'Your Old Password shoud not empty';
        header('location:change-password.php?user-id='.$userId);
    }else{
        if(password_verify($oldPassword, $user_password)){
            // New Password and Confirm Password Maching Check.
            if(empty($newPassword)){
                $_SESSION['newPassword-error'] = 'Your New Password shoud be Filed';
                header('location:change-password.php?user-id='.$userId);
            }else{
                if(empty($confirmPassword)){
                    $_SESSION['confirmPassword-error'] = 'Your Confirm Password shoud be Filed';
                    header('location:change-password.php?user-id='.$userId);
                }else{
                    if($newPassword == $confirmPassword ){
                        $passwordLen = strlen($newPassword);
                        $upperCase = preg_match('@[A-Z]@', $newPassword);
                        $lowerCase = preg_match('@[a-z]@', $newPassword);
                        $number = preg_match('@[0-9]@', $newPassword);
                        $specialChar = preg_match('@[^\w]@', $newPassword);

                        if($upperCase && $lowerCase && $number && $specialChar && $passwordLen > 8){

                            if($oldPassword == $newPassword){
                                $_SESSION['confirmPassword-error3'] = 'Old Password Could not New Password.';
                                header('location:change-password.php?user-id='.$userId);

                            }else{
                                $validPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                                $updatePassword = " UPDATE users SET password = '$validPassword' WHERE id = $userId";
                
                                if(mysqli_query($db_connect, $updatePassword)){
                                    $_SESSION['update-message']="Password Updated Successfully";
                                    header('location:user-profile.php?prifile_id='.$userId);
                                }else{
                                    $_SESSION['update-error'] = 'Not Update';
                                    header('location:change-password.php?user-id='.$userId);
                                }
                            }
                        }else{
                            $_SESSION['confirmPassword-error2'] = 'Your password must be one special characters, uppercase number and lowercase.';
                            header('location:change-password.php?user-id='.$userId);
                        }
                        
                    }else{
                        $_SESSION['confirmPassword-error'] = 'Your Confirm Password Doesn\'t match';
                        header('location:change-password.php?user-id='.$userId);
                    }
                }
            }
        }else{
            $_SESSION['update-error'] = 'Your Old Password Doesn\'t match';
            header('location:change-password.php?user-id='.$userId);
        }
    }
    

}
