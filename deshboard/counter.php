<?php
include('includes/header.php');
require_once('../database.php');

$selectData = "SELECT * FROM counter WHERE counter_status = 1";
$dataQuery = mysqli_query($db_connect, $selectData);

$deactiveData = "SELECT * FROM counter WHERE counter_status = 2";
$deactiveQuery = mysqli_query($db_connect, $deactiveData);
$deactiveAssoc = mysqli_fetch_assoc($deactiveQuery);

?>

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="deshboard.php">Deshboard</a>
        <span class="breadcrumb-item active">Counter</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
                        <div class="table-header text-center">
                            <h2>All Counter</h2>
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
                            <a href="counter-add.php"><i class="fa fa-plus"></i> Add Counter</a>
                        </div>
                        <table class="table table-bordered myTable">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th> Counter Title</th>
                                    <th> Counter Number</th>
                                    <th> Counter Icon</th>
                                    <th class="text-center">Status</th>
                                    <th class='text-center'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach( $dataQuery as $key => $counter):?>
                                    <tr>
                                        <td><?php echo ++$key;?></td>
                                        <td><?php echo $counter['counter_title'];?></td>
                                        <td><?php echo $counter['counter_number'];?></td>
                                        <td><?php echo $counter['counter_icon'];?></td>
                                        <td class="text-center">
                                            <?php if($counter['counter_status'] == 1):?>
                                                <a class="btn btn-success" href="counter-status.php?counterId=<?= $counter['id']?>">Active</a>
                                            <?php else: ?>
                                                <a class="btn btn-danger" href="counter-status.php?counterId=<?= $counter['id']?>">Deactive</a>  
                                            <?php endif;?>
                                        </td>
                                        <td class="text-center">
                                            <?php if($counter['counter_status'] == 1): ?>
                                                <a class="btn btn-secondary" href="counter-edit.php?counterId=<?= $counter['id']?>">Edit</a>
                                                <a class="btn btn-danger" href="counter-delete.php?counterId=<?= $counter['id']?>">Delete</a>
                                            <?php else: ?>
                                                <a class="btn btn-danger">Not Allow</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                
                </div>
            </div>

        <?php if($deactiveAssoc['counter_status']): ?>
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
                        <div class="table-header text-center">
                            <h2>All Deactive Servies</h2>
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
                        <table class="table table-bordered">
                            <tr>
                              <th>Sl</th>
                              <th> Counter Title</th>
                              <th> Counter Number</th>
                              <th> Counter Icon</th>
                              <th class="text-center">Status</th>
                              <th class='text-center'>Actions</th>
                            </tr>
                            <?php foreach( $deactiveQuery as $key => $deactiveCounter):?>
                                <tr>
                                  <td><?php echo ++$key;?></td>
                                  <td><?php echo $deactiveCounter['counter_title'];?></td>
                                  <td><?php echo $deactiveCounter['counter_number'];?></td>
                                  <td><?php echo $deactiveCounter['counter_icon'];?></td>
                                  <td class="text-center">
                                      <?php if($deactiveCounter['counter_status'] == 1):?>
                                          <a class="btn btn-success" href="counter-status.php?counterId=<?= $deactiveCounter['id']?>">Active</a>
                                      <?php else: ?>
                                          <a class="btn btn-danger" href="counter-status.php?counterId=<?= $deactiveCounter['id']?>">Deactive</a>  
                                      <?php endif;?>
                                  </td>
                                  <td class="text-center">
                                      <?php if($deactiveCounter['counter_status'] == 1): ?>
                                          <a class="btn btn-secondary" href="">Edit</a>
                                          <a class="btn btn-danger" href="">Delete</a>
                                      <?php else: ?>
                                          <a href="" class="btn btn-danger">Not Allow</a>
                                      <?php endif; ?>
                                  </td>
                                </tr>
                            <?php endforeach;?>
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