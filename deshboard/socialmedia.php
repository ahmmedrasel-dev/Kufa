<?php 
 include 'includes/header.php';
 require_once '../database.php';
 $select = " SELECT * FROM socialmedia WHERE status = 1";
 $query = mysqli_query($db_connect, $select);

 $deactive = " SELECT * FROM socialmedia WHERE status = 2";
 $deactiveQuery = mysqli_query($db_connect, $deactive);
 $deactiveAssoc = mysqli_fetch_assoc($deactiveQuery);

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="deshboard.php">Deshboard</a>
        <span class="breadcrumb-item active">Social Media Link</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
                        <div class="table-header text-center">
                            <h2>Socail Media Active</h2>
                        </div>
                        <div class="message">
                            <?php if (isset($_SESSION['message'])) : ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button class="close" data-dismiss="alert">&times;</button>
                                    <strong><?= $_SESSION['message']; ?></strong>
                                </div>
                            <?php
                                unset($_SESSION['message']);
                            endif; ?>
                        </div>
                    
                        <div class="container">
                            <div class="text-right pb-2">
                                <a href="socialmedia-add.php"><i class="fa fa-plus"></i>Add Social Icon</a>
                            </div>
                            <table class="table table-bordered table-hover myTable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Social Icon</th>
                                        <th>Social Link</th>
                                        <th class="text-center">Status</th>
                                        <th class='text-center'>Actions</th>
                                    </tr>
                                </thead>
                                <?php foreach ( $query as $key => $socilmedia): ?>
                                <tbody>
                                    <tr>
                                      <td><?php echo ++$key ?></td>
                                      <td><?php echo $socilmedia['icon'] ?></td>
                                      <td><?php echo $socilmedia['sociallink'] ?></td>
                                      <td style="text-align :center">
                                      <?php if($socilmedia['status'] == 1): ?>
                                          <a class="btn btn-outline-success rounded" href="social-status.php?socialId=<?php echo $socilmedia['id']?>">Active</a>
                                      <?php endif; ?>
                                      </td>
                                      <td class="text-center">
                                          <?php if($socilmedia['status'] == 1): ?>
                                            <a class="btn btn-outline-primary rounded" href="social-edit.php?socialId=<?= $socilmedia['id'] ?>">Edit</a>
                                            <a class="btn btn-outline-danger rounded" href="social-delete.php?socialId=<?= $socilmedia['id'] ?>">Delete</a>
                                          <?php endif; ?>
                                      </td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        <?php if($deactiveAssoc['status']): ?>
          <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
                        <div class="table-header text-center">
                            <h2>Socail Media Deactive</h2>
                        </div>
                    
                        <div class="container">
                            <table class="table table-bordered table-hover myTable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Social Icon</th>
                                        <th class="text-center">Status</th>
                                        <th class='text-center'>Actions</th>
                                    </tr>
                                </thead>
                                <?php foreach ( $deactiveQuery as $key => $dsocilmedia): ?>
                                <tbody>
                                    <tr>
                                      <td><?php echo ++$key ?></td>
                                      <td><?php echo $dsocilmedia['icon'] ?></td>
                                      <td style="text-align :center">
                                      <?php if($dsocilmedia['status'] == 1): ?>
                                          <a class="btn btn-outline-success rounded" href="social-status.php?socialId=<?php echo $dsocilmedia['id']?>">Active</a>
                                      <?php else: ?>
                                          <a class="btn btn-outline-danger rounded" href="social-status.php?socialId=<?php echo $dsocilmedia['id']?>">Deactive</a>
                                      <?php endif; ?>
                                      </td>
                                      <td class="text-center">
                                          <?php if($dsocilmedia['status']): ?>
                                            <a class="btn btn-outline-danger rounded" href="banner-edit.php?bannerId=<?= $assoc['id'] ?>">Not Allow</a>
                                          <?php endif; ?>
                                      </td>
                                    </tr>
                                </tbody>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        <?php endif; ?>
        </div>
    </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->

<?php include 'includes/footer.php' ?>