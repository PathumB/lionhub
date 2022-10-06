<?php
session_start();
require "connection.php";

// $pid = $_GET["id"];

if (isset($_SESSION["u"])) {

$ds = Database::iud("UPDATE invoice SET `status` = '2' WHERE `user_email` = '".$_SESSION["u"]["email"]."' ");
echo "1";


}else{
    ?>
    <script>
        window.location = "signinSignUp.php";
    </script>
<?php
}
?>