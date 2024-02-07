<?php
session_start(); 
include('../database/conn.php');
error_reporting(0);
if(!isset($_SESSION['radmin']))
{
    header("location: admin-login-page.php");
}

$b_name = $_GET['branchname'];

if(isset($_POST['done'])){

	$branchname =$_POST['branchName'];
	$q = "UPDATE tbl_branch SET branch_name='$branchname' WHERE branch_name='$b_name' ";

	$query = mysqli_query($conn,$q);


	if($query) {
		$success_msg = "updated Successfully ";
	}
	else {
		$error_msg = "Went Wrong";
	}

	$q1 = "UPDATE tbl_lab SET lab_branch='$branchname' WHERE lab_branch='$b_name' ";

	$query1 = mysqli_query($conn,$q1);


	if($query1) {
		$success_msg1 = "Branch Updated Successfully ";
	}
	else {
		$error_msg1 = "Something Went Wrong";
	}
	
}


?>



<html>
<head>
	<title> Lab Management </title>
	<link rel="stylesheet" type="text/css" href="../css/update-branch.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>

<form method="POST">
	 <a href="branch-details.php"> <i class="fas fa-undo" id="back-icon"></i> </a> <br>
	<center>
		<h1> Update Branch Details </h1>
		<br>
		<br>
		<i class="fas fa-tags"></i>
		<label> Enter Branch Name </label> <br> <br>
		<input type="text" class="input-field1" name="branchName" value="<?php echo $b_name ?>"> <br> <br>
		<input type="submit" class="input-field2" value="Update" name="done"> </button>
		<br>
		<br>
		<p class="success_msg"> <?php 
		if ($success_msg1){
		echo htmlentities($success_msg1);
	}?> </p>
	<p class="error_msg"> <?php if ($error_msg1) {
		echo htmlentities($error_msg1) ;
	}
		?> </p>

</center>
</form>
</body>
</html>