<?php
    session_start();
    require_once('database.php');

    $selectSetting = "SELECT * FROM setting";
    $settingQuery = mysqli_query($db_connect, $selectSetting);
    $settingAssoc = mysqli_fetch_assoc($settingQuery);

?>
<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:27:43 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $settingAssoc['websiteTitle'] ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="assets/images/<?php echo $settingAssoc['favIcon'] ?>">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/flaticon.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/aos.css">
    <link rel="stylesheet" href="assets/css/default.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body class="theme-bg">

    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
            </div>
        </div>
    </div>
    <!-- preloader-end -->
    <!-- header-start -->
    <header>
        <div id="header-sticky" class="transparent-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <a href="index.php" class="navbar-brand logo-sticky-none"><img src="assets/images/<?php echo $settingAssoc['headerLogo'] ?>" alt="Logo"></a>
                                <a href="index.php" class="navbar-brand s-logo-none"><img src="assets/images/<?php echo $settingAssoc['headerLogo'] ?>" alt="Logo"></a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                    </ul>
                                </div>
                                <div class="header-btn">
                                    <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- offcanvas-start -->
        <div class="extra-info">
            <div class="close-icon menu-close">
                <button>
                    <i class="far fa-window-close"></i>
                </button>
            </div>
            <div class="logo-side mb-30">
                <a href="index-2.html">
                    <img src="assets/img/logo/logo.png" alt="" />
                </a>
            </div>
            <div class="side-info mb-30">
                <div class="contact-list mb-30">
                    <h4>Office Address</h4>
                    <p>123/A, Miranda City Likaoli
                        Prikano, Dope</p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Phone Number</h4>
                    <p>+0989 7876 9865 9</p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Email Address</h4>
                    <p>info@example.com</p>
                </div>
            </div>
            <div class="social-icon-right mt-20">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-google-plus-g"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="offcanvas-overly"></div>
        <!-- offcanvas-end -->
    </header>
    <!-- header-end -->

    <!-- main-area -->
    <main>
        <?php

        $select = "SELECT * FROM banner";
        $query = mysqli_query($db_connect, $select);
        $assoc = mysqli_fetch_assoc($query);

        ?>

        <!-- banner-area -->
        <section id="home" class="banner-area banner-bg fix">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-6">
                        <div class="banner-content">
                            <h6 class="wow fadeInUp" data-wow-delay="0.2s"><?php echo $assoc['subTitle'] ?>!</h6>
                            <h2 class="wow fadeInUp" data-wow-delay="0.4s"><?php echo $assoc['title'] ?></h2>
                            <p class="wow fadeInUp" data-wow-delay="0.6s"><?php echo $assoc['summary'] ?></p>
                            <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                <?php
                                $select = " SELECT * FROM socialmedia WHERE status = 1";
                                $query = mysqli_query($db_connect, $select);
                                ?>
                                <ul>
                                    <?php foreach ($query as $icon) : ?>
                                        <li><a href="<?php echo $icon['sociallink'] ?>"><i class="<?php echo $icon['icon'] ?>"></i></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                        <div class="banner-img text-right">
                            <img src="assets/images/<?php echo $assoc['bannerPhoto'] ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-shape"><img src="assets/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
        </section>
        <!-- banner-area-end -->

        <!-- about-area-->
        <section id="about" class="about-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <?php
                    $select = " SELECT * FROM about";
                    $query = mysqli_query($db_connect, $select);
                    $assoc = mysqli_fetch_assoc($query);
                    ?>
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img src="assets/images/<?php echo $assoc['aboutPhoto'] ?>" title="me-01" alt="me-01">
                        </div>
                    </div>
                    <div class="col-lg-6 pr-90">
                        <div class="section-title mb-25">
                            <span>Introduction</span>
                            <h2>About Me</h2>
                        </div>
                        <div class="about-content">
                            <p><?php echo $assoc['summary'] ?></p>
                            <h3>Education:</h3>
                        </div>
                        <!-- Education Item -->
                        <?php
                        $selectData = "SELECT * FROM education WHERE status = 1 ";
                        $query = mysqli_query($db_connect, $selectData);
                        ?>
                        <?php foreach ($query as $education) : ?>
                            <div class="education">
                                <div class="year"><?php echo $education['year'] ?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?php echo $education['subject'] ?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- End Education Item -->
                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->
        <?php
        $select_services = "SELECT * FROM services WHERE services_status = 1 ";
        $services_query = mysqli_query($db_connect, $select_services);
        ?>

        <!-- Services-area -->
        <section id="service" class="services-area pt-120 pb-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>WHAT WE DO</span>
                            <h2>Services and Solutions</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($services_query as $key => $service) : ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                <!-- Servicee Icon Here -->
                                <i class="<?php echo $service['services_icon'] ?>"></i>
                                <h3><?php echo $service['services_title'] ?></h3>
                                <p>
                                    <?php echo $service['services_summary'] ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- Services-area-end -->

        <!-- Portfolios-area -->
        <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>Portfolio Showcase</span>
                            <h2>My Recent Best Works</h2>
                        </div>
                    </div>
                </div>
                <?php
                $portfolios = "SELECT * FROM portfolios WHERE status = 1 ";
                $portfoliosQuery = mysqli_query($db_connect, $portfolios);
                ?>
                <div class="row">
                    <?php foreach ($portfoliosQuery as $portfolio) : ?>

                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
                                <div class="speaker-thumb">
                                    <img src="assets/images/<?php echo $portfolio['thumbnail'] ?>" alt="img">
                                </div>
                                <div class="speaker-overlay">
                                    <span><?php echo $portfolio['category'] ?></span>
                                    <h4><a href="portfolio-single.php?id=<?php echo $portfolio['id']?>"><?php echo $portfolio['title'] ?></a></h4>
                                    <a href="portfolio-single.php?id=<?php echo $portfolio['id']?>" class="arrow-btn">More information <span></span></a>
                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <!-- services-area-end -->
        <?php
        $selectData = "SELECT * FROM counter WHERE counter_status = 1 ";
        $dataQuery = mysqli_query($db_connect, $selectData);
        ?>

        <!-- fact-area -->
        <section class="fact-area">
            <div class="container">
                <div class="fact-wrap">
                    <div class="row justify-content-between">
                        <?php foreach ($dataQuery as $counter) : ?>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="<?php echo $counter['counter_icon'] ?>"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count"><?php echo $counter['counter_number'] ?></span></h2>
                                        <span><?php echo $counter['counter_title'] ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- fact-area-end -->
        <?php
        $selectData = "SELECT * FROM testimonial WHERE status = 1 ";
        $query = mysqli_query($db_connect, $selectData);
        ?>

        <!-- testimonial-area -->
        <section class="testimonial-area primary-bg pt-115 pb-115">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>testimonial</span>
                            <h2>happy customer quotes</h2>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10">
                        <div class="testimonial-active">
                            <?php foreach ($query as $testimonial) : ?>
                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img src="assets/images/<?php echo $testimonial['clientPhoto'] ?>" alt="img">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span> <?php echo $testimonial['clientComment'] ?> <span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5><?php echo $testimonial['clientName'] ?></h5>
                                            <span><?php echo $testimonial['designation'] ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- testimonial-area-end -->

        <?php

        $selectData = " SELECT * FROM partner WHERE status = 1";
        $dataQuery = mysqli_query($db_connect, $selectData);

        ?>

        <!-- brand-area -->
        <div class="barnd-area pt-100 pb-100">
            <div class="container">
                <div class="row brand-active">
                    <?php foreach ($dataQuery as $partners) : ?>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img src="assets/images/<?php echo $partners['brand_logo'] ?>" alt="img">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <!-- brand-area-end -->

        <!-- contact-area -->
        <section id="contact" class="contact-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title mb-20">
                            <span>information</span>
                            <h2>Contact Information</h2>
                        </div>
                        <?php
                        $selectContactInfo = "SELECT * FROM contactInfo";
                        $contactQuery = mysqli_query($db_connect, $selectContactInfo);
                        $contactInfoAssoc = mysqli_fetch_assoc($contactQuery);
                        ?>
                        <div class="contact-content">
                            <p><?php echo $contactInfoAssoc['summary'] ?></p>
                            <h5>OFFICE IN <span>SAUDI ARABIA</span></h5>
                            <div class="contact-list">
                                <ul>
                                    <li><i class="fas fa-map-marker"></i><span>Address :</span><?php echo $contactInfoAssoc['address'] ?></li>
                                    <li><i class="fas fa-headphones"></i><span>Phone :</span><?php echo $contactInfoAssoc['phone'] ?></li>
                                    <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?php echo $contactInfoAssoc['email'] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <form action="deshboard/message-post.php" method="POST">
                                <input class="form-control name-border" type="text" name="name" placeholder="your name *">
                                <p class="text-color">
                                    <?php if (isset($_SESSION['nameError'])) : ?>
                                        <style>
                                            .text-color {
                                                color: red;
                                            }

                                            .name-border {
                                                border: 1px solid red !important;
                                            }
                                        </style>
                                    <?php
                                        echo $_SESSION['nameError'];
                                        unset($_SESSION['nameError']);
                                    endif;
                                    ?>
                                </p>
                                <input class="form-control email-border" type="email" name="email" placeholder="your email *">
                                <p class="text-color">
                                    <?php if (isset($_SESSION['emailError'])) : ?>
                                        <style>
                                            .text-color {
                                                color: red;
                                            }

                                            .email-border {
                                                border: 1px solid red !important;
                                            }
                                        </style>
                                    <?php
                                        echo $_SESSION['emailError'];
                                        unset($_SESSION['emailError']);
                                    endif;
                                    ?>
                                </p>
                                <textarea class="form-control text-border" name="message" id="message" placeholder="your message *"></textarea>
                                <p class="text-color">
                                    <?php if (isset($_SESSION['messageError'])) : ?>
                                        <style>
                                            .text-color {
                                                color: red;
                                            }

                                            .text-border {
                                                border: 1px solid red !important;
                                            }
                                        </style>
                                    <?php
                                        echo $_SESSION['messageError'];
                                        unset($_SESSION['messageError']);
                                    endif;
                                    ?>
                                </p>
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
                                <button type="submit" class="btn">SEND</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->

    <!-- footer -->
    <footer>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <p><?php echo $settingAssoc['footerText'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->





    <!-- JS here -->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/one-page-nav-min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/ajax-form.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/aos.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/jquery.scrollUp.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:28:17 GMT -->

</html>