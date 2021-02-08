<?php
ob_start(); 
include('session.php');
require_once('../database.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $title = mysqli_real_escape_string($db_connect, $_POST['title']);
  $category = mysqli_real_escape_string($db_connect, $_POST['category']);
  $summary = mysqli_real_escape_string($db_connect, $_POST['summary']);
  $portfolio_Id = $_POST['portfolio_Id'];

  //Service Title Validation.
  if(empty($title)){
    $_SESSION['portfolioTitle_error'] = "Write your Portfolio title properly.";
    header('location: portfolio-edit.php?portfolio_id='.$portfolio_Id);
  }else{
    $titleLen = strlen($title);
      if($titleLen > 100){
        $_SESSION['portfolioTitle_error'] = "Portfolio title is to long.";
        header('location:portfolio-edit.php?portfolio_id='.$portfolio_Id);
      }else{
        $validTitle= $title;
      } 
  }

  //Portfolio Category Validation.
  if(empty($category)){
    $_SESSION['portfolioCategory_error'] = "Write your Portfolio Category properly.";
    header('location:portfolio-edit.php?portfolio_id='.$portfolio_Id);
  }else{
    $categoryLen = strlen($category);
    if($categoryLen > 100){
      $_SESSION['portfolioCategory_error'] = "Portfolio Category is to long.";
      header('location:portfolio-edit.php?portfolio_id='.$portfolio_Id);
      }else{
        $validCategory= $category;
      } 
  }

  //Portfolio Summary Validation.
  if(empty($summary)){
    $_SESSION['portfolioSummary_error'] = "Write your Portfolio Summary properly.";
    header('location:portfolio-edit.php?portfolio_id='.$portfolio_Id);
  }else{
    $validSummary = $summary;
  }

  $updateData = " UPDATE portfolios SET summary= '$validSummary', category= '$validCategory', title= '$validTitle' WHERE id = $portfolio_Id";
  if (mysqli_query($db_connect, $updateData)) {
    $_SESSION['message'] = " Update Successfully.";
    header('location: portfolios.php');
    die();
  }else{
    $_SESSION['message'] = " Something Wrong.".mysqli_error($db_connect);
    header('location: portfolios.php');
  }

  $thumbnail = $_FILES['thumbnail'];
  $extention= end(explode('.', $thumbnail['name']));
  $allowType = array( 'jpeg', 'jpg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');

  if(in_array($extention, $allowType)){
    if($thumbnail['size'] < 2000000 ){
      $dataSelect = " SELECT * FROM portfolios WHERE id = $portfolio_Id ";
      $dataQuery = mysqli_query($db_connect, $dataSelect);
      $dataAssoc = mysqli_fetch_assoc($dataQuery);
      $imgSourse1 = "../assets/images/".$dataAssoc['thumbnail'];
      if(file_exists($imgSourse1)){
        unlink($imgSourse1);
      }
      $newFileName = rand().".".$extention;
      $newlocation = "../assets/images/".$newFileName;
      move_uploaded_file($thumbnail['tmp_name'], $newlocation );

      $updateThumbnail = " UPDATE portfolios SET thumbnail = '$newFileName' WHERE id = $portfolio_Id";
      if(mysqli_query($db_connect, $updateThumbnail)){
        $_SESSION['message']= "Portfolios Add Successfully";
        header('location: portfolios.php');
      }else{
        echo "Something Error ".mysqli_error($db_connect);
      }

    }else{
      echo "File is to big.";
    }
  }else{
    $_SESSION['message'] = "This type of Thumbnail images file not allow.";
    header('location: portfolios.php');
  }

  $feature_img = $_FILES['feature_img'];
  $extention2= end(explode('.', $feature_img['name']));
  $allowType2 = array( 'jpeg', 'jpg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');

  if(in_array($extention2, $allowType2)){
    if($feature_img['size'] < 2000000 ){
      $dataSelect2 = " SELECT * FROM portfolios WHERE id = $portfolio_Id ";
      $dataQuery2 = mysqli_query($db_connect, $dataSelect2);
      $dataAssoc2 = mysqli_fetch_assoc($dataQuery2);

      $imgSourse2 = "../assets/images/".$dataAssoc2['featureimage'];
      if(file_exists($imgSourse2)){
        unlink($imgSourse2);
      }
      $newFileName2 = rand().".".$extention2;
      $newlocation2 = "../assets/images/".$newFileName2;
      move_uploaded_file($feature_img['tmp_name'], $newlocation2 );

      $updatefeature_img = " UPDATE portfolios SET featureimage = '$newFileName2' WHERE id = $portfolio_Id";
      if(mysqli_query($db_connect, $updatefeature_img)){
        $_SESSION['message']= "Portfolios Updated Successfully";
        header('location: portfolios.php');
      }else{
        $_SESSION['message'] = "Something Error ".mysqli_error($db_connect);
        header('location: portfolios.php');
      }

    }else{
      $_SESSION['message'] =  "File is to big.";
      header('location: portfolios.php');
    }
  }else{
    $_SESSION['message'] = "This type of Feature images file not allow.";
    header('location: portfolios.php');
  }

}

?>