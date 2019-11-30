<?php
if (isset($_SESSION['id'])){
  $type = $_SESSION['type'];
	$name = $_SESSION['user'];
}
else {
  $name = '';
  $type = null;
}

?>


<!DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>FoodShala</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">FoodShala</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    <form class="form-inline my-2 my-lg-0">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <?php echo $name ?>
      </li>
    </ul>
    <?php 
    if($type == null){
      ?>
        <button style="padding: 10px;" class="btn btn-outline-success py-2 my-2 my-sm-0" type="button"><a href="signin.php">signIn</a></button>
      <button style="padding: 10px;" class="btn btn-outline-success py-2 my-2 my-sm-0" type="button"><a href="signup.php">signUp</a></button>
      <button style="padding: 10px;" class="btn btn-outline-secondary py-2 my-2 my-sm-0" type="button"><a href="resturant.php">Vendor</a></button>
    <?php
    }
    
    ?>
    </form>
    
<?php
if($type){
  ?>
  <button><a href="logout.php">logout</a></button>
<?php
;}
?>
  </div>
</nav>
