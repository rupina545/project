<?php
	include('../database/conn.php');

$labname = $_GET['labname'];

$sql2 = " Select * from `alloted_labs` where lab_name='$labname' ";

$query = mysqli_query($conn,$sql2);
while($res = mysqli_fetch_array($query)){
	$id = $res['id'];
}

$sql1 = "DELETE FROM `alloted_labs` WHERE id=$id ";

$query = mysqli_query($conn,$sql1);
header('location: alloted-labs.php');
$sql3 = "UPDATE `tbl_lab` set flag=0 WHERE lab_name='$labname' ";

$query = mysqli_query($conn,$sql3);
?>