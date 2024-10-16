<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Order</title>
</head>

<body>
    <?PHP include "adminheader.php"; ?>

    <div class="col-12">
        <div class="row justify-content-center gap-2 pt-5 pb-4">

        <?PHP
        
        $i_rs = Database::search("SELECT * FROM `invoice`");
        $i_num = $i_rs->num_rows;

        for($x = 0; $x < $i_num; $x++){

            $i_data = $i_rs->fetch_assoc();

            ?>
 <div class="card col-12 col-lg-4 mb-3" style="width: 18rem; border: none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;">

<div class="card-body">
    <h5 class="card-title" style="font-size: 22px;"><?PHP echo $i_data["title"];?></h5>
    <h3 style="font-size: 17px;">Order ID : <?PHP echo $i_data["id"];?></h3>
    <h3 style="font-size: 17px;">Date : <?PHP echo $i_data["date"];?></h3>
    <h3 style="font-size: 17px;">Total : Rs.<?PHP echo $i_data["total"];?>.00</h3>
   
    <?php
    if ($i_data["status"] == 1) {
?>
        <button class="btn btn-warning" onclick="changeStatus('<?php echo $i_data['status']; ?>', '<?php echo $i_data['id']; ?>')">Delivered</button>
<?php
    } elseif ($i_data["status"] == 2) {
?>
        <button class="btn btn-success" onclick="changeStatus('<?php echo $i_data['status']; ?>', '<?php echo $i_data['id']; ?>')">Received</button>
<?php
    } 
?>

    

</div>
</div>
  <?PHP  
  
        }
?>
           
        </div>

    </div>

</body>
<?PHP include "footer.php";?>
</html>