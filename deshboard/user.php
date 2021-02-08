<?php 
include('includes/header.php'); 
require_once('../database.php');

$select_data = "SELECT * FROM users WHERE status = 1 ORDER BY name DESC";
$select_query = mysqli_query($db_connect, $select_data);

$deactive_user = "SELECT * FROM users WHERE status = 2 ORDER BY name DESC";
$deactive_query = mysqli_query($db_connect, $deactive_user);

$deactive_user = "SELECT COUNT(*) as total, status FROM users WHERE status = 2 ORDER BY name DESC";
$deactive_user_query = mysqli_query($db_connect, $deactive_user);
$deactive_asoc = mysqli_fetch_assoc($deactive_user_query);


$select_data2 = "SELECT COUNT(*) as total FROM users WHERE status = 1 ORDER BY name DESC";
$select_query2 = mysqli_query($db_connect, $select_data2);
$data_assoc = mysqli_fetch_assoc($select_query2);

?>    
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="deshboard.php">Deshboard</a>
        <span class="breadcrumb-item active">Users</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
                        <div class="table-header text-center">
                            <h2>All Active Users(<?php echo $data_assoc['total'];?>)</h2>
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
                        <table class="table table-bordered myTable">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th class="text-center">Status</th>
                                    <th class='text-center'>Actions</th>
                                </tr>
                            </thead>
                            <?php foreach( $select_query as $key => $user):?>
                            <tbody>
                                <tr>
                                    <td><?php echo ++$key;?></td>
                                    <td><?php echo $user['name'];?></td>
                                    <td><?php echo $user['phone'];?></td>
                                    <td><?php echo $user['email'];?></td>
                                    <td class="text-center">
                                        <?php if($user['status'] == 1):?>
                                            <a class="btn btn-outline-success rounded" href="user-status.php?status_id=<?php echo $user['id']; ?>">Activeted</a>
                                        <?php else: ?>
                                            <a href="user-status.php?status_id=<?php echo $user['id']; ?>" class="btn btn-outline-danger rounded">Deactivated</a>  
                                        <?php endif;?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($user['status'] == 1): ?>
                                            <a class="btn btn-outline-secondary" href="user-edit.php?edit_id=<?php echo $user['id']; ?>">Edit</a>
                                            <a class="btn btn-outline-danger" href="user-delete.php?delete_id=<?php echo $user['id']; ?>">Delete</a>
                                            <a class="btn btn-outline-primary" href="user-profile.php?prifile_id=<?php echo $user['id']; ?>">View Profile</a>
                                        <?php else: ?>
                                            <a href="" class="btn btn-danger">Not Allow</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>      
                            </tbody>
                            <?php endforeach;?>
                        </table>
                    </div>
                
                </div>
                </div>
            </div>

            <?php if($deactive_asoc['status']): ?>

            <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
                        <div class="table-header text-center">
                            <h2>All Deactivate Users(<?php echo $deactive_asoc['total'];?>)</h2>
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
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th class="text-center">Status</th>
                                <th class='text-center'>Actions</th>
                            </tr>
                            <?php foreach( $deactive_query as $key => $user):?>
                                    <tr>
                                        <td><?php echo ++$key;?></td>
                                        <td><?php echo $user['name'];?></td>
                                        <td><?php echo $user['phone'];?></td>
                                        <td><?php echo $user['email'];?></td>
                                        <td class="text-center">
                                            <?php if($user['status'] == 1):?>
                                                <a class="btn btn-success" href="user-status.php?status_id=<?php echo $user['id']; ?>">Activeted</a>
                                            <?php else: ?>
                                                <a href="user-status.php?status_id=<?php echo $user['id']; ?>" class="btn btn-danger">Deactivated</a>  
                                            <?php endif;?>
                                        </td>
                                        <td class="text-center">
                                            <?php if($user['status'] == 1): ?>
                                                <a class="btn btn-secondary" href="user-edit.php?edit_id=<?php echo $user['id']; ?>">Edit</a>
                                                <a class="btn btn-danger" href="user-delete.php?delete_id=<?php echo $user['id']; ?>">Delete</a>
                                                <a class="btn btn-primary" href="user-profile.php?prifile_id=<?php echo $user['id']; ?>">View Profile</a>
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
            </div>
            <?php endif; ?>

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
<?php include('includes/footer.php') ?>