<?PHP

include "connection.php";

session_start();

$pid = $_GET["pid"];
$uid = $_SESSION["u"]["id"];

$c_rs = Database::search("SELECT * FROM `cart` WHERE `product_id` = '".$pid."' AND `user_id` ='".$uid."'");
$c_num = $c_rs->num_rows;
$c_data = $c_rs->fetch_assoc();


if($c_num > 0){

    $currentQty = $c_data["qty"];
$newQty = $currentQty + 1;


    Database::iud("UPDATE `cart` SET `qty` = '".$newQty."' WHERE `product_id` = '".$pid."' AND `user_id` = '".$uid."'");
    echo("updated");

}else{
    Database::iud("INSERT INTO `cart` (`qty`,`product_id`,`user_id`)VALUES('1','".$pid."','".$uid."')");
    echo("added");
}














?>