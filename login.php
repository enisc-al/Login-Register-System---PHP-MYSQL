<?php
require ('db.php');
session_start();

$id = (isset($_SESSION['id']) ? $_SESSION['id'] : null);
$alert = (isset($_SESSION['alert']) ? $_SESSION['alert'] : null);
$alert1 = (isset($_SESSION['alert1']) ? $_SESSION['alert1'] : null);
$alert2 = (isset($_SESSION['alert2']) ? $_SESSION['alert2'] : null);

if($alert == '1') {
  echo '<body onload="alert();"></body>';
  unset($_SESSION['alert']);
}
if($alert1 == '1') {
  echo '<body onload="alert1();"></body>';
  unset($_SESSION['alert1']);
}
if($alert2 == '1') {
  echo '<body onload="alert2();"></body>';
  unset($_SESSION['alert2']);
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
<title>Login</title>
</head>
<body>

<div class="card" style="width: 25rem;">
  <div class="card-body">
    <h3 class="card-title" style="text-align: center;">Login</h3><br>
    <form method="post" action="process.php">
    <input type="hidden" name="task" value="login" />
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
  </div>
  <div class="button-a">
  <button type="submit" class="btn btn-primary" style="left: 50%;">Login</button>
<br><br>
  <a href="register.php" style="text-decoration: none;color: black;align-content: center;">Not registered? <b>Register</b></a></div>
</form>
  </div>
</div>
</body>
<script type="text/javascript">
    function alert() {
    swal("Error!", "Incorrect email or password", "error")
  }
  function alert1() {
    swal("Error!", "Something went wrong", "error")
  }
  function alert2() {
    swal("Success!", "Successfully registered", "success")
  }
</script>
</html>

<?php } else {
  header('Location: index.php');
} ?>