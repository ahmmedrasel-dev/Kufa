<?php 
session_start();
require_once('database.php');
$userId = $_GET['prifile_id'];

$select_data = "SELECT * FROM users WHERE id = $userId";
$select_query = mysqli_query($db_connect, $select_data);
$assoc = mysqli_fetch_assoc($select_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body{
            padding-top:30px;
        }
        .fontawesome {  
            margin-bottom: 10px;margin-right: 10px;
        }

        small {
            display: block;
            line-height: 1.428571429;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8 bg-warning m-auto p-5 rounded">
                    <div class="row">
                        <div class="col-6">
                            <img src="https://www.w3schools.com/bootstrap4/img_avatar1.png" alt="" class="img-fluid img-rounded img-responsive" />
                        </div>
                        <div class="col-6 border p-3">
                            <h2><i class="fa fa-user fontawesome">
                            </i><?php echo $assoc['name']; ?></h2>
                            <small><cite title="San Francisco, USA">San Francisco, USA <i class="fa fa-map-marker fontawesome">
                            </i> </cite></small>
                            <p>
                                <i class="fa fa-phone fontawesome"></i><?php echo $assoc['phone']; ?>
                                <br />
                                <i class="fa fa-envelope fontawesome"></i><?php echo $assoc['email']; ?>
                                <br />
                                <i class="fa fa-gift fontawesome"></i>June 02, 1988
                                <br />
                                <i class="fa fa-lock fontawesome"></i>********

                            </p>
                            <a href="change-password.php?user-id=<?php echo $assoc['id']; ?>" class="btn btn-primary">Change Password</a>
                            <p class="text-color">
                                <?php if($_SESSION['update-message']): ?>
                                    <style>
                                        .text-color{
                                            color: green;
                                        }
                                        
                                    </style>
                                <?php
                                    echo  $_SESSION['update-message'];
                                    unset($_SESSION['update-message']);
                                endif; ?>
                            </p>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</body>
</html>