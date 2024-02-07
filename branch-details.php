<?php
session_start();
error_reporting(0); 
include('../database/conn.php');
error_reporting();
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
<!DOCTYPE html>
<html>
<head>
	<title> Lab Management </title>
	
	<link rel="stylesheet" type="text/css" href="../css/branch-details.css">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>
<body>
	<form method="POST"> 
	<a href="after-admin-login.php"> <i class="fas fa-undo" id="back-icon"></i> </a> <br>
    <button class="add-teacher-button" onclick="redirect1()" type="button"> <i class="fas fa-tags" style="color: blue";></i> &nbspAdd Branch </button>

    <div id="popup1" class="overlay">
        <div class="popup">
        	 <a class="close" href="#">&times;</a>

        	 
        	 <h1> Enter Branch Details </h1>
        	<div class="div-field-1"> 
        	<i class="far fa-building" id="branch-icon"></i>
			<label> Enter Branch Name </label> <br> 
			<input type="text" class="field1" name="branchName" required> <br> 
			</div>
			<center> 
			<input type="submit" class="submit-button" value="submit" name="done"> </center>
			<p class="success_msg"> <?php 
			if ($success_msg){
			 echo htmlentities($success_msg); 
			} ?> </p>
			<p class="error_msg"> <?php 
			if ($error_msg) {
			echo htmlentities($error_msg) ;
			}
			?> </p>
        </div>
    </div>
	
	<br> <br> 
</form>
	<form method="POST">
<center> 
	<div class="text-1">
        Branch Details
    </div>
	<table>
		<tr>
			<th> ID </th>
			<th> Branch Name </th>
			<th> Edit </th>
			<th> Delete</th>
		</tr>

		<?php
		include('../database/conn.php');
			

			$q = "SELECT * FROM tbl_branch";

			$query = mysqli_query($conn,$q);

			while($res = mysqli_fetch_array($query)){
				$Branchname = $res['branch_name'];
				
		?>

		<tr> 
			<td> <?php echo $res['id']; ?> </td>
			<td> <?php echo $res['branch_name']; ?> </td>
			<td> 
				<?php echo "<a href='update-branch.php?branchname=$res[branch_name]'> <i class='fas fa-pencil-alt' id='edit-icon'></i> </a> "; ?>
			</td>
			

			<td> 
				<a href="delete-branch.php?id=<?php echo $res['id']?> & b_name=$Branchname"> 
					<i class="far fa-trash-alt" style="color: red";></i></a>
			</td>
		</tr>

	<?php } ?>

	</table>
</center>
</form>

</body>
</html>

<script>
    function redirect1() {
      window.location.href = "#popup1";
  		}
</script>
