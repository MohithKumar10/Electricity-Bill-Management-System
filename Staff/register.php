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

  <title>Staff :: Add connection</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Add connection details</div>
      <div class="card-body">
        <form method="post" action="register.php">
           <div class="form-group">
            <div class="form-label-group">
              <select name="con" class="form-control" required>
                <option disabled value="" selected="" >Select Connection Type</option>
                <option value="domestic">Domestic</option>
                <option value=" commercial">Commercial</option>
                <option value="industry">Industry</option>

          </select> 
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="date" id="conndate" name="condate" class="form-control" placeholder="Connection Date" required="required">
              <label for="conndate">Connection date</label>
            </div>
          </div>
          <?php
           include '../dbms/dbconnection.php';
           $sqll="select * from admin";
           $runn=mysqli_query($con,$sqll);
           $dataa=mysqli_fetch_assoc($runn);
           $idd=$dataa['id']+1;
           $ncon="KA20190"."$idd";
          ?>
           <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="connid" name="conid" class="form-control" placeholder="Connection ID" readonly value="<?php echo $ncon;?>">
              <label for="connid">Connection ID</label>
            </div>
          </div>

          <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="index.php">Go back</a>
  
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>

<?php
 if(isset($_POST['submit']))
{
            include '../dbms/dbconnection.php';
            $ctype= $_POST['con'];
            $cdate= $_POST['condate'];
            $cid= $_POST['conid'];
            
            if ($con == false)
            {
            die("ERROR: Could not connect. ".mysqli_connect_error());
            }
            $confirmcode=rand();
            $sql = "INSERT INTO connection (cid,contype,condate,conid)VALUES('$confirmcode','$ctype', '$cdate','$cid')";
            $sql1="Update admin set id=$idd";
                /*if (mysqli_query($con, $sql)) 
              { 
                echo "<h1>You have successfully signed up</h1>"; 
              } 
            else
            { 
              echo "ERROR: Could not able to execute $sql.".mysqli_error($con); 
            }*/
             
            if (mysqli_query($con, $sql))
            {
              if(mysqli_query($con,$sql1))
              {


                ?>
                <script>
                    window.alert("Connection Added Success");
                    window.open("cdetails.php",'_self');
                </script>
            <?php
            mysqli_close($con);
            }
          }
            else
            {
            ?>
            <script>
                window.alert("Error!!!!!");
                //window.open("signup.php","_self");
            </script>
            <?php
            mysqli_close($con);
            }
}

?>