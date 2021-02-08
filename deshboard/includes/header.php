<?php 
include ('session.php');
require_once '../database.php'; // Data Base kibabe Connct holo ?

$select = "SELECT COUNT(*) as total FROM contact WHERE readStatus = 1 ";
$query = mysqli_query($db_connect, $select);
$assoc = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Meta -->
  <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
  <meta name="author" content="ThemePixels">

  <title>Dashboard-admin Panel</title>

  <!-- vendor css -->
  <link href="assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
  <link href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
  
  
  <!-- Starlight CSS -->
  <link rel="stylesheet" href="assets/css/starlight.css">
</head>

<body>

  <!-- ########## START: LEFT PANEL ########## -->
  <div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> starlight</a></div>
  <div class="sl-sideleft">
    <div class="input-group input-group-search">
      <input type="search" name="search" class="form-control" placeholder="Search">
      <span class="input-group-btn">
        <button class="btn"><i class="fa fa-search"></i></button>
      </span><!-- input-group-btn -->
    </div><!-- input-group -->

    <label class="sidebar-label">Navigation</label>
    <div class="sl-sideleft-menu">
      <a href="deshboard.php" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
          <span class="menu-item-label">Dashboard</span>
        </div><!-- menu-item --> 
      </a><!-- sl-menu-link -->

      <a href="user.php" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-person-add tx-20"></i>
          <span class="menu-item-label">Users</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-envelope-o tx-20"></i>
          <span class="menu-item-label">Messages(<?php echo $assoc['total']?>)</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="messages.php" class="nav-link">Inbox(<?php echo $assoc['total']?>)</a></li>
        <li class="nav-item"><a href="message-trash.php" class="nav-link">Trash</a></li>
      </ul>

      <a href="banner.php" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-desktop tx-20"></i>
          <span class="menu-item-label">Banner</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="socialmedia.php" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-send tx-20"></i>
          <span class="menu-item-label"> Social-media</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="#" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-man tx-20"></i>
          <span class="menu-item-label">About Me</span>
          <i class="menu-item-arrow fa fa-angle-down"></i>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
      <ul class="sl-menu-sub nav flex-column">
        <li class="nav-item"><a href="aboutme.php" class="nav-link">About Me</a></li>
        <li class="nav-item"><a href="education.php" class="nav-link">Eduction</a></li>
      </ul>

      <a href="services.php" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-magic tx-20"></i>
          <span class="menu-item-label">Services</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="portfolios.php" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-camera tx-20"></i>
          <span class="menu-item-label">Portfolio</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="counter.php" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-star tx-20"></i>
          <span class="menu-item-label">Counter</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="partner.php" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-sitemap tx-20"></i>
          <span class="menu-item-label">Partner</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="testimonial.php" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon icon ion-chatbox-working tx-20"></i>
          <span class="menu-item-label">Testimonial</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="contactinfo.php" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-phone tx-20"></i>
          <span class="menu-item-label">Contact Info</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->

      <a href="setting.php" class="sl-menu-link">
        <div class="sl-menu-item">
          <i class="menu-item-icon fa fa-gear tx-20"></i>
          <span class="menu-item-label">Setting</span>
        </div><!-- menu-item -->
      </a><!-- sl-menu-link -->
    </div><!-- sl-sideleft-menu -->

    <br>
  </div><!-- sl-sideleft -->
  <!-- ########## END: LEFT PANEL ########## -->

  <!-- ########## START: HEAD PANEL ########## -->
  <div class="sl-header">
    <div class="sl-header-left">
      <div class="navicon-left hidden-md-down"><a id="btnLeftMenu" href=""><i class="icon ion-navicon-round"></i></a></div>
      <div class="navicon-left hidden-lg-up"><a id="btnLeftMenuMobile" href=""><i class="icon ion-navicon-round"></i></a></div>
    </div><!-- sl-header-left -->
    <div class="sl-header-right">
      <nav class="nav">
        <div class="dropdown">
          <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
            <span class="logged-name"><?php echo $_SESSION['name']; ?></span>
            <img src="../img/img3.jpg" class="wd-32 rounded-circle" alt="">
          </a>
          <div class="dropdown-menu dropdown-menu-header wd-200">
            <ul class="list-unstyled user-profile-nav">
              <li><a href=""><i class="icon ion-ios-person-outline"></i> Edit Profile</a></li>
              <li><a href=""><i class="icon ion-ios-gear-outline"></i> Settings</a></li>
              <li><a href=""><i class="icon ion-ios-download-outline"></i> Downloads</a></li>
              <li><a href=""><i class="icon ion-ios-star-outline"></i> Favorites</a></li>
              <li><a href=""><i class="icon ion-ios-folder-outline"></i> Collections</a></li>
              <li><a href="logout.php"><i class="icon ion-power"></i> Sign Out</a></li>
            </ul>
          </div><!-- dropdown-menu -->
        </div><!-- dropdown -->
      </nav>
      <div class="navicon-right">
        <a id="btnRightMenu" href="" class="pos-relative">
          <i class="icon ion-ios-bell-outline"></i>
          <!-- start: if statement -->
          <span class="square-8 bg-danger"></span>
          <!-- end: if statement -->
        </a>
      </div><!-- navicon-right -->
    </div><!-- sl-header-right -->
  </div><!-- sl-header -->
  <!-- ########## END: HEAD PANEL ########## -->

  <!-- ########## START: RIGHT PANEL ########## -->
  <div class="sl-sideright">
    <ul class="nav nav-tabs nav-fill sidebar-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" role="tab" href="#messages">Messages (2)</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" role="tab" href="#notifications">Notifications (8)</a>
      </li>
    </ul><!-- sidebar-tabs -->

    <!-- Tab panes -->
    <div class="tab-content">
      <div class="tab-pane pos-absolute a-0 mg-t-60 active" id="messages" role="tabpanel">
        <div class="media-list">
          <!-- loop starts here -->
          <a href="" class="media-list-link">
            <div class="media">
              <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                <span class="d-block tx-11 tx-gray-500">2 minutes ago</span>
                <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
              </div>
            </div><!-- media -->
          </a>
          <!-- loop ends here -->
          <a href="" class="media-list-link">
            <div class="media">
              <img src="../img/img4.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Samantha Francis</p>
                <span class="d-block tx-11 tx-gray-500">3 hours ago</span>
                <p class="tx-13 mg-t-10 mg-b-0">My entire soul, like these sweet mornings of spring.</p>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link">
            <div class="media">
              <img src="../img/img7.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Robert Walker</p>
                <span class="d-block tx-11 tx-gray-500">5 hours ago</span>
                <p class="tx-13 mg-t-10 mg-b-0">I should be incapable of drawing a single stroke at the present moment...</p>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link">
            <div class="media">
              <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Larry Smith</p>
                <span class="d-block tx-11 tx-gray-500">Yesterday, 8:34pm</span>

                <p class="tx-13 mg-t-10 mg-b-0">When, while the lovely valley teems with vapour around me, and the meridian sun strikes...</p>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link">
            <div class="media">
              <img src="../img/img3.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="mg-b-0 tx-medium tx-gray-800 tx-13">Donna Seay</p>
                <span class="d-block tx-11 tx-gray-500">Jan 23, 2:32am</span>
                <p class="tx-13 mg-t-10 mg-b-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring.</p>
              </div>
            </div><!-- media -->
          </a>
        </div><!-- media-list -->
        <div class="pd-15">
          <a href="" class="btn btn-secondary btn-block bd-0 rounded-0 tx-10 tx-uppercase tx-mont tx-medium tx-spacing-2">View More Messages</a>
        </div>
      </div><!-- #messages -->

      <div class="tab-pane pos-absolute a-0 mg-t-60 overflow-y-auto" id="notifications" role="tabpanel">
        <div class="media-list">
          <!-- loop starts here -->
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 18 others in a post.</p>
                <span class="tx-12">October 03, 2017 8:45am</span>
              </div>
            </div><!-- media -->
          </a>
          <!-- loop ends here -->
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Social Network</strong></p>
                <span class="tx-12">October 02, 2017 12:44am</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700">20+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                <span class="tx-12">October 01, 2017 10:20pm</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                <span class="tx-12">October 01, 2017 6:08pm</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img8.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Suzzeth Bungaos</strong> tagged you and 12 others in a post.</p>
                <span class="tx-12">September 27, 2017 6:45am</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img10.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700">10+ new items added are for sale in your <strong class="tx-medium tx-gray-800">Sale Group</strong></p>
                <span class="tx-12">September 28, 2017 11:30pm</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img9.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Mellisa Brown</strong> appreciated your work <strong class="tx-medium tx-gray-800">The Great Pyramid</strong></p>
                <span class="tx-12">September 26, 2017 11:01am</span>
              </div>
            </div><!-- media -->
          </a>
          <a href="" class="media-list-link read">
            <div class="media pd-x-20 pd-y-15">
              <img src="../img/img5.jpg" class="wd-40 rounded-circle" alt="">
              <div class="media-body">
                <p class="tx-13 mg-b-0 tx-gray-700"><strong class="tx-medium tx-gray-800">Julius Erving</strong> wants to connect with you on your conversation with <strong class="tx-medium tx-gray-800">Ronnie Mara</strong></p>
                <span class="tx-12">September 23, 2017 9:19pm</span>
              </div>
            </div><!-- media -->
          </a>
        </div><!-- media-list -->
      </div><!-- #notifications -->

    </div><!-- tab-content -->
  </div><!-- sl-sideright -->
  <!-- ########## END: RIGHT PANEL ########## --->