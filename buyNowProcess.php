<?PHP

include "connection.php";
session_start();

if(isset($_SESSION["u"])){

    $pid = $_GET["id"];

    $u_rs = Database::search("SELECT * FROM `user` WHERE `id` = '".$_SESSION["u"]["id"]."'");
    $u_data = $u_rs->fetch_assoc();

    if(isset($u_data["mobile"]) && isset($u_data["address"])){

        $fname = $_SESSION["u"]["name"];
        $lname = $_SESSION["u"]["name"];
        $email = $_SESSION["u"]["email"];
        $mobile = $_SESSION["u"]["mobile"];
        $address = $_SESSION["u"]["address"];
        $city = "colombo";
        $country = "Sri Lanka";
        $order_id = uniqid();
        $currency = "LKR";

        $p_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$pid."'");
        $p_data = $p_rs->fetch_assoc();

        $item = $p_data["title"];
        $amount = $p_data["price"] + $p_data["d_cost"];

        $merchant_id = "1228018";
        $merchant_secret ="MjE5MTEyMDI0MzU2OTczNTQzOTIyNTY4NzYyNTM5OTIzOTg3ODA=";

        $hash = strtoupper(
            md5(
                $merchant_id . 
                $order_id . 
                number_format($amount, 2, '.', '') . 
                $currency .  
                strtoupper(md5($merchant_secret)) 
            ) 
        );


        $array["id"] = $order_id;
        $array["fname"] = $fname;
        $array["lname"] = $lname;
        $array["email"] = $email;
        $array["mobile"] = $mobile;
        $array["address"] = $address;
        $array["city"] = $city;
        $array["country"] = $country;
        $array["item"] = $item;
        $array["amount"] = $amount;
        $array["m_id"] = $merchant_id;
        $array["m_secrete"] = $merchant_secret;
        $array["hash"] = $hash;

        echo json_encode($array);

        



        





    }else{

        echo("1");
    }


}else{

    echo("2");
}


?>