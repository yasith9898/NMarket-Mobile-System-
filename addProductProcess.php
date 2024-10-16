<?php

include "connection.php";

$title = $_POST["t"];
$brand = $_POST["b"];
$price = $_POST["p"];
$qty = $_POST["q"];
$dcost = $_POST["c"];
$size = $_POST["si"];
$color = $_POST["co"];
$storage = $_POST["st"];
$desc = $_POST["d"];

if(empty($title)){
    echo("plese Enter title");
}else if(empty($brand)){
    echo("plese Enter brand");
}else if(empty($price)){
    echo("plese Enter price");
}else if(empty($qty)){
    echo("plese Enter quentity");
}else if(empty($dcost)){
    echo("plese Enter dilivery cost");
}else if(empty($desc)){
    echo("plese Enter descriptiont");
}else{

    Database::iud("INSERT INTO `product` (`title`, `price`, `qty`, `d_cost`, `description`, `brand_id`, `size_id`, `color_id`, `storage_id`)
    VALUES ('".$title."', '".$price."', '".$qty."', '".$dcost."', '".$desc."', '".$brand."', '".$size."', '".$color."', '".$storage."')");


 $product_id =  Database::$connection->insert_id;

$length = sizeof($_FILES);

if($length <= 3 && $length > 0){

    for($x = 0; $x < $length; $x++){

        if(isset($_FILES["image" .$x])){

            $image_file = $_FILES["image".$x];
            $file_extention = $image_file["type"];
               
            $new_file_extension;

            if ($file_extention == "image/jpeg") {
                $new_file_extension = ".jpeg";
            } else if ($file_extention == "image/png") {
                $new_file_extension = ".png";
            } else if ($file_extention == "image/svg+xml") {
                $new_file_extension = ".svg";
            } else {
                echo "Invalid file type";
            }

            $file_name = "resources//product_images//".$title."_".uniqid().$new_file_extension;
            move_uploaded_file($image_file["tmp_name"],$file_name);

            Database::iud("INSERT INTO `product_images`(`img_path`,`product_id`) VALUE ('".$file_name."','".$product_id."')");
        }


    }

    echo("success");

}else{
    echo("ivalid file count");
}

}

?>