<!-- This is Order page  -->

<?php 
session_start();
// only works if user login
if($_SESSION['id']){

    if($_GET['f_id']){


        include("includes/dbconnect.php");
		// gets food id, user id and restaurant id
    $fid = $_GET['f_id'];
	$rid = $_GET['r_id'];
	$uid = $_GET['u_id'];

	$sql = "INSERT INTO order_log(f_id, r_id, u_id) VALUES('$fid', '$rid', '$uid')";
	$query = mysqli_query($db, $sql);
		if($query) {
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
			$url = 'index.php';
			header("Location: http://$host$uri/$url");
			exit;
		}
		else {
			echo "Failed to register";
		}

    }
}else{
    $host  = $_SERVER['HTTP_HOST'];
	$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	$url = 'signin.php';
	header("Location: http://$host$uri/$url");
	exit;
}


?>