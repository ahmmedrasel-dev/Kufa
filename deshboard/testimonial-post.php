<?php 
// From Submit korar por Rederect na hole ob_start() Function use korte hobe.
ob_start();
include 'session.php';
require_once '../database.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $clientName = $_POST['clientName'];
    $designation = $_POST['designation'];
    $clientComment = $_POST['clientComment'];

    //Client Name Validation
    if(empty($clientName)){
        $_SESSION['clientName_error'] = "Write Your Client Name";
        header('location:testimonial-add.php');
    }else{
        $validName = $clientName;
    }
    //Client Designation Validation
    if(empty($designation)){
        $_SESSION['designation_error'] = "Write Your Client Designation.";
        header('location:testimonial-add.php');
    }else{
        $validDesignation = $designation;
    }
    ////Client Comment Validation
    if(empty($clientComment)){
        $_SESSION['Comment_error'] = "Write Your Client Feedback.";
        header('location:testimonial-add.php');
    }else{
        $validComment = $clientComment;
    }


    $clientPhoto = $_FILES['clientPhoto'];
    $extention = end(explode('.', $clientPhoto['name']));
    $allowType = array( 'jpeg', 'jpg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');
    if(in_array($extention, $allowType)){
        if($clientPhoto['size'] <= 2000000 ){
            // Client Name ke file name use korar jonno lower case korchy and jodi name er moddy kono /////space thake tokhon seita - dia replace hobe.
            $lower = strtolower($validName);
            $name = str_replace(' ', '-', $lower);

            $newFileName = $name.'-'.'.'.$extention;
            $fileLocation = '../assets/images/'.$newFileName;
            move_uploaded_file($clientPhoto['tmp_name'], $fileLocation);
            $insertData = "INSERT INTO testimonial ( clientName, designation, clientComment, clientPhoto) VALUES ( '$validName', '$validDesignation', '$validComment', '$newFileName' ) ";
            
            if(mysqli_query($db_connect, $insertData)){
                $_SESSION['message'] = "Testimonial Add Successfully.";
                header('location: testimonial.php');
            }else{
                echo "Somthing error Please Check.".mysqli_error($db_connect);
            }

        }else{
            echo "File Size to Big.";
        }
    }else{
        echo "This type of file not Allow.";
    }

  }


?>