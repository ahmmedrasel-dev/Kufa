<?php 
  ob_start();
  include 'includes/header.php';
  require_once '../database.php';

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $year = $_POST['year'];
    $subject = $_POST['subject'];
    //Year Validation.
    if(empty($year)){
      $_SESSION['educationYear_error'] = "Year Must Be Field";
    }else{
      $regex = '@[0-1]@';
      $number = preg_match($regex, $year);
      if($number){
        $validYear = $year;
      }else{
        $_SESSION['educationYear_error'] = "Only Number Allow Here.";
      } 
    }
    // subject Validation.
    if(empty($subject)){
      $_SESSION['eductionSubject_error'] = "Subject Must Be Field";
    }else{
      $validSubject = $subject;
    }

    if( $validYear && $validSubject ){
      $insert = " INSERT INTO education ( year, subject ) VALUES ( '$validYear', '$validSubject' ) ";
      if(mysqli_query($db_connect, $insert)){
        $_SESSION['message'] = "Education Add Successfully.";
        header('location:education.php');
      }else{
        $_SESSION['message'] = "Something is Wrong.".mysqli_error($db_connect);
        header('location:education.php');
      }
    }

  }

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="education.php">Education</a>
        <span class="breadcrumb-item active">Add Education</span>
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
                        <h6 class="card-body-title text-center">Add New Education</h6>

                        <div class="row">
                            <label class="col-sm-4 form-control-label">Passing Year: <span class="tx-danger">*</span></label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="year" class="form-control" placeholder="Ex: 2012">
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
                                <input type="text" class="form-control" name="subject" placeholder="Ex: Bachelor of Computer Engineering">
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
                            <button style="cursor:pointer" class="btn btn-info mg-r-5 rounded">Save Education</button>
                        </div>
                    </div>
            </form>
                <!-- form-layout-footer -->
        </div>

</div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

<?php include 'includes/footer.php' ?>;