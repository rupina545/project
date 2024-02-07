<?php
session_start();
include_once('../database/conn.php');

if(!isset($_SESSION['ruser']))
{
 header("location: ../index.php");
}
else
{
  include '../database/conn.php';

    $I_id  = $_GET['i_id'];
    $L_name = $_GET['l_name'];
    $c_name = $_GET['cname'];

    $sql1 = "DELETE FROM items_category WHERE item_id = $I_id ";

    $query1 = mysqli_query($conn,$sql1);

   
    if($query1)
    {
    	$sql2 = "DELETE FROM items_details WHERE category_name='$c_name' AND lab_name='$L_name' ";

 		$query2 = mysqli_query($conn,$sql2);
 		if($query2)
 		{
 			header("location: view-category.php?l_name=$L_name");
 		}
    }

}

?>

