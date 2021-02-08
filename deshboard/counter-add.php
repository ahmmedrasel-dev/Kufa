<?php
ob_start();
include "includes/header.php";
require "../database.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $counter_title = mysqli_real_escape_string($db_connect, $_POST['counter_title']);
  $counter_number = mysqli_real_escape_string($db_connect, $_POST['counter_number']);
  $counter_icon = mysqli_real_escape_string($db_connect, $_POST['counter_icon']);

  if(empty($counter_title)){
    $_SESSION['counterTitle_error'] = "Write Your Counter Title.";
    header('location:counter-add.php');
  }else{
    $validTitle = $counter_title;
  }

  if(empty($counter_number)){
    $_SESSION['counterNumber_error'] = "Write Your Counter Number.";
    header('location:counter-add.php');
  }else{
    $number = preg_match('@[0-9]@', $counter_number);
    if($number){
      $validNumber = $counter_number;
    }else{
      $_SESSION['counterNumber_error'] = "Only Number Allow Here.";
      header('location:counter-add.php');
    }
  }

  if(empty($counter_icon)){
    $_SESSION['counterIcon_error'] = "Select Icon From Dropdown list.";
    header('location:counter-add.php');
  }else{
    $validIcon = $counter_icon;
  }

  if( $validTitle && $validNumber && $validIcon ){
    $insertData = " INSERT INTO counter (counter_icon, counter_number, counter_title ) VALUES( '$validIcon', '$validNumber', '$validTitle' )";
    if(mysqli_query($db_connect, $insertData)){
      $_SESSION['message'] = "Counter Add Successfully";
      header('location:counter.php');
    }
  }

}


?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
      <a class="breadcrumb-item" href="counter.php">Counter</a>
      <span class="breadcrumb-item active">Add Counter</span>
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
          <h6 class="card-body-title text-center">Add New Counter</h6>
          <div class="row">
            <label class="col-sm-4 form-control-label">Counter Title: <span class="tx-danger">*</span></label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" name="counter_title" class="form-control" placeholder="Ex: Graphics Design">
              <p style="color: red">
                  <?php 
                    if(isset($_SESSION['counterTitle_error'])):
                    echo $_SESSION['counterTitle_error'];
                    unset($_SESSION['counterTitle_error']);
                    endif; 
                  ?>
              </p>
            </div>
          </div>
          <!-- row -->
          <div class="row mg-t-20">
              <label class="col-sm-4 form-control-label">Counter Number: <span class="tx-danger">*</span></label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                  <input type="text" class="form-control" name="counter_number" placeholder="Ex: 567">
                  <p style="color: red">
                      <?php 
                        if(isset($_SESSION['counterNumber_error'])):
                        echo $_SESSION['counterNumber_error'];
                        unset($_SESSION['counterNumber_error']);
                        endif; 
                      ?>
                  </p>
              </div>
          </div>
          <div class="row mg-t-20">
              <label class="col-sm-4 form-control-label">Counter Icon: <span class="tx-danger">*</span></label>
              <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <select class="form-control" name="counter_icon">
                  <option value="" disabled selected>Service Icon</option>
                  <option value="fas fa-pen-nib">Graphic</option>
                  <option value="fas fa-magic">Magic Icon</option>
                  <option value="fas fa-desktop">Desktop Icon</option>
                  <option value="fas fa-sitemap">Network Icon</option>
                  <option value="fas fa-bullseye">Focus Icon</option>
                  <option value="fas fa-lightbulb"> Light Icon</option>
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
              <button style="cursor:pointer" class="btn btn-info mg-r-5 rounded">Save Counter</button>
          </div>
        </div>
      </form>
      <!-- form End -->
  </div>

</div>
<!-- ########## END: MAIN PANEL ########## -->
<?php include('includes/footer.php') ?>