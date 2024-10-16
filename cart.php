<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>

<body>
    <?PHP include "header.php";
    if(isset($_SESSION["u"])){

        ?>
<div class="col-12">
        <div class="container-fluid">
            <div class="row pt-5 pb-5">
                <div class="col-12 col-lg-8">

                    <div class="row justify-content-center gap-3">

                           <?PHP 

                           $total = 0;
                           $delivery = 0;
                          
                           
                          $c_rs =  Database::search("SELECT * FROM `cart` WHERE `user_id` = '".$_SESSION["u"]["id"]. "'");
                          $c_num = $c_rs->num_rows;


                          for($x = 0; $x < $c_num; $x++){

                            $c_data = $c_rs->fetch_assoc();

                            $p_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$c_data["product_id"]."'");
                            $p_data = $p_rs->fetch_assoc();

                            $i_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '".$p_data["id"]."'");
                            $i_data = $i_rs->fetch_assoc();


                            $currentTotal = $p_data["price"] * $c_data["qty"];
                            $total = $total + $currentTotal;

                            $delivery = $delivery + $p_data["d_cost"];

                            








            


                            ?>
 <div class="card col-12 col-lg-4" style="width: 18rem; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                            <img src="<?PHP  echo $i_data["img_path"];?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?PHP echo $p_data["title"];?></h5>
                                <h3 style="font-size: 22px;">Rs.<?PHP echo $p_data["price"];?>.00</h3>
                                <p class="text-success"><?PHP echo $c_data["qty"];?> Items</p>
                                <div class="col-12 d-grid mt-2">
                                    <button class="btn btn-primary">
                                        Buy Now
                                    </button>
                                </div>
                                <div class="col-12 d-grid mt-2">
                                    <button class="btn btn-dark" onclick="addToWatchlist('<?PHP echo $p_data['id'];?>');">
                                        <i class="bi bi-heart"></i>&nbsp; Add To Watchlist
                                    </button>
                                </div>
                                <div class="col-12 d-grid mt-2">
                                    <button class="btn btn-danger" onclick="remove(2,'<?PHP echo $c_data['id'];?>');" >
                                        remove
                                    </button>
                                </div>

                            </div>
                        </div>


                    </div>

                </div>
                            <?PHP
                          }
                           
                           
                           
                           ?>

                       
                <div class="col-12 col-lg-4 text-center mt-4 mt-lg-0" style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

                    <div class="col-12 pt-2 pb-2 text-primary">
                        <h3> <i class="bi bi-cart2"></i>&nbsp;Cart</h3>
                        <hr>
                    </div>
                    <div class="col-12 mt-3" style="font-family: sans-serif;">
                        <h4><?PHP echo $c_num;?> Items</h4>
                        <h4>Price : <?PHP echo $total;?>.00</h4>
                        <h4>Delivery : Rs.<?PHP echo $delivery;?>.00</h4>
                    </div>
                    <hr>
                    <div class="col-12 pt-3 pb-3" style="background-color: lightgray;">

                        <h4>Subtotal : Rs.<?PHP echo  $total + $delivery;?>.00</h4>

                    </div>
                    <hr>
                    <div class="col-12 d-grid pb-4">
                        <button class="btn btn-primary">Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <?PHP
    }else{

        ?>
           <script>window.location = "login.php";</script>
        <?PHP
    }
    
    
    ?>

    
<?PHP include "footer.php";?>
</body>

</html>