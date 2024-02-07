<?php
session_start();
include_once('../database/conn.php');

if(isset($_SESSION['ruser']))
{
$email= $_SESSION['remail'];
}
else
{
    header("location: ../index.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title> Lab Management </title>
	<link rel="stylesheet" type="text/css" href="../css/display-labs.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>

	<a href="displaying-branch.php"> <i class="fas fa-undo" id="back-icon"></i> </a>
	<p class="text-1"> Select A Lab Whose Information You Want</p>
	<br> <br> 
<center> 
	<table>
		<tr>
			<th> S.No &nbsp &nbsp</th>
			<th> Lab Name &nbsp &nbsp </th>
			<th> Action </th>
		</tr>

		<?php
		include('../database/conn.php');
			
			$branchName = $_GET['branchname'];
			$q = "SELECT lab_name FROM tbl_lab where lab_branch='$branchName' ";

			$query = mysqli_query($conn,$q);

			$c=1;
			while($res = mysqli_fetch_array($query)){

		?>

		<?php 
			$labname = $res['lab_name'];	
		?>
		<tr> 
			 <td> <?php echo $c++; ?> </td> 
			<td> <?php echo $res['lab_name']; ?> </td>
		<?php echo " <td> <a href='view-category-2.php?l_name= $labname & branchname=$branchName' > <button class='view-button'> View</a> </td>"  ?> 
			
		</tr>

	<?php } ?>

	</table>
</center>

</body>
</html>