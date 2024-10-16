<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>

<body>
    <?PHP include "adminheader.php" ?>

    <div class="col-12">
        <div class="container-fluid">
            <div class="col-12 col-lg-7 mx-auto p-5 mt-4 mb-4" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                
            <div class="row">
            <div class="col-6">
                    <label class="form-label">Product title</label>
                    <input type="text" class="form-control" id="title">
                </div>

            <div class="col-6">
                
            <label class="form-label">Select Brand</label>
<select class="form-select" id="brand">
    <option value="0">Select Brand</option>

    <?PHP
   

    $brand_rs = Database::search("SELECT * FROM `brand`");
    $brand_num = $brand_rs->num_rows;

    for ($x = 0; $x < $brand_num; $x++) {
        $brand_data = $brand_rs->fetch_assoc();
    ?>
        <option value="<?php echo $brand_data['id']; ?>"><?php echo $brand_data['name']; ?></option>
    <?PHP
    }
    ?>
</select>
                    </div>
            </div>
            
                <div class="row mt-3">
                    <div class="col-6">
                        <label class="form-label">Product price</label>
                        <input type="text" class="form-control" id="price">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Available items</label>
                        <input type="text" class="form-control" id="qty">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <label class="form-label">Delivery Cost</label>
                        <input type="text" class="form-control" id="dcost">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Select Storage</label>
                        <select class="form-select" id="storage">
    <option value="0">Select Storage</option>
    <?php
    // Execute the SQL query
    $storage_rs = Database::search("SELECT * FROM `storage`");
    // Fetch the number of rows returned
    $storage_num = $storage_rs->num_rows;

    // Loop through each row and create an option
    for ($x = 0; $x < $storage_num; $x++) {
        $storage_data = $storage_rs->fetch_assoc();
        ?>
        <option value="<?php echo $storage_data['id']; ?>"><?php echo $storage_data['name']; ?></option>
        <?php
    }
    ?>
</select>
                    </div>
                </div>


                <div class="row mt-3">

                    <div class="col-6">
                        <label class="form-label">Select Colour</label>
                        <select class="form-select" id="color">
    <option value="0">Select Colour</option>
    <?php
    // Execute the SQL query
    $color_rs = Database::search("SELECT * FROM `color`");
    // Fetch the number of rows returned
    $color_num = $color_rs->num_rows;

    // Loop through each row and create an option
    for ($x = 0; $x < $color_num; $x++) {
        $color_data = $color_rs->fetch_assoc();
        ?>
        <option value="<?php echo $color_data['id']; ?>"><?php echo $color_data['name']; ?></option>
        <?php
    }
    ?>
</select>
                    </div>



                    <div class="col-6">
                        <label class="form-label">Select size</label>
                        <select class="form-select" id="size">
    <option value="0">Select size</option>
    <?php
    // Execute the SQL query
    $size_rs = Database::search("SELECT * FROM `size`");
    // Fetch the number of rows returned
    $size_num = $size_rs->num_rows;

    // Loop through each row and create an option
    for ($x = 0; $x < $size_num; $x++) {
        $size_data = $size_rs->fetch_assoc();
        ?>
        <option value="<?php echo $size_data['id']; ?>"><?php echo $size_data['name']; ?></option>
        <?php
    }
    ?>
</select>

                    </div>

                </div>

                <div class="col-12 mt-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                    <textarea class="form-control" id="desc" rows="3"></textarea>
                </div>

                <div class="row mt-3">
                    <div class="col-4">
                        <img src="resources/noimage.png" class="img-thumbnail" id="i0" />
                    </div>
                    <div class="col-4">
                        <img src="resources/noimage.png" class="img-thumbnail" id="i1"/>
                    </div>
                    <div class="col-4">
                        <img src="resources/noimage.png" class="img-thumbnail" id="i2"/>
                    </div>
                </div>
                <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                    <input type="file" class="d-none" multiple id="imageuploader" />
                    <label for="imageuploader" class="col-12 btn btn-primary" onclick="uplodimage();">Upload Images</label>
                </div>

                <div class="col-12 d-grid mt-5">
                    <button class="btn btn-success" onclick="addproduct();">Add Product</button>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <?PHP include "footer.php";?>
</body>

</html>