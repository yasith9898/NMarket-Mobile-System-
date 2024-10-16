<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <style>

body{
    background-image: url(resources/1.png);
    background-size: cover;
}


.logindiv{
    background-color: white;
    border-radius: 20px;
}

    </style>
</head>

<body>

    <div class="col-12" style="font-family: sans-serif;">
        <div class="container-fluid">

            <div class="col-12 col-lg-5 logindiv p-5 m-lg-5 mt-5">
                <div class="col-12">
                    <h2>Login</h2>
                </div>

                <?php
                
                $email = "";
                $password = "";

                if(isset($_COOKIE["email"])){
                    $email = $_COOKIE["email"];

                }else if(isset($_COOKIE["password"])){
                    $password = $_COOKIE["password"];
                }
                
                ?>


                <div class="col-12 mt-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email address</label>
                        <input type="email" class="form-control" placeholder="Enter Your Email" id="email" value="<?PHP echo $email?>">
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password</label>
                        <input type="password" class="form-control" placeholder="Enter Your Password" id="password" value="<?PHP echo $password;?>">
                    </div>
                </div>

                <p id="error" class="d-none mt-1 mb-1 text-danger"></p>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="remember">
                           
                                Rememberme
                            </label>
                        </div>
                    </div>
                    <div class="col-6 text-end">
                       <p style="cursor: pointer;" onclick="frogotpassword();"  >Forgot Password?</p>
                    </div>
                </div>
                <div class="col-12 d-grid">
                    <button class="btn btn-primary" onclick="login();">Login Now</button>
                </div>
                <div class="col-12 text-center mt-2">
                    <p onclick="window.location = 'register.php';" style="cursor: pointer;">Don"t have an account? Register Now</p>
                </div>
                <div class="modal" tabindex="-1" id="rmodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reset Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <p id="error1" class="d-none mt-1 md-1 text-danger"></p>
      <div class="col-12">
      <div class="input-group mb-3">
  
  <input type="password" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="new password" id="npw">
  <span class="input-group-text" id="v1"onclick="viewpassword();">View</span>
</div>
      </div>
      <div class="col-12">
      <div class="input-group mb-3">
  
  <input type="password" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="comperm password" id="cpw">
  <span class="input-group-text" id="v2" onclick="viewpassword1();" >View</span>
</div>
      </div>
      <div class="col-12">
      <div class="input-group mb-3">
  
  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" placeholder="verfication code" id="vcode">
  
</div>
      </div>

      <h5 class="text-success">plese check your email</h5>
      </div>
      <div class="modal-footer">
       
        <button type="button" class="btn btn-primary" onclick="changepassword();">Save changes</button>
      </div>
    </div>
  </div>
</div>
               
</div>
            </div>

        </div>
    
    <script  src="script.js"></script>
</body>

</html>