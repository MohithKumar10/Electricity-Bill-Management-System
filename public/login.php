<?php
  session_start();
  if(isset($_SESSION["cusname"]))
  {
    ?>
    <script>
        window.open("main.php","_self");
    </script>
    <?php
  }
  else if(isset($_SESSION["staffname"]))
    {
    ?>
    <script>
        window.open("../staff/index.php","_self");
    </script>
    <?php
  }
  else
  {

  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <style type="text/css">
     body, html {
        height: 100%;
          }
      .bg {
        
        background-image: linear-gradient(rgba(0,0,0,0.45),rgba(0,0,0,0.45)), url("../images/img2.jpg");
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;

}
</style>
	
	<!-- css files -->
    <link href="../css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="../css/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
    <link href="../css/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->

	<!-- //css files -->
	
	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!-- //google fonts -->
	<style type="text/css">
		 body{
      background-color: #f2f2f2;
      height: 100vh;
      background-size: cover;
      background-position: center; /*This is for adding the black shade on the photo*/
  </style>
  
</head>
<body >
	 <div class="bg">
	 <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  		<h5 class="my-0 mr-md-auto font-weight-normal"><a href="index.php" > My Electricity</a></h5>
  		<a class="btn btn-outline-primary" href="register.php">Register</a>
      <a class="btn btn-outline-primary ml-4" href="../index.php">Home</a>
  		
	</div>
	<!-- Login box code strats here-->
	<div class="row justify-content-center mt-5">
		<div class="border border-warning p-4" >
			<div class="form-group">
				<h1 style="color: #ffffff;">Login</h1>
  			</div>
            
            <form method="post" action="login.php">
			    <div class="form-group">
				    <label for="Email" style="color:#c4ff4d;">Email address</label>
    			        <input type="text" class="form-control" id="Email" name="username" aria-describedby="emailHelp" placeholder="Enter Username">
    			                                   
  				</div>
  					                     
  				<div class="form-group">
    				<label for="Password" style="color:#c4ff4d;">Password</label>
    				    <input type="password" class="form-control" id="Password" name="password" placeholder="Password">
  				</div>
  				
  				<button type="submit" class="btn btn-primary mt-4" name="submit">Sign In</button><br><br>
  					 
			</form>			
		</div>
	</div>

	<!-- Login box code Ends here-->
</div>


  
       



</body>
</html>
<?php
  include '../dbms/dbconnection.php';
  if(!$con)
  {
    die("ERROR: Could not connect: ".mysqli_connect_error()); 
  }
  if(isset($_POST['submit']))
  {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query1="SELECT * FROM staff WHERE email='$username' AND password='$password'";
    $query2="SELECT * FROM user WHERE email='$username' AND password='$password'";
    /*if (mysqli_query($con, $query)) 
    { 
      echo "<h1>You have successfully signed up</h1>"; 
    } 
    else
    { 
      echo "ERROR: Could not able to execute $query.".mysqli_error($con); 
    }*/
    $run1=mysqli_query($con,$query1);
    $run2=mysqli_query($con,$query2);
    $row1=mysqli_num_rows($run1);
    $row2=mysqli_num_rows($run2);
    $data2=mysqli_fetch_assoc($run2);
    if($row1>=1)
    {
      $run1=mysqli_query($con,$query1);
      $data1=mysqli_fetch_assoc($run1);
       $id1=$data1['fname'];
      $_SESSION["staffname"]=$id1;
      ?>
      <script>
       window.open("../staff/index.php","_self");
      </script>
    <?php   
    }
    else if ($row2>=1)
    {
      $run2=mysqli_query($con,$query2);
      $data2=mysqli_fetch_assoc($run2);
      $id2=$data2['fname'];
      $_SESSION["cusname"]=$id2;
      $_SESSION["cid"]=$data2['cid'];
      ?>
      ?>
      <script>
        window.open("main.php","_self");
      </script>
     <?php      
        
    }
    else
    {
       ?>
      <script>
        window.alert('User name or password error');

        //window.open("main.php","_self");
      </script>
     <?php
       
      
    } 
    }
  
?>