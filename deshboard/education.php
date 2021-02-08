<?php 
include('includes/header.php');
require_once('../database.php');

$selectData = "SELECT * FROM education WHERE status = 1 ";
$query = mysqli_query($db_connect, $selectData );

$deactiveEducation = "SELECT * FROM education WHERE status = 2";
$deactiveQuerry= mysqli_query($db_connect, $deactiveEducation);
$deactive_assoc = mysqli_fetch_assoc($deactiveQuerry);

?>    
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="deshboard.php">Deshboard</a>
        <span class="breadcrumb-item active">Education</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
                        <div class="table-header text-center">
                            <h2>All Eduction</h2>
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
                            <a href="education-add.php"><i class="fa fa-plus"></i> Add Education</a>
                        </div>
                        <table class="table table-bordered myTable">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Year</th>
                                    <th>Subject</th>
                                    <th class="text-center">Status</th>
                                    <th class='text-center'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach( $query as $key => $education):?>
                                <tr>
                                    <td><?php echo ++$key;?></td>
                                    <td><?php echo $education['year'];?></td>
                                    <td><?php echo $education['subject'];?></td>
                                    <td class="text-center">
                                        <?php if($education['status'] == 1):?>
                                            <a class="btn btn-success" href="education-status.php?educationId=<?= $education['id']?>">Active</a>
                                        <?php else: ?>
                                          <a class="btn btn-success" href="education-status.php?educationId=<?= $education['id']?>">Deactive</a>
                                        <?php endif;?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($education['status'] == 1): ?>
                                            <a class="btn btn-secondary" href="education-edit.php?educationId=<?= $education['id']?>">Edit</a>
                                            <a class="btn btn-danger" href="education-delete.php?educationId=<?= $education['id']?>">Delete</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                
                </div>
            </div>

        <?php if($deactive_assoc['status']): ?>
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
                        <div class="table-header text-center">
                            <h2>All Deactive Education</h2>
                        </div>
                        <table class="table table-bordered myTable">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Year</th>
                                    <th>Subject</th>
                                    <th class="text-center">Status</th>
                                    <th class='text-center'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach( $deactiveQuerry as $key => $education):?>
                                    <tr>
                                        <td><?php echo ++$key;?></td>
                                        <td><?php echo $education['year'];?></td>
                                        <td><?php echo $education['subject'];?></td>
                                        <td class="text-center">
                                            <?php if($education['status'] == 1):?>
                                                <a class="btn btn-success" href="education-status.php?educationId=<?= $education['id']?>">Active</a>
                                            <?php else: ?>
                                            <a class="btn btn-success" href="education-status.php?educationId=<?= $education['id']?>">Deactive</a>
                                            <?php endif;?>
                                        </td>
                                        <td class="text-center">
                                            <?php if($education['status'] == 1): ?>
                                                <a class="btn btn-secondary" href="education-edit.php?educationId=<?= $education['id']?>">Edit</a>
                                                <a class="btn btn-danger" href="education-delete.php?educationId=<?= $education['id']?>">Delete</a>
                                            <?php else: ?>
                                            <a style="cursor:pointer" class="btn btn-danger text-white">Not Allow</a>
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
<?php include('includes/footer.php') ?>