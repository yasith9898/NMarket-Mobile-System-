<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>N-market</title>
</head>

<body>
    <?PHP include "header.php"; ?>

    <div class="col-12">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="resources/1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="resources/2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="resources/3.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <div class="col-12">
        <div class="container-fluid ">
            <div class="row p-4 bg-black">
                <div class="col-12 col-lg-5 text-white">
                    <h3>Start Shopping Now... Search Here</h3>
                </div>
                <div class="col-9 col-lg-5">
                    <input class="form-control" type="text" placeholder="Search" id="tag" aria-label="default input example">
                </div>
                <div class="col-2 ">
                    <button class="btn btn-warning" onclick="search();">Search</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="container-fluid" id="search_area">
            <div class="row p-3 pt-4 pb-5 justify-content-center gap-3">
<?PHP

$p_rs = Database::search("SELECT * FROM `product`");
$p_num = $p_rs->num_rows;

for($x = 0;$x < $p_num; $x++){

    $p_data = $p_rs->fetch_assoc();

   $i_rs =  Database::search("SELECT * FROM `product_images` WHERE `product_id` = '".$p_data["id"]."'");

   $i_data = $i_rs->fetch_assoc();



    ?>
<div class="card col-12 col-lg-4" style="width: 18rem; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">
                    <img src="<?PHP echo $i_data["img_path"]?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?PHP echo $p_data["title"];?></h5>
                        <h3 style="font-size: 22px;">Rs.<?PHP echo $p_data["price"];?>.00</h3>
                        <p class="text-success"><?PHP echo $p_data["qty"];?> Items Available</p>
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
        </div>
    </div>
<?PHP include "footer.php";?>
</body>

</html>