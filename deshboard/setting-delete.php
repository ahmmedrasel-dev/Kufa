<?php 
  include 'session.php';
  require_once '../database.php';
  $selectData = "SELECT * FROM setting";
  $dataQuery = mysqli_query($db_connect, $selectData);
  $dataAssoc = mysqli_fetch_assoc($dataAssoc);

  $logoSource = "../assets/images/".$dataAssoc['headerLogo'];
  $favIcon = "../assets/images/".$dataAssoc['favIcon'];
  if(file_exists($logoSource)){
    unlink($logoSource);
    unlink($favIcon);
    $deleteData = "DELETE FROM setting ";
    if(mysqli_query($db_connect, $deleteData)){
      $_SESSION['message'] = " Setting content delete Successfully.";
      header('location: setting.php');
    }
    
  }
  
?>