<?php
$id=$_GET['id'];
include '../control/connection.php';
$query = "SELECT count(*) as users from admin";
$result = mysqli_query($conn, $query);
if ($result) {
    // If the query was successful
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $users= $row['users'];
    }
}

$query1 = "SELECT count(*) as users from customer";
$result1 = mysqli_query($conn, $query1);
if ($result1) {
    // If the query was successful
    if(mysqli_num_rows($result1) > 0) {
        $row1 = mysqli_fetch_assoc($result1);
        $users1= $row1['users'];
    }
}
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
                    <li class="nav-item myborder myactive"><a class="nav-link text-center myactivelink" href="#"><i class="fas fa-tachometer-alt active"></i><span>Dashboard</span></a></li>
                    <li class="nav-item myborder"><a class="nav-link text-center" href="user_management.php?id=<?php echo $id?>"><span>User Management</span></a></li>
                    <li class="nav-item myborder"><a class="nav-link text-center" href="customer_management.php?id=<?php echo $id?>"><span>Customer Management</span></a></li>
                    <li class="nav-item myborder"><a class="nav-link text-center" href="supplier_management.php?id=<?php echo $id?>"><span>Supplier Management</span></a></li>
                    <li class="nav-item myborder"><a class="nav-link text-center" href="product_management.php?id=<?php echo $id?>"><span>Product  Management</span></a></li>
                    <li class="nav-item myborder "><a class="nav-link text-center " href="orders.php?id=<?php echo $id?>"><span>View Orders</span></a></li>
                    <div  class="container " >
                        <li class="nav-item " style="margin-left: -0.6cm;"><button class=" text-center logout" onclick="window.location.href='../'" ><span>LOGOUT</span></a></li>
                    </div> 
                </ul>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div class="brown" id="content" >
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
                  <div class="container">
                     <div class="row">
                        <div class="col-md-4">
                            <div class="card text-center chocolate border">
                                <div class="card-body">
                                  <p class="card-text number"><?php echo $users1 ?></p>
                                  <h5 class="card-title ">Total Number of Customers</h5>
                                </div>
                              </div>
                        </div>
                        <div class="col-md-4" >
                            <div class="card text-center chocolate border">
                                <div class="card-body">
                                  <p class="card-text number"><?php echo $users ?></p>
                                  <h5 class="card-title ">Total Number of Users</h5>
                                </div>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-center chocolate border">
                                <div class="card-body">
                                  <p class="card-text number">48</p>
                                  <h5 class="card-title ">Total Number of Debtors</h5>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>


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
    <script src="../assets/js/chart.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
</body>

</html>