<!-- This is the dashboard
Where Resturant user can 
add new menu iteam.
And here they also recieve new orders -->


<?php 
session_start();

if($_SESSION['id']){

  // To filter the orders on the basis of restaurant
  $rid = $_SESSION['id'];

    include("includes/header.php") ;
    include("includes/dbconnect.php");

if(isset($_POST['submit'])) {
  // To create the menu ideam
	$name = strip_tags($_POST['name']);
	$price = strip_tags($_POST['price']);
	$foodtype = strip_tags($_POST['foodtype']);
	$r_id = $_SESSION['id'];

	$sql = "INSERT INTO menu(r_id,name,price,foodtype) VALUES('$r_id', '$name','$price', '$foodtype')";
	$query = mysqli_query($db, $sql);
		if($query) {
			echo "<script>alert('Menu Iteam Added');</script>";
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
    <label for="staticEmail" class="col-sm-2 col-form-label">Food Name</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="name" placeholder=" Food Name">
    </div>
  </div>
  <div class="form-group row">
    <label for="staticEmail" class="col-sm-2 col-form-label">Select Food Type</label>
    <select class="form-control" name="foodtype">
        <option>Food Type</option>
        <option value="veg"> Veg</option>
        <option value="non-veg">Non Veg</option>
    </select>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="price" placeholder="10.25">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-4">
      <button type="submit" name="submit" style="text-align: center;" class="btn btn-primary">Add Food</button>
    </div>
  </div>
</form>
</div>

<!-- to display the orders -->
<h1>Latest Orders</h1>

<table id="table" class="table table-bordered">
                <thead>
                    <th> Order ID</th>
                    <th>Food Name</th>
                    <th>User Name</th>
                    <th>Status</th>
                </thead>
                <tbody>
                <?php 

                // join operation to featch deatils of order

                    $sql = "SELECT order_log.id, menu.name, users.user_name, order_log.status
                    FROM ((order_log INNER JOIN menu ON order_log.f_id = menu.id ) INNER JOIN users ON order_log.u_id = users.id) WHERE order_log.r_id = '$rid'";
                    
                    $result = mysqli_query($db, $sql);

                    if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                         <tr>
                             <td><?php echo $row['id']; ?></td>
                             <td><?php echo $row['name']; ?></td>
                             <td><?php echo $row['user_name']; ?></td>
                             <td><?php echo $row['status']; ?></td>
                         </tr>
                    <?php
                    }
                    } 
                    else {
                        echo "0 results";
                            }

                    ?>
                </tbody>
            </table>


<?php include("includes/footer.php") ?>

<?php


}else{
  // if not login redirect login page
    header('Location: login.php');
}
?>

