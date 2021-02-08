<?php 
include "session.php";
require "../database.php";

$portfolio_id = $_GET['portfolio_id'];
// Prothome amra ID ta dia Folder take Image ta khje ber korbo tar jonno amader ke select querry use korte hobe.
$selectData = " SELECT * FROM portfolios WHERE id = $portfolio_id";
$dataQuery = mysqli_query($db_connect, $selectData);
$dataAssoc = mysqli_fetch_assoc($dataQuery);

$imgSourse1 = "../assets/images/".$dataAssoc['thumbnail'];
$imgSourse2 = "../assets/images/".$dataAssoc['featureimage'];
if(file_exists($imgSourse1)){
  unlink($imgSourse1);
  unlink($imgSourse2);

  $deleteData = " DELETE FROM portfolios WHERE id = $portfolio_id";
  if(mysqli_query($db_connect, $deleteData)){
    $_SESSION['message']= "Portfolio Delete Successfully";
    header('location:portfolios.php');
  }else{
    echo "Delete hoy nai";
  }

}










?>