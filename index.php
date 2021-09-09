<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
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
	
	<!-- css files -->
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' /><!-- bootstrap css -->
    <link href="css/style.css" rel='stylesheet' type='text/css' /><!-- custom css -->
    <link href="css/font-awesome.min.css" rel="stylesheet"><!-- fontawesome css -->
	<!-- //css files -->
	
	<!-- google fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!-- //google fonts -->
  <style type="text/css">
    .ad{
  animation:blinkingText 1.5s infinite;
}
@keyframes blinkingText{
  0%{   color: #EE82EE;  }
  14%{  color: #4B0082; }
  28%{  color: blue; }
  42%{  color:green;  }
  56% {  color:yellow;  }
  84%{  color:orange;  }
  100%{ color: red;  }
}
  </style>
	<style type="text/css">
		 body, html {
  			height: 100%;
					}
			.bg {
  			
  			background-image: linear-gradient(rgba(0,0,0,0.45),rgba(0,0,0,0.45)), url("images/img.jpg");
  			height: 100%;
  			background-position: center;
  			background-repeat: no-repeat;
  			background-size: cover;

}
  </style>

  
</head>
<body  >
	<div class="bg">
	 <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  		<h5 class="my-0 mr-md-auto font-weight-normal"><a href="index.php" > My Electricity</a></h5>
  		<a class="btn btn-outline-primary" href="public/login.php">Login</a>

	</div>
  <div>
  </div>
	
	<h1 class="text-center ad" style="margin-top: 15%; color: white;"> Welcome To Online Electricity Bill Payment Portal </h1>
	<h4 class="text-center mt-5"> <a href="Admin/index.php" class="border p-2 btn btn-outline-danger"><p style="font-size: 20px; color:white;">Login as Admin</p></a>
</div>


  
       



</body>
</html>