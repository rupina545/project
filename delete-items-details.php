<?php
	include('../database/conn.php');


$labname = $_GET['l_name'];
$cat_id = $_GET['c_id'];
$cname = $_GET['c_name'];

$q = "DELETE FROM items_details WHERE category_name='$cname' AND lab_name='$labname' ";

$query = mysqli_query($conn,$q);

if($query)
{
	header("location: view-items-details.php?l_name=$labname & c_id=$cat_id & c_name=$cname");
	
}
else
{
	mysqli_error($conn);
}

?>