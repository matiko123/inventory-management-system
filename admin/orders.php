
<?php
include '../control/connection.php';
$id=$_GET['id'];
// Fetch the hashed password from the database
$query = "SELECT * FROM products ";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../style.css">
</head>

<body id="page-top" >
    <div id="wrapper" >
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient p-0 chocolate mynav"  >
            <div class="container-fluid d-flex flex-column p-0" ><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="user_details.php?id=<?php echo $id?>">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <h5 class="card-title" style="margin-top: 3cm;margin-left: -0.85cm;">
                            <img src="../img/profile.png" style="border-radius: 200px;border: 6px solid white;" alt="..." width="100" height="100">
                          </h5>
                    </div>
                    <div class="sidebar-brand-text mx-3"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 3cm">
                    <li class="nav-item myborder"><a class="nav-link text-center " href="index.php?id=<?php echo $id ?>"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item myborder"><a class="nav-link text-center" href="user_management.php?id=<?php echo $id ?>"><span>User Management</span></a></li>
                    <li class="nav-item myborder"><a class="nav-link text-center " href="customer_management.php?id=<?php echo $id ?>"><span>Customer Management</span></a></li>
                    <li class="nav-item myborder"><a class="nav-link text-center " href="supplier_management.php?id=<?php echo $id ?>"><span>Supplier Management</span></a></li>
                    <li class="nav-item myborder"><a class="nav-link text-center" href="product_management.php?id=<?php echo $id ?>"><span>Product  Management</span></a></li>
                    <li class="nav-item myborder myactive"><a class="nav-link text-center myactivelink" href="#"><span>View Orders</span></a></li>
                    <div  class="container " >
                        <li class="nav-item " style="margin-left: -0.6cm;"><button class=" text-center logout" onclick="window.location.href='../'" ><span>LOGOUT</span></a></li>
                    </div> 
                </ul>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div class="brown" id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid chocolate"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">Profile</a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="user_details.php?id=<?php echo $id?>"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="../"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid"  >
                              <div class="card shadow">
                        <div class="card-header py-3" >
                            <p class="text-primary m-0 fw-bold" style="font-size:30px;color:#863e04!important">View Orders</p>
                        </div>
                    </div><br>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card text-center chocolate orders" >
                                    <div class="card-body" >
                                      <h5 class="card-title">New Orders</h5>
                                      <p class="card-text number">20</p>
                                      <a href="#" class="btn btn-dark" onclick="neworder()">View</a>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-4" >
                                <div class="card text-center chocolate orders">
                                    <div class="card-body">
                                      <h5 class="card-title">Accepted/Rejected Orders</h5>
                                      <p class="card-text number">05</p>
                                      <a href="#" class="btn btn-dark" onclick="acceptedorder()">View</a>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card text-center chocolate orders">
                                    <div class="card-body">
                                      <h5 class="card-title">Completed Orders</h5>
                                      <p class="card-text number">48</p>
                                      <a href="#" class="btn btn-dark" onclick="completedorder()">View</a>
                                    </div>
                                  </div>
                            </div>   
                        </div>
                    </div>
 <!-- new orders starts-->
 <div id="newdiv" style="display:none;background-color:white;border-radius:5px;margin-top:1cm">
                   <div class="card">           
                            <p class="text-primary m-0 fw-bold" style="font-size:30px;color:#863e04!important">New Orders</p>
                    </div>
                   <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info" style="overflow-y: scroll;max-height: 15cm;">
                                <table class="table my-0 table-hover" id="dataTable">
                                    <thead style="background-color:white">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Dimensions</th>
                                            <th>Manufactury</th>
                                            <th>Expiry</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
  $result = $conn->query($query);
  while($row = $result->fetch_assoc()) {
    $id=$row['id'];
    $name=$row['name'];
    $description=$row['description'];
    $price=$row['price'];
    $quantity=$row['quantity'];
    $dimensions=$row['dimensions'];
    $manufactury=$row['manufactury'];
    $expiry=$row['expiry'];
    echo ' 
                                       <tr class="brown">
                                            <td class="shadow-lg"><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">'.$id.'</td>
                                            <td class="shadow-lg">'.$name.'</td>
                                            <td class="shadow-lg">'.$description.'</td>
                                            <td class="shadow-lg">'.number_format($price).'</td>
                                            <td class="shadow-lg">'.$quantity.'</td>
                                            <td class="shadow-lg">'.$dimensions.'</td>
                                            <td class="shadow-lg">'.$manufactury.'</td>
                                            <td class="shadow-lg">'.$expiry.'</td>
                                        </tr> 
                                        ';
                                    }
 ?>              

                                    </tbody>
                                </table>
                                
                            </div>
                    </div>
<!--new orders ends -->
<!-- accepted/rejected starts-->
<div id="accepteddiv" style="display:none;background-color:white;border-radius:5px;margin-top:1cm">
                   <div class="card">           
                            <p class="text-primary m-0 fw-bold" style="font-size:30px;color:#863e04!important">Accepted/Rejected Orders</p>
                    </div>
                   <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info" style="overflow-y: scroll;max-height: 15cm;">
                                <table class="table my-0 table-hover" id="dataTable">
                                    <thead style="background-color:white">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Dimensions</th>
                                            <th>Manufactury</th>
                                            <th>Expiry</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
  $result = $conn->query($query);
  while($row = $result->fetch_assoc()) {
    $id=$row['id'];
    $name=$row['name'];
    $description=$row['description'];
    $price=$row['price'];
    $quantity=$row['quantity'];
    $dimensions=$row['dimensions'];
    $manufactury=$row['manufactury'];
    $expiry=$row['expiry'];
    echo ' 
                                       <tr class="brown">
                                            <td class="shadow-lg"><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">'.$id.'</td>
                                            <td class="shadow-lg">'.$name.'</td>
                                            <td class="shadow-lg">'.$description.'</td>
                                            <td class="shadow-lg">'.number_format($price).'</td>
                                            <td class="shadow-lg">'.$quantity.'</td>
                                            <td class="shadow-lg">'.$dimensions.'</td>
                                            <td class="shadow-lg">'.$manufactury.'</td>
                                            <td class="shadow-lg">'.$expiry.'</td>
                                        </tr> 
                                        ';
                                    }
 ?>              

                                    </tbody>
                                </table>
                                
                            </div>
                    </div>
<!--accepted/rejected ends -->
<!-- completed starts-->
<div id="completeddiv" style="display:none;background-color:white;border-radius:5px;margin-top:1cm">
                   <div class="card">           
                            <p class="text-primary m-0 fw-bold" style="font-size:30px;color:#863e04!important">Completed Orders</p>
                    </div>
                   <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info" style="overflow-y: scroll;max-height: 15cm;">
                                <table class="table my-0 table-hover" id="dataTable">
                                    <thead style="background-color:white">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Dimensions</th>
                                            <th>Manufactury</th>
                                            <th>Expiry</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
  $result = $conn->query($query);
  while($row = $result->fetch_assoc()) {
    $id=$row['id'];
    $name=$row['name'];
    $description=$row['description'];
    $price=$row['price'];
    $quantity=$row['quantity'];
    $dimensions=$row['dimensions'];
    $manufactury=$row['manufactury'];
    $expiry=$row['expiry'];
    echo ' 
                                       <tr class="brown">
                                            <td class="shadow-lg"><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">'.$id.'</td>
                                            <td class="shadow-lg">'.$name.'</td>
                                            <td class="shadow-lg">'.$description.'</td>
                                            <td class="shadow-lg">'.number_format($price).'</td>
                                            <td class="shadow-lg">'.$quantity.'</td>
                                            <td class="shadow-lg">'.$dimensions.'</td>
                                            <td class="shadow-lg">'.$manufactury.'</td>
                                            <td class="shadow-lg">'.$expiry.'</td>
                                        </tr> 
                                        ';
                                    }
 ?>              

                                    </tbody>
                                </table>
                                
                            </div>
                    </div>
<!--completed ends -->
                </div>
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4"></div>
                    <div class="row"></div>
                </div>
            </div>
            <footer class="bg-white sticky-footer" style="background-color:#E1C3AB!important">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Ifm Students  2024</span></div>
                </div>
            </footer>
        </div>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/theme.js"></script>
    <script>
        function neworder(){
                newdiv.style.display="block";
                accepteddiv.style.display="none";
                completeddiv.style.display="none";
            }

            function acceptedorder(){
                newdiv.style.display="none";
                accepteddiv.style.display="block";
                completeddiv.style.display="none";
            }

            function completedorder(){
                newdiv.style.display="none";
                accepteddiv.style.display="none";
                completeddiv.style.display="block";
            }
    </script>
</body>

</html>