<?php
include('includes/header.php');
require_once('../database.php');
$service_id = $_GET['services-id'];

$select_services = "SELECT * FROM services WHERE id = '$service_id' ";
$serviceQuery = mysqli_query($db_connect, $select_services);
$service_assoc = mysqli_fetch_assoc($serviceQuery);

$selectedIcon = $service_assoc['services_icon'];


?>    
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="services.php">Services</a>
        <span class="breadcrumb-item active">Edit Service</span>
      </nav>

            <div class="service_form p-5">
                <?php if(isset($service_error)): ?>
                <div class="alert alert-success">
                    <span>
                        <?php 
                            echo $message;
                            unset($message);
                        ?>
                    </span>
                </div> 
                <?php endif; ?>
                <form action="service-update.php" method="POST">
                    <input type="hidden" name="service_id" value="<?php echo $service_assoc['id'] ?>">
                    <div class="card pd-2 pd-sm-40 form-layout form-layout-4">
                        <h6 class="card-body-title text-center">Edit Serives</h6>
                        <div class="row">
                            <label class="col-sm-4 form-control-label">Service Title: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" name="service_title" class="form-control" placeholder="Ex: Graphics Design" value="<?php echo $service_assoc['services_title'] ?>">
                            <p style="color: red">
                            <!-- Service Error Message Show -->
                                <?php if(isset($_SESSION['serviceTitle_error'])): ?>
                                
                                <?php
                                    echo $_SESSION['serviceTitle_error'];
                                    unset($_SESSION['serviceTitle_error']);
                                endif; ?>
                            </p>
                            </div>
                        </div><!-- row -->
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Service Summary: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" name="service_summary" placeholder="Ex: Lorem ipsume dolar aset..." value="<?php echo $service_assoc['services_summary'] ?>">
                            <!-- Service Error Message Show -->
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
                                <option value="" disabled >Service Icon</option>
                                <option value="fas fa-pen-nib"
                                <?php
                                    if($selectedIcon == 'fas fa-pen-nib'){
                                        echo "selected";
                                    }
                                ?>
                                >Graphic</option>
                                <option value="fas fa-magic"
                                <?php
                                    if($selectedIcon == 'fas fa-magic'){
                                        echo "selected";
                                    }
                                ?>
                                >Magic Icon</option>
                                <option value="fas fa-desktop"
                                <?php
                                    if($selectedIcon == 'fas fa-desktop'){
                                        echo "selected";
                                    }
                                ?>
                                >Desktop Icon</option>
                                <option value="fas fa-sitemap"
                                <?php
                                    if($selectedIcon == 'fas fa-sitemap'){
                                        echo "selected";
                                    }
                                ?>
                                >Network Icon</option>
                                <option value="fas fa-bullseye"
                                <?php
                                    if($selectedIcon == 'fas fa-bullseye'){
                                        echo "selected";
                                    }
                                ?>
                                >Focus Icon</option>
                                <option value="fas fa-lightbulb"
                                <?php
                                    if($selectedIcon == 'fas fa-lightbulb'){
                                        echo "selected";
                                    }
                                ?>
                                > Light Icon</option>
                            </select>
                            <!-- Service Error Message Show -->
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
                            <button style="cursor:pointer" class="btn btn-info mg-r-5 rounded">Update Service</button>
                        </div><!-- form-layout-footer -->
                    </div>
                </form>
            </div>

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
<?php include('includes/footer.php') ?>