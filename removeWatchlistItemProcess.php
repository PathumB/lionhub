<?php
require "connection.php";

$id = $_GET["id"];

$watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `id`='".$id."'");
$watch_row = $watch_rs->fetch_assoc();

$pid = $watch_row["product_id"];
$mail = $watch_row["user_email"];

// Insert to recent Tbl
Database::iud("INSERT INTO `recent` (`product_id`,`user_email`) VALUES ('".$pid."','".$mail."') ");
// Delete from watchlist Tbl
Database::iud("DELETE FROM `watchlist` WHERE `id`='".$id."'");

echo "1";

?>