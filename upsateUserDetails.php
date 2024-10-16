<?PHP

session_start();


include "connection.php";

$address = $_POST["a"];
$mobile = $_POST["m"];

if(empty($address)){
    echo("plese enter Address");

}else if(empty($mobile)){
    echo("plese Enter Mobile");
}else if (!preg_match("/07[0,1,2,3,5,6,7,8]{1}[0-9]{7}/", $mobile)){
        echo("Invalid mobile Number");
}else{

$rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$_SESSION["u"]["email"]."'");
$num = $rs->num_rows;

if($num == 1){
    Database::iud("UPDATE `user` SET `address` = '".$address."', `mobile` = '".$mobile."' WHERE `email` = '".$_SESSION["u"]["email"]."'");

    echo("success");
}
}

?>