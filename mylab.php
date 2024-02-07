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
	<link rel="stylesheet" type="text/css" href="../css/my-lab.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	
</head>
<body>
	<a href="after-teacher-login.php"> <i class="fas fa-undo" id="back-icon"></i> </a> 
	<p class="text1"> Welcome <?php $sql1=mysqli_query($conn,"select name from `user` WHERE email='$email';");
	while($row=mysqli_fetch_array($sql1))
	{
		$uname = $row['name'];
	    echo $row['name'];
	    	    echo '<br>';


	} ?>
		
	</p>

</body>
</html>

<?php

		 
 

	$sql1=mysqli_query($conn,"select name from `user` WHERE email='$email';");
	while($row=mysqli_fetch_array($sql1))
	{
		$uname = $row['name'];
		

	}

	$sql=mysqli_query($conn,"select * from `alloted_labs` WHERE teacher_name='$uname';");

	$c=1;
	if(mysqli_num_rows($sql)>0){

			echo "<p class='text2'> Your Allotted Labs Are:<i class='far fa-hand-point-down' id='hand-icon'> </i>  </p> ";

		echo '<table class="table">
    <tbody>
    <tr>
    <center>
    <th> S.no &nbsp &nbsp</th>
    <th>Lab Name &nbsp &nbsp</th>
    <th>Teacher Name &nbsp &nbsp</th>
    <th>Teacher Email &nbsp &nbsp</th>
    <th>Alloted Date& Time &nbsp &nbsp</th>
    <th> Action </th>
    </center>
    </tr>
    ';


		while($row=mysqli_fetch_array($sql))
		{

			
		$labname = $row['lab_name'];	
		
	    echo '<tr>
	    <td>'.$c++.'</td>
	     <td>'.$labname.'</td>
	     <td>'.$row['teacher_name'].'</td>
	     <td>'.$row['t_uname'].'</td>
	     <td>'.$row['alloted_date'].'</td>';
	    echo " <td> <a href='view-category.php?l_name= $labname & lab_id=' > <button class='view-button'> View</a></td>
			</tr>";
			echo '<tbody>
	   
	     ';  
		   	
		}
		echo "</table>";
	}
	else{
		echo "<p class='null-message'> Sorry <i class='far fa-frown-open'></i> !! You Don't Have Any Class Assigned Yet. Wait For The Admin To Assign You A Class </p> ";
	}
?>
<br>
<br>
<br>
<br>
<br>

