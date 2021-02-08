<?php 
  include 'session.php';
  require_once '../database.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $partnerId = $_POST['partnerId'];
    $brandLogo = $_FILES['thumbnail'];

    $extention = end(explode('.', $brandLogo['name']));
    $allowType = array( 'jpeg', 'jpg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');

    if(in_array($extention, $allowType)){
      if($brandLogo['size'] < 1000000){
        $dataSelect = " SELECT * FROM partner WHERE id = $partnerId ";
        $dataQuery = mysqli_query($db_connect, $dataSelect);
        $dataAssoc = mysqli_fetch_assoc($dataQuery);

        $imgSourse = '../assets/images/'.$dataAssoc['brand_logo'];
        if(file_exists($imgSourse)){
          unlink($imgSourse);
        }
        $newFileName = rand().'.'.$extention;
        $imgLocation = "../assets/images/".$newFileName;
        move_uploaded_file($brandLogo['tmp_name'], $imgLocation);

        $updateThumbnail = " UPDATE partner SET brand_logo = '$newFileName' WHERE id = $partnerId";
        if(mysqli_query($db_connect, $updateThumbnail)){
          $_SESSION['message']= "Partner Upadate Successfully";
          header('location:partner.php');
        }else{
          echo "Something Error ".mysqli_error($db_connect);
        }
      }
    }else{
      $_SESSION['partnerThumb_error'] = "This Type of File Not Allow.";
      header('location: edit-partner.php?partnerId='.$partnerId);
    }
  

    

  }










?>