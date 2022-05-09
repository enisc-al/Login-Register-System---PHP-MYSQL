<?php
require ('db.php');
session_start();

$id = (isset($_SESSION['id']) ? $_SESSION['id'] : null);
$alert = (isset($_SESSION['alert']) ? $_SESSION['alert'] : null);

if($alert == '1') {
  echo '<body onload="alert();"></body>';
  unset($_SESSION['alert']);
}

$query = mysql_fetch_array(mysql_query( "SELECT `firstname`, `lastname` FROM `users` WHERE `id` = '".$id."'" ));

if(empty($id)){
?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="js/sweetalert.js"></script>
<style>
  .card {
  position: absolute;
  top:50%;
  left: 50%;
  transform: translate(-50% , -50%)
  }
  .button-a {
    text-align: center;
  }
</style>
<title>Index</title>
</head>
<body>

<center>

<br>
<a href="login.php" class="btn btn-primary right" role="button">Login</a>
<a href="register.php" class="btn btn-primary right" role="button">Register</a>
<br><br>
<h4>Welcome user, login or signup to continue</h4>
</center>
</body>
</html>
<?php } else {
	?>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="js/sweetalert.js"></script>
<style>
  .card {
  position: absolute;
  top:50%;
  left: 50%;
  transform: translate(-50% , -50%)
  }
  .button-a {
    text-align: center;
  }
</style>
<title>Index</title>
</head>
<body>

<center>
<br>
<a href="logout.php" class="btn btn-primary right" role="button">Log Out</a>
<br><br>
<h4>Welcome <span class="badge bg-secondary"><?php echo $query['firstname']; echo ' '; echo $query['lastname']; ?></span> you are currently logged in</h4>
</center>
<?php } ?>
</body>
<script type="text/javascript">
    function alert() {
    swal("Success!", "Successfully logged in", "success")
  }
</script>
</html>