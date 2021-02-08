<?php 
include('includes/header.php');
require_once('../database.php');

$selectContactInfo = "SELECT * FROM contactInfo";
$contactQuery = mysqli_query($db_connect, $selectContactInfo );
$contactInfoAssoc = mysqli_fetch_assoc($contactQuery);

?>    
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="deshboard.php">Deshboard</a>
        <span class="breadcrumb-item active">Contact</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
                        <div class="table-header text-center">
                            <h2>Contact Info Content</h2>
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
                        <?php

                        $selectContactInfo1 = "SELECT COUNT(*) as total FROM contactInfo";
                        $contactQuery1 = mysqli_query($db_connect, $selectContactInfo1 );
                        $contactInfoAssoc1 = mysqli_fetch_assoc($contactQuery1);
                        
                        if($contactInfoAssoc1['total'] < 1 ): ?>
                            <a href="contact-info-add.php"><i class="fa fa-plus"></i> Add contact info</a>
                        <?php endif; ?>
                        </div>
                        <table class="table table-bordered myTable">
                            <thead>
                                <tr>
                                    <th>Summary</th>
                                    <th>Address</th>
                                    <th>Phone Number</th>
                                    <th>Email Address</th>
                                    <th style="text-align: center; width: 150px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $contactInfoAssoc['summary'];?></td>
                                    <td><?php echo $contactInfoAssoc['address'];?></td>
                                    <td><?php echo $contactInfoAssoc['phone'];?></td>
                                    <td><?php echo $contactInfoAssoc['email'];?></td>
                                    <td style="text-align: center; width: 150px;">
                                        <?php
                                        $selectcontactinfo = "SELECT COUNT(*) as total FROM contactinfo";
                                        $contactinfoQuery = mysqli_query($db_connect, $selectcontactinfo );
                                        $contactinfoAssoc = mysqli_fetch_assoc($contactinfoQuery);
                                        if($contactinfoAssoc['total'] < 1 ): ?>
                                        <a class="btn btn-outline-primary rounded" href="contact-info-add.php"><i class="fa fa-plus"></i> Add Content<a>
                                        <?php else: ?>
                                            <a class="btn btn-outline-primary rounded" href="contactinfo-edit.php">Edit</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                
                </div>
            </div>
        </div>

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
<?php include('includes/footer.php') ?>