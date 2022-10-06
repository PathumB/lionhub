<?php
// session_start();
require "connection.php";

if (isset($_GET["s"])) {
    $search =  $_GET["s"];
    // echo $pageno;

    if (!empty($search)) {

        $results_per_page = 5;
        $pageno = $_GET["page"];

        $allproductresult = Database::search("SELECT * FROM `user` WHERE `email` LIKE '%" . $search . "%' ");
        $allproductresultnumber = $allproductresult->num_rows;
        $number_of_pages = ceil($allproductresultnumber / $results_per_page);
        $page_first_result = (int)$pageno * $results_per_page - $results_per_page;
        $productresult = Database::search("SELECT * FROM `user` WHERE `email` LIKE '%" . $search . "%'  LIMIT 5 OFFSET $page_first_result;");
        // echo "1";



        $productnum = $productresult->num_rows;


?>
        <?php
        for ($x = 0; $x < $productnum; $x++) {
            $srow = $productresult->fetch_assoc();




        ?>
            <div class="col-12 mb-2">
                <div class="row">
                    <div class="col-8 col-lg-11">
                        <div class="row">
                            <div class="col-2 col-lg-1 bg-secondary pt-2 pb-2 text-end">
                                
                            </div>
                            <div class="col-2 bg-light d-none d-lg-block text-center" onclick="viewMsgModel();">

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

        <!--pagination-->
        <div class="col-12 col-lg-4 offset-lg-4 d-flex justify-content-center">
            <div class="pagination">
                <?php

                if ($pageno != 1) {

                ?>
                    <button class="btn btn-light ms-1" style="width: 35px;" onclick="searchUser(<?php echo $pageno - 1; ?>);">&laquo;</button>
                <?php
                }
                ?>

                <?php

                for ($i = 1; $i <= $number_of_pages; $i++) {

                    if ($i == $pageno) {

                ?>
                        <button class="btn btn-primary ms-1" style="width: 35px;" onclick="searchUser(<?php echo $i; ?>);"><?php echo $i; ?></button>
                    <?php

                    } else {

                    ?>
                        <button class="btn btn-outline-secondary ms-1" style="width: 35px;" onclick="searchUser(<?php echo $i; ?>);"><?php echo $i; ?></button>
                <?php
                    }
                }
                ?>

                <?php
                if ($pageno != $number_of_pages) {
                ?>
                    <button class="btn btn-light ms-1" style="width: 35px;" onclick="searchUser(<?php echo $pageno + 1; ?>);">&raquo;</button>
                <?php
                }
                ?>
            </div>
        </div>
        <!--pagination-->

<?php
    } else {
        echo "<h5 class = 'mt-4 mb-4 fw-bold text-center' style = 'color:black;'> Please Enter email Address..  </h5>";
    }
}
?>