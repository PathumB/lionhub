<?php
session_start();
require "connection.php";

$oid = $_GET["oid"];
$pid = $_GET["pid"];

if (isset($_SESSION["u"])) {

$ds = Database::iud("UPDATE invoice SET `status` = '2' WHERE `order_id` = '".$oid."' AND `product_id` = '".$pid."' AND `user_email` = '".$_SESSION["u"]["email"]."' ");
echo "1";


}else{
    ?>
    <script>
        window.location = "signinSignUp.php";
    </script>
<?php
}
?>