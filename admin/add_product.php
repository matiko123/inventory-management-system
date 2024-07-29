<?php
require_once '../control/connection.php';
$id=$_GET['id'];
if($_SERVER["REQUEST_METHOD"]=="POST"){

  $name=$_POST['name'];
  $description=$_POST['description'];
  $price=$_POST['price'];
  $quantity=$_POST['quantity'];
  $dimensions=$_POST['dimensions'];
  $manufactury=$_POST['manufactury'];
  $expiry=$_POST['expiry'];

  $sql="insert into products (name,description,price,quantity,dimensions,manufactury,expiry) values('$name','$description','$price','$quantity','$dimensions','$manufactury','$expiry') ";
  if ($conn->query($sql) === TRUE) {
   
     echo "<script>window.location.href='product_management.php?id=$id && success'</script>";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Add New Product</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../style.css">
    
</head>

<body  style="background-color: #745C44;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row"  style="background-color:#E1C3AB!important">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image " style="background-image: url(&quot;../img/profile.png&quot;);">
                                    <div class="card shadow-lg" style="width: 22rem;background-color: #9651239f;color: white;margin-top: 6cm;margin-bottom: 3cm;margin-left: 1.8cm;border:3px solid rgba(167, 73, 6, 0.253);">
                                        <div class="card-body shadow-lg ">
                                          <h5 class="card-title container" style="font-size:45px;"><center>Add New Product</center></h5>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card container" style=" background-color: #a84702b6;color: white;margin-top: 0cm;border-radius: 10px;margin-bottom: 0cm;">
                                    <div class="card-body">
                                      <p class="card-text">
                                        <div class="row">
                        
                                          <form class="user" method="post">
                                           
                                            <div class="mb-3">
                                              <label class="form-control-user label">Product Name</label>
                                              <input class="form-control form-control-user myinput inputradius" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Product Name" name="name" >
                                            </div>
                                            <div class="mb-3">
                                              <label class="form-control-user label">Product Description</label>
                                              <textarea class="form-control form-control-user"  id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Descriptiions" name="description" style="color: chocolate;height: 2cm;border-radius: 16px;"></textarea>
                                            </div>
                                            <div class="row mb-3">
                                              <div class="col-sm-6 mb-3 mb-sm-0 "><label class="label">Price</label></div>
                                              <div class="col-sm-6  "><label class="label">Stock Quantity</label></div>
                                          </div>
                                            <div class="row mb-3">
                                              <div class="col-sm-6 mb-3 mb-sm-0 myinput doubleinput"><input class="form-control form-control-user inputradius" type="number" id="exampleFirstName" placeholder="Enter price" name="price"></div>
                                              <div class="col-sm-6 myinput doubleinput"><input class="form-control form-control-user inputradius" type="number" id="exampleFirstName" placeholder="Enter Quantity" name="quantity"></div>
                                          </div>
                                          <div class="mb-3">
                                            <label class="form-control-user label">Dimensions</label>
                                            <input class="form-control form-control-user myinput inputradius" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Dimensions" name="dimensions" >
                                          </div>
                                          <div class="row mb-3">
                                            <div class="col-sm-6 mb-3 mb-sm-0 "><label class="label">Manufacturing Date</label></div>
                                            <div class="col-sm-6 " ><label class="label">Expiry Date</label></div>
                                        </div>
                                          <div class="row mb-3">
                                            <div class="col-sm-6 mb-3 mb-sm-0 myinput doubleinput"><input class="form-control form-control-user inputradius" type="date" id="exampleFirstName"  name="manufactury"></div>
                                            <div class="col-sm-6 myinput doubleinput"><input class="form-control form-control-user inputradius" type="date" id="exampleFirstName" name="expiry" ></div>
                                        </div>
                                            <div class="row mb-3">
                                            </div><button class="btn btn-primary d-block btn-user w-100 chocolate button" type="submit" style="font-size: 30px;border: transparent;height: 1.3cm;">REGISTER</button>
                                        </form>
                                          </div>
                                      </p>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>