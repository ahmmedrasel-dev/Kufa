<?php 
include('includes/header.php');
require_once('../database.php');
$counterId = $_GET['counterId'];

$selectData = " SELECT * FROM counter WHERE  id = $counterId";
$dataQuery = mysqli_query($db_connect, $selectData);
$dataAssoc = mysqli_fetch_assoc($dataQuery);
$selectedIcon = $dataAssoc['counter_icon'];

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="counter.php">Counter</a>
        <span class="breadcrumb-item active">Edit Counter</span>
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
        <form action="counter-update.php" method="POST">
            <div class="card pd-2 pd-sm-40 form-layout form-layout-4">
                <h6 class="card-body-title text-center">Edit Counter</h6>

                <div class="row">
                    <input type="hidden" name="counterId" value="<?php echo $dataAssoc['id']?>">
                    <label class="col-sm-4 form-control-label">Counter Title: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" name="counter_title" class="form-control" placeholder="Ex: Graphics Design" value="<?php echo $dataAssoc['counter_title']?>">
                        <p style="color: red">
                            <?php if(isset($_SESSION['counterTitle_error'])): ?>
                            
                            <?php
                                echo $_SESSION['counterTitle_error'];
                                unset($_SESSION['counterTitle_error']);
                            endif; ?>
                        </p>
                    </div>
                </div>
                <!-- row -->
                <div class="row mg-t-20">
                    <label class="col-sm-4 form-control-label">Counter Number: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" name="counter_number" placeholder="Ex: 567" value="<?php echo $dataAssoc['counter_number']?>">
                        <p style="color: red">
                            <?php if(isset($_SESSION['counterNumber_error'])): ?>
                            
                            <?php
                                echo $_SESSION['counterNumber_error'];
                                unset($_SESSION['counterNumber_error']);
                            endif; ?>
                        </p>
                    </div>
                </div>
                <div class="row mg-t-20">
                    <label class="col-sm-4 form-control-label">Counter Icon: <span class="tx-danger">*</span></label>
                    <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <select class="form-control" name="counter_icon">
                            <option value="" disabled>Service Icon</option>
                            <option value="fas fa-pen-nib"
                            <?php 
                                if($selectedIcon == 'fas fa-pen-nib'){
                                    echo 'selected';
                                }
                            ?>
                            >Graphic</option>
                            <option value="fas fa-magic"
                            <?php 
                                if($selectedIcon == 'fas fa-magic'){
                                    echo 'selected';
                                }
                            ?>
                            >Magic Icon</option>
                            <option value="fas fa-desktop"
                            <?php 
                                if($selectedIcon == 'fas fa-desktop'){
                                    echo 'selected';
                                }
                            ?>
                            >Desktop Icon</option>
                            <option value="fas fa-sitemap"
                            <?php 
                                if($selectedIcon == 'fas fa-sitemap'){
                                    echo 'selected';
                                }
                            ?>
                            >Network Icon</option>
                            <option value="fas fa-bullseye"
                            <?php 
                                if($selectedIcon == 'fas fa-bullseye'){
                                    echo 'selected';
                                }
                            ?>
                            >Focus Icon</option>
                            <option value="fas fa-lightbulb"
                            <?php 
                                if($selectedIcon == 'fas fa-lightbulb'){
                                    echo 'selected';
                                }
                            ?>
                            > Light Icon</option>
                        </select>
                        <p style="color: red">  
                            <?php 
                                if(isset($_SESSION['counterIcon_error'])):
                                echo $_SESSION['counterIcon_error'];
                                unset($_SESSION['counterIcon_error']);
                                endif; 
                            ?>
                        </p>
                    </div>
                </div>
                <div class="form-layout-footer mg-t-30 text-center">
                    <button style="cursor:pointer" class="btn btn-info mg-r-5 rounded">Update Counter</button>
                </div>
            </div> 
        </form>
    </div>
</div>
<!-- ########## END: MAIN PANEL ########## -->
<?php include('includes/footer.php') ?>