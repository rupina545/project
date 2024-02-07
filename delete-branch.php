<?php
	
	include('../database/conn.php');


	$id = $_GET['id'];

	$q = "DELETE FROM tbl_branch WHERE id=$id ";

	$query = mysqli_query($conn,$q);

	header("location: branch-details.php");




?>