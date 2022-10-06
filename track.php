<?php

session_start();

if (isset($_SESSION["u"])) {

    require "connection.php";


    if (isset($_GET["page"])) {
        $pageno = $_GET["page"];
    } else {
        $pageno = 1;
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>LionHub | Order Tracking</title>

        <link rel="icon" href="other/icon.png" />
        <link href="css/font-awesome.css" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="css/track.css">
        <!-- Main style sheet -->
        <link id="switcher" href="css/theme-color/lite-blue-theme.css" rel="stylesheet">
        <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>



        <?php

        require "header2.php";

        ?>


        <div>
            <article class="card">
                <header class="card-header"> My Orders / Tracking </header>
                <div class="card-body">

                    <?php
                    $track = Database::search("SELECT * FROM `ordertrack` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' GROUP BY `order_id`");
                    $tracknm = $track->num_rows;

                    $results_per_page = 1;
                    $number_of_pages = ceil($tracknm / $results_per_page);
                    $page_first_result = ((int)$pageno - 1) * $results_per_page;

                    $track = Database::search("SELECT * FROM `ordertrack` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' GROUP BY `order_id` LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
                    $tracknm = $track->num_rows;

                    for ($t = 0; $t < $tracknm; $t++) {
                        $trackrs = $track->fetch_assoc();

                        $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $trackrs["order_id"] . "' AND `user_email`='" . $_SESSION["u"]["email"] . "';");
                        $invoice = $invoicers->fetch_assoc();
                    ?>

                        <h6>Order ID: <?php echo $trackrs["order_id"] ?></h6>
                        <article class="card">
                            <div class="card-body row">
                                <div class="col"> <strong>Estimated Delivery time:</strong> <br><?php
                                                                                                $datefix = $trackrs["date"];
                                                                                                $date = strtotime($datefix);
                                                                                                $date = strtotime("+14 day", $date);
                                                                                                echo date('jS F Y', $date);

                                                                                                ?></div>
                                <div class="col"> <strong>Shipping BY:</strong> <br> LionHub Delivers | <i class="fa fa-phone"></i> +94728125203 </div>
                                <div class="col"> <strong>Status:</strong> <br>
                                    <?php
                                    $status = Database::search("SELECT * FROM `order_status` WHERE `id`='" . $trackrs["order_status_id"] . "' ");
                                    $st = $status->fetch_assoc();

                                    echo $st["status"];
                                    ?>

                                </div>
                                <div class="col"> <strong>Tracking #:</strong> <br> #<?php echo $trackrs["trackid"]; ?> </div>
                            </div>
                        </article>
                        <div class="track">
                            <div class="step <?php if ($trackrs["order_status_id"] >= 1) {
                                                    echo "active";
                                                } else {
                                                } ?>"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                            <div class="step <?php if ($trackrs["order_status_id"] >= 2) {
                                                    echo "active";
                                                } else {
                                                } ?>"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                            <div class="step  <?php if ($trackrs["order_status_id"] >= 3) {
                                                    echo "active";
                                                } else {
                                                } ?>"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                            <div class="step  <?php if ($trackrs["order_status_id"] >= 4) {
                                                    echo "active";
                                                } else {
                                                } ?>"> <span class="icon"> <i class="fa fa-arrow-right"></i> </span> <span class="text">Ready for pickup</span> </div>
                        </div>
                        <hr>
                        <ul class="row">
                            <?php

                            $inxs = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $trackrs["order_id"] . "' AND `user_email`='" . $_SESSION["u"]["email"] . "'");
                            $inxrs = $inxs->num_rows;

                            for ($p = 0; $p < $inxrs; $p++) {
                                $inprs = $inxs->fetch_assoc();

                                $product = Database::search("SELECT * FROM `product` WHERE `id` = '" . $inprs["product_id"] . "'");
                                $prs = $product->fetch_assoc();
                            ?>

                                <li class="col-md-4">
                                    <figure class="itemside mb-3">
                                        <?php
                                        $imagers = Database::search("SELECT * FROM `images` WHERE `product_id`='" .  $inprs["product_id"] . "'");
                                        $in = $imagers->num_rows;
                                        $arr;
                                        for ($x = 0; $x < $in; $x++) {
                                            $ir = $imagers->fetch_assoc();
                                            $arr[$x] = $ir["code"];
                                        }
                                        ?>
                                        <div class="aside"><img src="<?php echo $arr[0] ?>" class="img-sm border"></div>
                                        <figcaption class="info align-self-center">
                                            <p class="title"><?php echo $prs["title"] ?></p> <span class="text-muted">Rs.<?php echo $inprs["total"] ?>.00 </span>
                                        </figcaption>
                                    </figure>
                                </li>

                            <?php
                            }



                            ?>


                        </ul>
                        <hr style="height: 3px; background-color: blue;">
                    <?php
                    }
                    ?>

                    <hr>
                    <a onclick="history_back1();" href="#" class="btn btn-secondary" style="background-color: #484848; color: white;" data-abc="true">  Back </a>
                     <a href="index.php" class="btn btn-danger" style="background-color: #FF2B2B;" data-abc="true">  Back to Home</a>
                </div>
            </article>
        </div>

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


        <!-- pagination -->

        <?php
        require "footer.php";
        ?>


        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.js"></script>
        <!-- SmartMenus jQuery plugin -->
        <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
        <!-- SmartMenus jQuery Bootstrap Addon -->
        <link href="css/font-awesome.css" rel="stylesheet">
        <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>
        <script src="js/custom.js"></script>
        <!-- material-scrolltop button -->
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
