<?php 
include('includes/header.php');
require_once('../database.php');

$select_services = "SELECT * FROM services WHERE services_status = 1 ";
$services_query = mysqli_query($db_connect, $select_services );

$deactive_services = "SELECT * FROM services WHERE services_status = 2";
$deactive_services_querry = mysqli_query($db_connect, $deactive_services);

$deactive_services2= "SELECT COUNT(*) services_status FROM services WHERE services_status = 2";
$deactive_services_querry2 = mysqli_query($db_connect, $deactive_services2);
$deactive_assoc = mysqli_fetch_assoc($deactive_services_querry2);

?>    
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="deshboard.php">Deshboard</a>
        <span class="breadcrumb-item active">Services</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
                        <div class="table-header text-center">
                            <h2>All Servies</h2>
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
                            <a href="service-add.php"><i class="fa fa-plus"></i> Add Service</a>
                        </div>
                        <table class="table table-bordered myTable">
                            <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th style="width: 255px">Title</th>
                                    <th style="width: 450px">Short Description</th>
                                    <th>Icon</th>
                                    <th class="text-center">Status</th>
                                    <th class='text-center'>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach( $services_query as $key => $services):?>
                                    <tr>
                                        <td><?php echo ++$key;?></td>
                                        <td><?php echo $services['services_title'];?></td>
                                        <td><?php echo $services['services_summary'];?></td>
                                        <td><?php echo $services['services_icon'];?></td>
                                        <td style="text-align: center; width: 150px;">
                                            <?php if($services['services_status'] == 1):?>
                                                <a class="btn btn-outline-success rounded" href="services-status.php?services-id=<?= $services['id']?>">Active</a>
                                            <?php else: ?>
                                                <a class="btn btn-outline-danger rounded" href="service-status.php?services-id=<?= $services['id']?>">Deactive</a>  
                                            <?php endif;?>
                                        </td>
                                        <td style="text-align: center; width: 150px;">
                                            <?php if($services['services_status'] == 1): ?>
                                                <a class="btn btn-outline-primary rounded" href="services-edit.php?services-id=<?= $services['id']?>">Edit</a>
                                                <a class="btn btn-outline-danger rounded" href="services-delete.php?services-id=<?= $services['id']?>">Delete</a>
                                            <?php else: ?>
                                                <a class="btn btn-danger rounded">Not Allow</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                
                </div>
            </div>

        <?php if($deactive_assoc['services_status']): ?>
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
                                <th style="width: 255px">Title</th>
                                <th style="width: 450px">Short Description</th>
                                <th>Icon</th>
                                <th class="text-center">Status</th>
                                <th class='text-center'>Actions</th>
                            </tr>
                            <?php foreach( $deactive_services_querry as $key => $services):?>
                                <tr>
                                    <td><?php echo ++$key;?></td>
                                    <td><?php echo $services['services_title'];?></td>
                                    <td><?php echo $services['services_summary'];?></td>
                                    <td><?php echo $services['services_icon'];?></td>
                                    <td class="text-center">
                                        <?php if($services['services_status'] == 1):?>
                                            <a class="btn btn-success" href="services-status.php?services-id=<?= $services['id']?>">Active</a>
                                        <?php else: ?>
                                            <a class="btn btn-danger" href="services-status.php?services-id=<?= $services['id']?>">Deactive</a>  
                                        <?php endif;?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($services['services_status'] == 1): ?>
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
<?php include('includes/footer.php') ?>