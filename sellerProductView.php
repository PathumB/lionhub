<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {

    $user = $_SESSION["u"];
    $pageno;

?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>LION HUB | Seller's Product View</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="other/icon.png" rel="icon">
        <!-- Font awesome -->
        <!-- Alerts -->
        <link rel="stylesheet" href="other/snackbar.min.css">
        <link rel="stylesheet" href="css/style.css" />
        <link href="css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="other/bootstrap.css" />
        <link rel="stylesheet" href="other/invoice.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            a {
                text-decoration: none;
            }
        </style>

    </head>

    <body>


        <?php
        require "header2.php"
        ?>

        <div class="container-fluid">
            <div class="row">

                <!-- head -->

                <div class="col-12  mt-3">
                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12 col-lg-4 mt-1 mb-1 ">


                                    <?php


                                    $profileimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $user["email"] . "'");
                                    $pn = $profileimg->num_rows;

                                    if ($pn == 1) {
                                        $pr = $profileimg->fetch_assoc();
                                    ?>
                                        <img style="border-radius: 50%;" src="<?php echo $pr["code"] ?>" width="90px" height="90px">
                                    <?php
                                    } else {
                                    ?>
                                        <img style="border-radius: 50%;" src="resources/feedback_user.jpg" class="rounded-circle" width="90px" height="90px">
                                    <?php
                                    }

                                    ?>


                                </div>
                                <div class="col-12 col-lg-8 ">
                                    <div class="row ">
                                        <div class="col-12 mt-0 mt-lg-4">
                                            <span style="white-space: nowrap;"><span class="fw-bold text-black-50"> Seller Name: </span><span class="text-black-50"><?php echo $user["fname"] . " " . $user["lname"] ?></span>

                                        </div>
                                        <div class="col-12 mb-2">
                                            <span style="white-space: nowrap;" class="text-dark text-black-50"><span class="fw-bold text-black-50"> Seller Email: </span> <?php echo $user["email"] ?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-7">
                            <div class="row">
                                <div class="col-8 mt-5 mt-lg-3 ">
                                    <h1 style="white-space: nowrap;" class="text-dark fw-bold offset-lg-2">My Product List</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- head -->

                <div class="col-12">
                    <div class="row">

                        <div class="col-12">
                            <div class="row">
                                <a href="index.php" class="mb-lg-3 ms-lg-4 col-12 col-md-3 mt-3 d-grid btn btn-secondary">Home Page</a>
                                <a href="account.php" class="mb-lg-3 ms-lg-3 offset-0 offset-lg-6 col-12 col-md-5 mt-3 d-grid btn btn-secondary">Back To My Profile</a>
                                <a href="add_product.php" class="mb-lg-3 ms-lg-3 offset-0 offset-lg-6 col-12 col-md-3 mt-3 d-grid btn btn-secondary">List a Product</a>
                            </div>
                        </div>
                        <!-- sorting -->
                        <div class="col-12 col-lg-2 mx-0 mx-lg-3 my-3 mt-3 mb-3 rounded bg-white ">
                            <div class="row">
                                <div class="col-12 mt-3 ms-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="form-label fw-bold fs-3">Filters Products</label>
                                        </div>
                                        <div class="col-11">
                                            <div class="row">
                                                <div class="col-9">
                                                    <input class="form-control border-dark border-2" type="text" placeholder="Search Product..." id="my_product_search" />
                                                </div>
                                                <div class="col-1">
                                                    <label class="form-label fs-5 bi bi-search"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <hr width="80%" />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-bold">Active Item</label>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input border-dark border-3" type="radio" name="flexRadioDefault1" id="n">
                                                <label class="form-check-label " for="n">
                                                    Newest on Top
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input border-dark border-3" type="radio" name="flexRadioDefault1" id="o">
                                                <label class="form-check-label " for="o">
                                                    Oldest on Top
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <hr width="80%" />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-bold">By Quantity</label>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check">
                                                <input class="form-check-input border-dark border-3" type="radio" name="flexRadioDefault1" id="l">
                                                <label class="form-check-label " for="l">
                                                    Low To High
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input border-dark border-3" type="radio" name="flexRadioDefault1" id="h">
                                                <label class="form-check-label " for="h">
                                                    High To Low
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <hr width="80%" />
                                        </div>
                                        <div class="col-12">
                                            <label class="form-label fw-bold">By Condition</label>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input border-dark border-3" type="radio" name="flexRadioDefault3" id="b">
                                                <label class="form-check-label " for="b">
                                                    Brand New
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input border-dark border-3" type="radio" name="flexRadioDefault3" id="u">
                                                <label class="form-check-label " for="u">
                                                    Used
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <hr width="80%" />
                                        </div>
                                        <div class="offset-0 offset-lg-0 col-11 col-lg-10 mb-3">
                                            <button class="col-12 d-grid btn btn-success fw-bold mb-3" onclick="addfilters('1');">Search</button>
                                            <button class="col-12 d-grid btn btn-primary" onclick="clearfilters();">Clear Filters</button>
                                            <a href="sellerProductView.php" class="col-12 mt-3 d-grid btn btn-warning">Reset All</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- sorting -->



                        <!-- product -->

                        <div class="col-12 col-lg-9 mt-3 mb-3 bg-white ">
                            <div class="row" id="filterproducs">




                                <?php

                                if (isset($_GET["page"])) {
                                    $pageno = $_GET["page"];
                                } else {
                                    $pageno = 1;
                                }

                                $products = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "'");
                                $d = $products->num_rows;
                                $row = $products->fetch_assoc();

                                $results_per_page = 6;

                                $number_of_pages = ceil($d / $results_per_page);

                                // echo $d;
                                // echo "<br/>";
                                // echo $number_of_pages;



                                $page_first_result = ((int)$pageno - 1) * $results_per_page;

                                $select_edrs = Database::search("SELECT * FROM `product` WHERE `user_email`='" . $user["email"] . "' 
                                LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
                                $srn = $select_edrs->num_rows;

                                while ($srow = $select_edrs->fetch_assoc()) {

                                    // for ($i = 0; $i < $srn; $i++) {


                                ?>

                                    <div class="card mb-3 col-12 col-lg-6  ">
                                        <div class="row g-0">


                                            <?php
                                            $pimgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $srow["id"] . "'");
                                            $pir = $pimgrs->fetch_assoc();
                                            ?>

                                            <div class="col-md-4 mt-4">
                                                <img src="<?php echo $pir["code"] ?>" class="img-fluid rounded-start">
                                            </div>
                                            <div class=" col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title fw-bold"><?php echo $srow["title"] ?></h5>
                                                    <span class="card-text fw-bold text-success"><span class="text-dark">Unit Price: </span> Rs. <?php echo $srow["price"] ?> .00</span><br />
                                                    <span class="card-text fw-bold text-success"><span class="text-dark">Quantity: </span> <?php echo $srow["qty"] ?> Items</span><br />
                                                    <span class="card-text fw-bold text-success"><span class="text-dark">Product Listed Date & Time: </span> <?php echo $srow["datetime_added"] ?></span><br />
                                                    <div class="form-check form-switch">

                                                        <?php
                                                        $status_check = Database::search("SELECT * FROM `product` WHERE `id`='" . $srow["id"] . "'  ");
                                                        $sf = $status_check->fetch_assoc();

                                                        if ($sf["status_id"] == 1) {
                                                        ?>
                                                            <input class="form-check-input  " type="checkbox" id="check" onchange="changeStatus(<?php echo $srow['id']; ?>);">
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <input class="form-check-input " checked type="checkbox" id="check" onchange="changeStatus(<?php echo $srow['id']; ?>);">
                                                        <?php
                                                        }

                                                        ?>



                                                        <label class="form-check-label fw-bold text-info" for="check" id="checklabel<?php echo $srow["id"]; ?>"><?php
                                                                                                                                                                if ($srow["status_id"] == 2) {
                                                                                                                                                                    echo "Make Your Product Active";
                                                                                                                                                                } else {
                                                                                                                                                                    echo "Make Your Product Deactive";
                                                                                                                                                                }
                                                                                                                                                                ?></label>

                                                    </div>
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-12 col-lg-6 d-grid"> <a href="#" class="btn btn-primary" onclick="sendid(<?php echo $srow['id']; ?>);">Update</a></div>
                                                            <div class="col-12 col-lg-6 mt-1 mt-lg-0 d-grid"> <a href="#" class="btn btn-danger" onclick="deleteModel(<?php echo $srow['id']; ?>);">Delete</a></div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModel<?php echo $srow["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Delete Product</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this product?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                                                    <button type="button" class="btn btn-danger" onclick="deleteProduct(<?php echo $srow['id']; ?>);">Yes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php

                                }

                                ?>

                            </div>

                            <div class="row">

                                <!-- pagination -->

                                <div id="sp" class="col-12 mb-3 text-center">

                                    <div class=" col-12 col-lg-4 offset-lg-4 d-flex justify-content-center">
                                        <div class="pagination">
                                            <a href="
                                            <?php
                                            if ($pageno <= 1) {
                                                echo "#";
                                            } else {
                                                echo "?page=" . ($pageno - 1);
                                            }
                                            ?>">&laquo;</a>


                                            <?php
                                            $page;

                                            for ($page = 1; $page <= $number_of_pages; $page++) {
                                                if ($page == $pageno) {
                                            ?>
                                                    <a href="<?php echo "?page=" . ($page); ?>" class="bg-primary ms-1 active"><?php echo $page; ?></a>

                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?php echo "?page=" . ($page); ?>" class="ms-1"><?php echo $page; ?></a>

                                            <?php
                                                }
                                            }

                                            ?>
                                            <a href="
                                                    <?php
                                                    if ($pageno >= $number_of_pages) {
                                                        echo "#";
                                                    } else {
                                                        echo "?page=" . ($pageno + 1);
                                                    }
                                                    ?>
                                                ">&raquo;</a>

                                        </div>

                                    </div>
                                </div>

                                <!-- pagination -->




                            </div>
                        </div>

                        <!-- product -->
                    </div>
                </div>


            </div>
        </div>



        <?php
        require "footer.php";
        ?>

        <!-- <script src="script.js"></script> -->
        <script src="other/bootstrap.js"></script>
        <!-- <script src="js/all.js"></script> -->
        <script src="other/script.js"></script>
        <script src="js/all.js"></script>
        <script src="other/bootstrap.bundle.js"></script>
        <!-- Alerts -->
        <script src="other/snackbar.min.js"></script>
    </body>

    </html>

<?php
} else {
?>
    <script>
        window.location = "signinSignUp.php";
    </script>
<?php
}

?>