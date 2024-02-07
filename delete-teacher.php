<?php
include_once '../database/conn.php';
session_start();
if(!isset($_SESSION['radmin']))
{
    header("location: admin-login-page.php");
}


if (@$_GET['uemail'])
{
 $uemail=$_GET['uemail'];
 $q3 = "SELECT * FROM alloted_labs WHERE t_uname='$uemail' ";
    $query3 = mysqli_query($conn,$q3);

	$result3=mysqli_fetch_array($query3);

	if($result3)
        {
        	$labname = $result3['lab_name'];
       	

				$q1 = "UPDATE tbl_lab SET flag=0 WHERE lab_name='$labname' ";

				$query1 = mysqli_query($conn,$q1);
				if($query1) {
					$success_msg1 = "Lab Updated Successfully ";
				}
				else {
					$error_msg1 = "Something Went Wrong";
				}
				
				}
				
 $sql=mysqli_query($conn,"Delete from user where email='$uemail'");
 $sql2=mysqli_query($conn,"Delete from alloted_labs where t_uname='$uemail'");

 	
				 header("location: teachers-details.php");
		}

?>