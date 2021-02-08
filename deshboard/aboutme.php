<?php 
    include 'includes/header.php';
    require_once '../database.php';

    $selectData = " SELECT * FROM about ";
    $query = mysqli_query($db_connect, $selectData);
    $Assoc = mysqli_fetch_assoc($query);

    $select2 = "SELECT COUNT(*) as total FROM about";
    $query2 = mysqli_query($db_connect,$select2);
    $assoc2 = mysqli_fetch_assoc($query2);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="deshboard.php">Deshboard</a>
        <span class="breadcrumb-item active">About Me</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
                        <div class="table-header text-center">
                            <h2>About Me Content</h2>
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
                            <table class="table table-bordered table-hover myTable">
                                <thead>
                                    <tr>
                                        <th>Short Description</th>
                                        <th>About Part Photo</th>
                                        <th class='text-center' style="width: 50px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                      <td><?php echo $Assoc['summary']; ?></td>
                                      <td class="text-center">
                                            <?php if($assoc2['total'] > 0): ?>
                                                <img width="100px" src="../assets/images/<?php echo $Assoc['aboutPhoto'] ?>" alt="Photo">
                                            <?php else: ?>
                                                <p>N/A</p>
                                            <?php endif; ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php if($assoc2['total'] < 1 ): ?>
                                                <a class="btn btn-outline-primary rounded" href="about-add.php"><i class="fa fa-plus"></i> Add About Content</a>
                                            <?php else: ?>
                                                <a class="btn btn-outline-primary rounded" href="aboutme-edit.php">Edit</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<?php include('includes/footer.php') ?>