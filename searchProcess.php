<?PHP

include "connection.php";

$tag = $_GET["tag"];

$p_rs = Database::search("SELECT * FROM `product` WHERE `title` LIKE '%".$tag."%'");

$p_num = $p_rs->num_rows;
?>

<div class="row p-3 pt-4 pb-5 justify-content-center gap-3">
<?PHP


for($x = 0;$x < $p_num; $x++){

    $p_data = $p_rs->fetch_assoc();

   $i_rs =  Database::search("SELECT * FROM `product_images` WHERE `product_id` = '".$p_data["id"]."'");

   $i_data = $i_rs->fetch_assoc();



    ?>
<div class="card col-12 col-lg-4" style="width: 18rem; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <img src="<?PHP echo $i_data["img_path"]?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?PHP echo $p_data["title"];?></h5>
                        <h3 style="font-size: 22px;">Rs.<?PHP echo $p_data["price"];?>00</h3>
                        <p class="text-success"><?PHP echo $p_data["qty"];?>Items Available</p>
                        <div class="col-12 d-grid mt-2">
                        <a href='<?PHP echo "singleproductview.php?id=" . ($p_data["id"]); ?>' class="btn btn-primary">Buy Now</a>
                        
                        </div>

                        <?PHP
                        
                        if(isset($_SESSION["u"])){
                            ?>
                            <div class="col-12 d-grid mt-2">
                            <button class="btn btn-dark"  onclick="addToCard('<?PHP echo $p_data['id'];?>');">
                            <i class="bi bi-cart2"></i>&nbsp;    Add To Cart
                            </button>
                        </div>
                        <div class="col-12 d-grid mt-2">
                            <button class="btn btn-danger" onclick="addToWatchlist('<?PHP  echo$p_data['id'];?>');">
                            <i class="bi bi-heart"></i>&nbsp;   Add To Watchlist
                            </button>
                        </div>
                     <?PHP


                        }
                        
                        
                        
                        ?>
                        
                       
                    </div>
                </div>
    <?PHP
}


?>



                
            </div>