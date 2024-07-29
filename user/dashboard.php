
<?php
include '../control/connection.php';
$userid=$_GET['id'];
// Fetch the hashed password from the database
$query = "SELECT * FROM products ";
$result = mysqli_query($conn, $query);

$query1 = "SELECT * FROM orders where userid=$userid  order by id desc";
$result1 = mysqli_query($conn, $query1);

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $id=$_POST['id'];
    $product=$_POST['name'];
    $price=$_POST['price'];
    $quantity=$_POST['quantity'];
  
    $sql="insert into orders (userid,product,quantity,price) values('$id','$product','$quantity','$price') ";
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
    <title>Customer Care</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="../style.css">
    <script src="../assets/js/html2pdf.bundle.min.js"></script>
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
                    <li class="nav-item myborder"><a class="nav-link text-center" href="sales_history.php?id=<?php echo $userid ?>"><span>Sales History</span></a></li>
                  
                    <div  class="container " >
                        <li class="nav-item " style="margin-left: -0.6cm;"><button class=" text-center logout" onclick="window.location.href='../user/'" ><span>LOGOUT</span></a></li>
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
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="../inventory/user/"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid"  >
                  
                    <div class="card shadow" id="userRecord">
                    <div class="card-header py-3" >
                <form >
                    <div class="row">
                        <div class="col">
                            <div class="mb-3"><label class="form-label" for="username"><strong>Customer Name</strong></label><input class="form-control" type="text" id="username" placeholder="user.name" name="username"></div>
                        </div>
                        <div class="col">
                            <div class="mb-3"><label class="form-label" for="email"><strong>Phone number</strong><br></label><input class="form-control" type="number" id="email" placeholder="071122..." name="email"></div>
                        </div>
                    </div>
                    <button class="btn btn-outline-primary" style="margin-left:90%" type="button" onclick="userRecord.style.display='none'">Record</button>
                </form>
                        </div>
                    </div><br>
            
                   
                </div>
                <p class="text-primary m-0 fw-bold container " style="font-size:20px;color:#863e04!important">Product List Table</p><br>
                <div class="container-fluid">
                <div class="card shadow ">  
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info" style="overflow-y: scroll;max-height: 15cm;">
                                <table class="table my-0 table-hover" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Available</th>
                                            <th>Dimensions</th>
                                            <th>Manufactury</th>
                                            <th>Expiry</th>
                                            <th>Required</th>
                                            <th>Manage</th>
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
                                       <form method="post">
                                            <td class="shadow-lg"><img class="rounded-circle me-2" width="30" height="30" src="assets/img/avatars/avatar1.jpeg">'.$id.'</td>
                                            <td class="shadow-lg">'.$name.'</td>
                                            <td class="shadow-lg">'.$description.'</td>
                                            <td class="shadow-lg">'.number_format($price).'</td>
                                            <td class="shadow-lg">'.$quantity.'</td>
                                            <td class="shadow-lg">'.$dimensions.'</td>
                                            <td class="shadow-lg">'.$manufactury.'</td>
                                            <td class="shadow-lg">'.$expiry.'</td>
                                            <td class="shadow-lg"><input type="number" name="quantity" style="width:1.5cm"></td>
                                            <input type="hidden" name="id" value="'.$userid.'">
                                            <input type="hidden" name="name" value="'.$name.'">
                                            <input type="hidden" name="price" value="'.$price.'">
                                            <td class="shadow-lg"><center> <button class="btn btn-secondary" type="submit">&nbsp;&nbsp;Add&nbsp;&nbsp;</button></center></td>
                                       </form>
                                        </tr> 
                                        ';
                                    }
 ?>              

                                    </tbody>
                                </table>
                                
                            </div>
                            <div class="row" id="table" >
                                <div class="card-header py-3" >
                                    <p class="text-primary m-0 fw-bold " ><center style="font-size:20px;color: white!important;" class="chocolate">Requested Products</center></p>
                                    <div class="table-responsive table " style="overflow-y: scroll;max-height: 15cm;">
                                <table class="table my-0 table-hover"  >
                                    <thead >
                                        <tr>
                                            <th>ID</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                    <?php
  $result1 = $conn->query($query1);
  while($row1 = $result1->fetch_assoc()) {
    $id=$row1['id'];
    $product=$row1['product'];
    $quantity=$row1['quantity'];
    $price=$row1['price'];
    
    echo ' 
    
                                       <tr class="brown" >
                                            <td class="shadow-lg">'.$id.'</td>
                                            <td class="shadow-lg">'.$product.'</td>
                                            <td class="shadow-lg">'.$quantity.'</td>
                                            <td class="shadow-lg">'.number_format($quantity*$price).'<br><sub>@'.number_format($price).'</sub></td>
                                        </tr> 
                                        ';
                                    }
 ?>              
   <tr class="brown">
   <td class="shadow-lg">Total Price</td>
   <td class="shadow-lg"></td>
   <td class="shadow-lg"></td>
   <td class="shadow-lg">540,000</td>
                                </tr>
                                    </tbody>
                                </table>
                               
                            </div>
                            <button class="btn btn-outline-primary" style="margin-left:80%" id="download">Print Receipt</button>
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
         <!--register starts-->  
<button style="display:none" data-bs-toggle="modal" data-bs-target="#signup" id="trig">done</button>
<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl modal-dialog-centered" style="background-color: #745c447b;">
    <button type="button" class="btn-close mymodal" data-bs-dismiss="modal" aria-label="Close" ></button>
    <div class="modal-content container modalcontainer" >

       

      <div class="modal-body container">
        <P class="container" style="color: #723e0a;">
          You have successfully Added a Product.
        </P>
       <center><button data-bs-dismiss="modal" aria-label="Close" class="chocolate" style="width: 1.8cm;border-radius: 6px;">OK</button></center> 
      </div>
    </div>
  </div>
</div><br>
<!--register ends-->
  <!--price update starts-->  
  <button style="display:none" data-bs-toggle="modal" data-bs-target="#price" id="pricebtn">done</button>
  <div class="modal fade" id="price" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl modal-dialog-centered" style="background-color: #745c447b;">
    <button type="button" class="btn-close mymodal" data-bs-dismiss="modal" aria-label="Close" ></button>
    <div class="modal-content container modalcontainer" >

       

      <div class="modal-body container">
        <P class="container" style="color: #723e0a;">
          Product Price Updated.
        </P>
       <center><button data-bs-dismiss="modal" aria-label="Close" class="chocolate" style="width: 1.8cm;border-radius: 6px;">OK</button></center> 
      </div>
    </div>
  </div>
</div><br>
<!--price update ends-->
  <!--description update starts-->  
  <button style="display:none" data-bs-toggle="modal" data-bs-target="#description" id="descriptionbtn">done</button>
  <div class="modal fade" id="description" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-xl modal-dialog-centered" style="background-color: #745c447b;">
    <button type="button" class="btn-close mymodal" data-bs-dismiss="modal" aria-label="Close" ></button>
    <div class="modal-content container modalcontainer" >

       

      <div class="modal-body container">
        <P class="container" style="color: #723e0a;">
          Product Description Updated
        </P>
       <center><button data-bs-dismiss="modal" aria-label="Close" class="chocolate" style="width: 1.8cm;border-radius: 6px;">OK</button></center> 
      </div>
    </div>
  </div>
</div><br>
<!--description update ends-->
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/chart.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
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
      if (window.location.href.indexOf('price_update') !== -1) {
          // Find the button with the ID 'trig'
          var button = document.getElementById('pricebtn');
          if (button) {
              // Trigger the click event on the button
              button.click();
          }
      }

      if (window.location.href.indexOf('description_update') !== -1) {
          // Find the button with the ID 'trig'
          var button = document.getElementById('descriptionbtn');
          if (button) {
              // Trigger the click event on the button
              button.click();
          }
      }
  });
</script>
<script>
  document.querySelector('#download').onclick = function(){
    var element = document.querySelector('#table');
    html2pdf().from(element).save();
  }
</script>
</body>

</html>