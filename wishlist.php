<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $u_email = $_SESSION["u"]["email"];

    if (isset($_GET["page"])) {
        $pageno = $_GET["page"];
    } else {
        $pageno = 1;
    }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LION HUB | Wishlist</title>

        <link href="other/icon.png" rel="icon">
        <!-- Font awesome -->
        <link href="css/font-awesome.css" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="css/bootstrap.css" rel="stylesheet">
        <!-- SmartMenus jQuery Bootstrap Addon CSS -->
        <link href="css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
        <!-- Product view slider -->
        <link rel="stylesheet" type="text/css" href="css/jquery.simpleLens.css">
        <!-- slick slider -->
        <link rel="stylesheet" type="text/css" href="css/slick.css">
        <!-- price picker slider -->
        <link rel="stylesheet" type="text/css" href="css/nouislider.css">
        <!-- Theme color -->
        <link id="switcher" href="css/theme-color/lite-blue-theme.css" rel="stylesheet">
        <!-- Top Slider CSS -->
        <link href="css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

        <!-- Alerts -->
        <link rel="stylesheet" href="other/snackbar.min.css">

        <!-- Main style sheet -->
        <link href="css/style.css" rel="stylesheet">

        <!-- Google Font -->
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
        <script>(function(w, d) { w.CollectId = "618b7f3e11c7462f21dec261"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.async=true; s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>

        <style>
            .tr1{
                background-color: white;
            }
            .tr1:hover{
                background-color: #F3F3F3;
            }
        </style>


    </head>

    <body>

        <!-- SCROLL TOP BUTTON -->
        <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
        <!-- END SCROLL TOP BUTTON -->


        <?php
        require "header.php";
        ?>

        <!-- catg header banner section -->
        <section id="aa-catg-head-banner">
            <img src="resources/wishlist.png">
            <div class="aa-catg-head-banner-area">
                <div class="container">
                    <div class="aa-catg-head-banner-content">
                        <h2>Wishlist Page</h2>
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li class="active">Wishlist</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!-- / catg header banner section -->

        <!-- Cart view section -->
        <section id="cart-view">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="cart-view-area">
                            <div class="cart-view-table aa-wishlist-table">
                                <form action="">
                                    <div class="table-responsive">
                                        <table style="background-color: white;" class="table">

                                            <?php
                                            $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $_SESSION["u"]["email"] . "'");
                                            $wnn = $watchlist_rs->num_rows;

                                            $results_per_page = 2;
                                            $number_of_pages = ceil($wnn / $results_per_page);
                                            $page_first_result = ((int)$pageno - 1) * $results_per_page;

                                            $watchlist_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "  ");
                                            $wn = $watchlist_rs->num_rows;

                                            if ($wn == 0) {
                                            ?>
                                                <img style="margin-left: auto; margin-right: auto; display: block;" src="resources/empty-wishlist.png" />
                                                <a style="margin-left: auto; margin-right: auto; display: block; text-align: center;" class="aa-browse-btn" href="index.php">Start Shopping <span class="fa fa-long-arrow-right"></span></a>
                                            <?php
                                            } else {
                                            ?>
                                                <thead>
                                                    <tr class="tr0">
                                                        <th>Remove</th>
                                                        <th>Product Image</th>
                                                        <th>Product</th>
                                                        <th>Price</th>
                                                        <th>Stock Status</th>
                                                        <th>Quantity</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <?php

                                                for ($i = 0; $i < $wn; $i++) {
                                                    $wr = $watchlist_rs->fetch_assoc();
                                                    $wid = $wr["product_id"];

                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $wid . "'");
                                                    $pn = $product_rs->num_rows;

                                                    if ($pn == 1) {

                                                        $pr = $product_rs->fetch_assoc();

                                                ?>



                                                        <tbody>
                                                            <tr class="tr1">
                                                                <td>
                                                                    <a onclick="deleteFromWatchlist(<?php echo $wr['id'] ?>);" class="remove">
                                                                        <fa class="fa fa-close"></fa>
                                                                    </a>
                                                                </td>
                                                                <td>

                                                                    <?php
                                                                    $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $wid . "'");
                                                                    $in = $image_rs->num_rows;

                                                                    $arr;

                                                                    for ($x = 0; $x < $in; $x++) {
                                                                        $ir = $image_rs->fetch_assoc();
                                                                        $arr[$x] = $ir["code"];
                                                                    }
                                                                    ?>

                                                                    <a><img src="<?php echo $arr[0] ?>" alt="img"></a>
                                                                </td>
                                                                <td>
                                                                    <a class="aa-cart-title"><?php echo $pr["title"] ?></a><br />
                                                                    <a style="color: green;" class="aa-cart-title"><?php echo $pr["qty"] ?> Items Left</a><br />
                                                                    <?php
                                                                    $user1 = Database::search("SELECT * FROM `user` WHERE `email`='" . $pr["user_email"] . "'");
                                                                    $user_r = $user1->fetch_assoc();
                                                                    ?>

                                                                    <p>Seller: <a class="aa-cart-title" style="color: brown;"><?php echo $user_r["fname"] . " " . $user_r["lname"] ?></a></p>
                                                                </td>
                                                                <td>Rs <?php echo $pr["price"] ?> .00</td>
                                                                <?php

                                                                if ((int)$pr["qty"] > 0) {
                                                                ?>
                                                                    <td>In Stock</td>
                                                                <?php
                                                                } else {
                                                                ?>
                                                                    <td style="color: red;">Out Of Stock</td>
                                                                <?php
                                                                }
                                                                ?>
                                                                <td>
                                                                    <input style=" width: 50%; margin-left: auto; margin-right: auto; background-color: #EBEBEB; height: 20px; margin-top: 15px;" min="1" id="qtytxt<?php echo $pr["id"]; ?>" type="number" class="form-control mb-1 " value="1">
                                                                </td>

                                                                <td><a onclick="addToCart(<?php echo $pr['id'] ?>);" style="cursor: pointer;" class="aa-add-to-cart-btn">Add To Cart</a></td>
                                                            </tr>

                                                        </tbody>
                                            <?php
                                                    }
                                                }
                                            }
                                            ?>


                                        </table>
                                        <!-- pagination -->

                                        <div id="sp" class=" mb-3 text-center">

                                            <div class="aa-product-catg-pagination">
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
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- / Cart view section -->



        <!-- tankyou section -->
        <?php
        require "other/thankyou.php";
        ?>
        <!-- tankyou section -->

        <?php
        require "footer.php";
        ?>


        <!-- Login Modal -->
        <?php
        require "loginmodel.php";
        ?>



        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.js"></script>
        <!-- SmartMenus jQuery plugin -->
        <script type="text/javascript" src="js/jquery.smartmenus.js"></script>
        <!-- SmartMenus jQuery Bootstrap Addon -->
        <script type="text/javascript" src="js/jquery.smartmenus.bootstrap.js"></script>
        <!-- To Slider JS -->
        <script src="js/sequence.js"></script>
        <script src="js/sequence-theme.modern-slide-in.js"></script>
        <!-- Product view slider -->
        <script type="text/javascript" src="js/jquery.simpleGallery.js"></script>
        <script type="text/javascript" src="js/jquery.simpleLens.js"></script>
        <!-- slick slider -->
        <script type="text/javascript" src="js/slick.js"></script>

        <!-- Price picker slider -->
        <script type="text/javascript" src="js/nouislider.js"></script>
        <!-- Custom js -->
        <script src="js/custom.js"></script>
        <script src="js/all.js"></script>
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