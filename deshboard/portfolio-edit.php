<?php 
    include('includes/header.php');
    require_once('../database.php');
    $portfolioId = $_GET['portfolio_id'];

    $selectData = " SELECT * FROM portfolios WHERE id = $portfolioId";
    $dataQuerry = mysqli_query($db_connect, $selectData);
    $dataAssoc = mysqli_fetch_assoc($dataQuerry);
    
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="portfolios.php">Portfolio</a>
            <span class="breadcrumb-item active">Edit Portfolio</span>
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
            <form action="portfolios-update.php" method="POST" enctype="multipart/form-data">
                <div class="card pd-2 pd-sm-40 form-layout form-layout-4">
                    <h6 class="card-body-title text-center">Edit Portfolios</h6>
                    <!-- Portfolios Title  -->
                    <div class="row">
                        <input type="hidden" name="portfolio_Id" value="<?php echo $dataAssoc['id']?>">
                        <label class="col-sm-4 form-control-label">Portfolio Title: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" name="title" value="<?php echo $dataAssoc['title']?>" class="form-control">
                            <p style="color: red">
                                <?php if(isset($_SESSION['portfolioTitle_error'])): ?>
                                            
                                <?php
                                    echo $_SESSION['portfolioTitle_error'];
                                    unset($_SESSION['portfolioTitle_error']);
                                endif; ?>
                            </p>
                        </div>
                    </div>
                    <!-- Portfolios Category  -->
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Portfolio Category: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" name="category" value="<?php echo $dataAssoc['category']?>" placeholder="Ex: Graphics Desgin">
                            <p style="color: red">
                                <?php if(isset($_SESSION['portfolioCategory_error'])):?>
                                            
                                <?php
                                    echo $_SESSION['portfolioCategory_error'];
                                    unset($_SESSION['portfolioCategory_error']);
                                endif; ?>
                            </p>
                        </div>
                    </div>
                  <!-- Portfolios Summary  -->
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Portfolio Summary: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" name="summary" value="<?php echo $dataAssoc['summary']?>" placeholder="Ex: Lorem ipsume dolar aset...">
                            <p style="color: red">
                                <?php if(isset($_SESSION['portfolioSummary_error'])): ?>
                                            
                                <?php
                                    echo $_SESSION['portfolioSummary_error'];
                                    unset($_SESSION['portfolioSummary_error']);
                                endif; ?>
                            </p>
                        </div>
                    </div>
                  <!-- Portfolios Thumbnail Images -->
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Portfolio Thumbnail: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" class="form-control" name="thumbnail">
                        </div>
                    </div>
                    <!-- Portfolios Thumbnail Previews  -->
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Thumbnail Preview: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <img id="blah" width="100px" src="../assets/images/<?php echo $dataAssoc['thumbnail']?>" alt="Image Thumbnail">
                        </div>
                    </div>
                    <!-- Portfolios Feature Images  -->
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Portfolio Feature Image: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="file" onchange="document.getElementById('test').src = window.URL.createObjectURL(this.files[0])" class="form-control" name="feature_img">
                        </div>
                    </div>
                    <!-- Portfolios Feature Images Preview  -->
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Portfolio Feature Image: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <img id="test" width="100px" src="../assets/images/<?php echo $dataAssoc['featureimage']?>" alt="Image">
                        </div>
                    </div>

                    <div class="form-layout-footer mg-t-30 text-center">
                        <button style="cursor:pointer" class="btn btn-info mg-r-5 rounded">Update Portfolio</button>
                    </div>
                </div>
            </form>
            <!-- form-layout-footer -->
        </div>

    </div>
    <!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <?php include('includes/footer.php') ?>