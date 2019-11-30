<!-- This is the index page 
This page is visible to all but only user can buy food -->


<?php 
session_start();

include("includes/header.php");
include("includes/dbconnect.php");

if (isset($_SESSION['id'])){
  $type = $_SESSION['type'];
  $uid = $_SESSION['id'];
  // to filter food on the basis of veg and non-veg
  $ftype = $_SESSION['ftype'];

  $sql="SELECT * FROM menu where foodtype = '$ftype'";
}
else {
  $type = '';
  $uid = null;
  $ftype = null;

  // if no one is login then all foods will show
  $sql="SELECT * FROM menu ";
}


$result=mysqli_query($db,$sql);


?>


<div class="container">

  <div class="row">

<?php
while($row = mysqli_fetch_assoc($result)){

  ?>
 <div class="col">
      <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="https://via.placeholder.com/150" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['name']; ?></h5>
    <p><?php echo $row['foodtype']; ?></p>
    <?php
    // Not vissible to vendor 
    if($type != 'vendor'){
  ?>
  <!-- To order food -->
  <a href="order.php/?f_id=<?php echo $row['id']; ?>&r_id=<?php echo $row['r_id']; ?>&u_id=<?php echo $uid; ?>" class="btn btn-primary">Order</a>
<?php
;}
?>
    
  </div>
</div>
    </div>

  <?php
}

?>

<?php include("includes/footer.php") ?>
</body>
</html>