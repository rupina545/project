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
	<link rel="stylesheet" type="text/css" href="../css/display-branch.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>

	<a href="after-teacher-login.php"> <i class="fas fa-undo" id="back-icon"></i> </a>

	<p class="text-1"> Select A Branch Whose Labs You Want To See</p>
	<br> <br> 
<center> 
	<table>
		<tr>
			<th> S.No &nbsp &nbsp</th>
			<th> Branch Name </th>
		</tr>

		<?php
		include('../database/conn.php');
			

			$q = "SELECT * FROM tbl_branch";

			$query = mysqli_query($conn,$q);

			$c=1; 
			while($res = mysqli_fetch_array($query)){

		?>

		<tr> 
			 <td> <?php echo $c++; ?> </td> 
			<td> <a href="display-labs.php?branchname=<?php echo $res['branch_name']; ?>"><?php echo $res['branch_name'];?> </td>
		</tr>

	<?php } ?>

	</table>
</center>

</body>
</html>