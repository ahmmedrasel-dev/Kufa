<?php 
include 'includes/header.php';
require_once '../database.php';

$selectData = " SELECT * FROM testimonial WHERE status = 1 ";
$dataQuery = mysqli_query($db_connect, $selectData);

$deactiveData = " SELECT * FROM testimonial WHERE status = 2 ";
$deactiveQuery = mysqli_query($db_connect, $deactiveData);
$deactiveAssoc = mysqli_fetch_assoc($deactiveQuery);


?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="deshboard.php">Deshboard</a>
        <span class="breadcrumb-item active">Testimonial</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
                        <div class="table-header text-center">
                            <h2>All Testimonial</h2>
                        </div>
                        <div class="message">
                            <?php if (isset($_SESSION['message'])) : ?>
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                    <button class="close" data-dismiss="alert">&times;</button>
                                    <strong><?= $_SESSION['message']; ?></strong>
                                </div>
                            <?php
                                unset($_SESSION['message']);
                            endif; ?>
                        </div>
                    
                        <div class="container">
                            <div class="text-right pb-2">
                                <a href="testimonial-add.php"><i class="fa fa-plus"></i> Add Testimonial</a>
                            </div>
                            <table class="table table-bordered table-hover myTable">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Client Name</th>
                                        <th>Designation</th>
                                        <th>Client Comment</th>
                                        <th>Client Photo </th>
                                        <th class="text-center">Status</th>
                                        <th class='text-center'>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($dataQuery as $key => $testimonial) : ?>
                                        <tr>
                                            <td><?php echo ++$key; ?></td>
                                            <td><?php echo $testimonial['clientName']; ?></td>
                                            <td><?php echo $testimonial['designation']; ?></td>
                                            <td><?php echo $testimonial['clientComment']; ?></td>
                                            <td>
                                                <img width="100px" src="../assets/images/<?php echo $testimonial['clientPhoto'] ?>" alt="Client Photo">
                                            </td>
                                            <td style="text-align: center; width: 150px;">
                                                <?php if ($testimonial['status'] == 1) : ?>
                                                    <a class="btn btn-outline-success" href="testimonial-status.php?testimonialId=<?= $testimonial['id'] ?>">Active</a>
                                                <?php else : ?>
                                                    <a class="btn btn-outline-danger" href="testimonial-status.php?testimonialId=<?= $testimonial['id'] ?>">Deactive</a>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align: center; width: 150px;">
                                                <?php if ($testimonial['status'] == 1) : ?>
                                                    <a class="btn btn-outline-secondary" href="testimonial-edit.php?testimonialId=<?= $testimonial['id'] ?>">Edit</a>
                                                    <a class="btn btn-outline-danger" href="testimonial-delete.php?testimonialId=<?= $testimonial['id'] ?>">Delete</a>
                                                <?php else : ?>
                                                    <a class="btn btn-outline-danger">Not Allow</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <?php if ($deactiveAssoc['status']) : ?>
                <div class="row">
                    <div class="col-12 m-auto">
                        <div class="table bg-light rounded p-4">
                            <div class="table-header text-center">
                                <h2>All Deactive Portfolio</h2>
                            </div>
                            
                            <table class="table table-bordered myTable">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Client Name</th>
                                        <th>Designation</th>
                                        <th>Client Comment</th>
                                        <th>Client Photo </th>
                                        <th class="text-center">Status</th>
                                        <th class='text-center'>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($deactiveQuery as $key => $testimonial) : ?>
                                        <tr>
                                            <td><?php echo ++$key; ?></td>
                                            <td><?php echo $testimonial['clientName']; ?></td>
                                            <td><?php echo $testimonial['designation']; ?></td>
                                            <td><?php echo $testimonial['clientComment']; ?></td>
                                            <td>
                                                <img width="100px" src="../assets/thumbnail/<?php echo $testimonial['clientPhoto'] ?>" alt="Client Photo">
                                            </td>
                                            <td class="text-center">
                                                <?php if ($testimonial['status'] == 1) : ?>
                                                    <a class="btn btn-success" href="testimonial-status.php?testimonialId=<?= $testimonial['id'] ?>">Active</a>
                                                <?php else : ?>
                                                    <a class="btn btn-danger" href="testimonial-status.php?testimonialId=<?= $testimonial['id'] ?>">Deactive</a>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($testimonial['status'] == 1) : ?>
                                                    <a class="btn btn-secondary" href="testimonial-edit.php?testimonialId=<?= $testimonial['id'] ?>">Edit</a>
                                                    <a class="btn btn-danger" href="testimonial-delete.php?testimonialId=<?= $testimonial['id'] ?>">Delete</a>
                                                <?php else : ?>
                                                    <a class="btn btn-danger text-white">Not Allow</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
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