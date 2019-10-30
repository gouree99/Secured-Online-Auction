<?php
session_start();
$p_id=$_GET['p_id'];
$u_id=$_SESSION['id'];
$connection=mysqli_connect('localhost', 'shalva', 'Shalva03', 'gouri');
$query="SELECT * from product where p_id=$p_id";
$result=mysqli_query($connection,$query);
$query1="SELECT first_name FROM user where u_id=$u_id";
$result1=mysqli_query($connection,$query1);
if($result1)
{
  $data1=mysqli_fetch_assoc($result1);
  $fname=$data1['first_name'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Test</title>
    <style>
        .container
        {
            margin-top: 50px;
            color:black;
            padding: 20px
        }
        #btn
        {
            margin-bottom: 20px;
        }
        .choose
        {
            margin-left: 20px;
        }
    </style>
</head>
<body>
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Buyer Price</title>

<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="seller_index.php">
      <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Bidding Site</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link" href="buyer.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item active">
        <a class="nav-link" href="history.php?u_id=<?php echo $u_id;?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>History</span></a>
      </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">



          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"><?php echo $fname; ?></i>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>

      </nav>
      <!-- End of Topbar -->
      <!-- Begin Page Content -->
      <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Product Bid</h1>
</div>


    <form method="POST" action="product_process.php?p_id=<?php echo $p_id;?>" enctype="multipart/form-data">
    <div class="container">
    <div class="row">
    <?php
    $data=mysqli_fetch_assoc($result);
        $p_title= $data['p_title'];
        $description=$data['description'];
        $exp_price=$data['expected_price'];
        $post_image = $data['image'];

        //$price=$data['expected_price'];
        echo<<<ROW
        <div class="col">
            <div class="form-group row">
              <label for="product_title">Product Title: $p_title</label>
            </div>
            <div class="form-group row">
              <label for="prod_descript">Description: $description</label>
            </div>
            <div class="form-group row">
              <label for="prod_descript">Original Price:  <i class="fas fa-rupee-sign"></i> $exp_price</label>
            </div>
            <div class="form-group row">
                <label for="prod_descript">BID Price:</label>
                <div class="col-sm-10">
                  <input type="number" step="1" class="form-control" name="bid_price" id="prod_descript" placeholder="Enter the price">
                </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-10">
              <button type="submit" class="btn btn-primary" name="submit" value="submit" id="submit">Bid</button>
              </div>
            </div>
        </div>
        <div class="col">
            <img src='../images/$post_image' height='200' border='1' alt=''>
        </div>
        ROW;
    ?>
      
    </div>
    </div>
        
    </div>

<!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
  
    <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
        
      <!-- End of Footer -->

</body>
</html>