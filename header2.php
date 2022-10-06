<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>

    <!-- Start header section -->
    <header style=" border: none; box-shadow: 0px 1px 20px 0px #000000;" id="aa-header">

        <!-- start header top  -->
        <?php
        if (isset($_SESSION["u"])) {
            $f_name = $_SESSION["u"]["fname"];
            $l_name = $_SESSION["u"]["lname"];
            $email = $_SESSION["u"]["email"];
        }
        ?>

        <!-- start header bottom  -->
        <div class="aa-header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-header-bottom-area">
                            <!-- logo  -->
                            <div class="aa-logo">
                                <!-- Text based logo -->
                                <a href="index.php">
                                    <span  style="color: #2868FF;" class="fa fa-shopping-cart"></span>
                                    <p style="font-family: 'calibri'; font-size: xx-large; font-weight: normal; color: black;">Lion<strong style="color: #2868FF;">Hub</strong> <span>Your Shopping Partner</span></p>
                                </a>
                                <!-- img based logo -->
                                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
                            </div>
                            <!-- / logo  -->
                            <!-- cart box -->

                            <script>
                                $(document).ready(function() {
                                    setInterval(function() {
                                        $("#cart").load(window.location.href + " #cart");
                                    }, 950);
                                });
                            </script>

                            <div class="aa-cartbox">
                                <a id="cart" class="aa-cart-link" href="cart.php">
                                    <span style="color: #2868FF;" class="fa fa-shopping-basket"></span>
                                    <span class="aa-cart-title">Shopping Cart</span>



                                    <?php
                                    $cart = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $email . "' ");
                                    $cn = $cart->num_rows;

                                    if ($cn >= 1) {
                                    ?>
                                        <span class="aa-cart-notify"><?php echo $cn; ?></span>



                                </a>


                                <div style="height: 130px; overflow-y: scroll; border-bottom-style: solid; border-width: 4px; " class="aa-cartbox-summary">
                                    <ul>

                                        <?php

                                        $cart_model = Database::search("SELECT * FROM `cart` INNER JOIN `product` ON cart.`product_id` = product.`id` WHERE cart.`user_email` = '" . $email . "' ORDER BY product.`datetime_added` DESC ");
                                        $cart_details = $cart_model->num_rows;
                                        for ($x = 0; $x < $cart_details; $x++) {
                                            $cart_data = $cart_model->fetch_assoc();


                                            $c_img1 = Database::search("SELECT * FROM `images` WHERE images.`code` LIKE '%img1%' AND images.`product_id` = '" . $cart_data["id"] . "' ");
                                            $imgr1 = $c_img1->fetch_assoc();

                                        ?>
                                            <li>
                                                <a class="aa-cartbox-img" href="#"><img src="<?php echo $imgr1["code"]; ?>" alt="img"></a>
                                                <div class="aa-cartbox-info">

                                                    <p style="font-weight: bolder; font-family: 'calibri';"><a href="#"><?php echo $cart_data["title"]; ?></a></p>

                                                    <?php
                                                    $cart_qty = Database::search("SELECT `qty` FROM `cart` WHERE `product_id` = '" . $cart_data["id"] . "' ");
                                                    $cqr = $cart_qty->fetch_assoc();
                                                    ?>

                                                    <p><span style="color: gray;">Price: </span> <?php echo $cart_data["price"] ?></p>
                                                    <p><span style="color: gray;">Quantity: </span> <?php echo $cqr["qty"] ?> </p>
                                                </div>
                                                <a class="aa-remove-product" href="cart.php"><span class="fa fa-search"></span></a>
                                            </li>
                                        <?php

                                        }
                                        ?>

                                    </ul>

                                </div>
                            <?php
                                    } else {
                            ?>
                                <span class="aa-cart-notify">0</span>
                            <?php
                                    }
                            ?>
                            </div>
                            <div class="aa-cartbox Wishlist1">
                                <a id="date" class="aa-cart-link" href="wishlist.php">
                                    <span style="color: #2868FF;" class="fa fa-heart"></span>
                                    <span class="aa-cart-title">Wishlist</span>

                                    <script>
                                        $(document).ready(function() {
                                            setInterval(function() {
                                                $("#date").load(window.location.href + " #date");
                                            }, 950);
                                        });
                                    </script>

                                    <?php
                                    $wish = Database::search("SELECT * FROM `watchlist` WHERE `user_email` = '" . $email . "' ");
                                    $wishn = $wish->num_rows;

                                    if ($wishn >= 1) {
                                    ?>
                                        <span class="wishclass aa-cart-notify "><?php echo $wishn; ?></span>
                                    <?php
                                    } else {
                                    ?>
                                        <span class="wishclass aa-cart-notify">0</span>
                                    <?php
                                    }
                                    ?>




                                </a>
                            </div>

                            <!-- / cart box -->
                            <!-- search box -->

                            <div class="aa-search-box">

                                <div>
                                    <input onclick="searchRedirect();" class="form-control" type="text" aria-label="Text input with dropdown button" id="s" placeholder="Search your favour.. ">
                                    <button style="background-color: #2868FF;" onclick="productSearch('1');" type="submit"><span class="fa fa-search"></span></button>
                                </div>
                            </div>

                            <!-- / search box -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- / header bottom  -->
    </header>
    <!-- / header section -->






</body>

</html>