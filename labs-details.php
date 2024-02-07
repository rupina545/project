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

<!DOCTYPE html>
<html>
<head>
	<title> Lab Management </title>
	<link rel="stylesheet" type="text/css" href="../css/lab-details.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<style>
		#delete-icon{
			color: red;
		}
	</style>
</head>
<body>
	<form method="POST">
	<a href="after-admin-login.php"> <i class="fas fa-undo" id="back-icon"></i> </a> 
    <button class="add-lab-button" onclick="redirect2()" type="button"> <i class="fas fa-tags"></i>  &nbspAdd Lab </button>

    <div id="popup1" class="overlay">
        <div class="popup">
        	 <a class="close" href="#">&times;</a>
		
<form method="POST">
	<center>
		<h1> Enter Lab Details </h1>

		<i class="far fa-building"></i>
		<label> Select Branch Name </label> <br>
		<select name="branchName" class="div-field-1"  required>
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

		<i class="far fa-building"></i>
		<label> Enter Lab Name </label> <br> 
		<input type="text" class="field1" name="labName" required> <br> <br>

		<input type="submit" value="submit" class="submit-button" name="done"> </button>
		<br>
		<br>
		<p class="success_msg"> <?php 
		if ($success_msg){
		echo htmlentities($success_msg);
		} ?> </p>
		<p class="error_msg"> <?php if ($error_msg) {
		echo htmlentities($error_msg) ;
		}
		?> </p>

</center>
</form>
	</div>
		</div>
		<p class="text1">  List of Labs </p>
	
<center> 
	<table>
		<tr>
			<th> Lab ID </th>
			<th> Lab Name </th>
			<th> Branch Name </th>
			<th> Added On </th>
			<th> Edit </th>
			<th> Delete</th>
		</tr>

		<?php
		include('../database/conn.php');
			

			$q = "SELECT * FROM tbl_lab";

			$query = mysqli_query($conn,$q);

			while($res = mysqli_fetch_array($query)){
				$l_name = $res['lab_name'];
		?>

		<tr> 
			<td> <?php echo $res['lab_id']; ?> </td>
			<td> <?php echo $res['lab_name']; ?> </td>
			<td> <?php echo $res['lab_branch']; ?> </td>
			<td> <?php echo $res['added_on']; ?> </td>
			<td> 
				<?php echo" <a href='update-lab.php?id=$res[lab_id]& labname=$res[lab_name] & branchname=$res[lab_branch]' > <i class='fas fa-pencil-alt'> </i> </a>" ;?>
			</td>
			<td> 
				<?php echo" <a href='delete-lab.php?id=$res[lab_id] & labname=$l_name '> <i class='far fa-trash-alt' id='delete-icon'></i> </a>" ;?>
			</td>
		</tr>

	<?php } ?>

	</table>
</center>
</form>
<br>
<br>
<br>
<br>
<br>
<br>

</body>
</html>
<script>
    function redirect1() {
      window.location.href = "add-lab.php";
    }
    function redirect2() {
      window.location.href = "#popup1";
  		}
</script>