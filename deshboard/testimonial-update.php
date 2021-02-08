<?php
ob_start();
include 'session.php';
require_once '../database.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$testimonialId = mysqli_real_escape_string($db_connect, $_POST['testimonialId']);
	$clientName = mysqli_real_escape_string($db_connect, $_POST['clientName']);
	$designation = mysqli_real_escape_string($db_connect, $_POST['designation']);
	$clientComment = mysqli_real_escape_string($db_connect, $_POST['clientComment']);
	
	//Client Name Validation
	if(empty($clientName)){
		$_SESSION['clientName_error'] = "Write Your Client Name";
		header('location:testimonial-edit.php?testimonialId='.$testimonialId);
	}else{
		$dataUpdate = " UPDATE testimonial SET clientName = '$clientName' WHERE id = $testimonialId ";
		if (mysqli_query($db_connect, $dataUpdate)) {
			$_SESSION['message'] = " Update Successfully.";
			header('location: testimonial.php');
		}
	}
	//Client Designation Validation
	if(empty($designation)){
		$_SESSION['designation_error'] = "Write Your Client Designation.";
		header('location:testimonial-edit.php?testimonialId='.$testimonialId);
	}else{
		$dataUpdate = " UPDATE testimonial SET designation = '$designation' WHERE id = $testimonialId ";
		if (mysqli_query($db_connect, $dataUpdate)) {
			$_SESSION['message'] = " Update Successfully.";
			header('location: testimonial.php');
		}
	}
	////Client Comment Validation
	if(empty($clientComment)){
		$_SESSION['Comment_error'] = "Write Your Client Feedback.";
		header('location:testimonial-edit.php?testimonialId='.$testimonialId);
	}else{
		$dataUpdate = " UPDATE testimonial SET clientComment = '$clientComment' WHERE id = $testimonialId ";
		if (mysqli_query($db_connect, $dataUpdate)) {
			$_SESSION['message'] = " Update Successfully."; 
			header('location: testimonial.php');
		}
	}

	$clientPhoto = $_FILES['clientPhoto'];
	$extention= end(explode('.', $clientPhoto['name']));
	$allowType = array( 'jpeg', 'jpg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');

	$clientPhoto = $_FILES['clientPhoto'];
  $extention= end(explode('.', $clientPhoto['name']));
  $allowType = array( 'jpeg', 'jpg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');
  if (in_array($extention, $allowType)) {
    if ($clientPhoto['size'] < 200000) {
      $dataSelect = " SELECT * FROM testimonial WHERE id = $testimonialId ";
      $dataQuery = mysqli_query($db_connect, $dataSelect);
      $dataAssoc = mysqli_fetch_assoc($dataQuery);

      $imgSourse1 = "../assets/images/".$dataAssoc['clientPhoto'];
      if(file_exists($imgSourse1)){
        unlink($imgSourse1);
      }

      $newFileName = rand().'.'.$extention;
      $newlocation = "../assets/images/".$newFileName;
      move_uploaded_file($clientPhoto['tmp_name'], $newlocation );

      $updatePhoto = " UPDATE testimonial SET clientPhoto = '$newFileName' WHERE id = $testimonialId ";
      if(mysqli_query($db_connect, $updatePhoto)){
        $_SESSION['message']= "Client Photo Updated Successfully";
        header('location: testimonial.php');
      }else{
        echo "Something Error ".mysqli_error($db_connect);
      }


    }else{
      $_SESSION['favIcon_error'] = "Your File Size too big";
      header('location: setting-edit.php');
    }
  }






}

?>