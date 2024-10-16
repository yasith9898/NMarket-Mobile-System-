<?php

include "connection.php";
$npw = $_POST["n"];
$cpw = $_POST["c"];
$vcode = $_POST["v"];

if(empty($npw)){

echo("plese enter new password");

}else if(empty($cpw)){

    echo("plese enter conform password");
}else if(empty($vcode)){

    echo("plese enter verfication code");
}else if(strlen($npw) > 7) {
    echo("password must containe 7 characters");
}

else{

    if($npw == $cpw){
      

        $rs = Database::search("SELECT * FROM `user` WHERE `v_code`='".$vcode."'");
        $num = $rs->num_rows;

        if($num == 1){
            Database::iud("UPDATE `user` SET `password` = '".$npw."' WHERE `v_code` = '".$vcode."'");

            echo("success");
        }

    }else{

        echo("password not match");
    }
}


?>