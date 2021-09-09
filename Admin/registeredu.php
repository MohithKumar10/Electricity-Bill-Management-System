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

  <title>Coonection Details</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">Welcome Admin</a>

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
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
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

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>cid</th>
                    <th>contype</th>
                    <th>condate</th>
                    <th>conid</th>
                  </tr>
                </thead>
             
                <tbody>
                  <?php
                  include '../dbms/dbconnection.php';
                  $query5="SELECT * FROM connection";
                  $run5=mysqli_query($con,$query5);
              if(mysqli_num_rows($run5)<1)
              {
                echo "<tr><td colspan='5'>No Records Found</td></tr>";
              }
              else
              {
                while ($data=mysqli_fetch_assoc($run5)) 
                {
                 
                  ?>
                  <tr>
                    <form method="post" action="index.php">
                    <input type="hidden" name="delid" value="<?php echo $data['cid']?>">
                      <td class="p-3"><?php echo $data['cid']?></td>
                    <td class="p-3"><?php echo $data['contype']?></td>
                    <td class="p-3"><?php echo $data['condate']?></td>
                    <td class="p-3"><?php echo $data['conid']?></td>
                    </form>
                  </tr>
                <?php
                
                }
              }
            ?>
                </tbody>
              </table>
            </div>
          </div>
         
        </div>

       

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

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
          <a class="btn btn-primary" href="../logout.php">Logout</a>
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
