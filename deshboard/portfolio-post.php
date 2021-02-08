<?php
  include('session.php'); 
  require_once '../database.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['portfolio_title'];
    $category = $_POST['portfolio_category'];
    $summary = $_POST['portfolio_summary'];

    // Title Validation Start Here.
    if(empty($title)){
      $_SESSION['portfolioTitle_error'] = 'Portfolio Title Must be Required';
      header('location:portfolios-add.php');
    }else{
      $titleLen = strlen($title);
      if($titleLen < 200){
        $validTitle = $title;
      }else{
        $_SESSION['portfolioTitle_error']= 'Portfolio Title is too long.';
        header('location:portfolios-add.php');
      }
    }

    // Category Validation Start Here.
    if(empty($category)){
      $_SESSION['portfolioCategory_error']= 'Portfolio Title Must be Required';
      header('location:portfolios-add.php');
    }else{
      $categoryLen = strlen($category);
      if($categoryLen < 100){
        $validcategory = $category;
      }else{
        $_SESSION['portfolioCategory_error']= 'Portfolio Title is too long.';
        header('location:portfolios-add.php');
      }
    }

    // Summary Validation Start Here.
    if(empty($summary)){
      $_SESSION['portfolioSummary_error']= 'Portfolio Title Must be Required';
      header('location:portfolios-add.php');
    }else{
      $validSummary = $summary;
    }

    // Media File Validation Start Here.
    $thumbnail = $_FILES['thumbnail'];
    $extention= end(explode('.', $thumbnail['name']));
    $allowType = array( 'jpeg', 'jpg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');

    if(in_array($extention, $allowType)){

      if($thumbnail['size'] < 2000000 ){

        $newFileName = rand().".".$extention;
        $newLocation = "../assets/images/".$newFileName;
        move_uploaded_file($thumbnail['tmp_name'], $newLocation);

        // Feature Images Insert Here
        $featureImages = $_FILES['feature_img'];
        $featureExten = end(explode('.',$featureImages['name']));
        $allowType = array( 'jpeg', 'jpg', 'png', 'webp', 'JPEG', 'JPG', 'PNG');


        if(in_array($featureExten, $allowType)){
          if($featureImages['size'] < 2000000){

            $newfileName2 = rand().'.'.$featureExten;
            $newLocation2 = "../assets/images/".$newfileName2;
            move_uploaded_file($featureImages['tmp_name'], $newLocation2);

            $insertData = " INSERT INTO portfolios ( title, category, summary, thumbnail, featureimage ) VALUES ( '$validTitle', '$validcategory', '$validSummary', '$newFileName', '$newfileName2' ) ";
            if(mysqli_query($db_connect, $insertData)){
              $_SESSION['message']= "Portfolios Add Successfully";
              header('location:portfolios.php');
            }else{
              echo "Something Error ".mysqli_error($db_connect);
            }

          }else{
            echo "Data inser hoitechy na.";
          }
        }else{
          $_SESSION['portfolioFeature_error']= 'This type of file not allow.';
          header('location:add-portfolios.php');
        }

      }else{
        $_SESSION['portfolioThumbnail_error']= 'Image size maximum 2MB allow.';
        header('location:add-portfolios.php');
      }
    }else{
      $_SESSION['portfolioThumbnail_error']= 'This type of file not allow.';
      header('location:add-portfolios.php');
    }


  }
  
?>