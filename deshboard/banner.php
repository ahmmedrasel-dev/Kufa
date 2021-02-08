<?php 
    include 'includes/header.php';
    require_once '../database.php';

    $select = "SELECT * FROM banner";
    $query = mysqli_query($db_connect, $select);
    $assoc = mysqli_fetch_assoc($query);

    $select2 = "SELECT COUNT(*) as total FROM banner";
    $query2 = mysqli_query($db_connect,$select2);
    $assoc2 = mysqli_fetch_assoc($query2);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="deshboard.php">Deshboard</a>
        <span class="breadcrumb-item active">Banner</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
                        <div class="table-header text-center">
                            <h2>Banner Content</h2>
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
                                        <th>Sub-Title</th>
                                        <th>Title</th>
                                        <th>Short Description</th>
                                        <th>Banner Photo</th>
                                        <th style="text-align: center; width: 50px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $assoc['subTitle']; ?></td>
                                        <td><?php echo $assoc['title']; ?></td>
                                        <td><?php echo $assoc['summary']; ?></td>
                                        <td class="text-center">
                                            <?php if($assoc2['total'] > 0): ?>
                                                <img width="100px" src="../assets/images/<?php echo $assoc['bannerPhoto'] ?>" alt="Photo">
                                            <?php else: ?>
                                                <p>N/A</p>
                                            <?php endif; ?>
                                        </td>
                                        <td style="text-align: center;">
                                            <?php if($assoc2['total'] < 1 ): ?>
                                                <a class="btn btn-outline-primary rounded" href="banner-add.php"><i class="fa fa-plus"></i>Add Banner Content</a>
                                            <?php else: ?>
                                                <a class="btn btn-outline-primary rounded" href="banner-edit.php">Edit</a>
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