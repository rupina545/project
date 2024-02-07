<?php
session_start(); 
include('../database/conn.php');
error_reporting(0);
if(!isset($_SESSION['radmin']))
{
    header("location: admin-login-page.php");
}

if(isset($_POST['done'])){

	$branchname= $_POST['branchName'];
	$labname =$_POST['labName'];
	$q = "INSERT into `tbl_lab` ( `lab_name`,`lab_branch`) VALUES ('$labname','$branchname')";

	$query = mysqli_query($conn,$q);
	if($query) {
		$success_msg = "Lab Added Successfully ";
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
		<h1> Enter Lab Details </h1>

		<select name="branchName" required>
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

		<label> Enter Lab Name </label> <br> 
		<input type="text" name="labName"> <br> <br>

		<input type="submit" value="submit" name="done"> </button>
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