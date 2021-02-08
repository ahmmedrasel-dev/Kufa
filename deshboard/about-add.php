<?php 
  include 'includes/header.php';
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="aboutme.php">about me</a>
        <span class="breadcrumb-item active">add about me</span>
      </nav>
      <div class="service_form p-5">
            <form action="aboutme-post.php" method="POST" enctype="multipart/form-data">
                <div class="card pd-2 pd-sm-40 form-layout form-layout-4">
                    <h6 class="card-body-title text-center">Add About Me Content</h6>
                    <!-- About Me Summary  -->
                    <div class="row">
                        <label class="col-sm-4 form-control-label">Short Summary: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" name="summary" placeholder="Lorem ipsum dolar amet aset..."" class="form-control">
                            <p style="color: red">
                                <?php 
                                    if(isset($_SESSION['aboutSummary_error'])): 
                                    echo $_SESSION['aboutSummary_error'];
                                    unset($_SESSION['aboutSummary_error']);
                                    endif; 
                                ?>
                            </p>
                        </div>
                    </div>
                  <!-- About Me Photo  -->
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">About Photo Upload: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="form-control" name="aboutPhoto" alt="Image Thumbnail">
                        </div>
                        <p style="color: red">
                            <?php 
                                if(isset($_SESSION['aboutPhoto_error'])):
                                echo $_SESSION['aboutPhoto_error'];
                                unset($_SESSION['aboutPhoto_error']);
                                endif; 
                            ?>
                        </p>
                    </div>

                    <div class="form-layout-footer mg-t-30 text-center">
                        <button style="cursor:pointer" class="btn btn-info mg-r-5 rounded">Update About Me</button>
                    </div>
                </div>
            </form>
            <!-- form-layout-footer -->
        </div>

</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


<?php include 'includes/footer.php' ?>