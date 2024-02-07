<?php
session_start(); 
include('../database/conn.php');
error_reporting(0);
if(!isset($_SESSION['radmin']))
{
    header("location: admin-login-page.php");
}

if(isset($_POST['done'])){

	$branchname =$_POST['branchName'];
	$q = "INSERT into `tbl_branch` ( `branch_name`) VALUES ('$branchname')";

	$query = mysqli_query($conn,$q);
	if($query) {
		$success_msg = "Branch Added Successfully ";
	}
	else {
		$error_msg = "Something Went Wrong";
	}
	
}

?>



<html>
<head>
	<title> Lab Management </title>
</head>
<body>

<form method="POST">
	<center>
		<h1> Enter Branch Details </h1>
		<label> Enter Branch Name </label> <br> 
		<input type="text" name="branchName"> <br> <br>

		<input type="submit" value="submit" name="done">
		<br>
		<br>
		<?php 
		if ($success_msg){
		echo htmlentities($success_msg);
	}
	else {
		echo htmlentities($error_msg) ;
	}
		?>

</center>
</form>
</body>
</html>