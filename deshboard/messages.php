<?php
 include 'includes/header.php';
 require_once '../database.php'; 
 
 $select = "SELECT * FROM contact WHERE deleteStatus = 1 ORDER BY id DESC";
 $query = mysqli_query($db_connect, $select);
 //$data_assoc = mysqli_fetch_assoc($query);
?>
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="deshboard.php">Deshboard</a>
        <span class="breadcrumb-item active">inbox</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
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
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th class="text-center">Status</th>
                                    <th class='text-center'>Actions</th>
                                </tr>
                            </thead>
                            <?php foreach( $query as $key => $message):?>
                                <style>
                                    .unread{
                                        font-weight: 700;
                                    }
                                    .read{
                                        font-weight: 400;
                                    }
                                </style> 
                            <tbody>      
                                <tr class="<?php if($message['readStatus'] == 1){
                                    echo "unread";
                                }else{
                                    echo "read";
                                }?>">
                                    <td><?php echo ++$key;?></td>
                                    <td><?php echo $message['name'];?></td>
                                    <td><?php echo $message['email'];?></td>
                                    <td><?php echo $message['message'];?></td>
                                    <td class="text-center">
                                        <?php if($message['readStatus'] == 1):?>
                                            <a class="btn btn-danger" href="message-status.php?readStatusId=<?php echo $message['id']; ?>">Unread</a>
                                        <?php else: ?>
                                            <a href="message-status.php?readStatusId=<?php echo $message['id']; ?>" class="btn btn-success">Read</a>  
                                        <?php endif;?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($message['deleteStatus'] == 1): ?>
                                            <a class="btn btn-danger" href="delete-status.php?deleteStatusId=<?php echo $message['id']; ?>">Delete</a>
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

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
<?php include('includes/footer.php') ?>