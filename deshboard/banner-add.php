<?php 
  include 'includes/header.php';
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="banner.php">banner</a>
        <span class="breadcrumb-item active">Add Banner</span>
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
            <form action="banner-post.php" method="POST" enctype="multipart/form-data">
                    <div class="card pd-2 pd-sm-40 form-layout form-layout-4">
                        <h6 class="card-body-title text-center">Add Banner Content</h6>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Sub-Title: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" name="subtitle">
                                <p style="color: red">  
                                    <?php if(isset($_SESSION['subTitle_error'])): ?>

                                    <?php
                                        echo $_SESSION['subTitle_error'];
                                        unset($_SESSION['subTitle_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>

                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Banner Title: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" name="bannertitle">
                                <p style="color: red">  
                                    <?php if(isset($_SESSION['title_error'])): ?>

                                    <?php
                                        echo $_SESSION['title_error'];
                                        unset($_SESSION['title_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>

                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Short Description: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" name="bannerDesc">
                                <p style="color: red">  
                                    <?php if(isset($_SESSION['bannerDesc_error'])): ?>

                                    <?php
                                        echo $_SESSION['bannerDesc_error'];
                                        unset($_SESSION['bannerDesc_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>

                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Banner Photo: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="file" class="form-control" name="bannerPhoto">
                                <p style="color: red">  
                                    <?php if(isset($_SESSION['bannerPhoto_error'])): ?>

                                    <?php
                                        echo $_SESSION['bannerPhoto_error'];
                                        unset($_SESSION['bannerPhoto_error']);
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