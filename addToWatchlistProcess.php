<?PHP

include "connection.php";
session_start();

$pid = $_GET["pid"];
$uid = $_SESSION["u"]["id"];

$u_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id` = '".$pid."' AND `user_id` ='".$uid."'");
$u_num = $u_rs->num_rows;

if($u_num > 0){

    Database::iud("DELETE FROM `watchlist` WHERE `product_id` = '".$pid."' AND `user_id` = '".$uid."'");
    echo("Removed");

}else{
    Database::iud("INSERT INTO `watchlist` (`product_id`,`user_id`)VALUES('".$pid."','".$uid."')");
    echo("added");
}




?>