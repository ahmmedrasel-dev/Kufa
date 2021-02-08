<?php
include 'includes/header.php';
require_once '../database.php';

$selectData = "SELECT * FROM setting";
$dataQuery = mysqli_query($db_connect, $selectData);
$dataAssoc = mysqli_fetch_assoc($dataQuery);

$selectSetting = "SELECT COUNT(*) as total FROM setting";
$settingQuery = mysqli_query($db_connect, $selectSetting);
$settingAssoc = mysqli_fetch_assoc($settingQuery);
?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="deshboard.php">Deshboard</a>
        <span class="breadcrumb-item active">Setting</span>
    </nav>
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
                        <div class="table-header text-center">
                            <h2>Website Setting</h2>
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
                        <table class="table table-bordered myTable">
                            <thead>
                                <tr>
                                    <th>Websit Title</th>
                                    <th>Header Logo</th>
                                    <th>Fav Icon</th>
                                    <th>Copyright Text</th>
                                    <th style="text-align: center; width: 150px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $dataAssoc['websiteTitle']; ?></td>
                                    <td>
                                        <?php if ($settingAssoc['total'] > 0) : ?>
                                            <img src="../assets/images/<?php echo $dataAssoc['headerLogo']; ?>" alt="Logo">
                                        <?php else : ?>
                                            <p>N/A</p>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($settingAssoc['total'] > 0) : ?>
                                            <img src="../assets/images/<?php echo $dataAssoc['favIcon']; ?>" alt="favicon">
                                        <?php else : ?>
                                            <p>N/A</p>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $dataAssoc['footerText']; ?></td>
                                    <td style="text-align: center; width: 150px;">
                                        <?php if ($settingAssoc['total'] < 1) : ?>
                                        <a class="btn btn-outline-primary" href="setting-add.php"><i class="fa fa-plus"></i> Add Content<a>
                                        <?php else : ?>
                                            <a class="btn btn-outline-primary rounded" href="setting-edit.php">Edit</a>
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