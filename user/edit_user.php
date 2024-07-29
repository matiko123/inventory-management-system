<?php 
include '../control/connection.php';
$id=$_GET['id'];
$query = "SELECT * FROM admin where id=$id ";
$result = $conn->query($query);
while($row = $result->fetch_assoc()) {
  $email=$row['email'];
  $name=$row['name'];
  $role=$row['role'];
  $image=$row['image'];
  if($role=='1'){
    $role='administrator';
  }elseif($role=='2'){
    $role="customer care";
  }
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $contact=$_POST['contact'];
  $address=$_POST['address'];

  $sql="insert into supplier (name,product,contact,address) values('$name','$product','$contact','$address') ";
  if ($conn->query($sql) === TRUE) {
   
     echo "<script>window.location.href='dashboard.php?success'</script>";
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
    <title>Login - Brand</title>
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
                                    <div class="card " style="width: 22rem;background-color: #b4622c9f;color: white;border-radius: 5px;margin-top: 5cm;margin-left: 1.8cm;">
                                        <div class="card-body">
                                          <h5 class="card-title container" style="font-size:50px;border:16px  solid #73370B;border-top: 4px solid #73370B;border-bottom: 4px solid #73370B;border-radius: 10px;background-color: #BF7B4C;">Edit User Details</h5>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card container" style=" background-color: #a84702b6;color: white;">
                                    <div class="card-body">
                                        <center>
                                      <h5 class="card-title">
                                        <img src="../img/<?php echo $image?>" style="border-radius: 200px;border: 6px solid white;filter:brightness(80%)" alt="..." width="150" height="150">
                                        <div style="background-color: white;color:#73370B;margin-left: 3.5cm;margin-top: -1.3cm;margin-bottom: 1cm; border-radius: 20px;border:2px solid #73370B;width: 1cm;height: 1cm;cursor: pointer;" onclick="profile()">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
                                          </svg>
                                          <hr style="background-color: rgb(0, 0, 0);margin-top: -0.01cm;height: 0.05cm;">                                   
                                        </div>
                                      </h5>
                                      </center>
                                      <p class="card-text">
                                        <input type="file" id="profile_picture" style="display: none;">
                                        <div class="row">
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Email :</label>
                                            </div>
                                            <div class="col">
                                              <input type="text" class="form-control" placeholder="<?php echo $email ?>" aria-label="Last name">
                                            </div>
                                        </div><br>
                                        <div class="row">
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">New Password :</label>
                                            </div>
                                            <div class="col">
                                              <input type="password" class="form-control" placeholder="New Password" >
                                            </div>
                                            </div><br>
                                            <div class="row">
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Confirm password :</label>
                                            </div>
                                            <div class="col">
                                              <input type="password" class="form-control" placeholder="confirm password">
                                            </div>
                                            </div><br>
                                            <div class="row">
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">User Role :</label>
                                            </div>
                                            <div class="col">
                                              <input type="text" class="form-control" placeholder="<?php echo $role ?>"  aria-label="Last name" readonly>
                                            </div>
                                            </div><br>
                                            <button class="btn btn-primary d-block btn-user w-100 chocolate button" type="button" style="font-size: 30px;border: transparent;" data-bs-toggle="modal" data-bs-target="#signup">UPDATE</button>
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
      <!--register starts-->  
<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl modal-dialog-centered" style="background-color: #745c447b;">
    <button type="button" class="btn-close mymodal" data-bs-dismiss="modal" aria-label="Close" ></button>
    <div class="modal-content container modalcontainer" >

       

      <div class="modal-body container">
        <P class="container" style="color: #723e0a;">
          Details Updated Successfully.
        </P>
       <center><button data-bs-dismiss="modal" aria-label="Close" class="chocolate" style="width: 1.8cm;border-radius: 6px;">OK</button></center> 
      </div>
    </div>
  </div>
</div><br>
<!--register ends-->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/theme.js"></script>
   <script>
    function profile(){
      profile_picture.click();
    }
   </script>
</body>

</html>