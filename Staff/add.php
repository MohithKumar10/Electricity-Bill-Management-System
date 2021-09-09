<?php
session_start();
  if(!(isset($_SESSION["staffname"])))
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

  <title>Staff :: Add Bill</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Welcome <?php echo $_SESSION["staffname"];?></a>

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
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="cdetails.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Connection Details</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="register.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Add Connection</span></a>
      </li>
         <li class="nav-item active">
        <a class="nav-link" href="registered.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Registered Connection</span></a>
        </li>
      <li class="nav-item active">
        <a class="nav-link" href="add.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Add Bill</span>
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
         $query="SELECT * FROM connection";
          $run=mysqli_query($con,$query);
          
        ?>
   
      <div class="ml-5" style="margin-top: 50px;">
        <h1> Select the Customer ID from below </h1>
        <p>
        <form method="post" action="past.php">
        <select name="custid">
          <option disabled selected>Select</option>
          <?php
          while ($data=mysqli_fetch_assoc($run))
          {
            ?>
            <option value="<?php echo $data['cid'] ?>"><?php echo $data['cid'] ?></option>
           
            <?php

          }
          ?>
      </select>
      <button type="submit" class="ml-3" name="sub">Submit</button>
    </form>
    </p>

      <?php
      if(isset($_SESSION['custid']))
      {
        ?>
         <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Pending Bills <p class="ml-1">Customer ID: <?php echo $_SESSION['custid'];?> </p></div>
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
                    <th>Transaction Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $id=$_SESSION['custid'];
                  $query5="SELECT * FROM bills where cid='$id'  ORDER BY month,year";
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
                    
                      <td class="p-3"><?php echo $data['month']?></td>
                    <td class="p-3"><?php echo $data['year']?></td>
                    
                    <td class="p-3"><?php echo $data['amount']?></td>
                    <td class="p-3"><?php echo $data['tdate']?></td>
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
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Add New Bill <p class="ml-1">Customer ID: <?php echo $_SESSION['custid'];?> </p></div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              

    
         <form method="post" action="add.php">
          Select Month :
          <select name="month">
            <option disabled selected>Select</option>
            <option value="Jan">Jan</option>
            <option value="Feb">Feb</option>
            <option value="Mar">Mar</option>
            <option value="Apr">Apr</option>
            <option value="May">May</option>
            <option value="Jun">Jun</option>
            <option value="Jul">Jul</option>
            <option value="Aug">Aug</option>
            <option value="Sep">Sep</option>
            <option value="Oct">Oct</option>
            <option value="Nov">Nov</option>
            <option value="Dec">Dec</option>
          </select> <br> <br>
          Select Year :
           <select class="ml-3" name="year">
            <option disabled selected>Select</option>
            <option value="2015">2015</option>
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
          </select> <br> <br>
          Enter Units :<input class="ml-3" type="float" name="units"><br><br>
          <button type="submit" name="submit">Submit</button>
         </form>
      </table>
            </div>
          </div>
        </div>
      <?php
      }
      ?>


      

   

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
  <script>

  </script>
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
    $id=$_SESSION['custid'];
    $mon=$_POST['month'];
    $units=$_POST['units'];
    $year=$_POST['year'];
    $sql11="select * from connection where cid=$id";
    $run11=mysqli_query($con,$sql11);
    $data11=mysqli_fetch_assoc($run11);
    $punit=$units-$data11['units'];
    if($punit<0)
    {?>
      <script>
        alert("Error!!!!!");
        window.open("add.php","_self");
      </script>
<?php
    }
    else if($data11['contype']=="domestic")
    {
              $sql12="select * from unit where con_type='domestic'";
              $run12=mysqli_query($con,$sql12);
              $data12=mysqli_fetch_assoc($run12);
              if($punit<=150)
              {
                      $amount=($punit*$data12['unit_price']);
              }
              else if($punit>150 and $punit<=250)
              {
                    $eunit=$punit-150;
                    $amount=(150*$data12['unit_price']);
                    $amount=$amount+($eunit*1.5*$data12['unit_price']);
                     
              }
              else
              {
                    $eunit1=(150*$data12['unit_price']);
                    $eunit2=(100*$data12['unit_price']*1.5);
                    $eunit3=($punit-250)*2*$data12['unit_price'];
                    $amount=$eunit1+$eunit2+$eunit3;
              }
              if($amount<60)
              {
                $amount=60;
              }
      
              $pdate=date("o-m-d");
              $sql13="INSERT INTO bills (cid,month,year,amount,tdate)values('$id','$mon','$year','$amount','$pdate')";
              $sql14="UPDATE connection set units='$units' where cid='$id'";

      if(mysqli_query($con,$sql13))
      {
        if(mysqli_query($con,$sql14))
        {
          ?>

        <script>
        window.alert("Bill Added Sucess");
        window.open("add.php","_self");
        </script>
        <?php
        }

        
      }
      else
      {?>
        <script>
        window.alert("Error adding Bill!!!!!!");
        window.open("add.php");
        </script>
        <?php

      }
      
      
    }
    else if($data11['contype']=="industry")
    {
      $sql12="select * from unit where con_type='industry'";
      $run12=mysqli_query($con,$sql12);
      $data12=mysqli_fetch_assoc($run12);
      if(mysqli_query($con,$sql12))
      {
        echo "sucess";
      }
      else
      {
        echo "fail";
      }
      if($punit<=150)
              {
                      $amount=($punit*$data12['unit_price']);
              }
              else if($punit>150 and $punit<=250)
              {
                    $eunit=$punit-150;
                    $amount=(150*$data12['unit_price']);
                    $amount=$amount+($eunit*1.5*$data12['unit_price']);
                     
              }
              else
              {
                    $eunit1=(150*$data12['unit_price']);
                    $eunit2=(100*$data12['unit_price']*1.5);
                    $eunit3=($punit-250)*2*$data12['unit_price'];
                    $amount=$eunit1+$eunit2+$eunit3;
              }
               if($amount<200)
              {
                $amount=200;
              }
      
      $pdate=date("o-m-d");
      $sql13="INSERT INTO bills (cid,month,year,amount,tdate)values('$id','$mon','$year','$amount','$pdate')";
      $sql14="UPDATE connection set units='$units' where cid='$id'";

      if(mysqli_query($con,$sql13))
      {
        if(mysqli_query($con,$sql14))
        {
          ?>

        <script>
        window.alert("Bill Added Sucess");
        window.open("add.php","_self");
        </script>
        <?php
        }
        else
        {?>
        <script>
        window.alert("Error!!!!!!");
        window.open("add.php");
        </script>
        <?php

        }

        
      }
      else
      {?>
        <script>
        window.alert("Error!!!!!!");
        window.open("add.php");
        </script>
        <?php

      }
      
      
    }
    else
    {
       $sql12="select * from unit where con_type='commercial'";
      $run12=mysqli_query($con,$sql12);
      $data12=mysqli_fetch_assoc($run12);
      if($punit<=150)
              {
                      $amount=($punit*$data12['unit_price']);
              }
              else if($punit>150 and $punit<=250)
              {
                    $eunit=$punit-150;
                    $amount=(150*$data12['unit_price']);
                    $amount=$amount+($eunit*1.5*$data12['unit_price']);
                     
              }
              else
              {
                    $eunit1=(150*$data12['unit_price']);
                    $eunit2=(100*$data12['unit_price']*1.5);
                    $eunit3=($punit-250)*2*$data12['unit_price'];
                    $amount=$eunit1+$eunit2+$eunit3;
              }
               if($amount<120)
              {
                $amount=120;
              }
      
      $pdate=date("o-m-d");
      $sql13="INSERT INTO bills (cid,month,year,amount,tdate)values('$id','$mon','$year','$amount','$pdate')";
      $sql14="UPDATE connection set units='$units' where cid='$id'";

      if(mysqli_query($con,$sql13))
      {
        if(mysqli_query($con,$sql14))
        {
          ?>

        <script>
        window.alert("Bill Added Sucess");
        window.open("add.php","_self");
        </script>
        <?php
        }

        
      }
      else
      {?>
        <script>
        window.alert("Error!!!!!!");
        window.open("add.php");
        </script>
        <?php

      }
    }
}
?>