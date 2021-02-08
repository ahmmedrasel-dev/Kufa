<?php 
  ob_start();
  include 'includes/header.php';
  require_once '../database.php';
  $socialId = $_GET['socialId'];

  $select = "SELECT * FROM socialmedia WHERE id = $socialId";
  $query = mysqli_query($db_connect, $select);
  $assoc = mysqli_fetch_assoc($query);
  $selectedIcon = $assoc['icon'];

  // Updae Socail Media Icon Here. 

  

?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="socialmedia.php">Social Media</a>
        <span class="breadcrumb-item active">Edit Social Icon</span>
      </nav>
        <div class="service_form p-5">
            <form action="social-update.php" method="POST">
                    <input type="hidden" name="socailIconId" value="<?php echo $assoc['id'] ?>">
                    <div class="card pd-2 pd-sm-40 form-layout form-layout-4">
                        <h6 class="card-body-title text-center">Edit Social Icon</h6>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Social Media Icon: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control" name="socailIcon">
                                <option value="" disabled >Service Icon</option>
                                <option value="fab fa-facebook-f"
                                  <?php 
                                    if($selectedIcon == 'fab fa-facebook-f'){
                                      echo "selected";
                                    }
                                  ?>
                                >Facebook</option>
                                <option value="fab fa-twitter"
                                  <?php 
                                      if($selectedIcon == 'fab fa-twitter'){
                                        echo "selected";
                                      }
                                    ?>
                                >Twitter</option>
                                <option value="fab fa-pinterest"
                                    <?php 
                                      if($selectedIcon == 'fab fa-pinterest'){
                                        echo "selected";
                                      }
                                    ?>
                                >Pinterest</option>
                                <option value="fab fa-instagram"
                                    <?php 
                                      if($selectedIcon == 'fab fa-instagram'){
                                        echo "selected";
                                      }
                                    ?>
                                >Instagram</option>
                                <option value="fab fa-youtube"
                                    <?php 
                                      if($selectedIcon == 'fab fa-youtube'){
                                        echo "selected";
                                      }
                                    ?>
                                >Youtube</option>
                                
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
                            <input type="text" class="form-control" name="sociallink" value="<?= $assoc['sociallink']?>">
                                <p style="color: red">  
                                    <?php if(isset($_SESSION['sociallink_error'])): ?>

                                    <?php
                                        echo $_SESSION['sociallink_error'];
                                        unset($_SESSION['sociallink_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>

                        <div class="form-layout-footer mg-t-30 text-center">
                            <button style="cursor:pointer" class="btn btn-info mg-r-5 rounded">Update Social Media</button>
                        </div>
                    </div>
            </form>
                <!-- form-layout-footer -->
        </div>

</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


<?php include 'includes/footer.php' ?>