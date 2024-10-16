<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watchlist</title>
</head>
<body>
    <?PHP include "header.php";
    
    if(isset($_SESSION["u"])){

        ?>

<div class="col-12">
        <div class="container-fluid">
            <div class="row justify-content-center gap-3 p-4">

            <?PHP
            
            $w_rs = Database::search("SELECT * FROM `watchlist` WHERE `user_id` = '".$_SESSION["u"]["id"]."'");
            $w_num = $w_rs->num_rows;

            for($x = 0;$w_num > $x; $x++){

                $w_data = $w_rs->fetch_assoc();

                $p_rs = Database::search("SELECT * FROM `product` WHERE `id` = '".$w_data["product_id"]."'");
                $p_data = $p_rs->fetch_assoc();

                $i_rs = Database::search("SELECT * FROM `product_images` WHERE `product_id` = '".$p_data["id"]."'");
                $i_data = $i_rs->fetch_assoc();



                ?>
 <div class="card col-12 col-lg-4" style="width: 18rem; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <img src="<?PHP  echo $i_data["img_path"];?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?PHP echo $p_data["title"];?></h5>
                        <h3 style="font-size: 22px;">Rs.<?PHP echo $p_data["price"];?>.00</h3>
                        <p class="text-success"><?PHP echo $p_data["qty"];?> Items Available</p>
                        <div class="col-12 d-grid mt-2">
                            <button class="btn btn-primary">
                                Buy Now
                            </button>
                        </div>
                        <div class="col-12 d-grid mt-2">
                            <button class="btn btn-dark" onclick="addToCard('<?PHP echo $p_data['id'];?>')" >
                            <i class="bi bi-cart2"></i>&nbsp;    Add To Cart
                            </button>
                        </div>
                        <div class="col-12 d-grid mt-2">
                            <button class="btn btn-danger" onclick="remove(1,'<?PHP echo $w_data['id'];?>');">
                            remove
                            </button>
                        </div>
                       
                    </div>
                </div>
           
                <?php
            }
            
            
            ?>
            
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