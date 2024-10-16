
<?PHP
session_start();
include "connection.php";


$email = $_POST["e"];
$password = $_POST["p"];
$remember = $_POST["r"];

if(empty($email)){
    echo("plese enter your email");
}else if(empty($password)){
    echo("plese enter your password");
}else {

$rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."' AND `password` = '".$password."'");

$num = $rs->num_rows;

if($num == 1){

echo("success");
$d = $rs->fetch_assoc();
$_SESSION["u"] = $d;

if($remember == "true"){
        setcookie("email",$email,time()+(60*60*24*365));
        setcookie("password",$password,time()+(60*60*24*365));

}else{

       setcookie("email","",-1);
       setcookie("password","",-1);

}
}else{

  echo("invalid email or password");
}
}







?>