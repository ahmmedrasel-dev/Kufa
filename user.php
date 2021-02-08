<?php 
session_start();
require_once('database.php');
$select_data = "SELECT * FROM users";
$select_query = mysqli_query($db_connect, $select_data);
$select_data2 = "SELECT COUNT(*) as total FROM users";
$select_query2 = mysqli_query($db_connect, $select_data2);
$data_assoc = mysqli_fetch_assoc($select_query2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="conainer px-0 mt-5">
        <div class="row">
            <div class="col-10 m-auto">
                <div class="table bg-light rounded p-4">
                    <div class="table-header text-center">
                        <h2>All Users(<?php echo $data_assoc['total'];?>)</h2>
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
                        <?php foreach( $select_query as $key => $user):?>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</body>
</html>