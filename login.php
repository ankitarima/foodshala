<!-- This is login page for restaurant  -->


<?php 
session_start();

include("includes/header.php");
include("includes/dbconnect.php");

if(isset($_POST['submit'])) {
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	$sql = "SELECT * FROM restaurant where email = '$email' LIMIT 1";
	$query = mysqli_query($db, $sql);
	if($query) {
    $row = mysqli_fetch_row($query);
    $dbemail = $row[5];
    $dbPassword = $row[6];
    $dbuser = $row[1];
    $dbuserId = $row[0];
    $dbuserType = $row[7];
	}
	if($email == $dbemail && $password == $dbPassword) {
		$_SESSION['user'] = $dbuser;
    $_SESSION['id'] = $dbuserId;
    $_SESSION['type'] = $dbuserType;
		header('Location: dashboard.php');
	}
	else {
		echo '<b><i>Incorrect credentials</i><b>';
	}
}
?>


<div class="container">
	<form method="POST" >
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="email" placeholder="email@example.com">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-4">
      <button type="submit" name="submit" style="text-align: center;" class="btn btn-primary">Log in</button>
    </div>
  </div>
</form>
</div>


<?php include("includes/footer.php") ?>