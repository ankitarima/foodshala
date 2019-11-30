<!-- Sigin -->

<?php 
session_start();

include("includes/header.php") ;
include("includes/dbconnect.php");

if(isset($_POST['submit'])) {
  echo "iin ";
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	$sql = "SELECT * FROM users where email = '$email' LIMIT 1";
	$query = mysqli_query($db, $sql);
	if($query) {
    //Geting values from db
    $row = mysqli_fetch_row($query);
    $dbuserId = $row[0];
    $dbuser = $row[1];
    $dbuserType = $row[2];
    $ftype = $row[3];
    $dbemail = $row[4];
    $dbPassword = $row[5];
	}
	if($email == $dbemail && $password == $dbPassword) {

    // creating session varaibles
		$_SESSION['user'] = $dbuser;
    $_SESSION['id'] = $dbuserId;
    $_SESSION['type'] = $dbuserType;
    $_SESSION['ftype'] = $ftype;
    echo("sucess");
		header('Location: index.php');
	}
	else {
		echo "<b><i>Incorrect credentials</i><b>";
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
      <button type="submit" name="submit" style="text-align: center;" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>

<a href="signup.php">Create Account</a>
</div>


<?php include("includes/footer.php") ?>