<?php
include '../control/connection.php';
$id=$_GET['id'];
// Fetch the hashed password from the database
$query = "SELECT * FROM admin order by id desc";
$result = mysqli_query($conn, $query);

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user=$_POST['user'];
    $sql="delete from admin where id = $user";
    if ($conn->query($sql) === TRUE) {

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
    <title>User Management</title>
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
            <div class="container-fluid d-flex flex-column p-0 " ><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="user_details.php?id=<?php echo $id?>">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <h5 class="card-title" style="margin-top: 3cm;margin-left: -0.85cm;">
                            <img src="../img/profile.png" style="border-radius: 200px;border: 6px solid white;" alt="..." width="100" height="100">
                          </h5>
                    </div>
                    <div class="sidebar-brand-text mx-3"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 3cm">
                    <li class="nav-item myborder"><a class="nav-link text-center" href="index.php?id=<?php echo $id ?>"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
                    <li class="nav-item myborder myactive"><a class="nav-link text-center myactivelink" href="#"><span>User Management</span></a></li>
                    <li class="nav-item myborder"><a class="nav-link text-center" href="customer_management.php?id=<?php echo $id ?>"><span>Customer Management</span></a></li>
                    <li class="nav-item myborder"><a class="nav-link text-center" href="supplier_management.php?id=<?php echo $id ?>"><span>Supplier Management</span></a></li>
                    <li class="nav-item myborder"><a class="nav-link text-center" href="product_management.php?id=<?php echo $id ?>"><span>Product  Management</span></a></li>
                    <li class="nav-item myborder "><a class="nav-link text-center " href="orders.php?id=<?php echo $id ?>"><span>View Orders</span></a></li>
                    <div  class="container " >
                        <li class="nav-item " style="margin-left: -0.6cm;"><button class=" text-center logout" onclick="window.location.href='../'" ><span>LOGOUT</span></a></li>
                    </div> 
                </ul>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div class="brown" id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid chocolate"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars" ></i></button>
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
                            <p class="text-primary m-0 fw-bold" style="font-size:20px;color:#863e04!important">User Management</p>
                        </div>
                    </div><br>
                         <button class="chocolate" onclick="window.location.href='user_register.php?id=<?php echo $id ?>'">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                              </svg>
                            Add User
                         </button>
                        <p class="text-primary m-0 fw-bold" style="font-size:20px;color:#863e04!important">Registered User Table</p><br>

                    <div class="card shadow">
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info" style="overflow-y: scroll;max-height: 15cm;">
                                <table class="table my-0 table-hover" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php
    $i=1;
  $result = $conn->query($query);
  while($row = $result->fetch_assoc()) {
    $id=$row['id'];
    $name=$row['name'];
    $email=$row['email'];
    $role=$row['role'];
    if($role=='1'){
        $role="admin";
    }elseif($role=='2'){
        $role="secretary";
    }
    echo '
                                       <tr class="brown">
                                            <td><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">'.$i.'</td>
                                            <td>'.$name.'</td>
                                            <td>'.$email.'</td>
                                            <td>'.$role.'</td>
                                            <form method="post">
                                            <input type="hidden" name="user" value="'.$id.'">
                                            <td><center> <button class="btn btn-danger" type="submit">&nbsp;&nbsp;Delete&nbsp;&nbsp;</button></center></td>
                                            </form>
                                        </tr>
    '
    ;
    $i++;
  }

 ?>                                      
                                    </tbody>
                                </table>
                                
                            </div>
                            <div class="row" style="display:none">
                                <div class="card-header py-3" >
                                    <p class="text-primary m-0 fw-bold " ><center style="font-size:20px;color: white!important;" class="chocolate">View More</center></p>
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
    <button style="display:none" data-bs-toggle="modal" data-bs-target="#signup" id="trig">done</button>
     <!--register starts-->  
     <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl modal-dialog-centered" style="background-color: #745c447b;">
    <button type="button" class="btn-close mymodal" data-bs-dismiss="modal" aria-label="Close" ></button>
    <div class="modal-content container modalcontainer" >
      <div class="modal-body container">
        <P class="container" style="color: #723e0a;">
          User successfully Registered.
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
    document.addEventListener('DOMContentLoaded', function() {
      // Check if the URL contains 'abc.html'
      if (window.location.href.indexOf('success') !== -1) {
          // Find the button with the ID 'trig'
          var button = document.getElementById('trig');
          if (button) {
              // Trigger the click event on the button
              button.click();
          }
      }
  });
</script>
</body>

</html>