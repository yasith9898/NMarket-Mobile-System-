



    function register(){

        var name = document.getElementById("name").value;
        
        var email= document.getElementById("email").value;
        
        var password= document.getElementById("password").value;
        
        var form= new FormData();
        
        form.append("n", name);
        form.append("e", email); 
        form.append("p", password);
        
        var request = new XMLHttpRequest();
        
        request.onreadystatechange = function(){
        
        if(request.readyState == 4 && request.status == 200) {
        
        var response = request.responseText;

        if(response == "success"){

            document.getElementById("error").className = "d-block text-success";
            document.getElementById("error").innerHTML = "Succesfully Regsterd !";
            window.location = "login.php";
        }else{

            document.getElementById("error").className = "d-block text-danger";
            document.getElementById("error").innerHTML = response;
        }
        
      
        
        }
    }
        request.open("POST", "registerProcess.php", true);
        
        request.send(form);

    }

    function login() {
        var email = document.getElementById("email").value;
        var password = document.getElementById("password").value;
        var remember = document.getElementById("remember");

        var form = new FormData();

        form.append("e", email);
        form.append("p", password);
        form.append("r", remember.checked);

        
        
        var request = new XMLHttpRequest(); // Make sure to create the XMLHttpRequest object

        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) { // Corrected the logical operator to &&
                var response = request.responseText;
        
                if (response.trim() == "success") { // Added .trim() to avoid any extra whitespace issues
                    window.location = "index.php";
                } else {
                    document.getElementById("error").className = "d-block mt-1 mb-1 text-danger";
                    document.getElementById("error").innerHTML = response;
                }
            }
        }
        request.open("POST", "loginProcess.php", true);
        request.send(form);
    }
     
    var rm;

    function frogotpassword(){ 

        var email = document.getElementById("email").value;

        var request = new XMLHttpRequest();
        
        request.onreadystatechange = function(){
        
        if(request.readyState == 4 && request.status == 200) {
        
        var response = request.responseText;

     if(response=="sucses"){
        var rmodal= document.getElementById("rmodal");
        rm= new bootstrap.Modal(rmodal);
        rm.show();

     }else{
        document.getElementById("error").className = "d-block mt-1 mb-1 text-danger";
        document.getElementById("error").innerHTML=response;
     }
    }

}
request.open("GET", "forgotProcess.php?e=" + email, true);
        request.send();
}

function viewpassword(){

    var np = document.getElementById("npw");
    var v1 = document.getElementById("v1");


    if(np.type == "password"){
        np.type = "text";
        v1.innerHTML = "Hide";
    }else{
        np.type = "password";
        v1.innerHTML = "view";
    }
}

function viewpassword1(){

    var cp = document.getElementById("cpw");
    var v2 = document.getElementById("v2");


    if(cp.type == "password"){
        cp.type = "text";
        v2.innerHTML = "Hide";
    }else{
        cp.type = "password";
        v2.innerHTML = "view";
    }
}

function changepassword(){

    var npw = document.getElementById("npw").value;
    var cpw = document.getElementById("cpw").value;
    var vcode = document.getElementById("vcode").value;

    var form = new FormData();

        form.append("n", npw);
        form.append("c", cpw);
        form.append("v", vcode);

        var request = new XMLHttpRequest(); // Make sure to create the XMLHttpRequest object

        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {

                var response = request.responseText;

                if(response=="success"){

                    window.location.reload();

                }else{
                    document.getElementById("error1").className = "d-block mt-1 mb-1 text-danger";
                    document.getElementById("error1").innerHTML=response;
                 }       


            }
        }

        

        request.open("POST", "changepwprocess.php", true);
        request.send(form);
}


function logout(){
    var request = new XMLHttpRequest(); // Make sure to create the XMLHttpRequest object

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {

            var response = request.responseText;
            

            if(response == "success"){
                window.location.reload();
            }else{
                alert(response);
            }
        }
    }
   
    request.open("GET", "logoutProcess.php", true);
    request.send();
}

function updateuserdetails(){
    var address = document.getElementById("address").value;
    var mobile = document.getElementById("mobile").value;


    var form = new FormData();

    form.append("a", address);
    form.append("m", mobile);

    var request = new XMLHttpRequest(); // Make sure to create the XMLHttpRequest object

        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200){ 
    
                var response = request.responseText;

                if(response=="success"){

                    window.location.reload();

                }else{
                    document.getElementById("error").className = "d-block mt-1 mb-1 text-danger";
                    document.getElementById("error").innerHTML=response;
                 }       

}
}

request.open("POST", "upsateUserDetails.php", true);
request.send(form);
}


function addproduct(){

    var title = document.getElementById("title").value;
    var brand = document.getElementById("brand").value;
    var price = document.getElementById("price").value;
    var qty = document.getElementById("qty").value;
    var dcost = document.getElementById("dcost").value;
    var size = document.getElementById("size").value;
    var color = document.getElementById("color").value;
    var storage = document.getElementById("storage").value;
    var desc = document.getElementById("desc").value;
    var image = document.getElementById("imageuploader");


    var form = new FormData();

    form.append("t", title);
    form.append("b", brand);
    form.append("p", price);
    form.append("q", qty);
    form.append("c", dcost);
    form.append("si", size);
    form.append("co", color);
    form.append("st", storage);
    form.append("d", desc);
    
    var file_count = image.files.length;

    for (var x = 0; x < file_count; x++) {
        form.append("image" + x, image.files[x]);
    }
    var request = new XMLHttpRequest(); 



    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            
            if(response == "success"){
                window.location.reload();
            }else{
                alert(response);
            }
            
        }
}

request.open("POST", "addProductProcess.php", true);
request.send(form);

}    

function uplodimage(){

    var image = document.getElementById("imageuploader");

    image.onchange = function(){
        var file_count = image.files.length;

        if(file_count <= 3){
            
    for (var x = 0; x < file_count; x++) {
       
        var file = this.files[x];
        var url = window.URL.createObjectURL(file);

        document.getElementById("i" + x).src = url;
    }

        }else{
            alert(file_count + "images,plese upload 3 or lesss");
        }
    }
}

function addToWatchlist(pid){

    var request = new XMLHttpRequest(); 



    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            
            
                alert(response);
                window.location.reload();
            
            
        }
}

request.open("GET","addToWatchlistProcess.php?pid=" + pid,true)
request.send();

}

function addToCard(pid){

    var request = new XMLHttpRequest(); 



    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            
            
                alert(response);
                window.location.reload();
            
            
        }
}

request.open("GET","addToCartProcess.php?pid=" + pid,true)
request.send();

}


function remove(type,id){

   var type = type;
   var id = id;

   var form = new FormData();

   form.append("t",type);
   form.append("i",id);

   
   var request = new XMLHttpRequest(); // Make sure to create the XMLHttpRequest object

   request.onreadystatechange = function() {
       if (request.readyState == 4 && request.status == 200) {

           var response = request.responseText;
           

          
               alert(response);
               window.location.reload();
           
       }
   }

   request.open("POST","removeProcess.php",true)
   request.send(form);

}


function search(){
    
    var tag = document.getElementById("tag").value;

    var request = new XMLHttpRequest(); // Make sure to create the XMLHttpRequest object

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
 
            var response = request.responseText;
            
 
           
            document.getElementById("search_area").innerHTML = response;
            
        }
    }

    request.open("GET","searchProcess.php?tag=" + tag,true);
   request.send();


}


function buyNow(id){

    var request = new XMLHttpRequest(); // Make sure to create the XMLHttpRequest object

   request.onreadystatechange = function() {
       if (request.readyState == 4 && request.status == 200) {

           var response = request.responseText;
           
           var obj = JSON.parse(response);
           var item = obj["item"];
           var total = obj["amount"];

          
              if(response == 1){

                alert("please update Address And Mobile Details");
              }else if(response == 2){

                alert("plase login First");
              }else{
 // Payment completed. It can be a successful failure.
 payhere.onCompleted = function onCompleted(orderId) {
    console.log("Payment completed. OrderID:" + orderId);
   
    alert("order Successfull Your Order Id: " + orderId);

    saveInvoice(orderId,item,total);
};

// Payment window closed
payhere.onDismissed = function onDismissed() {
    // Note: Prompt user to pay again or show an error page
    console.log("Payment dismissed");
};

// Error occurred
payhere.onError = function onError(error) {
    // Note: show an error page
    console.log("Error:"  + error);
};

// Put the payment variables here
var payment = {
    "sandbox": true,
    "merchant_id": obj["m_id"],    // Replace your Merchant ID
    "return_url": 'http://localhost/nmarket/index.php',     // Important
    "cancel_url": 'http://localhost/nmarket/index.php',      // Important
    "notify_url": "http://sample.com/notify",
    "order_id": obj["id"],
    "items": obj["item"],
    "amount": obj["amount"],
    "currency": "LKR",
    "hash": obj["hash"],// *Replace with generated hash retrieved from backend
    "first_name": obj["fname"],
    "last_name": obj["lname"],
    "email": obj["email"],
    "phone": obj["mobile"],
    "address": obj["address"],
    "city": "Colombo",
    "country": "Sri Lanka",
    "delivery_address": obj["address"],
    "delivery_city": "Kalutara",
    "delivery_country": "Sri Lanka",
    "custom_1": "",
    "custom_2": ""
};

// Show the payhere.js popup, when "PayHere Pay" is clicked
//document.getElementById('payhere-payment').onclick = function (e) {
    payhere.startPayment(payment);
//};

              }
             
           
       }
   }
   request.open("GET", "buyNowProcess.php?id=" + id, true);
   
   request.send();



}


function saveInvoice(oid,item,total){


    var form = new FormData();

    form.append("oi",oid);
    form.append("it",item);
    form.append("to",total);

    
    var request = new XMLHttpRequest(); // Make sure to create the XMLHttpRequest object

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
 
            var response = request.responseText;

            if(response == "success"){

                window.location = "index.php";
            }
            
           alert(response);
           
            document.getElementById("search_area").innerHTML = response;
            
        }
    }

    request.open("POST","saveInvoiceProcess.php",true)
    request.send(form);
 
}

function adminlogin() {
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    

    var form = new FormData();

    form.append("e", email);
    form.append("p", password);
    

    
    
    var request = new XMLHttpRequest(); // Make sure to create the XMLHttpRequest object

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) { // Corrected the logical operator to &&
            var response = request.responseText;
    
            if (response.trim() == "success") { // Added .trim() to avoid any extra whitespace issues
                window.location = "adminpanel.php";
            } else {
                document.getElementById("error").className = "d-block mt-1 mb-1 text-danger";
                document.getElementById("error").innerHTML = response;
            }
        }
    }
    request.open("POST", "adminloginProcess.php", true);
    request.send(form);
}

function adminLogout(){

    var request = new XMLHttpRequest(); // Make sure to create the XMLHttpRequest object

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {

            var response = request.responseText;
            

            if(response == "success"){
                window.location.reload();
            }else{
                alert(response);
            }
        }
    }
   
    request.open("GET", "adminlogoutProcess.php", true);
    request.send();

}


function changeStatus(st,id){

    var form = new FormData();

    form.append("s", st);
    form.append("i", id);

    var request = new XMLHttpRequest(); // Make sure to create the XMLHttpRequest object

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {

            var response = request.responseText;

            if(response == "success"){
                window.location.reload();
            }else{
                alert(response);
            }
            
        }
    }
    request.open("POST", "changeStatusProcess.php", true);
    request.send(form);

}
