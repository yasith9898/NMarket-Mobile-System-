<?php
include "connection.php";
include "SMTP.php";
include "Exception.php";
include "PHPMailer.php";

use PHPMailer\PHPMailer\PHPMailer;
$email = $_GET["e"];



if(empty($email)){

    echo("plese Enter Email");
}else{

$u_rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."'");

$num = $u_rs->num_rows;

if($num == 1){
    $v_code = uniqid();

    Database::iud("UPDATE `user` SET `v_code` = '".$v_code."' WHERE `email`='".$email."'");

    $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '';
            $mail->Password = 'czofbktsajxfnohk';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('', 'Reset Password');
            $mail->addReplyTo('', 'Reset Password');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'N- Market progot password';
            $bodyContent = 'uver verfication code is:'.$v_code;
            $mail->Body    = $bodyContent;

            if(!$mail->send()){
                echo("sending faill");
            }else{
                echo("sucses");
            }
}
}
?>