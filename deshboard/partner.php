<?php 
  include 'includes/header.php';
  require_once '../database.php';

  $selectData = " SELECT * FROM partner WHERE status = 1 ";
  $dataQuery = mysqli_query($db_connect, $selectData);

  $deactive_partner = "SELECT * FROM partner WHERE status = 2";
  $deactivePartner = mysqli_query($db_connect, $deactive_partner);
  $deavtiveAssoc = mysqli_fetch_assoc($deactivePartner);

?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="deshboard.php">Deshboard</a>
        <span class="breadcrumb-item active">Partner</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
                        <div class="table-header text-center">
                            <h2>All Partners</h2>
                        </div>
                        <div class="message">
                            <?php if (isset($_SESSION['message'])):?>
                                    <div class="alert alert-warning alert-dismissible" role="alert">
                                        <button class="close" data-dismiss="alert">&times;</button>
                                        <strong><?= $_SESSION['message']; ?></strong>
                                    </div>
                                <?php 
                                    unset($_SESSION['message']); 
                                endif;?>
                        </div>
                        <div class="text-right pb-2">
                            <a href="partner-add.php"><i class="fa fa-plus"></i> Add Partner</a>
                        </div>
                        <table class="table table-bordered myTable">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Partner Logo</th>
                                    <th class="text-center">Status</th>
                                    <th class='text-center'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach( $dataQuery as $key => $partner):?>
                                    <tr>
                                        <td><?php echo ++$key;?></td>
                                        <td>
                                            <img width="100px" src="../assets/images/<?php echo $partner['brand_logo'] ?>" alt="">
                                        </td>
                                        <td style="text-align: center; width: 150px;">
                                            <?php if($partner['status'] == 1):?>
                                                <a class="btn btn-outline-success" href="partner-status.php?partnerId=<?= $partner['id']?>">Active</a>
                                            <?php else: ?>
                                                <a class="btn btn-outline-danger" href="partner-status.php?partnerId=<?= $counter['id']?>">Deactive</a>  
                                            <?php endif;?>
                                        </td>
                                        <td style="text-align: center; width: 150px;">
                                            <?php if($partner['status'] == 1): ?>
                                                <a class="btn btn-outline-secondary" href="partner-edit.php?partnerId=<?= $partner['id']?>">Edit</a>
                                                <a class="btn btn-outline-danger" href="partner-delete.php?partnerId=<?= $partner['id']?>">Delete</a>
                                            <?php else: ?>
                                                <a class="btn btn-outline-danger">Not Allow</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                
                </div>
            </div>

            <?php if ($deavtiveAssoc['status'] == 2) : ?>
                <div class="row">
                    <div class="col-12 m-auto">
                        <div class="table bg-light rounded p-4">
                            <div class="table-header text-center">
                                <h2>All Deactive Partner</h2>
                            </div>

                            <table class="table table-bordered">
                                <thead>
                                  <tr>
                                    <th>Sl</th>
                                    <th>Partner Logo</th>
                                    <th class="text-center">Status</th>
                                    <th class='text-center'>Actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php foreach( $deactivePartner as $key => $partner):?>
                                      <tr>
                                          <td><?php echo ++$key;?></td>
                                          <td>
                                              <img width="100px" src="../assets/images/<?php echo $partner['brand_logo'] ?>" alt="">
                                          </td>
                                          <td style="text-align: center; width: 150px;">
                                              <?php if($partner['status'] == 1):?>
                                                  <a class="btn btn-outline-success" href="partner-status.php?partnerId=<?= $partner['id']?>">Active</a>
                                              <?php else: ?>
                                                  <a class="btn btn-outline-danger" href="partner-status.php?partnerId=<?= $partner['id']?>">Deactive</a>  
                                              <?php endif;?>
                                          </td>
                                          <td style="text-align: center; width: 150px;">
                                              <?php if($partner['status'] == 1): ?>
                                                  <a class="btn btn-outline-secondary" href="partner-edit.php?partnerId=<?= $partner['id']?>">Edit</a>
                                                  <a class="btn btn-outline-danger" href="partner-delete.php?partnerId=<?= $partner['id']?>">Delete</a>
                                              <?php else: ?>
                                                  <a class="btn btn-outline-danger text-white">Not Allow</a>
                                              <?php endif; ?>
                                          </td>
                                      </tr>
                                  <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            <?php endif; ?>
        </div>

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

<?php include "includes/footer.php" ?>