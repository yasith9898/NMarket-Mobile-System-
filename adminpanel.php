<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>

<body>
    <?PHP include "adminheader.php";
  

    if(isset($_SESSION["a"])){

        ?>
         <div class="col-12">
        <div class="row mx-auto p-2 p-lg-5 gap-3 justify-content-center" style="background-color: black;">
            <div class="col-12 col-lg-3 text-center p-2 p-lg-5" style="background-color: white;">

            <?php
           $u_rs = Database::search("SELECT *FROM `user`");
           $u_num = $u_rs->num_rows;



            ?>
                <h3>Total Users : <?PHP echo $u_num;?></h3>
            </div>
            <div class="col-12 col-lg-3 text-center p-2 p-lg-5" style="background-color: white;">

            <?php
           $p_rs = Database::search("SELECT *FROM `product`");
           $p_num = $u_rs->num_rows;



            ?>
                <h3>Total Products :  <?PHP echo $p_num;?></h3>
            </div>
            <div class="col-12 col-lg-3 text-center p-2 p-lg-5" style="background-color: white;">

            <?php
           $o_rs = Database::search("SELECT *FROM `invoice` WHERE `status` = '1'");
           $o_num = $o_rs->num_rows;



            ?>
                <h3>Orders to deliver : <?PHP echo $o_num;?></h3>
            </div>
        </div>
    </div>
    <?PHP include "footer.php";?>
        <?PHP


    }else{

        ?>
        <script>window.location = "adminlogin.php";</script>

        <?PHP
    }

    ?>

   

</body>

</html>