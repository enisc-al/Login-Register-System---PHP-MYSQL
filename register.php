<?php
require ('db.php');
session_start();

$id = (isset($_SESSION['id']) ? $_SESSION['id'] : null);
$alert = (isset($_SESSION['alert']) ? $_SESSION['alert'] : null);
$alert1 = (isset($_SESSION['alert1']) ? $_SESSION['alert1'] : null);

if($alert == '1') {
  echo '<body onload="alert();"></body>';
  unset($_SESSION['alert']);
}
if($alert1 == '1') {
  echo '<body onload="alert1();"></body>';
  unset($_SESSION['alert1']);
}

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
<title>Register</title>
</head>
<body>


<div class="card" style="width: 25rem;">
  <div class="card-body">
    <h3 class="card-title" style="text-align: center;">Register</h3><br>
	<form method="post" action="process.php">
	<input type="hidden" name="task" value="register" />
  <div class="mb-3">
    <label for="exampleInputFname" class="form-label">First name</label>
    <input type="text" class="form-control" name="fname" id="exampleInputFname" aria-describedby="fnameHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputLname" class="form-label">Last name</label>
    <input type="text" class="form-control" name="lname" id="exampleInputLname" aria-describedby="lnameHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
  </div>
  <div class="button-a">
  <button type="submit" class="btn btn-primary" style="left: 50%;">Register</button>
<br><br>
  <a href="login.php" style="text-decoration: none;color: black;align-content: center;">Already registered? <b>Login</b></a></div>
</form>
</div>
</div>

</body>
<script type="text/javascript">
    function alert() {
    swal("Error!", "Something went wrong", "error")
  }
function alert1() {
    swal("Error!", "Email is currently registered", "error")
  }
</script>
</html>

<?php } else {
  header('Location: index.php');
} ?>