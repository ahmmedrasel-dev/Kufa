<?php 
session_start();
$userId = $_GET['user-id'];
require_once('database.php');
    $selectUser = " SELECT * FROM users WHERE id = $userId ";
    $userQuery = mysqli_query( $db_connect, $selectUser);
    $userAssoc = mysqli_fetch_assoc($userQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-6 m-auto">
                <div class="register-form bg-light p-5 rounded">
                    <div class="form-header">
                        <h4 class="text-center bg-primary text-white py-2 rounded"><?php echo $userAssoc['name']; ?> Change Password</h4>
                        <hr>
                    </div>
                    <form action="update-password.php" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
                            <label for="oldpass">Old Password</label>
                            <input class="form-control email-border" type="password" name="oldpass" id="oldpass">
                            <p class="text-color">
                                <?php if($_SESSION['update-error']): ?>
                                    <style>
                                        .text-color{
                                            color: red;
                                        }
                                        .email-border {
                                            border-color: red;
                                        }
                                    </style>
                                <?php
                                    echo $_SESSION['update-error'];
                                    unset($_SESSION['update-error']);
                                endif; ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="newpass">New Password</label>
                            <input class="form-control password-border" type="password" name="newpass" id="newpass">
                            <p class="text-color">
                                <?php if($_SESSION['newPassword-error']): ?>
                                    <style>
                                        .text-color{
                                            color: red;
                                        }
                                        .phone-border {
                                            border-color: red;
                                        }
                                    </style>
                                <?php
                                    echo $_SESSION['newPassword-error'];
                                    unset($_SESSION['newPassword-error']);
                                endif; ?>

                                <?php if($_SESSION['confirmPassword-error3']): ?>
                                    <style>
                                        .text-color{
                                            color: red;
                                        }
                                        .phone-border {
                                            border-color: red;
                                        }
                                    </style>
                                <?php
                                    echo $_SESSION['confirmPassword-error3'];
                                    unset($_SESSION['confirmPassword-error3']);
                                endif; ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="newcpass">New Confirm Password</label>
                            <input class="form-control password-border" type="password" name="newcpass" id="newcpass" id="newcpass">
                            <p class="text-color">
                                <?php if($_SESSION['confirmPassword-error']): ?>
                                    <style>
                                        .text-color{
                                            color: red;
                                        }
                                        .phone-border {
                                            border-color: red;
                                        }
                                    </style>
                                <?php
                                    echo $_SESSION['confirmPassword-error'];
                                    unset($_SESSION['confirmPassword-error']);
                                endif; ?>
                                <?php if($_SESSION['confirmPassword-error2']): ?>
                                    <style>
                                        .text-color{
                                            color: red;
                                        }
                                    </style>
                                <?php 
                                    echo $_SESSION['confirmPassword-error2'];
                                    unset($_SESSION['confirmPassword-error2']);
                                endif;?>
                            </p>
                        </div>

                        <div class="button text-center">
                            <button class="btn btn-primary" type="submit">Update Password</button>
                        </div>
                        <p class="text-color">
                                <?php if($_SESSION['update-error']): ?>
                                    <style>
                                        .text-color{
                                            color: red;
                                        }
                                    </style>
                                <?php
                                    echo $_SESSION['update-error'];
                                    unset($_SESSION['update-error']);
                                endif; ?>
                            </p>
                    </form>
                </div>
            </div>
        </div> 
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</body>
</html>