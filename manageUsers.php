<?php

session_start();

require "connection.php";

?>

<!DOCTYPE html>

<html>

<head>
    <title>LION HUB | Manage Users</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="other/icon.png" rel="icon">
    <link rel="stylesheet" href="other/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="other/invoice.css" />
    <link rel="stylesheet" href="css/style.css" />
    <!-- Font awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">

</head>

<body onload="refresher('<?php echo $email; ?>');" style="background-image: url('resources/profilebackground.jpg');  background-attachment: fixed; background-repeat: no-repeat; background-size: cover;">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12  text-center rounded">
                <label class="form-label fs-2 fw-bold text-dark">Manage All Users</label>
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
                                    <input placeholder="Enter user email.." style="border-color: blue; border-width: 2px;" type="text" class="form-control border-secondary" id="searchtxt1" />
                                </div>

                                <div class="col-2 d-grid">
                                    <button class="btn btn-primary" onclick="searchUser('1');">Search</button>
                                </div>
                                <div class="col-4 mt-2 mt-lg-0 col-lg-2 offset-lg-0 offset-10 d-grid">
                                    <a class="btn text-primary fw-bold fs-5" href="manageUsers.php"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-11 mt-3 mb-2">
                <div class="row">
                    <div class="border-end col-2 col-lg-1 bg-dark pt-2 pb-2 text-end">
                        <span class="fs-4 fw-bold text-white">#</span>
                    </div>
                    <div class="border-end col-2 bg-dark pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Profile Image</span>
                    </div>
                    <div class="border-end col-2 bg-dark pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Email</span>
                    </div>
                    <div class="border-end col-6 col-lg-2 bg-dark pt-2 pb-2">
                        <span class="fs-4 fw-bold text-white">User Name</span>
                    </div>
                    <div class="border-end col-2 bg-dark pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Mobile</span>
                    </div>
                    <div class="col-2 col-lg-1 bg-dark pt-2 pb-2 d-none d-lg-block">
                        <span class="fs-4 fw-bold text-white">Registered Date</span>
                    </div>
                    <div class="col-4 col-lg-1 bg-dark pt-2 pb-2 d-none d-lg-block"></div>
                </div>
            </div>


            <div id="userdata">


                <?php

                if (isset($_SESSION["k"])) {

                    $u = $_SESSION["k"];

                ?>

                    <div class="col-12 mb-2">
                        <div class="row">
                            <div class="col-2 col-lg-1 bg-primary pt-2 pb-2 text-end">
                                <span class="fs-5 fw-bold text-white">1</span>
                            </div>
                            <div class="col-2 bg-light d-none d-lg-block text-center" onclick="">

                                <?php
                                $pimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $u["email"] . "'");
                                $pimg_rows = $pimg->num_rows;


                                if ($pimg_rows == 0) {
                                ?>
                                    <img src="resources/feedback_user.jpg" style="height: 70px;" />
                                <?php
                                } else {
                                    $profimg = $pimg->fetch_assoc();
                                ?>
                                    <img src="<?php echo $profimg["code"]; ?>" style="height: 70px;" />
                                <?php
                                }
                                ?>


                            </div>
                            <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                <span class="fs-5 fw-bold text-white"><?php echo $u["email"]; ?></span>
                            </div>
                            <div class="col-6 col-lg-2 bg-light pt-2 pb-2">
                                <span class="fs-5 fw-bold"><?php echo $u["fname"] . " " . $u["lname"]; ?></span>
                            </div>
                            <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                <span class="fs-5 fw-bold text-white"><?php echo $u["mobile"]; ?></span>
                            </div>
                            <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                <span class="fs-5 fw-bold">
                                    <?php
                                    $rd = $u["register_date"];
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
                        <button class="btn btn-secondary" onclick="clearSearch();">Clear</button>
                    </div>

                    <?php

                } else {


                    if (isset($_GET["page"])) {
                        $pageno = $_GET["page"];
                    } else {
                        $pageno = 1;
                    }

                    $products = Database::search("SELECT * FROM `user`");
                    $d = $products->num_rows;
                    $row = $products->fetch_assoc();

                    $results_per_page = 10;

                    $number_of_pages = ceil($d / $results_per_page);

                    $page_first_result = ((int)$pageno - 1) * $results_per_page;

                    $selectedrs = Database::search("SELECT * FROM `user` LIMIT " . $results_per_page . " OFFSET " . $page_first_result . "");
                    $srn = $selectedrs->num_rows;

                    $c = "0";

                    while ($srow = $selectedrs->fetch_assoc()) {

                        $c = $c + 1;

                        // for ($i = 0; $i < $srn; $i++) {

                    ?>

                        <div class="col-12 mb-2">
                            <div class="row">
                                <div class="col-8 col-lg-11">
                                    <div class="row">
                                        <div class="col-2 col-lg-1 bg-secondary pt-2 pb-2 text-end">
                                            <span class="fs-5 fw-bold text-white"><?php echo $c ?></span>
                                        </div>
                                        <div data-toggle="tooltip" data-placement="top" title="Chat with <?php echo $srow["email"] ?>" style="cursor: pointer;" class="col-2 bg-light d-none d-lg-block text-center" onclick="sse('<?php echo $srow['email'] ?>');">

                                            <?php
                                            $pimg = Database::search("SELECT * FROM `profile_img` WHERE `user_email`='" . $srow["email"] . "'");
                                            $pimg_rows = $pimg->num_rows;


                                            if ($pimg_rows == 0) {
                                            ?>
                                                <img src="resources/feedback_user.jpg" style="height: 70px;" />
                                            <?php
                                            } else {
                                                $profimg = $pimg->fetch_assoc();
                                            ?>
                                                <img src="<?php echo $profimg["code"]; ?>" style="height: 70px;" />
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="col-2 bg-secondary pt-2 pb-2 d-none d-lg-block">
                                            <span class="fs-5 fw-bold text-white"><?php echo $srow["email"] ?></span>
                                        </div>
                                        <div class="col-6 col-lg-2 bg-light pt-2 pb-2">
                                            <span class="fs-5 fw-bold"><?php echo $srow["fname"] . " " . $srow["lname"] ?></span>
                                        </div>
                                        <div class="col-2 bg-secondary pt-2 pb-2 d-none d-lg-block">
                                            <span class="fs-5 fw-bold text-white"><?php echo $srow["mobile"] ?></span>
                                        </div>
                                        <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                            <span class="fs-5 fw-bold">
                                                <?php
                                                $rd = $srow["register_date"];
                                                $splitrd = explode(" ", $rd);
                                                echo $splitrd[0];
                                                ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>




                                <div class="col-4 col-lg-1 pt-2 pb-2 d-grid">

                                    <?php

                                    $s = $srow["status_id"];

                                    if ($s == "2") {
                                    ?>
                                        <button id="blockbtn0<?php echo $srow['email'] ?>" class="btn btn-warning" onclick="blockUserreal('<?php echo $srow['email'] ?>');">Unblock</button>
                                    <?php
                                    } else {
                                    ?>
                                        <button id="blockbtn0<?php echo $srow['email'] ?>" class="btn btn-primary" onclick="blockUserreal('<?php echo $srow['email'] ?>');">Block</button>
                                    <?php
                                    }

                                    ?>

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
                                    <a style="width: 40px; height:40px;" href="<?php echo "?page=" . ($page); ?>" class="ms-1 active bg-primary"><?php echo $page; ?></a>
                                <?php

                                } else {

                                ?>
                                    <a style="width: 40px; height: 40px;" href="<?php echo "?page=" . ($page); ?>" class="ms-1"><?php echo $page; ?></a>
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
            </div>
            <!-- Search Product -->
            <div class="col-12 mb-2">
                <div class="row" id="userdiv1">



                </div>
            </div>
            <!-- Search Product -->





        </div>
    </div>

    <script src="other/script.js"></script>
    <script src="other/bootstrap.js"></script>
    <script src="other/bootstrap.bundle.js"></script>
    <script src="js/all.js"></script>
</body>

</html>