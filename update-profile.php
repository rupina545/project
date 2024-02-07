<?php
session_start(); 
include('../database/conn.php');
error_reporting(0);
if(!isset($_SESSION['radmin']))
{
    header("location: admin-login-page.php");
}
	
	
	$login_id = $_SESSION['login_id'];
	$res1 =  "SELECT * FROM  adminlogin WHERE login_id = '$login_id' ";
	$query1 = mysqli_query($conn,$res1);
	while($res1 = mysqli_fetch_array($query1)){
		$uname = $res1['name'];
		$email = $res1['email'];
		$upwd = $res1['password'];
	}
	
if(isset($_POST['submit-button'])){

	$username = $_POST['user-name'];
	$adminemail = $_POST['admin-email'];
	$adminpassword = $_POST['admin-password'];

	$q = " UPDATE adminlogin set name='$username', email='$adminemail', password='$adminpassword' ";
	$query5 = mysqli_query($conn,$q);
	
	if($query5) {
		$success_msg = "Profile Updated Successfully ";
	}
	else {
		$error_msg = "Something Went Wrong";
	}

	}

?>


<!DOCTYPE html>
<html>
<head>
	<title> Lab Management </title>
	<link rel="stylesheet" type="text/css" href="../css/update-profile.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
	<a href="after-admin-login.php"> <i class="fas fa-undo" id="back-icon"></i> </a> <br>
	<form method="POST"> 
		<center>
			<p> Enter Admin Details </p>
			<i class="fas fa-user mr-2" style="color: blue;"> </i>
			<label> Enter Admin username </label>
			<input type="text" name="user-name" class="field1" value="<?php echo $uname;?>">
			<br> <br>
			<i class="fas fa-envelope" style="color: blue;"> </i>
			<label> Enter Admin Email </label>
			<input type="text" name="admin-email" class="field1" value="<?php echo $email;?>">
			<br> <br>
			<i class="fas fa-key mr-2" style="color: blue;"> </i>
			<label> Enter Password </label>
			<input type="password" class="field1" name="admin-password" value="<?php echo $upwd;?>">
			<br> <br>
			<input type="submit"  class="input-field3" name="submit-button"> <br> <br>
			<p class="success_msg"> <?php 
				if ($success_msg){
					echo htmlentities($success_msg); 
				} ?> </p> 

				<p class="error_msg"> <?php if($error_msg) {
					echo htmlentities($error_msg) ; 
				} ?> </p>
		</center>
	</form>
</body>
</html>