<?php
include('includes/header.php');
require_once('../database.php');

$selectPortfolios = " SELECT * FROM portfolios WHERE status = 1 ";
$portfoliosQuery = mysqli_query($db_connect, $selectPortfolios);

$deactivePortfolios = "SELECT * FROM portfolios WHERE status = 2";
$deactivePortfoliosQuerry = mysqli_query($db_connect, $deactivePortfolios);
$deactiveAssoc = mysqli_fetch_assoc($deactivePortfoliosQuerry);

// $deactive_services2= "SELECT COUNT(*) services_status FROM services WHERE services_status = 2";
// $deactive_services_querry2 = mysqli_query($db_connect, $deactive_services2);
// $deactive_assoc = mysqli_fetch_assoc($deactive_services_querry2);

?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="deshboard.php">Deshboard</a>
        <span class="breadcrumb-item active">Portfolios</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <div class="row">
                <div class="col-12 m-auto">
                    <div class="table bg-light rounded p-4">
                        <div class="table-header text-center">
                            <h2>All Portfolios</h2>
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
                                <a href="portfolios-add.php"><i class="fa fa-plus"></i> Add Portfolios</a>
                            </div>
                            <table class="table table-bordered table-hover myTable">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Title</th>
                                        <th>Catagories</th>
                                        <th>Short Description</th>
                                        <th>Thumbnail</th>
                                        <th>Feature Images</th>
                                        <th class="text-center">Status</th>
                                        <th class='text-center'>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($portfoliosQuery as $key => $portfolios) : ?>
                                        <tr>
                                            <td><?php echo ++$key; ?></td>
                                            <td><?php echo $portfolios['title']; ?></td>
                                            <td><?php echo $portfolios['category']; ?></td>
                                            <td><?php echo $portfolios['summary']; ?></td>
                                            <td>
                                                <img width="100px" src="../assets/images/<?php echo $portfolios['thumbnail'] ?>" alt="">
                                            </td>

                                            <td>
                                                <?php if ($portfolios['featureimage'] == NULL) : ?>
                                                    <?php echo "N/A" ?>
                                                <?php else : ?>
                                                    <img width="100px" src="../assets/images/<?php echo $portfolios['featureimage'] ?>" alt="">
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($portfolios['status'] == 1) : ?>
                                                    <a class="btn btn-success rounded" href="portfolio-status.php?portfolio_id=<?= $portfolios['id'] ?>">Active</a>
                                                <?php else: ?>
                                                    <a class="btn btn-danger rounded" href="portfolio-status.php?portfolio_id=<?= $portfolios['id'] ?>">Deactive</a>
                                                <?php endif; ?>
                                            </td>
                                            <td style="text-align: center; width: 150px;">
                                                <?php if ($portfolios['status'] == 1) : ?>
                                                    <a class="btn btn-outline-primary rounded" href="portfolio-edit.php?portfolio_id=<?= $portfolios['id'] ?>">Edit</a>
                                                    <a class="btn btn-outline-danger rounded" href="portfolio-delete.php?portfolio_id=<?= $portfolios['id'] ?>">Delete</a>
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

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Title</th>
                                        <th>Catagories</th>
                                        <th>Short Description</th>
                                        <th>Thumbnail</th>
                                        <th>Feature Images</th>
                                        <th class="text-center">Status</th>
                                        <th class='text-center'>Actions</th>
                                    </tr>
                                </thead>
                                <?php foreach ($deactivePortfoliosQuerry as $key => $portfolio) : ?>
                                    <tr>
                                        <td><?php echo ++$key; ?></td>
                                        <td><?php echo $portfolio['title']; ?></td>
                                        <td><?php echo $portfolio['category']; ?></td>
                                        <td><?php echo $portfolio['summary']; ?></td>
                                        <td>
                                            <img width="100px" src="../assets/images/<?php echo $portfolio['thumbnail'] ?>" alt="">
                                        </td>

                                        <td>
                                            <?php if ($portfolio['featureimage'] == NULL) : ?>
                                                <?php echo "N/A" ?>
                                            <?php else : ?>
                                                <img width="100px" src="../assets/images/<?php echo $portfolio['featureimage'] ?>" alt="">
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($portfolio['status'] == 1) : ?>
                                                <a class="btn btn-success" href="portfolio-status.php?portfolio_id=<?= $portfolio['id'] ?>">Active</a>
                                            <?php else : ?>
                                                <a class="btn btn-danger" href="portfolio-status.php?portfolio_id=<?= $portfolio['id'] ?>">Deactive</a>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ($portfolio['status']) : ?>
                                                <a class="btn btn-danger text-white">Not Allow</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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