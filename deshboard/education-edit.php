<?php 
include 'includes/header.php';
require_once '../database.php';
$educationId = $_GET['educationId'];
$select = "SELECT * FROM education WHERE id = $educationId";
$query = mysqli_query($db_connect, $select);
$assoc = mysqli_fetch_assoc($query);
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="education.php">Education</a>
        <span class="breadcrumb-item active">Edit Education</span>
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
            <form action="education-update.php" method="POST">
                    <div class="card pd-2 pd-sm-40 form-layout form-layout-4">
                        <h6 class="card-body-title text-center">Update Education</h6>

                        <div class="row">
                            <input type="hidden" name="educationId" value="<?php echo $assoc['id']?>">
                            <label class="col-sm-4 form-control-label">Passing Year: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="year" class="form-control" value="<?php echo $assoc['year']?>">
                                <p style="color: red">
                                    <?php if(isset($_SESSION['educationYear_error'])): ?>
                                    
                                    <?php
                                        echo $_SESSION['educationYear_error'];
                                        unset($_SESSION['educationYear_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row mg-t-20">
                            <label class="col-sm-4 form-control-label">Degree Name: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" class="form-control" name="subject" value="<?php echo $assoc['subject']?>">
                                <p style="color: red">
                                    <?php if(isset($_SESSION['eductionSubject_error'])): ?>
                                    
                                    <?php
                                        echo $_SESSION['eductionSubject_error'];
                                        unset($_SESSION['eductionSubject_error']);
                                    endif; ?>
                                </p>
                            </div>
                        </div>
                        <div class="form-layout-footer mg-t-30 text-center">
                            <button style="cursor:pointer" class="btn btn-info mg-r-5 rounded">Update Education</button>
                        </div>
                    </div>
            </form>
                <!-- form-layout-footer -->
        </div>

</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

<?php include 'includes/footer.php' ?>;