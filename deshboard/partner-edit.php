<?php 
include 'includes/header.php';
require_once '../database.php';
$partnerId = $_GET['partnerId'];
$selectData = "SELECT * FROM partner WHERE id = $partnerId" ;
$dataQuery = mysqli_query($db_connect, $selectData);
$dataAssoc = mysqli_fetch_assoc($dataQuery);


?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="partner.php">Partner</a>
            <span class="breadcrumb-item active">Edit Partner</span>
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
            <form action="partner-update.php" method="POST" enctype="multipart/form-data">
                <div class="card pd-2 pd-sm-40 form-layout form-layout-4">
                    <h6 class="card-body-title text-center">Edit Partners</h6>

                    <!-- Portfolios Thumbnail Images -->
                    <div class="row mg-t-20">
                        <input type="hidden" name="partnerId" value="<?php echo $dataAssoc['id']?>">
                        <label class="col-sm-4 form-control-label">Partner Logo Thumbnail: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                          <input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="form-control" name="thumbnail">
                        </div>
                        <p style="color: red">
                          <?php if(isset($_SESSION['partnerThumb_error'])): ?>
                                      
                          <?php
                              echo $_SESSION['partnerThumb_error'];
                              unset($_SESSION['partnerThumb_error']);
                          endif; ?>
                        </p>
                    </div>
                    <!-- Portfolios Thumbnail Previews  -->
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Thumbnail Preview: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <img id="blah" width="100px" src="../assets/feature-img/<?php echo $dataAssoc['brand_logo']?>" alt="Images Thumbnail">
                        </div>
                    </div>

                    <div class="form-layout-footer mg-t-30 text-center">
                        <button style="cursor:pointer" class="btn btn-info mg-r-5 rounded">Update Partner</button>
                    </div>
                    <p class="text-center pt-3">
                        <?php if(isset($service_erro)): ?>
                            <span style="color: red;"><?php 
                            echo $service_erro;
                            unset($service_erro);
                            ?></span>
                        <?php endif; ?>
                    </p>
                </div>
            </form>
            <!-- form-layout-footer -->
        </div>

    </div>
    <!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <?php include('includes/footer.php') ?>