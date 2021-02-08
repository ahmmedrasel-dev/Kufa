<?php 
  //ob_start();
  include 'includes/header.php';
  require_once '../database.php';

  function socailIcon($options){
    foreach($options as $key => $option){
      printf("<option value='%s'>%s</option>", $option, $key);
    }
  }

  $icon = [
    'Facebook' => 'fab fa-facebook-f',
    'Twitter' => 'fab fa-twitter',
    'Instagram' => 'fab fa-instagram',
    'Pinterest' => 'fab fa-pinterest',
    'Linkedin' => 'fab fa-linkedin-in',
    'Youtube' => 'fab fa-youtube'
  ];

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $socialIcon = $_POST['socialIcon'];
    $sociallink = $_POST['sociallink'];

    if(empty($socialIcon)){
      $_SESSION['socialIcon_error'] = "Please select icon from option.";
    }else{
      $validIcon = $socialIcon;
    }

    if(empty($sociallink)){
      $_SESSION['socialIcon_error'] = "Please submit your socail link.";
    }else{
      $validlink = $sociallink;
    }

    $insert = " INSERT INTO socialmedia ( icon , sociallink ) VALUES ( '$validIcon' , '$validlink' ) ";
    if(mysqli_query($db_connect, $insert)){
      $_SESSION['message'] = "Social Media Icon Add Successfully.";
      header('location:socialmedia.php');
    }else{
      $_SESSION['message'] = "Socail Icon Not Add Successfully.".mysqli_error($db_connect);
    }
    

  }
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="socialmedia.php">Social Media</a>
        <span class="breadcrumb-item active">Add Social Icon</span>
      </nav>
        <div class="service_form p-5">
            <?php if(isset($_SESSION['message'])): ?>
                <div class="alert alert-success">
                        <span>
                            <?php 
                                echo $_SESSION['message'];
                                unset($_SESSION['message']);
                            ?>
                        </span>
                </div> 
            <?php endif; ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="card pd-2 pd-sm-40 form-layout form-layout-4">
                        <h6 class="card-body-title text-center">Add New Social Icon</h6>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Social Media Icon: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control" name="socialIcon">
                                <option value=""disabled selected>Service Icon</option>
                                <?php socailIcon($icon); ?>
                            </select>
                                <p style="color: red">  
                                    <?php if(isset($_SESSION['socialIcon_error'])): ?>

                                    <?php
                                        echo $_SESSION['socialIcon_error'];
                                        unset($_SESSION['socialIcon_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>

                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Social Media Link: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" name="sociallink">
                                <p style="color: red">  
                                    <?php if(isset($_SESSION['socialIcon_error'])): ?>

                                    <?php
                                        echo $_SESSION['socialIcon_error'];
                                        unset($_SESSION['socialIcon_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>

                        <div class="form-layout-footer mg-t-30 text-center">
                            <button style="cursor:pointer" class="btn btn-info mg-r-5 rounded">Save Social Icon</button>
                        </div>
                    </div>
            </form>
                <!-- form-layout-footer -->
        </div>

</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


<?php include 'includes/footer.php' ?>