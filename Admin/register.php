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

  <title>Admin :: Register Staff</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register Staff</div>
      <div class="card-body">
        <form name="myForm" onsubmit="return validateForm()" method="post" action="register.php">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="fname" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="firstName">First name</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" name="lname" class="form-control" placeholder="Last name" required="required">
                  <label for="lastName">Last name</label>
                </div>
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="form-label-group">
              <input type="integer" name="contact" class="form-control" placeholder="Contact" required="required">
              <label for="inputEmail">Contact</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" name="email" class="form-control" placeholder="Email address" required="required">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="date" name="dob" class="form-control" placeholder="Date of Birth" required="required" autofocus="autofocus">
                  <label for="firstName">Date of birth</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="date" name="doj" class="form-control" placeholder="Joining Date" required="required">
                  <label for="lastName">Joining Date</label>
                </div>
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <select name="gender" id="gen" class="form-control" required>
                <option disabled value="" selected="" >Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="integer" name="salary" class="form-control" placeholder="Salary" required="required">
                  <label for="lastName">Salary</label>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" name="pass" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Password</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" name="cpass" class="form-control" placeholder="Confirm password" required="required">
                  <label for="confirmPassword">Confirm password</label>
                </div>
              </div>
            </div>
          </div>
          <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="main.php">Go back</a>
  
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
            $doj=$_POST['doj'];
            $salary=$_POST['salary'];
            $contact=$_POST['contact'];
            $email=$_POST['email'];
            $password=$_POST['pass'];
            $gender=$_POST['gender'];
            if ($con == false)
            {
            die("ERROR: Could not connect. ".mysqli_connect_error());
            }
            $confirmcode=rand();
            $sql = "INSERT INTO staff (sid, fname, lname, email, contact, dob, doj, salary, password,gender)VALUES('$confirmcode','$first_name', '$last_name','$email','$contact','$dob','$doj','$salary','$password','$gender')";
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
                    window.alert("User Added Success");
                    window.open("index.php",'_self');
                </script>
            <?php
            mysqli_close($con);
            }
            else
            {
            ?>
            <script>
                window.alert("Email ID Already Exists!!!!!");
                //window.open("signup.php","_self");
            </script>
            <?php
            mysqli_close($con);
            }
}

?>