<?php
session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $umail = $_SESSION["u"]["email"];

    $total = "0";
    $subtotal = "0";
    $shipping = "0";


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>LION HUB | Checkout</title>

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
            <img src="resources/checkout.jpg">
            <div class="aa-catg-head-banner-area">
                <div class="container">
                    <div class="aa-catg-head-banner-content">
                        <h2>Checkout</h2>
                        <ol class="breadcrumb">
                            <li style="font-weight: bolder;"><a href="cart.php">Cart</a></li>
                            <li class="active"><a>Checkout</a></li>
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
                            <div style="background-color: white;" class="cart-view-table">

                                <?php
                                $cart_rs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $umail . "'");
                                $cn = $cart_rs->num_rows;

                                if ($cn == 0) {
                                ?>
                                    <script>
                                        window.location = "index.php";
                                    </script>
                                <?php
                                } else {
                                ?>


                                    <div style="overflow-x: scroll;" class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Product</th>
                                                    <th>Color</th>
                                                    <th>Condition</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <?php

                                                for ($i = 0; $i < $cn; $i++) {
                                                    $cr = $cart_rs->fetch_assoc();

                                                    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cr["product_id"] . "'");
                                                    $pr = $product_rs->fetch_assoc();

                                                    $total = $total + ($pr["price"] * $cr["qty"]);

                                                    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email` = '" . $umail . "' ");
                                                    $ar = $address_rs->fetch_assoc();

                                                    // $cityid = $ar["location_id"];

                                                    $rs1 = Database::search("SELECT `location`.`id`, `province_id` , `district_id`, `city_id`, 
                                                        city.id AS `cid`, city.name AS `c_name`, 
                                                        city.postal_code, 
                                                        district.id AS `did`, district.name AS `d_name`, 
                                                        province.id AS `pid`, province.name AS `p_name` 
                                                        FROM `location` JOIN `city` ON city.id=location.city_id
                                                        JOIN `district` ON district.id=location.district_id
                                                        JOIN `province` ON province.id=location.province_id WHERE `location`.id='" . $ar["location_id"] . "';");

                                                    $locr = $rs1->fetch_assoc();

                                                    $ship = "0";

                                                    if ($locr["district_id"] == "3") {
                                                        $ship =  $pr["delivery_fee_colombo"];
                                                        $shipping = $shipping + $pr["delivery_fee_colombo"];
                                                    } else {

                                                        $ship =  $pr["delivery_fee_other"];
                                                        $shipping = $shipping + $pr["delivery_fee_other"];
                                                    }


                                                    $seller_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $pr["user_email"] . "' ");
                                                    $sn = $seller_rs->fetch_assoc();
                                                    $color_rs = Database::search("SELECT `name` FROM `color` WHERE `id` ='" . $pr["color_id"] . "' ");
                                                    $clr = $color_rs->fetch_assoc();
                                                    $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id` = '" . $pr["condition_id"] . "' ");
                                                    $cor = $condition_rs->fetch_assoc();

                                                ?>


                                                    <tr class="tr1">

                                                        <td>

                                                            <?php
                                                            $image_rs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pr["id"] . "'");
                                                            $in = $image_rs->num_rows;

                                                            $arr;

                                                            for ($x = 0; $x < $in; $x++) {
                                                                $ir = $image_rs->fetch_assoc();
                                                                $arr[$x] = $ir["code"];
                                                            }
                                                            ?>

                                                            <a href="#"><img src="<?php echo $arr[0] ?>" alt="img"></a>
                                                        </td>

                                                        <td>
                                                            <p><a class="aa-cart-title" href="#"><?php echo $pr["title"] ?></a></p>





                                                        </td>

                                                        <td>
                                                            <p><a class="aa-cart-title" href="#"><?php echo $clr["name"] ?></a></p>
                                                        </td>
                                                        <td>
                                                            <p><a class="aa-cart-title" href="#"><?php echo $cor["name"] ?></a></p>
                                                        </td>
                                                        <td>
                                                            
                                                            <input disabled min="1" max="100" value="<?php echo $cr["qty"]; ?>" type="number" onchange="cartupdate(<?php echo $cr['id']?>);autoprice(<?php echo $cr['id']?>);autosubtotal();autototal();" id="qtyup<?php echo $cr["id"];?>" oninput="this.value = Math.abs(this.value='<?php echo $cr['qty']; ?>')" />
                                                        </td>

                                                        <td>Rs <?php echo $pr["price"] ?> .00</td>
                                                        <td class="product_total" id="price<?php echo $cr["id"]?>" >Rs.<?php echo ($pr["price"] * $cr["qty"]) + $shipping; ?>.00</td>
                                                    </tr>


                                                <?php
                                                }
                                                ?>

                                            </tbody>

                                        </table>
                                        
                                    </div>



                                    <div style="width: 100%;" class="cart-view-total">
                                        <h4>Oder Summery</h4>
                                        <table class="aa-totals-table">
                                            <tbody>
                                                <tr>
                                                    <th>Item Count</th>
                                                    <td><?php echo $cn; ?> Items</td>
                                                </tr>
                                                <tr>
                                                    <th>Cost Per (<?php echo $cn; ?>) Items</th>
                                                    <td>Rs <?php echo $total; ?> .00</td>
                                                </tr>
                                                <tr>
                                                    <th>Total Shipping Cost</th>
                                                    <td>Rs <?php echo $shipping; ?> .00</td>
                                                </tr>
                                                <tr style="background-color: #EBEBEB;">
                                                    <th style="color: red;">Grand Total</th>
                                                    <th style="color: red;">Rs &nbsp;<?php echo ($total + $shipping); ?> &nbsp;.00</th>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <a style="cursor: pointer;" onclick="checkout();"  class="aa-cart-view-btn">Place Order</a>
                                    </div>


                                <?php
                                }
                                ?>





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
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
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