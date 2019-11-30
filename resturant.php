<!-- Options for vendor to login or register  -->

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
</nav>

<div class="container">

<div class="row">
    <div class="col">
      <div class="card" style="width: 18rem;">
       <div class="card-body">
        <h5 class="card-title">Register</h5>
        <a href="register.php" class="btn btn-primary">Register</a></div>
      </div>
    </div>
  </div>
  <div class="col">
      <div class="card" style="width: 18rem;">
       <div class="card-body">
        <h5 class="card-title">Login</h5>
        <a href="login.php" class="btn btn-primary">Login</a></div>
      </div>
    </div>
  </div>
</div>

</div>

<?php include("includes/footer.php") ?>
</body>
</html>
