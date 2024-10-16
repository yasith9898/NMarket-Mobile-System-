<?php 

include "connection.php";

$name = $_POST["n"];
$email = $_POST["e"];
$password = $_POST["p"];

if(empty($name)){

    echo ("plese Enter Name");
}else if(empty($email)){
    echo("please Enter Email");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo("Invalid Email");

}else if(empty($password)){
echo("plese enter password");
}else if(strlen($password) > 7){
echo("password must containe 7 characters");
}else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."'");
    $num = $rs->num_rows;

    if($num == 0){
 
    Database::iud("INSERT INTO `user` (`name`,`email`,`password`,`status_id`) VALUES 
    ('".$name."','".$email."','".$password."','1')");

    echo("success");
     }      else{
    echo("this email alredy taken");
}
}

?>