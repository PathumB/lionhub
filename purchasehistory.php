<?php

session_start();
require "connection.php";


if (isset($_GET["page"])) {
    $pageno = $_GET["page"];
} else {
    $pageno = 1;
}


if (isset($_SESSION["u"])) {
    $mail = $_SESSION["u"]["email"];
    $invoicers = Database::search("SELECT * FROM `invoice` WHERE `user_email` = '" . $mail . "' AND `status` = '1' ");
    $inn = $invoicers->num_rows;

    $results_per_page = 4;
    $number_of_pages = ceil($inn / $results_per_page);
    $page_first_result = ((int)$pageno - 1) * $results_per_page;

    $invoicers = Database::search("SELECT * FROM `invoice` WHERE `user_email` = '" . $mail . "' AND `status` = '1' LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
    $in = $invoicers->num_rows;
?>

    <!DOCTYPE html>

    <html>

    <head>

        <title>LION HUB | Purchased History</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale-1">

        <link href="other/icon.png" rel="icon">
        <link rel="stylesheet" href="other/bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="other/invoice.css" />
        <link href="css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css" />
        <script>(function(w, d) { w.CollectId = "618b7f3e11c7462f21dec261"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>
    </head>

    <body>

        <?php
        require "header2.php";
        ?>

        <div class="container-fluid">
            <div class="row">



                <div class="col-12 text-start mb-5 mt-3">
                    <span class="fs-1 fw-bold text-dark">Transaction History</span>
                </div>

                <?php
                if ($in == 0) {
                ?>
                    <div class="col-12 text-center bg-light" style="height: 450px;">
                        <span class="fs-1 fw-bold text-black-50 d-block" style="margin-top: 200px;">You have no items in your Transaction History yet...</span>
                    </div>

                    <div class="col-12 mb-3">
                        <div class="row">
                            <div class="col-lg-5 d-none d-lg-block"></div>
                            <div class="col-12 col-lg-2 d-grid g-1">
                                <a href="account.php" class="btn btn-dark fs-4"> Back To My Profile</a>

                            </div>


                        </div>
                    </div>
                <?php
                } else {
                ?>

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 d-none d-lg-block">
                                <div class="row">
                                    <div class="col-1 bg-light text-center">
                                        <label class="form-label fw-bold ">Order ID</label>
                                    </div>
                                    <div class="col-3 bg-light text-center">
                                        <label class="form-label fw-bold">Product Details</label>
                                    </div>
                                    <div class="col-1 bg-light text-center">
                                        <label class="form-label fw-bold">Quantity</label>
                                    </div>
                                    <div class="col-2 bg-light text-end">
                                        <label class="form-label fw-bold">Amount</label>
                                    </div>
                                    <div class="col-2 bg-light text-end">
                                        <label class="form-label fw-bold">Purchased Date & Time</label>
                                    </div>
                                    <div class="col-3 bg-light"></div>
                                    <div class="col-12">
                                        <hr />
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="row">
                                    <?php
                                    for ($i = 0; $i < $in; $i++) {
                                        $ir = $invoicers->fetch_assoc();
                                    ?>
                                        <div class="col-12 col-lg-1 bg-white text-center text-lg-start">
                                            <label class="form-label text-dark fs-5 px-3 py-5"><?php echo $ir["order_id"]; ?></label>
                                        </div>
                                        <div class="col-12 col-lg-3">
                                            <div class="row">
                                                <div class="card mb-3" style="max-width: 540px;">
                                                    <div class="row no-gutters">
                                                        <div class="col-md-4">

                                                            <?php
                                                            $pid = $ir["product_id"];
                                                            $array;
                                                            $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pid . "'");
                                                            $n = $imagers->num_rows;
                                                            for ($x = 0; $x < $n; $x++) {
                                                                $f = $imagers->fetch_assoc();
                                                                $array[$x] = $f["code"];
                                                            }
                                                            ?>

                                                            <img style="margin-left: auto;margin-right: auto; display: block; width: 60%; height: auto;" src="<?php echo $array[0]; ?>" class="card-img mt-4" />
                                                        </div>
                                                        <div class="col-md-8 ">
                                                            <div class="card-body ">

                                                                <?php
                                                                $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "'");
                                                                $pr = $productrs->fetch_assoc();
                                                                ?>

                                                                <span class="card-title "><?php echo $pr["title"]; ?></span><br />

                                                                <?php
                                                                $sm = $pr["user_email"];
                                                                $sellerrs = Database::search("SELECT * FROM `user` WHERE `email`='" . $sm . "'");
                                                                $sr = $sellerrs->fetch_assoc();
                                                                ?>

                                                                <span class="card-text"><b>Seller :</b> <?php echo $sr["fname"] . " " . $sr["lname"]; ?></span><br />
                                                                <span class="card-text "><b>Price :</b>Rs.<?php echo $pr["price"]; ?>.00</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-1 text-center text-lg-end">
                                            <label class="form-label fs-5 pt-5 "><span>Quantity</span> <?php echo $ir["qty"]; ?></label>
                                        </div>

                                        <div class="col-12 col-lg-2 text-center  text-lg-end bg-white">
                                            <span>Price:</span><label class="form-label text-end text-dark fs-5 px-3 py-5 "> Rs.<?php echo $ir["total"]; ?>.00</label>
                                        </div>

                                        <div class="col-12 col-lg-2 text-center text-lg-end">
                                            <label class="form-label fs-4 pt-5"><?php echo $ir["date"]; ?></label>
                                        </div>

                                        <div class="col-12 col-lg-3">
                                            <div class="row">
                                                <div class="col-6 d-grid">
                                                    <button class="btn btn-warning rounded border border-1 border-warning mt-5 fs-5" onclick="addFeedback(<?php echo $pid; ?>);"><i class="bi bi-info-circle"></i> Feedback</button>
                                                </div>
                                                <div class="col-6 d-grid">

                                                    <button onclick="deletePurchaseHistory('<?php echo $ir["order_id"]; ?>','<?php echo $pid; ?>');" class="btn btn-success rounded mt-5 fs-5"><i class="bi bi-trash-fill"></i> Delete</button>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <hr />
                                        </div>

                                        <!-- model -->
                                        <!-- Modal -->
                                        <div class="modal fade" id="feedbackModel<?php echo $pid; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel"><?php echo $pr["title"]; ?></h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <textarea id="feedtxt<?php echo $pid; ?>" cols="30" rows="10" class="form-control fs-5"></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="button" class="btn btn-primary" onclick="saveFeedback(<?php echo $pid; ?>);">Save Feedback</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                    }
                                    ?>




                                </div>
                            </div>

                        </div>
                    </div>



                <?php
                }
                ?>





                <!-- pagination -->

                <div id="sp" class="col-12 mb-3 text-center">

                    <div class=" col-12 col-lg-6 offset-lg-3  aa-product-catg-pagination">
                        <div class="pagination">
                            <a class="btn btn-light" href="
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
                                    <a style="border-radius: 50%;" href="<?php echo "?page=" . ($page); ?>" class="ms-1 active btn btn-primary bg-primary"><?php echo $page; ?></a>

                                <?php
                                } else {
                                ?>
                                    <a href="<?php echo "?page=" . ($page); ?>" class="ms-1 btn btn-light"><?php echo $page; ?></a>

                            <?php
                                }
                            }

                            ?>
                            <a class="btn btn-light" href="
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


                <div class="col-12 mb-3">
                    <div class="row">
                        <div class="col-lg-4 d-none d-lg-block"></div>
                        <div class="col-12 col-lg-2 d-grid g-1">
                            <a href="account.php" class="btn btn-dark fs-4"> Back To My Profile</a>

                        </div>
                        <div class="col-12 col-lg-2 d-grid g-1">
                            <button onclick="clearAllPurchaseHistory();" class="btn btn-danger fs-4"><i class="bi bi-trash-fill"></i> Clear All Records</button>
                        </div>

                    </div>
                </div>

                <!-- pagination -->

                <?php require "footer.php"; ?>

            </div>
        </div>

        <script src="other/script.js"></script>
        <script src="other/bootstrap.js"></script>
        <script src="other/bootstrap.bundle.js"></script>
        <script src="js/all.js"></script>
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