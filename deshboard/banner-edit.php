<?php 
  include 'includes/header.php';
  require_once '../database.php';

  $select = "SELECT * FROM banner";
  $query = mysqli_query($db_connect, $select);
  $assoc = mysqli_fetch_assoc($query);

?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="banner.php">banner</a>
            <span class="breadcrumb-item active">Edit banner Content</span>
        </nav>
        <div class="service_form p-5">
            <form action="banner-update.php" method="POST" enctype="multipart/form-data">
                <div class="card pd-2 pd-sm-40 form-layout form-layout-4">
                    <h6 class="card-body-title text-center">Edit Banner Content</h6>
                    <!-- Banner Sub-tile  -->
                    <div class="row">
                        <label class="col-sm-4 form-control-label">Sub Title: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" name="subTitle" value="<?php echo $assoc['subTitle']?>" class="form-control">
                            <p style="color: red">
                                <?php if(isset($_SESSION['aboutSummary_error'])): ?>
                                            
                                <?php
                                    echo $_SESSION['aboutSummary_error'];
                                    unset($_SESSION['aboutSummary_error']);
                                endif; ?>
                            </p>
                        </div>
                    </div>
                    <!-- Banner Title  -->
                    <div class="row">
                        <label class="col-sm-4 form-control-label">Title: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" name="title" value="<?php echo $assoc['title']?>" class="form-control">
                            <p style="color: red">
                                <?php 
                                    if(isset($_SESSION['bannerTitle_error'])):
                                    echo $_SESSION['bannerTitle_error'];
                                    unset($_SESSION['bannerTitle_error']);
                                    endif; 
                                ?>
                            </p>
                        </div>
                    </div>
                    <!-- Banner Title  -->
                    <div class="row">
                        <label class="col-sm-4 form-control-label">Short Description: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" name="summary" value="<?php echo $assoc['summary']?>" class="form-control">
                            <p style="color: red">
                                <?php 
                                    if(isset($_SESSION['bannerSummary_error'])):
                                    echo $_SESSION['bannerSummary_error'];
                                    unset($_SESSION['bannerSummary_error']);
                                    endif; 
                                ?>
                            </p>
                        </div>
                    </div>
                  <!-- About Me Photo  -->
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Banner Photo Upload: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="form-control" name="bannerPhoto">
                            <!-- Edit Preview Photo -->
                            <img id="blah" width="100px" src="../assets/images/<?php echo $assoc['bannerPhoto']?>" alt="Image Thumbnail">
                        </div>
                        <p style="color: red">
                            <?php 
                                if(isset($_SESSION['bannerPhoto_error'])):
                                echo $_SESSION['bannerPhoto_error'];
                                unset($_SESSION['bannerPhoto_error']);
                                endif; 
                            ?>
                        </p>
                    </div>

                    <div class="form-layout-footer mg-t-30 text-center">
                        <button style="cursor:pointer" class="btn btn-info mg-r-5 rounded">Update Banner</button>
                    </div>
                </div>
            </form>
            <!-- form-layout-footer -->
        </div>

    </div>
    <!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
<?php include('includes/footer.php') ?>