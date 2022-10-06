<?php
// session_start();
require "connection.php";

if (isset($_GET["s"])) {
    $search =  $_GET["s"];
    // echo $pageno;

    if (!empty($search)) {

        $results_per_page = 5;
        $pageno = $_GET["page"];

        $allproductresult = Database::search("SELECT * FROM `product` WHERE `qty` >= '1' AND `status_id` = '1'  AND `title` LIKE '%" . $search . "%' ");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT * FROM `product` WHERE `qty` >= '1' AND `status_id` = '1'  AND `title` LIKE '%" . $search . "%'  LIMIT 5 OFFSET $page_first_result;");
        // echo "1";



        $productnum = $productresult->num_rows;


?>
        <?php
        for ($x = 0; $x < $productnum; $x++) {
            $srow = $productresult->fetch_assoc();




        ?>
            <div class="col-12 mb-2">
                <div class="row">
                <div class="col-12 mb-2" id="resultprod">
                            <div class="row">
                                <div class="border-end col-2 col-lg-1 bg-success pt-2 pb-2 text-end">
                                    <span class="fs-5 fw-bold text-white"><?php echo $srow["id"]; ?></span>
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




                </div>
            </div>


        <?php
        }
        ?>

        <!--pagination-->
        <div class="col-12 col-lg-4 offset-lg-4 d-flex justify-content-center">
            <div class="pagination">
                <?php

                if ($pageno != 1) {

                ?>
                    <button class="btn btn-light ms-1" style="width: 35px;" onclick="searchProduct(<?php echo $pageno - 1; ?>);">&laquo;</button>
                <?php
                }
                ?>

                <?php

                for ($i = 1; $i <= $number_of_pages; $i++) {

                    if ($i == $pageno) {

                ?>
                        <button class="btn btn-primary ms-1" style="width: 35px;" onclick="searchProduct(<?php echo $i; ?>);"><?php echo $i; ?></button>
                    <?php

                    } else {

                    ?>
                        <button class="btn btn-outline-secondary ms-1" style="width: 35px;" onclick="searchProduct(<?php echo $i; ?>);"><?php echo $i; ?></button>
                <?php
                    }
                }
                ?>

                <?php
                if ($pageno != $number_of_pages) {
                ?>
                    <button class="btn btn-light ms-1" style="width: 35px;" onclick="searchProduct(<?php echo $pageno + 1; ?>);">&raquo;</button>
                <?php
                }
                ?>
            </div>
        </div>
        <!--pagination-->

<?php
    } else {
        echo "<h5 class = 'mt-4 mb-4 fw-bold text-center' style = 'color:black;'> Please Enter Product Name..  </h5>";
    }
}
?>