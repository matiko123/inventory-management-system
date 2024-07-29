<?php 
include '../control/connection.php';
$id=$_GET['id'];
$query = "SELECT * FROM admin where id=$id ";
$result = mysqli_query($conn, $query);
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
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>user_details</title>
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
                                          <h5 class="card-title container" style="font-size:50px;border:16px  solid #73370B;border-top: 4px solid #73370B;border-bottom: 4px solid #73370B;border-radius: 10px;background-color: #BF7B4C;">User Details</h5>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card container" style=" background-color: #a84702b6;color: white;">
                                    <div class="card-body">
                                        <center>
                                      <h5 class="card-title">
                                        <img src="../img/<?php echo $image ?>" style="border-radius: 200px;border: 6px solid white;" alt="..." width="150" height="150">
                                      </h5>
                                      </center>
                                      <p class="card-text">
                                        <div class="row">
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label">Email:</label>
                                            </div>
                                            <div class="col">
                                              <input type="text" class="form-control" placeholder="<?php echo $email ?>" aria-label="Last name" readonly>
                                            </div>
                                        </div><br>
                                      
                                            <div class="row">
                                            </div><br>
                                            <div class="row">
                                            <div class="col">
                                                <label for="inputEmail4" class="form-label" >User Role :</label>
                                            </div>
                                            <div class="col">
                                              <input type="text" class="form-control" placeholder="<?php echo $role ?>" aria-label="Last name" readonly>
                                            </div>
                                            </div><br>
                                            <div class="row justify-content-evenly">
                                                <div class="col-5 btn btn-primary" style="background-color: #9D4506;border: #73370B;" onclick="window.location.href='edit_user.php?id=<?php echo $id ?>'">
                                                  Edit User Details
                                                </div>
                                                <div class="col-5 btn btn-primary" style="background-color: #682b00;border: #73370B;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                                      </svg>
                                                  Delete User
                                                </div>
                                              </div>
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