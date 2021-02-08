<?php
// যদি কোণ কারণে রিডাইরেক্ট না হয় তাহলে ob_start() ফাংশনটি ব্যবহার করতে হবে। 
ob_start();
include('includes/header.php');
require_once('../database.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $service_title = $_POST['service_title'];
    $service_summary = $_POST['service_summary'];
    $service_icon = $_POST['service_icon'];


    if(empty($service_title)){
        $_SESSION['serviceTitle_error'] = "Write Services Title";
        header('location:service-add.php');
        die();
    }else{
        $validTitle = $service_title;   
    }

    if(empty($service_summary)){
        $_SESSION['serviceSummary_error'] = "Write Services Summary";
        header('location:service-add.php');
        die();
    }else{
        $validSummary = $service_summary;
    }

    if(empty($service_icon)){
        $_SESSION['serviceIcon_error'] = "Write fontawesome icon.";
        header('location:service-add.php');
        die();
    }else{
        $validIcon = $service_icon;
    }

    if( $validTitle && $validSummary && $validIcon ){
        $insert = " INSERT INTO services(services_title, services_summary, services_icon) VALUES ('$service_title', '$service_summary', '$service_icon')";

        if(mysqli_query($db_connect, $insert)){
            $_SESSION['message']= "New Services Add Successfully.";
            header('location:services.php');
            die();
        }
    }
}

?>    
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="services.php">Services</a>
        <span class="breadcrumb-item active">Add Service</span>
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
                        <h6 class="card-body-title text-center">Add New Serives</h6>

                        <div class="row">
                            <label class="col-sm-4 form-control-label">Service Title: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="service_title" class="form-control" placeholder="Ex: Graphics Design">
                                <p style="color: red">
                                    <?php if(isset($_SESSION['serviceTitle_error'])): ?>
                                    
                                    <?php
                                        echo $_SESSION['serviceTitle_error'];
                                        unset($_SESSION['serviceTitle_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Service Summary: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" name="service_summary" placeholder="Ex: Lorem ipsume dolar aset...">
                                <p style="color: red">
                                    <?php if(isset($_SESSION['serviceSummary_error'])): ?>
                                    
                                    <?php
                                        echo $_SESSION['serviceSummary_error'];
                                        unset($_SESSION['serviceSummary_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Service Icon: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control" name="service_icon">
                                <option value="" disabled selected>Service Icon</option>
                                <option value="fas fa-pen-nib">Graphic</option>
                                <option value="fas fa-magic">Magic Icon</option>
                                <option value="fas fa-desktop">Desktop Icon</option>
                                <option value="fas fa-sitemap">Network Icon</option>
                                <option value="fas fa-bullseye">Focus Icon</option>
                                <option value="fas fa-lightbulb"> Light Icon</option>
                            </select>
                                <p style="color: red">  
                                    <?php if(isset($_SESSION['serviceIcon_error'])): ?>

                                    <?php
                                        echo $_SESSION['serviceIcon_error'];
                                        unset($_SESSION['serviceIcon_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>
                        <div class="form-layout-footer mg-t-30 text-center">
                            <button style="cursor:pointer" class="btn btn-info mg-r-5 rounded">Save Service</button>
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

</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
<?php include('includes/footer.php') ?>