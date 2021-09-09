<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>User:: Register</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an User</div>
      <div class="card-body">
        <form name="myForm" onsubmit="return validateForm()" method="post" action="register.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="firstName" name="fname" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="lastName" name="lname" class="form-control" placeholder="Last name" required="required">
                  <label for="lastName">Last name</label>
                </div>
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="contact1" name="contact" class="form-control" placeholder="Contact" required="required">
              <label for="contact1">Contact</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required">
              <label for="inputEmail">Email address</label>
            </div> <br>
            <div class="form-group">
            <div class="form-label-group">
              <input type="integer" id="cuid" name="cusid" class="form-control" placeholder="Enter Customer ID" required="required">
              <label for="cuid">Enter Customer ID</label>
            </div>
          </div>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="date" id="daob" name="dob" class="form-control" placeholder="Date of Birth" required="required" autofocus="autofocus">
                  <label for="daob">Date of birth</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <select name="gender" id="gen" class="form-control" required>
                <option disabled value="" selected="" >Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>

                  <!-- <input type="text" id="gen" name="gender" class="form-control" placeholder="Gender" required="required" autofocus="autofocus">
                  > -->
              </div>
            </div>
          </div>
           <div class="form-group mt-3">
            <div class="form-label-group">
              <input type="text" id="addre" name="addr" class="form-control" placeholder="Enter Address" required="required">
              <label for="addre">Enter Address</label>
            </div>          

          <div class="form-group mt-3">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="p" name="pass" class="form-control" placeholder="Password" required="required">
                  <label for="p">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="cp" name="cpass" class="form-control" placeholder="Confirm password" required="required">
                  <label for="cp">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-block" >Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Go back</a>
  
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script>
function validateForm() {
  var phone = document.forms["myForm"]["contact"].value;
  var n = phone.length;
  var x = document.forms["myForm"]["pass"].value;
  var y = document.forms["myForm"]["cpass"].value;
  if (phone.match(/^[0-9]+$/) == null)
  {
    
    alert("Phone Number Incorrect");
    return false;
  }
  else if(n != 10){
    alert("Phone Number Incorrect");
    return false;
      

    }
    else if(x.length<5){
      alert("Password Must be 5 characters");
      return false;
    }
  else if (x != y) {
    alert("Password Not Matched");
    return false;
  }
  else
  {
    return true;
  }
}
</script>

</body>

</html>

<?php
 if(isset($_POST['submit']))
{
            include '../dbms/dbconnection.php';
            $first_name= $_POST['fname'];
            $last_name=$_POST['lname'];
            $contact=$_POST['contact'];
            $dob=$_POST['dob'];
            $contact=$_POST['contact'];
            $email=$_POST['email'];
            $password=$_POST['pass'];
            $gender=$_POST['gender'];
            $address=$_POST['addr'];
            $confirmcode=$_POST['cusid'];
            
            if ($con == false)
            {
            die("ERROR: Could not connect. ".mysqli_connect_error());
            }
            $sql1 = "select * from connection where cid='$confirmcode'";
            $run1= mysqli_query($con,$sql1);
            $row=mysqli_num_rows($run1);
            if($row<1)
            {
              ?>
              <script>
              window.alert("Connection Id Not exist");
              window.open("register.php","_self");
              </script>
              <?php
            }
            else
            {

                        $sql = " INSERT INTO user (cid, fname, lname, dob, gender, email, contact, address, password)VALUES('$confirmcode','$first_name', '$last_name','$dob','$gender','$email','$contact','$address','$password')";
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
                            ?>
                            <script>
                                window.alert("Registeration Success");
                                window.open("login.php",'_self');
                            </script>
                        <?php
                        mysqli_close($con);
                        }
                        else
                        {
                        ?>
                        <script>
                            window.alert("Coonection ID Already Registered!!!!!");
                            //window.open("signup.php","_self");
                        </script>
                        <?php
                        mysqli_close($con);
                        }
            }
}

?>