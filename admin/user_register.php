<?php
$id=$_GET['id'];
require_once '../control/connection.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
  $name=$_POST['name'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  $role=$_POST['role'];
  $passwordhash=password_hash($password,PASSWORD_DEFAULT);

  $sql="insert into admin (name,email,password,role) values('$name','$email','$passwordhash','$role') ";
  if ($conn->query($sql) === TRUE) {
   
     echo "<script>window.location.href='user_management.php?id=$id && success'</script>";
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
    <title>User Register</title>
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
                                          <h5 class="card-title container" style="font-size:45px;"><center>User Registration</center></h5>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card container" style=" background-color: #a84702b6;color: white;border-radius: 10px;">
                                    <div class="card-body">
                                      <p class="card-text">
                                        <div class="row">
                        
                                          <form class="user" method="post">
                                            <div class="mb-3">
                                              <label class="form-control-user label">Full Name</label>
                                              <input class="form-control form-control-user" type="text" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Your Full Name" name="name" style="color: chocolate;height: 1.3cm;">
                                            </div>
                                            <div class="mb-3">
                                              <label class="form-control-user label">Email</label>
                                              <input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="abc@gmail.com" name="email" style="color: chocolate;height: 1.3cm;">
                                            </div>
                                            <div class="mb-3">
                                              <label class="form-control-user label">Password</label>
                                              <input class="form-control form-control-user" type="password" id="exampleInputEmail"  name="password" style="color: chocolate;height: 1.3cm;">
                                            </div>
                                            <div class="mb-3">
                                              <label class="form-control-user label">Confirm Password</label>
                                              <input class="form-control form-control-user" type="password" id="exampleInputEmail"  name="passwordconfirm" style="color: chocolate;height: 1.3cm;">
                                            </div>
                                            <div class="mb-3">
                                              <label class="form-control-user label">User Role</label>
                                              <select class="form-control form-control-user"  id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Product Name" name="role" style="color: rgb(153, 67, 6);height: 1.3cm;" >
                                                <option value='1'>Admin</option>
                                                <option value='2'>Customer Care</option>
                                              </select>
                                            </div>
                                            <div class="mb-3">
                                              <label class="form-control-user label">Upload Profile Picture</label>
                                              <div class="inputradius"  style="background-color: white;height: 1.8cm;color: chocolate;">
                                                <div style="margin-top: 0.5cm!important;position: absolute;margin-left: 25%;border:2px dotted chocolate;cursor: pointer;" onclick="upload()" id="browse">
                                                  &nbsp;
                                                Browse to Upload
                                                &nbsp;
                                                <input type="file" id="upload" style="display: none;">
                                              </div>
                                              </div>
                                            </div>
                                            <div class="row mb-3">
                                            </div><button class="btn btn-primary d-block btn-user w-100 chocolate button" type="submit" style="font-size: 30px;border: transparent;" >REGISTER</button>
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
    <script>
      function upload(){
     document.getElementById('upload').click();

     }

      
    </script>
</body>

</html>