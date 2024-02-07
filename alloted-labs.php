<?php
session_start(); 
include('../database/conn.php');

if(!isset($_SESSION['radmin']))
{
    header("location: admin-login-page.php");
}
	

?>





<!DOCTYPE html>
<html>
<head>
	<title> Lab Management </title>
	<link rel="stylesheet" type="text/css" href="../css/alloted-labs.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
	<a href="after-admin-login.php"> <i class="fas fa-undo" id="back-icon"></i> </a> 

	<button type="button" class="add-lab-button" onclick="pageredirect1()">
		<i class="fas fa-tags"></i> Allocate New Lab 
	</button>
	<center>
	<p class="text1">  List of Allotted Labs </p>

	<table>
		<tr>
			<th> ID </th>
			<th> Lab Name </th>
			<th> Teacher Name </th>
			<th> Alloted Date And Time </th>
			<th> Dellocate Lab </th>
		</tr>

		<?php
			$sql1 = " SELECT * FROM alloted_labs ";

			$query = mysqli_query($conn,$sql1);

			while($res = mysqli_fetch_array($query)){

		?>

		<tr>
			<td> <?php echo $res['id']; ?> </td>
			<td> <?php echo $res['lab_name']; ?> </td>
			<td> <?php echo $res['teacher_name']; ?> </td>
			<td> <?php echo $res['alloted_date']; ?> </td>
			<td> 
<a href="deallocate-lab.php?labname=<?php echo $res['lab_name'] ?>"> Dellocate 
</a>
			</td>
		</tr>

	<?php } ?>

	</table>
</center>
<br>
<br>
<br>
<br>
<br>
</body>
</html>

<script>
	 function pageredirect1() {
      window.location.href = "#popup1";
    }
</script>




<?php


include('../database/conn.php');
error_reporting(0);
if(!isset($_SESSION['radmin']))
{
    header("location: admin-login-page.php");
}
	$tname= $_POST['teacherName'];
	$q4 = "SELECT email FROM user WHERE name='$tname'";

			$query4 = mysqli_query($conn,$q4);
			while($res = mysqli_fetch_array($query4)){
				$temail= $res['email'];
			}


if(isset($_POST['done'])){
	$labname = $_POST['labName'];
	$teachername= $_POST['teacherName'];
	$q = "INSERT into `alloted_labs` ( `lab_name`,`teacher_name`,`t_uname`) VALUES ('$labname','$teachername','$temail')";

	$query = mysqli_query($conn,$q);
	
	
		if($query)
			{
			    $success_msg="Lab Allocated Sucessfully";
			}
	else {
		$error_msg = "Something Went Wrong";
	}


	$q1 = "UPDATE `tbl_lab` set flag=1 WHERE lab_name='$labname' ";
	
	$query1 = mysqli_query($conn,$q1);
	header("location: alloted-labs.php?success_msg=$success_msg");
	
}

?>



<html>
<head>
	<title> Lab Management </title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<style>
		
	</style>
</head>
<body>


	<div id="popup1" class="overlay">
        <div class="popup">
        	 <a class="close" href="#">&times;</a>
<form method="POST">

	<center>
		
		<h1 class="allocate-1"> Allocate Lab </h1>
		<br>
			<i class="fas fa-tags"></i>
		<label> Select Lab </label> <br> 
		<select name="labName"  class="input-field2" required>
			<option> 
				<?php

			$res =  "SELECT lab_name FROM tbl_lab WHERE flag=0";

				$query = mysqli_query($conn,$res);

				while($res = mysqli_fetch_array($query)){

				?> 
				<option><?php echo ($res['lab_name'])?>
				</option>
			<?php } ?>

			</option>
		</select>
		<br>  <br>
		<i class="fas fa-tags"></i>
		<label> Select A Teacher </label> <br>
		<select name="teacherName" class="input-field2" required>
			<option> 
				<?php

				$res =  "SELECT name FROM user ";

				$query = mysqli_query($conn,$res);

				while($res = mysqli_fetch_array($query)){

				?> 
				<option><?php echo ($res['name'])?>
				</option>
			<?php } ?>

			</option>
		</select>
		<br> <br>

		<input type="submit" class="input-field3" value="submit" name="done"> </button>
		<br>
		<br>
		<p class="success_msg"> <?php 
		if($_GET['success_msg'])
			{
			    echo $_GET['success_msg'];
			}
		 ?> </p> 

		<p class="error_msg"> <?php if($error_msg) {
			echo htmlentities($error_msg) ; 
		} ?> </p>


</center>
</form>
	</div>
	</div>
</body>
</html>