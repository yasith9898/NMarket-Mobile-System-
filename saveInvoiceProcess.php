<?PHP

include "connection.php";
session_start();


$oid = $_POST["oi"];
$item = $_POST["it"];
$total = $_POST["to"];

// DateTime with timezone
$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$data = $d->format("Y-m-d H:i:s");

Database::iud("INSERT INTO `invoice` (`id`,`title`,`total`,`date`,`status`,`user_id`) VALUES('".$oid."','".$item."','".$total."','".$data."','1','".$_SESSION["u"]["id"]."')");

echo("success");








?>