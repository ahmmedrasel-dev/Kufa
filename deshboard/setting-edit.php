<?php
  include 'includes/header.php';
  require_once '../database.php';
  $selectSetting = "SELECT * FROM setting";
  $settingQuery = mysqli_query($db_connect, $selectSetting);
  $settingAssoc = mysqli_fetch_assoc($settingQuery);
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
  <nav class="breadcrumb sl-breadcrumb">
    <a class="breadcrumb-item" href="setting.php">setting</a>
    <span class="breadcrumb-item active">edit setting</span>
  </nav>
  <div class="service_form p-5">
    <form action="setting-update.php" method="POST" enctype="multipart/form-data">
      <div class="card pd-2 pd-sm-40 form-layout form-layout-4">
        <!-- ##### Section Title ######  -->
        <h6 class="card-body-title text-center">Edit Setting Content</h6>
        <!-- Website title  -->
        <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label">Website Title: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="text" class="form-control" name="websiteTitle" value="<?php echo $settingAssoc['websiteTitle'] ?>">
            <p style="color: red">
              <?php
              if (isset($_SESSION['websiteTitle_error'])) :
                echo $_SESSION['websiteTitle_error'];
                unset($_SESSION['websiteTitle_error']);
              endif;
              ?>
            </p>
          </div>
        </div>
        <!-- Footer copyright text  -->
        <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label">Copyright Text: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="text" class="form-control" name="footerText" value="<?php echo $settingAssoc['footerText'] ?>">
            <p style="color: red">
              <?php
              if (isset($_SESSION['footerText_error'])) :
                echo $_SESSION['footerText_error'];
                unset($_SESSION['footerText_error']);
              endif;
              ?>
            </p>
          </div>
        </div>
        <!-- Website Fav Icon -->
        <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label">Fav Icon: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="file" class="form-control" name="favIcon" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
            <img id="blah" class="mt-2" src="../assets/images/<?php echo $settingAssoc['favIcon'] ?>" alt="">
            <p style="color: red">
              <?php
              if (isset($_SESSION['favIcon_error'])) :
                echo $_SESSION['favIcon_error'];
                unset($_SESSION['favIcon_error']);
              endif;
              ?>
            </p>
          </div>
        </div>
        <!-- Website Head Logo  -->
        <div class="row mg-t-20">
          <label class="col-sm-4 form-control-label">Header Logo: <span class="tx-danger">*</span></label>
          <div class="col-sm-8 mg-t-10 mg-sm-t-0">
            <input type="file" class="form-control" name="headerLogo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
            <img id="blah" class="mt-2" src="../assets/images/<?php echo $settingAssoc['headerLogo'] ?>" alt="">
            <p style="color: red">
              <?php
              if (isset($_SESSION['headerLogo_error'])) :
                echo $_SESSION['headerLogo_error'];
                unset($_SESSION['headerLogo_error']);
              endif;
              ?>
            </p>
          </div>
        </div>
        <!-- add button -->
        <div class="form-layout-footer mg-t-30 text-center">
          <button style="cursor:pointer" class="btn btn-info mg-r-5 rounded">Update Setting</button>
        </div>
      </div>
    </form>
    <!-- form-layout-footer -->
  </div>

</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->


<?php include 'includes/footer.php' ?>