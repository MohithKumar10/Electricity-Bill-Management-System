<?php
session_start();
  if(!(isset($_SESSION["cusname"])))
  {
    ?>
    <script>
        window.open("../public/login.php","_self");
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

  <title>User :: Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">Welcome <?php echo $_SESSION["cusname"];?> </a>

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
          <a class="dropdown-item" href="../public/logout.php" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="main.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
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
          <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        

       
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Pending Bills <br>Customer Id: <?php echo $_SESSION['cid']?></div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              	<?php
				include '../dbms/dbconnection.php';
				?>
                <thead>
                  <tr>
                  	<th>Month</th>
                    <th>Year</th>
                    <th>Amount</th>
                    
                    <th> </th>
                  </tr>
                </thead>
                <tbody>
                	<?php
                  $cid=$_SESSION['cid'];
                  $query5="SELECT * FROM bills where cid=$cid";
		      		$run5=mysqli_query($con,$query5);
		      		if(mysqli_num_rows($run5)<1)
		      		{
		      			echo "<tr><td colspan='5'>No Records Found</td></tr>";
		      		}
		      		else
		      		{
		      			while ($data=mysqli_fetch_assoc($run5)) 
		      			{
		      				if(!($data['status']))
		      				{
		      				?>
		      				<tr>
		      					<form method="post" action="main.php">
		      					<input type="hidden" name="delmon" value="<?php echo $data['month']?>">
                    <input type="hidden" name="delyear" value="<?php echo $data['year']?>">
                    
		      				    <td class="p-3"><?php echo $data['month']?></td>
		      					<td class="p-3"><?php echo $data['year']?></td>
		      					<td class="p-3"><?php echo $data['amount']?></td>
		      					
		      					<td class="p-3"><button type="submit" name="submit">Pay</button></td>
		      					</form>
		      				</tr>
		      			<?php
		      			}
		      			}
		      		}
		      	?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Paid Bills</div>
          <div class="card-body">
            <div class="table-responsive">

                </thead>
                <tbody>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              	<?php
				include '../dbms/dbconnection.php';
				?>
                <thead>
                  <tr>
                  	<th>Month</th>
                    <th>Year</th>
                    <th>Amount</th>
                    
                  </tr>
                </thead>
                <tbody>
                	<?php
                  $query6="SELECT * FROM bills where cid=$cid ";
		      		$run6=mysqli_query($con,$query6);
		      		if(mysqli_num_rows($run6)<1)
		      		{
		      			echo "<tr><td colspan='5'>No Records Found</td></tr>";
		      		}
		      		else
		      		{
		      			while ($data2=mysqli_fetch_assoc($run6)) 
		      			{
		      				if($data2['status'])
		      				{
		      				?>
		      				<tr>
		      					
		      					
		      				   <td class="p-3"><?php echo $data2['month']?></td>
                    <td class="p-3"><?php echo $data2['year']?></td>
                    <td class="p-3"><?php echo $data2['amount']?></td>
		      					
		      					
		      				</tr>
		      			<?php
		      			}
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
  <script src="../vendor/chart.js/Chart.min.js"></script>
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>
  <script src="../js/demo/chart-area-demo.js"></script>

</body>

</html>
<?php
 if(isset($_POST['submit']))
{
            if ($con == false)
            {
            die("ERROR: Could not connect. ".mysqli_connect_error());
            }
            $cid=$_SESSION['cid'];
           	$delmon=$_POST['delmon'];
            $delyear=$_POST['delyear'];


            $sql55 = "UPDATE bills SET status=1 WHERE cid='$cid' and month='$delmon' and year='$delyear'";
                if (mysqli_query($con, $sql55)) 
              { 
               ?>
               <script>
               	window.alert("Payment Successfully");
               	window.open("main.php","_self");
               </script>
               <?php
              } 
            else
            { 
            	?>
              <script>
               	window.alert("Error!!!!!!!");
               	window.open("main.php","_self");
               </script>
               <?php 
            }
             
            
}

?>