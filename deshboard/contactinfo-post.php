<?php
  include 'session.php';
  require_once '../database.php';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $summary = mysqli_real_escape_string($db_connect, $_POST['summary']);
    $address = mysqli_real_escape_string($db_connect, $_POST['address']);
    $phone = mysqli_real_escape_string($db_connect, $_POST['phone']);
    $email = mysqli_real_escape_string($db_connect, $_POST['email']);

    //Summary Validation
    if(empty($summary)){
      $_SESSION['summary_error'] = "Write your Contact Summary.";
      header('location: contact-info-add.php');
    }else{
      $validSummary = $summary;
    }
    // Address Validation
    if(empty($address)){
      $_SESSION['address_error'] = "Write your Contact Address.";
      header('location: contact-info-add.php');
    }else{
      $validAddress = $address;
    }
    // Phone Validations
    if(empty($phone)){
      $_SESSION['phone_error'] = "Write your phone number.";
      header('location: contact-info-add.php');
    }else{
      $phoneLen = strlen($phone);
      if($phoneLen > 10 && $phoneLen < 14){
        $upper = preg_match('@[A-Z]@', $phone);
        $lower = preg_match('@[a-z]@', $phone);
        if(!$upper && !$lower){
          $validPhone = $phone;
        }else{
            $_SESSION['phone_error'] = "Your mobile number is invalid.";
            header('location: contact-info-add.php');
        }
      }else{
        $_SESSION['phone-error'] = "Number must be between 10-14 digit.";
        header('location: contact-info-add.php');
      }
    }

    // Email Validation 
    if(empty($email)){
      $_SESSION['email_error'] = "Your email address must be required.";
      header('location: contact-info-add.php');
    }else{
      $regex = '/^[_A-za-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,6})$/';
      $emailRegex = preg_match($regex, $email);
      if($emailRegex){
        $validEmail = $email;
      }else{
          $_SESSION['email_error'] = "Your email address is invalid.";
          header('location: contact-info-add.php');
      }
    }

    $select = "SELECT COUNT(*) as total FROM contactinfo";
    $query = mysqli_query($db_connect,$select);
    $assoc = mysqli_fetch_assoc($query);

    if($assoc['total'] > 0){
      $_SESSION['message']= "Contact Info Already Exsist.";
      header('location: contactinfo.php');
    }else{
      if( $validSummary && $validAddress && $validPhone && $validEmail ){
        $insertContactInfo = " INSERT INTO contactInfo ( summary, address, phone, email ) VALUES ( '$validSummary', '$validAddress', '$validPhone', '$validEmail' ) ";
        if(mysqli_query($db_connect, $insertContactInfo)){
          $_SESSION['message']= "Contact Info Add Successfully";
          header('location: contactinfo.php');
        }else{
          $_SESSION['message']= "Something is wrong.".mysqli_error($db_connect);
          header('location:contactinfo.php');
        }
      }
    }

  }

?>