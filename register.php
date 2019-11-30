<!-- Registration page for resturant  -->


<?php 
session_start();

include("includes/header.php");
include("includes/dbconnect.php");

if(isset($_POST['submit'])) {

	$name = strip_tags($_POST['name']);
	$phone = strip_tags($_POST['phone']);
	$password = strip_tags($_POST['password']);
	$user_name = strip_tags($_POST['user_name']);
	$email = strip_tags($_POST['email']);
	$address = strip_tags($_POST['address']);
	$type = 'vendor';

	$sql = "INSERT INTO  restaurant(restaurant_name,address,phone,user_name,email,password,type) VALUES('$name', '$address','$phone', '$user_name', '$email',  '$password', '$type')";
	$query = mysqli_query($db, $sql);
		if($query) {
			$_SESSION['user'] = $name;
    		$_SESSION['type'] = $type;
			echo "Succesfully registered";
			header('Location: dashboard.php');
		}
		else {
			echo "Failed to register";
		}
}
?>


<div class="container">
	<form method="POST" >
	<div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Restaurant Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="name" placeholder="Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Phone Number</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="phone" placeholder="+91 xxxxxxxxxx">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="email" placeholder="email@example.com">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">User Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="user_name" placeholder="email@example.com">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Restaurant Address</label>
    <textarea class="form-control" name="address" rows="3"></textarea>
  </div>
  <div class="form-group row">
    <div class="col-sm-4">
      <button type="submit" name="submit" style="text-align: center;" class="btn btn-primary">Register</button>
    </div>
  </div>
</form>
</div>


<?php include("includes/footer.php") ?>