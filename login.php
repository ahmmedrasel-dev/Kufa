<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-6 m-auto">
            
                <div class="message">
                    <?php if (isset($_SESSION['message'])) : ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <button class="close" data-dismiss="alert">&times;</button>
                            <strong><?= $_SESSION['message']; ?></strong>
                        </div>
                    <?php
                        unset($_SESSION['message']);
                    endif; ?>
                </div>

                <div class="register-form bg-light p-5 rounded">
                    <div class="form-header">
                        <h2 class="text-center bg-primary text-white py-2 rounded">Login Form</h2>
                        <hr>
                    </div>
                    <form action="login-post.php" method="POST">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input class="form-control email-border" type="email" name="email" id="email">
                            <p class="text-color">
                                <?php if(isset($_SESSION['login-error'])): ?>
                                    <style>
                                        .text-color{
                                            color: red;
                                        }
                                        .email-border {
                                            border-color: red;
                                        }
                                    </style>
                                <?php
                                    echo $_SESSION['login-error'];
                                    unset($_SESSION['login-error']);
                                endif; ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control password-border" type="password" name="password" id="password">
                            <p class="text-color">
                                <?php if(isset($_SESSION['password-error'])): ?>
                                    <style>
                                        .text-color{
                                            color: red;
                                        }
                                        .phone-border {
                                            border-color: red;
                                        }
                                    </style>
                                <?php
                                    echo $_SESSION['password-error'];
                                    unset($_SESSION['password-error']);
                                endif; ?>
                            </p>
                        </div>

                        <div class="button text-center">
                            <button class="btn btn-primary" type="submit">Log In</button>
                        </div>
                    </form>
                    <p class="text-center pt-3">Are you not member yet? Please <a href="register.php">Register</a> Here</p>
                </div>
               
            </div>
        </div> 
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</body>
</html>