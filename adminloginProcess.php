
<?PHP
session_start();
include "connection.php";


$email = $_POST["e"];
$password = $_POST["p"];


if(empty($email)){
    echo("plese enter your email");
}else if(empty($password)){
    echo("plese enter your password");
}else {

$rs = Database::search("SELECT * FROM `admin` WHERE `email` = '".$email."' AND `password` = '".$password."'");

$num = $rs->num_rows;

if($num == 1){

echo("success");
$d = $rs->fetch_assoc();
$_SESSION["a"] = $d;


}else{

  echo("invalid email or password");
}
}







?>