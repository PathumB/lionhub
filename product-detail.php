<?php
session_start();
require "connection.php";

if (isset($_GET["id"])) {
  $pid = $_GET["id"];

  $products = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
  $pn = $products->num_rows;
  $reviews = Database::search("SELECT * FROM `feedback` WHERE `product_id`='" . $pid . "'");
  $reviews_num = $reviews->num_rows;

  if ($pn == 1) {
    $pd = $products->fetch_assoc();

    $color_rs = Database::search("SELECT `name` FROM `color` WHERE `id` ='" . $pd["color_id"] . "' ");
    $clr = $color_rs->fetch_assoc();
    $condition_rs = Database::search("SELECT * FROM `condition` WHERE `id` = '" . $pd["condition_id"] . "' ");
    $cor = $condition_rs->fetch_assoc();

    $brand = Database::search("SELECT * FROM `model_has_brand` WHERE `id` = '" . $pd["model_has_brand_id"] . "' ");
    $brand_d = $brand->fetch_assoc();
    $brand_id = $brand_d["brand_id"];
    $brand1 = Database::search("SELECT * FROM `brand` WHERE `id` = '" . $brand_id . "' ");
    $brand_result = $brand1->fetch_assoc();

    $model = Database::search("SELECT * FROM `model_has_brand` WHERE `id` = '" . $pd["model_has_brand_id"] . "' ");
    $model_d = $model->fetch_assoc();
    $model_id = $model_d["model_id"];
    $model1 = Database::search("SELECT * FROM `model` WHERE `id` = '" . $model_id . "' ");
    $model_result = $model1->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>LION HUB | Product Detail</title>

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

      <!-- Alerts -->
      <link rel="stylesheet" href="other/snackbar.min.css">

      <!-- Google Font -->
      <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script>
        (function(w, d) {
          w.CollectId = "618b7f3e11c7462f21dec261";
          var h = d.head || d.getElementsByTagName("head")[0];
          var s = d.createElement("script");
          s.setAttribute("type", "text/javascript");
          s.async = true;
          s.setAttribute("src", "https://collectcdn.com/launcher.js");
          h.appendChild(s);
        })(window, document);
      </script>

    </head>

    <body>

      <!-- SCROLL TOP BUTTON -->
      <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
      <!-- END SCROLL TOP BUTTON -->


      <?php
      require "header.php";
      ?>


      <!-- catg header banner section -->
      <!-- <section id="aa-catg-head-banner">
        <img src="resources/singleProduct.jpg" alt="fashion img">
        <div class="aa-catg-head-banner-area">
          <div class="container">
            <div class="aa-catg-head-banner-content">
              <h2>Product Details</h2>
              <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li class="active">Product</li>
              </ol>
            </div>
          </div>
        </div>
      </section> -->
      <!-- / catg header banner section -->

      <!-- product category -->
      <section id="aa-product-details">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="aa-product-details-area">
                <div class="aa-product-details-content">
                  <div class="row">
                    <!-- Modal view slider -->
                    <div class="col-md-5 col-sm-5 col-xs-12">
                      <div class="aa-product-view-slider">
                        <div id="demo-1" class="simpleLens-gallery-container">

                          <?php

                          $mainimg_rs1 = Database::search("SELECT * FROM `images` WHERE `code` LIKE '%img1%' AND `product_id`='" . $pid . "'");
                          $mainimg1 = $mainimg_rs1->fetch_assoc();
                          $mainimg_rs2 = Database::search("SELECT * FROM `images` WHERE `code` LIKE '%img2%' AND `product_id`='" . $pid . "'");
                          $mainimg2 = $mainimg_rs2->fetch_assoc();
                          $mainimg_rs3 = Database::search("SELECT * FROM `images` WHERE `code` LIKE '%img3%' AND `product_id`='" . $pid . "'");
                          $mainimg3 = $mainimg_rs3->fetch_assoc();

                          ?>

                          <div style="height: 400px;" class="simpleLens-container">
                            <div class="simpleLens-big-image-container"><a data-lens-image="<?php echo $mainimg1["code"]; ?>" class="simpleLens-lens-image"><img src="<?php echo $mainimg1["code"]; ?>" class="simpleLens-big-image"></a></div>
                          </div>
                          <div class="simpleLens-thumbnails-container">
                            <a data-big-image="<?php echo $mainimg1["code"]; ?>" data-lens-image="<?php echo $mainimg1["code"]; ?>" class="simpleLens-thumbnail-wrapper" href="#">
                              <img style="width: 108px; height: auto;" src="<?php echo $mainimg1["code"]; ?>">
                            </a>
                            <a data-big-image="<?php echo $mainimg2["code"]; ?>" data-lens-image="<?php echo $mainimg2["code"]; ?>" class="simpleLens-thumbnail-wrapper" href="#">
                              <img style="width: 108px; height: auto;" src="<?php echo $mainimg2["code"]; ?>">
                            </a>
                            <a data-big-image="<?php echo $mainimg3["code"]; ?>" data-lens-image="<?php echo $mainimg3["code"]; ?>" class="simpleLens-thumbnail-wrapper" href="#">
                              <img style="width: 108px; height: auto;" src="<?php echo $mainimg3["code"]; ?>">
                            </a>
                          </div>
                        </div>


                      </div>
                    </div>
                    <!-- Modal view content -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                      <div class="aa-product-view-content">
                        <h1 style="font-family: 'calibri'; font-weight: bolder;"><?php echo $pd["title"] ?></h1>
                        <div class="aa-price-block">

                          <div style="color: red;" class="product-wid-rating ">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>&nbsp;&nbsp;<span style="color: green; font-family: 'calibri';">(<?php echo $reviews_num; ?>) Feedback</span>
                          </div>
                          <!-- <hr /> -->

                          <h3 style="font-weight: bolder; font-family: 'calibri';"><span class="aa-product-view-price">Rs. <?php echo $pd["price"] ?> .00</span> &nbsp;

                          </h3>
                          <p style="font-family: 'calibri';" class="aa-product-avilability"><span><?php echo $pd["qty"] ?> Items Left</span></p>

                          <?php

                          if ((int)$pd["qty"] > 0) {
                          ?>
                            <p class="aa-product-avilability">Avilability: <span style="color: red;">In stock</span></p>
                          <?php
                          } else {
                          ?>
                            <p class="aa-product-avilability">Avilability: <span style="color: red;">Out Of stock</span></p>
                          <?php
                          }
                          ?>
                          <p>Product Color: <span style="color: #0077ff;"><?php echo $clr["name"] ?></span></p>
                          <p>Product Condition: <span style="color: #0077ff;"><?php echo $cor["name"] ?></span></p>
                          <p>Product Listed On: <span style="color: #0077ff;"><?php echo $pd["datetime_added"] ?></span></p>

                          <div class="qty">
                            <span style="font-family: 'calibri';">QTY: &nbsp;&nbsp;</span>
                            <button onclick="qty_dec();" class="btn-minus"><i class="fa fa-minus"></i></button>
                            <input id="qtyinput" disabled type="number" value="1" oninput="this.value = Math.abs(this.value='1')">
                            <button onclick="qty_inc(<?php echo $pd['qty']; ?>);" class="btn-plus"><i class="fa fa-plus"></i></button>
                          </div>
                          <img src="img/paypal.jpg" />
                        </div>

                        <div class="aa-prod-view-bottom">
                          <a id="payhere-payment" onclick="paynow(<?php echo $pid; ?>);" style="cursor: pointer; border-color: black; border-width: 2px; border-radius: 10px;" class="aa-add-to-cart-btn">&nbsp;&nbsp;<span style="font-size: x-large;" class="fa fa-credit-card"></span>Buy Now </a>
                          <a style="cursor: pointer; border-color: black; border-width: 2px; border-radius: 10px;" onclick="addToWishList(<?php echo $pd['id'] ?>);" class="aa-add-to-cart-btn"> &nbsp;&nbsp;<span style="font-size: x-large;" class="fa fa-heart"></span>Wishlist</a>
                          <br /><br />
                          <!-- <a style="width: 100%; text-align: center; background-color: black; border-radius: 5px; color: white;" class="aa-add-to-cart-btn" href="#">Buy Now</a> -->
                        </div>
                      </div>
                    </div>

                    <hr />
                    <div class="col-md-3 col-sm-3 col-xs-12">
                      <p style="font-family: 'calibri'; text-align: center; font-size: xx-large; ">Seller Details</p>

                      <?php
                      $user_rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $pd["user_email"] . "' ");
                      $user_d = $user_rs->fetch_assoc();
                      ?>

                      <p style="text-align: center; color: brown;"><span style=" font-family: 'calibri'; font-weight: bold;">Name : <?php echo $user_d["fname"] . " " . $user_d["lname"] ?></span></p>
                      <p style="text-align: center"><span style=" font-family: 'calibri'; font-weight: bold;">Email : <?php echo $user_d["email"] ?></span></p>
                      <p style="text-align: center"><span style=" font-family: 'calibri'; font-weight: bold;">Contact no : <?php echo $user_d["mobile"] ?></span></p>
                      <!-- <hr/> -->
                      <button onclick="sse('<?php echo $user_d['email'] ?>');" style="border-radius: 5px;  border-style: solid; border-width: 2px;  width: 100%; margin-left: auto; margin-right: auto; display: block;" class="aa-filter-btn">Contact Seller</button>
                    </div>



                  </div>
                </div>
                <div class="aa-product-details-bottom">
                  <ul class="nav nav-tabs" id="myTab2">
                    <li><a href="#description" data-toggle="tab">Description</a></li>
                    <li><a href="#review" data-toggle="tab">Reviews</a></li>
                  </ul>

                  <!-- Tab panes -->
                  <div style="background-color: #EBEBEB;" class="tab-content">
                    <div class="tab-pane fade in active" id="description">
                      <p>
                      <h1 style="font-family: 'calibri'; font-weight: bolder;"><?php echo $pd["title"] ?></h1>.</p>
                      <ul>
                        <li><?php echo $pd["qty"] ?> Items Left</li>
                        <li>Product Color: <span style="color: #BA0000;"><?php echo $clr["name"] ?></span>.</li>
                        <li>Product Condition: <span style="color: #BA0000;"><?php echo $cor["name"] ?></span>.</li>
                        <li>Product Brand: <span style="color: #BA0000;"><?php echo $brand_result["name"] ?></span></li>
                        <li>Product Model: <span style="color: #BA0000;"><?php echo $model_result["name"] ?></span></li>
                        <li>Product Listed On: <span style="color: #BA0000;"><?php echo $pd["datetime_added"] ?></span>!</li>
                        <li>Seller: <?php echo $user_d["fname"] . " " . $user_d["lname"] ?></li>
                      </ul>
                      <p><?php echo $pd["description"] ?>!</p>

                    </div>
                    <div class="tab-pane fade " id="review">
                      <div class="aa-product-review-area">
                        <h3>(<?php echo $reviews_num; ?>) Feedbacks for <?php echo $pd["title"] ?></h3>
                        <hr />

                        <?php

                        $feedback_rs = Database::search("SELECT * FROM `feedback` WHERE `product_id` = '" . $pd["id"] . "' ");
                        $feed = $feedback_rs->num_rows;

                        if ($feed == 0) {
                        ?>
                          <p style="text-align: center;">There are no feedbacks to view</p>
                          <?php
                        } else {

                          for ($a = 0; $a < $feed; $a++) {

                            $feed_row = $feedback_rs->fetch_assoc();


                          ?>
                            <ul class="aa-review-nav">
                              <li>
                                <div class="media">
                                  <div class="media-left">
                                    <a href="#">
                                      <img style="width: 70px; height: 70px; border-radius: 100%;" class="media-object" src="resources/feedback_user.jpg" alt="girl image">
                                    </a>
                                  </div>
                                  <div class="media-body">
                                    <?php
                                    $name1 = Database::search("SELECT * FROM `user` WHERE `email` = '" . $feed_row["user_email"] . "' ");
                                    $n1 = $name1->fetch_assoc();
                                    ?>
                                    <h4 class="media-heading"><strong><?php echo $n1["fname"]; ?></strong> - <span><?php echo $feed_row["date"]; ?></span></h4>
                                    <div style="color: red;" class="product-wid-rating ">
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                    </div>
                                    <p><?php echo $feed_row["feed"]; ?>.</p>
                                  </div>
                                </div>
                              </li>
                            </ul>
                        <?php
                          }
                        }
                        ?>



                      </div>
                    </div>
                  </div>
                </div>

                <!-- Related product -->
                <div class="aa-product-related-item">
                  <h3>Related Products</h3>
                  <ul class="aa-product-catg aa-related-item-slider">

                    <?php

                    $brandsid = Database::search("SELECT * FROM `product` WHERE `category_id` = '" . $pd["category_id"] . "' LIMIT 10;");
                    $bds = $brandsid->num_rows;

                    $img_array;
                    for ($g = 0; $g < $bds; $g++) {
                      $bdf = $brandsid->fetch_assoc();
                      // echo $bdf["title"];


                      $related_images = Database::search("SELECT * FROM `images` WHERE `product_id` = '" . $bdf["id"] . "'");
                      $related_rows = $related_images->num_rows;


                      for ($t = 0; $t < $related_rows; $t++) {
                        $related_data = $related_images->fetch_assoc();
                        $img_array[$t] = $related_data["code"];
                      }

                    ?>

                      <li>
                        <figure>
                          <a class="aa-product-img"><img style="width: 250px; height: auto;" src="<?php echo $img_array[0] ?>" alt="polo shirt img"></a>
                          <a style="cursor: pointer; margin-bottom: 50px;" onclick="addToCart(<?php echo $bdf['id'] ?>);" class="aa-add-card-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                          <!-- <br /> <br /> -->

                          <figcaption>
                            <h4 style="font-weight: bolder;" class="aa-product-title"><a href="#"><?php echo $bdf["title"]; ?></a></h4>


                            <?php
                            $feedback = Database::search("SELECT * FROM `feedback` WHERE `product_id` = '" . $bdf["id"] . "' ");
                            $fr = $feedback->num_rows;

                            if ($fr == 1) {
                            ?>
                              <div style="color: #FF2828;" class="product-wid-rating ">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-o"></i>&nbsp;<span style="color: black;"> (<?php echo $fr; ?>)</span>
                              </div>
                            <?php
                            } else if ($fr > 1) {
                            ?>
                              <div style="color: #FF2828;" class="product-wid-rating ">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>&nbsp;<span style="color: black;"> (<?php echo $fr; ?>)</span>
                              </div>
                            <?php
                            } else {
                            ?>
                              <div style="color: black;" class="product-wid-rating ">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>&nbsp;<span style="color: black;"> (0)</span>
                              </div>
                            <?php
                            }
                            ?>




                            <span class="aa-product-price">Rs <?php echo $bdf["price"]; ?> .00</span><span class="aa-product-price"></span>
                            <span><input style="text-align: center; display: inline; font-family: 'calibri'; width: 25%; margin-left: auto; margin-right: auto; background-color: transparent; color: black; height: 20px; border-color: #0090CC; border-width: 2px; " min="1" id="qtytxt<?php echo $bdf["id"]; ?>" type="number" class="form-control mb-1 " value="1"></span>

                          </figcaption>
                        </figure>
                        <div class="aa-product-hvr-content">
                          <a style="cursor: pointer; background-color: #FF2424; color: white;" onclick="addToWishList(<?php echo $bdf['id'] ?>);" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                          <a style="background-color: #000000; color: white;" href="<?php echo "product-detail.php?id=" . ($bdf['id']); ?>" data-toggle="tooltip" data-placement="top" title="View Product"><span class="fa fa-eye"></span></a>
                          <a style="cursor: pointer; background-color: #000000; color: white;" href="product.php" data-toggle="tooltip" data-placement="top" title="Search Product"><span class="fa fa-list-alt"></span></a>

                        </div>
                        <!-- product badge -->
                        <?php

                        if ((int)$bdf["qty"] > 0) {
                        ?>
                          <span class="aa-badge aa-sold-out" href="#">In Stock</span>
                        <?php
                        } else {
                        ?>
                          <span class="aa-badge aa-sale" href="#">Out Of Stock</span>
                        <?php
                        }
                        ?>
                      </li>


                    <?php
                    }
                    ?>

                  </ul>
                  <!-- quick view modal -->



                  <!-- / quick view modal -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- / product category -->


      <!-- tankyou section -->
      <?php
      require "other/thankyou.php";
      ?>
      <!-- tankyou section -->

      <!-- footer -->
      <?php
      require "footer.php";
      ?>
      <!-- / footer -->


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
      <!-- Alerts -->
      <script src="other/snackbar.min.js"></script>
      <!-- Custom js -->
      <script src="js/custom.js"></script>
      <script src="js/all.js"></script>
      <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    </body>

    </html>

  <?php
  }
} else {
  ?>
  <script>
    window.location = "index.php";
  </script>
<?php
}
?>