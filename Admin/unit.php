<?php
  session_start();
  if(!(isset($_SESSION["Uname"])))
  {
    ?>
    <script>
        window.open("index.php","_self");
    </script>
    <?php
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Tables</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Welcome</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        
        <div class="input-group-append">
         
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>
  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="register.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Add Staff</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="registeredu.php">
          <i class="fas fa-fw fa-table"></i>
          <span>All Connection Details</span></a>
        </li>
       <li class="nav-item active">
        <a class="nav-link" href="registered.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Registered Connection</span></a>
        </li>
        <li class="nav-item active">
        <a class="nav-link" href="users.php">
          <i class="fas fa-fw fa-table"></i>
          <span>User Details</span></a>
        </li>
      <li class="nav-item active">
        <a class="nav-link" href="unit.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Change unit price</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="paid.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Paid Bills</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="pending.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Pending Bills</span>
        </a>
      </li>
    </ul>
    <?php
        include '../dbms/dbconnection.php';
         $query1="SELECT * FROM unit where con_type='domestic'";
          $run1=mysqli_query($con,$query1);
          $data1=mysqli_fetch_assoc($run1);
          $query2="SELECT * FROM unit where con_type='commercial'";
          $run2=mysqli_query($con,$query2);
          $data2=mysqli_fetch_assoc($run2);
          $query3="SELECT * FROM unit where con_type='industry'";
          $run3=mysqli_query($con,$query3);
          $data3=mysqli_fetch_assoc($run3);
        ?>
   
      <div class="ml-5" style="margin-top: 50px;">

       <h1> 1. Domestic Unit price </h1><br>
       <p class="p-2"style="font-size: 25px; border: 5px solid black;"> Present Unit Price : <?php echo $data1['unit_price']?> per unit</p>
       <form method="post" action="unit.php"> 
        <input type="hidden" name="cont" value="domestic">
        <input class="p-2" type="float" name="nup" placeholder="Enter New Unit price"> <button type="submit" name="submit">Update</button> </form>
       </div>
        <div class="ml-5" style="margin-top: 50px;">

       <h1> 2. Commercial Unit price </h1><br>
       <p class="p-2"style="font-size: 25px; border: 5px solid black;"> Present Unit Price : <?php echo $data2['unit_price']?>  per unit</p>
       <form method="post" action="unit.php"> 
        <input type="hidden" name="cont" value="Commercial">
        <input class="p-2" type="float" name="nup" placeholder="Enter New Unit price"> <button type="submit" name="submit">Update</button> </form>
       </div>
      
       <div class="ml-5" style="margin-top: 50px;">

       <h1> 3. Industry Unit price </h1><br>
       <p class="p-2"style="font-size: 25px; border: 5px solid black;"> Present Unit Price : <?php echo $data3['unit_price']?> per unit</p>
       <form method="post" action="unit.php"> 
        <input type="hidden" name="cont" value="Industry">
        <input class="p-2" type="float" name="nup" placeholder="Enter New Unit price"> <button type="submit" name="submit">Update</button> </form>
       </div>


      

   

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
<?php
 if(isset($_POST['submit']))
{
    $con_type=$_POST['cont'];
    $nval=$_POST['nup'];
    echo $con_type;
    echo $nval;
    $sql11="UPDATE unit SET unit_price=$nval WHERE con_type='$con_type'";
    if (mysqli_query($con, $sql11)) 
              { 
               ?>
               <script>
                window.alert("Unit Price updated");
                window.open("unit.php","_self");
               </script>
               <?php
              } 
            else
            { 
              ?>
              <script>
                window.alert("Error!!!!!!!");
                window.open("unit.php","_self");
               </script>
               <?php 
            }
             
            
}

?>