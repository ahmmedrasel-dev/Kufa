<?php 

    include 'session.php';
    $portfolio_id = $_GET['portfolio_id'];
    require ('../database.php');

    $portfolio_status = "SELECT * FROM portfolios WHERE id = $portfolio_id ";
    $portfolio_query = mysqli_query($db_connect, $portfolio_status);
    $portfolio_assoc = mysqli_fetch_assoc($portfolio_query);

    if($portfolio_assoc['status'] == 1){
        $portfolio_update = "UPDATE portfolios SET status = 2 WHERE id = $portfolio_id";
        if(mysqli_query($db_connect, $portfolio_update)){
            $_SESSION['message'] = "Portfolio Deactive Successfully";
            header('location:portfolios.php');
        }
    }else{
        $portfolio_update = "UPDATE portfolios SET status = 1 WHERE id = $portfolio_id";
        if(mysqli_query($db_connect, $portfolio_update)){
            $_SESSION['message'] = "Portfolio Active Successfully";
            header('location:portfolios.php');
        }
    }



?>