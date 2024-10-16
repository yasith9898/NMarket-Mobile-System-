<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
</head>

<body>
    <?PHP include "header.php"; 
    
    if($_GET["id"]){

        $pid = $_GET["id"];

        ?>

<div class="col-12 mt-2 overflow-hidden">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="row">

                   
                        <div class="col-12 col-lg-3">
                            <div class="row">
                            <?PHP
                    
                    $i_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '".$pid."'");
                    $i_num = $i_rs->num_rows;
                    $img = array();

                    if(!$i_num == 0){

                        for($x = 0; $x < $i_num; $x++){
                            $i_data = $i_rs->fetch_assoc();
                            $img[$x] = $i_data["img_path"];

                            ?>
                             <div class="col-4 col-lg-12 text-center mt-lg-3">
                                    <img src="<?PHP echo $img[$x]; ?>" class="img-thumbnail" style="border: none;" />
                                </div>
                            <?PHP

                        }

                    }else{
                        ?>
                         <div class="col-4 col-lg-12 text-center mt-lg-3">
                                    <img src="resources/noimage.png" class="img-thumbnail" style="border: none;" />
                                </div>
                                <div class="col-4 col-lg-12 text-center mt-lg-2">
                                    <img src="resources/noimage.png" class="img-thumbnail" style="border: none;" />
                                </div>
                                <div class="col-4 col-lg-12 text-center mt-lg-2">
                                    <img src="resources/noimage.png" class="img-thumbnail" style="border: none;" />
                                </div>
                        
                        <?PHP
                    }
                    
                    
                    ?>
                               
                            </div>
                        </div>

                        <div class="col-12 col-lg-9">
                       
                       <div class="col-lg-12 text-center mt-lg-2 mt-4">
                                <img src="<?PHP echo $i_data["img_path"];?>" class="img-thumbnail" style="border: none;" />
                            </div>
                        <?PHP
                        
                        
                        
                        ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-1">
                    <h1 class="d-none">SPACE</h1>
                </div>

                <div class="col-12 col-lg-5">

                <?PHP
                
               $p_rs =  Database::search("SELECT* FROM `product` WHERE `id` = '".$pid."'");
               $p_data = $p_rs->fetch_assoc();
                
                ?>

                    <div class="col-12 mt-4">
                        <h1 style="font-size: 23px; font-family: sans-serif;"><?PHP echo $p_data["title"];?></h1>
                    </div>
                    <div class="col-12 mt-4">
                        <div class="row">
                            <div class="col-5 col-lg-3">
                                <h1 style="font-size: 30px; font-family: sans-serif;">Rs.<?PHP echo $p_data["price"];?>.00</h1>
                            </div>

                            <?PHP
                            $c_price = $p_data["price"];
                            $discount = $c_price * 10/100;
                            $n_price = $c_price + $discount;

                            
                            ?>

                            <div class="col-4 mt-1 mt-lg-2 ms-5">
                                <p style="font-size: 19px; font-family: sans-serif; color: red; text-decoration: line-through;">Rs.<?PHP echo $n_price?>.00</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 mt-2 p-3 text-warning " style="background-color: #ff001f; border-radius: 10px;">

                        <h1 style="font-size: 19px; font-family: sans-serif;"><i class="bi bi-truck text-black"></i>&nbsp;&nbsp;Delivery By 12 - 14 Days </h1>

                        <h1 style="font-size: 19px; font-family: sans-serif;"><i class="bi bi-coin text-black"></i>&nbsp;&nbsp;Delivery Cost : Rs.<?PHP echo $p_data["d_cost"];?>.00 </h1>

                    </div>

                    <div class="col-12">

                        <div class="row mt-4">
                            <div class="col-6 col-lg-5">
                                <p style="font-size: 19px; font-family: sans-serif; color: green; ">1<?PHP echo $p_data["qty"];?> Items Available</p>
                            </div>
                            <div class="col-6">
                                <div class="row text-warning" style="font-size: 19px;">
                                    <div class="col-1">
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="col-1">
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="col-1">
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="col-1">
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="col-1">
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="col-1">
                                        <p class="text-black">5/5</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-12 ">


                        <div class="col-6 col-lg-5">

                        </div>

                        <?PHP
                        
                       $c_rs =  Database::search("SELECT * FROM `color` WHERE `id` = '".$p_data["color_id"]."'");
                       $c_data = $c_rs->fetch_assoc();

                       $si_rs =  Database::search("SELECT * FROM `size` WHERE `id` = '".$p_data["size_id"]."'");
                       $si_data = $si_rs->fetch_assoc();

                       $st_rs =  Database::search("SELECT * FROM `storage` WHERE `id` = '".$p_data["storage_id"]."'");
                       $st_data = $st_rs->fetch_assoc();



                        
                        
                        
                        ?>

                        <div class="row justify-content-center">


                        <?PHP
                        if(isset($p_data["color_id"])){

                            ?>

                         <div class="col-4">
                                <p style="font-size: 17px; font-family: sans-serif;  ">Colour:</p>
                                <button class="btn btn-primary text-primary" <?PHP echo $c_data["name"];?>></button>
                            </div>

                            <?PHP


                        }

                        if(isset($p_data["size_id"])){
                         
                            ?>


                            <div class="col-4">
                                <p style="font-size: 17px; font-family: sans-serif;  ">Size:</p>
                                <button class="btn btn-outline-dark"><?PHP echo $si_data["name"];?></button>
                            </div>


                            <?PHP

                        }

                        if(isset($p_data["size_id"])){

                            ?>
                          <div class="col-2">
                                <p style="font-size: 17px; font-family: sans-serif;  ">Storage:</p>
                                <button class="btn btn-outline-dark"><?PHP echo $st_data["name"];?>GB</button>
                            </div>
                            <?PHP
                        }
                        
                        ?>
                           

                          

                        </div>


                    </div>



                   
                    <hr>
                    <div class="col-12 mt-4 mb-3">

                        <div class="row" style="font-family: Quicksand;">
                            <div class="col-6 d-grid">
                                <button class="btn btn-warning" type="submit" id="payhere-payment" onclick="buyNow('<?PHP echo $pid;?>');">Buy Now</button>
                            </div>
                            <div class="col-6 d-grid">
                            
                            <button class="btn btn-primary" onclick="addToCard('<?php echo $p_data['id']; ?>');">Add To Cart</button>
                            </div>
                        </div>

                    </div>


                </div>
            </div>

        </div>
    </div>

    <hr>

    <div class="col-12 overflow-hidden">
        <div class="container-fluid">
            <div class="col-12">
                <p style="font-size: 23px; font-family: Quicksand;  ">Product Description :</p>

                <p><?PHP echo $p_data["description"]?></p>
            </div>

        </div>
    </div>

        <?PHP

     
    }
    
    
    ?>
    
    
   
    

</body>
<?PHP include "footer.php"; ?>

</html>