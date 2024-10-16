<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Products</title>
</head>

<body>
    <?PHP include "adminheader.php" ?>

    <div class="col-12">
        <div class="container-fluid">
            <div class="col-12 col-lg-7 mx-auto p-5 mt-4 mb-4" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                <div class="col-12">
                    <label class="form-label">Product title</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <label class="form-label">Product price</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Available items</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <label class="form-label">Delivery Cost</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1">
                    </div>

                    <div class="col-6">
                        <label class="form-label">Select Storage</label>
                        <select class="form-select">
                            <option selected>Select Storage</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>


                <div class="row mt-3">

                    <div class="col-6">
                        <label class="form-label">Select Colour</label>
                        <select class="form-select">
                            <option selected>Select Colour</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>



                    <div class="col-6">
                        <label class="form-label">Select size</label>
                        <select class="form-select">
                            <option selected>Select size</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                </div>

                <div class="col-12 mt-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>

                <div class="row mt-3">
                    <div class="col-4">
                        <img src="resources/noimage.png" class="img-thumbnail" />
                    </div>
                    <div class="col-4">
                        <img src="resources/noimage.png" class="img-thumbnail" />
                    </div>
                    <div class="col-4">
                        <img src="resources/noimage.png" class="img-thumbnail" />
                    </div>
                </div>
                <div class="offset-lg-3 col-12 col-lg-6 d-grid mt-3">
                    <input type="file" class="d-none" multiple id="imageuploader" />
                    <label for="imageuploader" class="col-12 btn btn-primary">Upload Images</label>
                </div>

                <div class="col-12 d-grid mt-5">
                    <button class="btn btn-success">Update Product</button>
                </div>
            </div>
        </div>
    </div>
    <?PHP include "footer.php";?>
</body>

</html>