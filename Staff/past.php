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
<html>
<head>
	<title>Past</title>
</head>
<body>



</body>
</html>
<?php
$custid=$_POST['custid'];
$_SESSION['custid']=$custid;
?>
<script> 
	window.open("add.php","_self")
</script>
?>