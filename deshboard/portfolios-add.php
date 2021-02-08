    <?php 
    include('includes/header.php');
    require_once('../database.php');
    
    ?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="portfolios.php">Portfolio</a>
            <span class="breadcrumb-item active">Add Portfolio</span>
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
            <form action="portfolio-post.php" method="POST" enctype="multipart/form-data">
                <div class="card pd-2 pd-sm-40 form-layout form-layout-4">
                    <h6 class="card-body-title text-center">Add New Portfolios</h6>

                    <div class="row">
                        <label class="col-sm-4 form-control-label">Portfolio Title: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" name="portfolio_title" class="form-control" placeholder="Ex: Lorem ipsume dolar set...">
                            <p style="color: red">
                                <?php if(isset($_SESSION['portfolioTitle_error'])): ?>
                                            
                                <?php
                                    echo $_SESSION['portfolioTitle_error'];
                                    unset($_SESSION['portfolioTitle_error']);
                                endif; ?>
                            </p>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Portfolio Category: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" name="portfolio_category" placeholder="Ex: Graphics Desgin">
                            <p style="color: red">
                                <?php if(isset($_SESSION['portfolioCategory_error'])):?>
                                            
                                <?php
                                    echo $_SESSION['portfolioCategory_error'];
                                    unset($_SESSION['portfolioCategory_error']);
                                endif; ?>
                            </p>
                        </div>
                    </div>
                    <!-- row -->

                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Portfolio Summary: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" name="portfolio_summary" placeholder="Ex: Lorem ipsume dolar aset...">
                            <p style="color: red">
                                <?php if(isset($_SESSION['portfolioSummary_error'])): ?>
                                            
                                <?php
                                    echo $_SESSION['portfolioSummary_error'];
                                    unset($_SESSION['portfolioSummary_error']);
                                endif; ?>
                            </p>
                        </div>
                    </div>

                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Portfolio Thumbnail: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="file" class="form-control" name="thumbnail">
                                <p style="color: red">  
                                    <?php if(isset($_SESSION['thumbnail_error'])): ?>

                                    <?php
                                        echo $_SESSION['thumbnail_error'];
                                        unset($_SESSION['thumbnail_error']);
                                    endif; ?>
                                </p>
                        </div>
                    </div>

                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Portfolio Feature Image: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="file" class="form-control" name="feature_img">
                                <p style="color: red">  
                                    <?php if(isset($_SESSION['featureImage_error'])): ?>

                                    <?php
                                        echo $_SESSION['featureImage_error'];
                                        unset($_SESSION['featureImage_error']);
                                    endif; ?>
                                </p>
                        </div>
                    </div>
                    <div class="form-layout-footer mg-t-30 text-center">
                        <button style="cursor:pointer" class="btn btn-info mg-r-5 rounded">Save Portfolio</button>
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