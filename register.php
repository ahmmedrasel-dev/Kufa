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
                <div class="register-form bg-light p-5 rounded">
                    <div class="form-header">
                        <h2 class="text-center bg-primary text-white py-2 rounded">User Register Form</h2>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorem atque aut enim.</p>
                        <hr>
                    </div>
                    <form action="register-post.php" method="POST">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input class="form-control name-border" type="text" name="name" id="name">
                            <p class="text-color">
                                <?php if(isset($_SESSION['name-error'])){ ?>
                                    <style>
                                        .text-color{
                                            color: red;
                                        }
                                        .name-border {
                                            border-color: red;
                                        }
                                    </style>
                                    <?php
                                    echo $_SESSION['name-error'];
                                    unset($_SESSION['name-error']);
                                } ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="phone">Mobile Number</label>
                            <input class="form-control phone-border" type="tel" name="phone" id="phone">
                            <p class="text-color">
                                <?php if(isset($_SESSION['phone-error'])){
                                    ?>
                                    <style>
                                        .text-color{
                                            color: red;
                                        }
                                        .phone-border {
                                            border-color: red;
                                        }
                                    </style>
                                    <?php
                                    echo $_SESSION['phone-error'];
                                    unset($_SESSION['phone-error']);
                                } ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input class="form-control email-border" type="email" name="email" id="email">
                            <p class="text-color">
                                <?php if(isset($_SESSION['email-error'])){
                                    ?>
                                    <style>
                                        .text-color{
                                            color: red;
                                        }
                                        .email-border {
                                            border-color: red;
                                        }
                                    </style>
                                    <?php
                                    echo $_SESSION['email-error'];
                                    unset($_SESSION['email-error']);
                                } ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control password-border" type="password" name="password" id="password">
                            <p class="text-color">
                                <?php if(isset($_SESSION['password-error'])){
                                    ?>
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
                                } ?>
                            </p>
                        </div>
                        <div class="button text-center">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
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