<?php
	include('../database/conn.php');


$id = $_GET['id'];

$L_name = $_GET['labname'];




$q1 = "DELETE FROM tbl_lab WHERE lab_id=$id ";

$query1 = mysqli_query($conn,$q1);

$q2 = "DELETE FROM alloted_labs WHERE lab_name='$L_name' ";
$query2 = mysqli_query($conn,$q2);

$q3 = "DELETE FROM tbl_lab WHERE lab_name='$L_name' ";
$query3 = mysqli_query($conn,$q3);  


header('location: labs-details.php');

?>