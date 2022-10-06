<?php

session_start();
require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>
    <title>LION HUB | Manage Products</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <link href="other/icon.png" rel="icon">
    <link rel="stylesheet" href="other/bootstrap.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/font-awesome.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="other/invoice.css" />
    <link rel="stylesheet" href="other/snackbar.min.css">
</head>

<body style="background-image: url('resources/profilebackground.jpg'); overflow-x: hidden;  background-attachment: fixed; background-repeat: no-repeat; background-size: cover;">

    <div class="container-fluid">
        <div class="row">

            <!-- <div class="col-12 bg-light text-center rounded">
                <label class="form-label fs-2 fw-bold text-dark">Manage All Products</label>
            </div>

            <div class="col-12 bg-light rounded">
                <div class="row">
                    <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-9">
                                <input type="text" class="form-control" id="searchtxt" />
                            </div>
                            <div class="col-3 d-grid">
                                <button class="btn btn-primary" onclick="searchProduct();">Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col-12  text-center rounded">
                <label class="form-label fs-2 fw-bold text-dark">Manage All Products</label>
            </div>

            <div class="col-12 rounded">
                <div class="row">
                    <div class="col-4 col-lg-6">
                        <button onclick="window.history.go(-1); return false;" class="col-12 offset-1 col-md-1 offset-lg-0  ms-lg-3 btn btn-primary">Back</button>
                        <a href="adminPannel.php" class="col-12 offset-1 col-md-2 mt-2 mt-lg-0 offset-lg-0 ms-lg-3 btn btn-secondary">Dashboard</a>

                    </div>
                    <div class="col-6">
                        <div class="col-12 offset-0 offset-lg-5 offset-0 col-lg-12 mb-3">
                            <div class="row">
                                <div class="col-10 col-lg-3">
                                    <input placeholder="Search product.." style="border-color: blue; border-width: 2px;" type="text" class="form-control border-secondary" id="searchtxt2" />
                                </div>

                                <div class="col-2 d-grid">
                                    <button class="btn btn-primary" onclick="searchProduct('1');">Search</button>
                                </div>
                                <div class="col-4 mt-2 mt-lg-0 col-lg-2 offset-lg-0 offset-10 d-grid">
                                    <a class="btn text-primary fw-bold fs-5" href="manageProduct.php"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


            <div class="col-12 mt-3 mb-2">
                <div class="row">
                    <div class="text-center border-end col-2 col-lg-1 bg-dark pt-2 pb-2 text-end">
                        <span class="fs-4 fw-bold text-white">#</span>
                    </div>
                    <div class="text-center border-end col-2 bg-dark pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Product Image</span>
                    </div>
                    <div class="text-center border-end col-6 col-lg-2 bg-dark pt-2 pb-2">
                        <span class="fs-4 fw-bold text-white">Title</span>
                    </div>
                    <div class="text-center border-end col-6 col-lg-2 bg-dark pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Price</span>
                    </div>
                    <div class="text-center border-end col-2 bg-dark pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Quantity</span>
                    </div>
                    <div class="text-center border-end col-2 bg-dark pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Listed Date</span>
                    </div>
                    <div class="text-center col-4 col-lg-1 bg-dark pt-2 pb-2">
                        <span class="fs-4 fw-bold text-white">Status</span>
                    </div>
                </div>
            </div>

            <div id="productdata">



                <?php

                if (isset($_SESSION["p"])) {
                    $p = $_SESSION["p"];

                ?>

                    <div class="col-12 mb-2" id="resultprod">
                        <div class="row">
                            <div class="col-2 col-lg-1 bg-primary pt-2 pb-2 text-end">
                                <span class="fs-5 fw-bold text-white">1</span>
                            </div>
                            <div class="col-2 bg-light d-none d-lg-block text-center">

                                <?php
                                $pimg = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $p["id"] . "'");
                                $prodimg = $pimg->fetch_assoc();
                                ?>

                                <img src="<?php echo $prodimg["code"]; ?>" style="height: 70px;" />
                            </div>
                            <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                <span class="fs-5 fw-bold text-white"><?php echo $p["title"]; ?></span>
                            </div>
                            <div class="col-6 col-lg-2 bg-light pt-2 pb-2">
                                <span class="fs-5 fw-bold">Rs. <?php echo $p["price"]; ?> .00</span>
                            </div>
                            <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                <span class="fs-5 fw-bold text-white"><?php echo $p["qty"]; ?></span>
                            </div>
                            <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                <span class="fs-5 fw-bold">
                                    <?php
                                    $rd = $p["datetime_added"];
                                    $splitrd = explode(" ", $rd);
                                    echo $splitrd[0];
                                    ?>
                                </span>
                            </div>
                            <div class="col-4 col-lg-1 bg-white pt-2 pb-2 d-grid">
                                <button class="btn btn-danger">Block</button>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mb-5 text-end">
                        <button class="btn btn-secondary" onclick="clearProdSearch();">Clear</button>
                    </div>

                    <?php

                } else {

                    if (isset($_GET["page"])) {
                        $pageno = $_GET["page"];
                    } else {
                        $pageno = 1;
                    }

                    $products = Database::search("SELECT * FROM `product`");
                    $d = $products->num_rows;
                    $row = $products->fetch_assoc();

                    $results_per_page = 5;

                    $number_of_pages = ceil($d / $results_per_page);

                    $page_first_result = ((int)$pageno - 1) * $results_per_page;

                    $selectedrs = Database::search("SELECT * FROM `product` LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
                    $srn = $selectedrs->num_rows;

                    $c = "0";

                    while ($srow = $selectedrs->fetch_assoc()) {

                        $c = $c + 1;

                        // for ($i = 0; $i < $srn; $i++) {

                    ?>

                        <div class="col-12 mb-2" id="resultprod">
                            <div class="row">
                                <div class="border-end col-2 col-lg-1 bg-success pt-2 pb-2 text-end">
                                    <span class="fs-5 fw-bold text-white"><?php echo $c; ?></span>
                                </div>
                                <div class="border-end col-2 bg-light d-none d-lg-block text-center" onclick="singleviewmodal(<?php echo $srow['id'] ?>);">

                                    <?php
                                    $pimg = Database::search("SELECT * FROM `images` WHERE `code` LIKE '%img1%' AND `product_id`='" . $srow["id"] . "'");
                                    $prodimg = $pimg->fetch_assoc();
                                    ?>

                                    <img src="<?php echo $prodimg["code"]; ?>" style="height: 70px;" />
                                </div>
                                <div class="border-end col-6 col-lg-2 bg-secondary pt-2 pb-2">
                                    <span class="fs-5 fw-bold text-white"><?php echo $srow["title"]; ?></span>
                                </div>
                                <div class="border-end col-6 col-lg-2 bg-secondary pt-2 pb-2 d-none d-lg-block">
                                    <span class="fs-5 fw-bold text-white">Rs. <?php echo $srow["price"]; ?> .00</span>
                                </div>
                                <div class="border-end col-2 bg-secondary pt-2 pb-2 d-none d-lg-block">
                                    <span class="fs-5 fw-bold text-white"><?php echo $srow["qty"]; ?></span>
                                </div>
                                <div class="border-end col-2 bg-secondary pt-2 pb-2 d-none d-lg-block">
                                    <span class="fs-5 fw-bold text-white">
                                        <?php
                                        $rd = $srow["datetime_added"];
                                        $splitrd = explode(" ", $rd);
                                        echo $splitrd[0];
                                        ?>
                                    </span>
                                </div>
                                <div class="col-4 col-lg-1 bg-white pt-2 pb-2 d-grid">
                                    <?php

                                    $s = $srow["status_id"];

                                    if ($s == "2") {
                                    ?>
                                        <button id="blockbtn1<?php echo $srow['id'] ?>" class="btn btn-warning" onclick="blockUser('<?php echo $srow['id'] ?>');">Unblock</button>
                                    <?php
                                    } else {
                                    ?>
                                        <button id="blockbtn1<?php echo $srow['id'] ?>" class="btn btn-danger" onclick="blockUser('<?php echo $srow['id'] ?>');">Block</button>
                                    <?php
                                    }

                                    ?>
                                    <!-- <button class="btn btn-danger ">Block</button> -->
                                </div>
                            </div>
                        </div>

                        <!-- Modal single product view -->
                        <div class="modal fade" id="singleproductview<?php echo $srow['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $srow["title"] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="text-center">

                                            <?php

                                            $imgrs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $srow["id"] . "'");
                                            $ir = $imgrs->fetch_assoc();

                                            ?>

                                            <img src="<?php echo $ir["code"]; ?>" style="height: 250px;" class="img-fluid" /><br />
                                            <span class="fs-5 fw-bold">Price :</span>&nbsp;
                                            <span class="fs-5">Rs. <?php echo $srow["price"] ?> .00</span><br />
                                            <span class="fs-5 fw-bold">Quantity :</span>&nbsp;
                                            <span class="fs-5"><?php echo $srow["qty"] ?> Items Left</span><br />
                                            <span class="fs-5 fw-bold">Seller :</span>&nbsp;

                                            <?php

                                            $s = $srow["user_email"];
                                            $sellerrs = Database::search("SELECT * FROM `user` WHERE `email`='" . $s . "'");
                                            $sr = $sellerrs->fetch_assoc();

                                            ?>

                                            <span class="fs-5"><?php echo $sr["fname"] . " " . $sr["lname"]; ?></span><br />
                                            <span class="fs-5 fw-bold">Description :</span>&nbsp;
                                            <span class="fs-5"><?php echo $srow["description"] ?></span><br />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php

                    }

                    ?>

                    <div class="col-12 fs-5 fw-bold mt-3 mb-3">
                        <div class="pagination d-flex justify-content-center">

                            <a href="<?php
                                        if ($pageno <= 1) {
                                            echo "#";
                                        } else {
                                            echo "?page=" . ($pageno - 1);
                                        }

                                        ?>">&laquo;</a>

                            <?php

                            for ($page = 1; $page <= $number_of_pages; $page++) {
                                if ($page == $pageno) {

                            ?>
                                    <a style="width: 43px; height: 43px; " href="<?php echo "?page=" . ($page); ?>" class="ms-1 bg-primary active"><?php echo $page; ?></a>
                                <?php

                                } else {

                                ?>
                                    <a href="<?php echo "?page=" . ($page); ?>" class="ms-1"><?php echo $page; ?></a>
                            <?php

                                }
                            }

                            ?>

                            <a href="<?php
                                        if ($pageno >= $number_of_pages) {
                                            echo "#";
                                        } else {
                                            echo "?page=" . ($pageno + 1);
                                        }

                                        ?>">&raquo;</a>
                        </div>
                    </div>

                <?php

                }

                ?>

                <hr />

                <div class="col-12">
                    <h3 class="text-dark">Manage Categories</h3>
                </div>

                <hr>

                <div class="col-12 mb-3">
                    <div class="row g-1">

                        <?php

                        $categoryrs = Database::search("SELECT * FROM `category` WHERE `name` <> 'Select Category' ");
                        $num = $categoryrs->num_rows;

                        for ($i = 0; $i < $num; $i++) {

                            $row = $categoryrs->fetch_assoc();

                        ?>

                            <div class="col-12 col-lg-3">
                                <div class="row g-1 px-1">
                                    <div class="col-12 text-center bg-body border border-2 border-success shadow rounded">
                                        <label class="form-label fs-4 fw-bold py-3"><?php echo $row["name"] ?></label>
                                    </div>
                                </div>
                            </div>

                        <?php

                        }

                        ?>

                        <div class="col-12 col-lg-3">
                            <div class="row g-1 px-1">
                                <div class="col-12 text-center bg-body border border-2 border-danger shadow rounded">
                                    <div onclick="addNewModel();" class="row">
                                        <div class="col-3 mt-4 addnewimg"></div>
                                        <div class="col-9">
                                            <label class="form-label fs-4 fw-bold py-3 text-black-50" onclick="addNewModel();">Add New Category</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>




                <hr />

                <div class="col-12">
                    <h3 class="text-dark">Manage Colors</h3>
                </div>

                <hr>

                <div class="col-12 mb-3">
                    <div class="row g-1">

                        <?php

                        $color_rs = Database::search("SELECT * FROM `color`");
                        $color_rows = $color_rs->num_rows;

                        for ($i = 0; $i < $color_rows; $i++) {

                            $cfetch = $color_rs->fetch_assoc();

                        ?>

                            <div class="col-12 col-lg-3">
                                <div class="row g-1 px-1">
                                    <div class="col-12 text-center bg-body border border-2 border-success shadow rounded">
                                        <label class="form-label fs-4 fw-bold py-3"><?php echo $cfetch["name"] ?></label>
                                    </div>
                                </div>
                            </div>

                        <?php

                        }

                        ?>

                        <div class="col-12 col-lg-3">
                            <div class="row g-1 px-1">
                                <div class="col-12 text-center bg-body border border-2 border-danger shadow rounded">
                                    <div onclick="addNewModel1();" class="row">
                                        <div class="col-3 mt-4 addnewimg"></div>
                                        <div class="col-9">
                                            <label class="form-label fs-4 fw-bold py-3 text-black-50" onclick="addNewModel1();">Add New Color</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>





                <!-- Modal add category -->
                <div class="modal fade" id="addnewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add a new Category</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="categoryTxt" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" onclick="savecategory();">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>


                 <!-- Modal add color -->
                 <div class="modal fade" id="addnewmodal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add a new Color</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <label class="form-label">Color Name</label>
                                <input type="text" class="form-control" id="colorTxt" />
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger" onclick="saveColor();">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Search Product -->
            <div class="col-12 mb-2">
                <div class="row" id="userdiv2">



                </div>
            </div>
            <!-- Search Product -->



        </div>
    </div>

    <script src="other/script.js"></script>
    <script src="other/bootstrap.js"></script>
    <script src="other/bootstrap.bundle.js"></script>
    <script src="other/snackbar.min.js"></script>
</body>

</html>