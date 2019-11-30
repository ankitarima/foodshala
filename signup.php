User Sign up page

<?php 
session_start();

include("includes/header.php") ;
include("includes/dbconnect.php");

if(isset($_POST['submit'])) {

  $name = strip_tags($_POST['name']);
  $ftype = strip_tags($_POST['foodtype']);
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);
	$type = 'user';

	$sql = "INSERT INTO users(user_name,type,foodtype,email,password) VALUES('$name', '$type','$ftype','$email', '$password')";
	$query = mysqli_query($db, $sql);
		if($query) {
			$_SESSION['user'] = $name;
    		$_SESSION['type'] = $type;
			echo "Succesfully registered";
			header('Location: index.php');
		}
		else {
			echo "Failed to register";
		}
}
?>


<div class="container">
	<form method="POST" >
	<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="name" placeholder="Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="email" placeholder="email@example.com">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Select Food Type</label>
    <select class="col-sm-4" name="foodtype">
        <option>Food Type</option>
        <option value="veg"> Veg</option>
        <option value="non-veg">Non Veg</option>
    </select>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-4">
      <button type="submit" name="submit" style="text-align: center;" class="btn btn-primary">Sign Up</button>
    </div>
  </div>
</form>
</div>


<?php include("includes/footer.php") ?>