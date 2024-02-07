<?php
session_start(); 
include('../database/conn.php');
error_reporting(0);
if(!isset($_SESSION['radmin']))
{
    header("location: admin-login-page.php");
}

	$id = $_GET['id'];
	$l_name= $_GET['labname'];
	$b_name = $_GET['branchname'];

if(isset($_POST['done'])){

	$branchname= $_POST['branchName'];
	$labname =$_POST['labName'];
	$q = "UPDATE tbl_lab SET lab_name='$labname', lab_branch='$branchname' WHERE lab_id=$id ";

	$query = mysqli_query($conn,$q);
	if($query) {
		$success_msg = "Lab Updated Successfully ";
	}
	else {
		$error_msg = "Something Went Wrong";
	}

	$q1 = "UPDATE alloted_labs SET lab_name='$labname' WHERE lab_name='$l_name' ";

	$query1 = mysqli_query($conn,$q1);
	if($query1) {
		$success_msg1 = "Lab Updated Successfully ";
	}
	else {
		$error_msg1 = "Something Went Wrong";
	}
	
}

?>



<html>
<head>
	<title> Lab Management </title>
	<link rel="stylesheet" type="text/css" href="../css/update-lab.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>

<form method="POST">
	<a href="labs-details.php"> <i class="fas fa-undo" id="back-icon"></i> </a> <br>
	<center>
		<h1> Enter Lab Details </h1> <br>

		<i class="fas fa-tags"></i>
		<label> Select Branch </label> <br>
		<select name="branchName" class="input-field2" required>
			<option> Select Branch
				<?php

				$res =  "SELECT branch_name FROM tbl_branch ";

				$query = mysqli_query($conn,$res);

				while($res = mysqli_fetch_array($query)){

				?> 
				<option><?php echo ($res['branch_name'])?>
				</option>
			<?php } ?>

			</option>
		</select>
		<br> <br>

		<i class="fas fa-tags"></i>
		<label > Enter Lab Name </label> <br> 
		<input type="text" class="input-field1" name="labName" value="<?php echo $l_name;?>"> <br> <br>

		<input type="submit" class="input-field3" value="submit" name="done"> </button>
		<br>
		<br>
		<p class="success_msg1"> <?php 
		if ($success_msg1){
		echo htmlentities($success_msg1);
		} ?> </p>
	<p class="$error_msg1"> <?php if ($error_msg1){
		echo htmlentities($error_msg1) ;
		}
		?> </p>

</center>
</form>
</body>
</html>