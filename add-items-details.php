<?php
session_start();
include_once('../database/conn.php');
error_reporting(0);
if(isset($_SESSION['ruser']))
{
$email= $_SESSION['remail'];
}
else
{
    header("location: ../index.php");
}
    
    $cat_id = $_GET['c_id'];

    $labname = $_GET['lab_name'];

	$cname = $_GET['c_name'];
	

	if(isset($_POST['submit1']))
	{
		$quantity = $_POST['qty'];

		$I_no = $_POST['i_no'];

		$I_date = $_POST['i_date'];

		$Book_Value = $_POST['b_value'];

		$W_Qty = $_POST['w_qty'];

		$N_Qty = $_POST['n_qty'];

		$Re_marks = $_POST['re_marks'];

		$sum = $W_Qty + $N_Qty;

		if($sum==$quantity)
		{
			$sql1 = "INSERT INTO `items_details` (`category_name`,`details_qty`,`indent_no`,`indent_date`,`book_value`,`working_qty`,`non_qty`,`details_remarks`,`lab_name`) VALUES ('$cname','$quantity','$I_no','$I_date','$Book_Value','$W_Qty','$N_Qty','$Re_marks','$labname') ";
		    
		    $query1 = mysqli_query($conn,$sql1);

		    if($query1)
		    {
			    $sucess_msg1 = "Details Added Successfully";
			}
			else
			{  
				$error_msg1 = "Something Went Wrong";
			}
		}
		else{
			$error_msg2 = "Please Enter Valid Quantity Details";
		}
	}   


?>




<!DOCTYPE html>
<html>
<head>

	<title> Lab Management </title>

	<link rel="stylesheet" type="text/css" href="../css/add-items-details.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

</head>
<body>

	<?php
    echo " <a href='view-items-details.php?c_id=$cat_id & l_name=$labname & c_name=$cname'> <i class='fas fa-undo' id='back-icon'></i> </a> <br>";
    ?>

    <form method="POST">

    	<center>
    		<h3 class="heading1"> Add Items details Here: <i class="far fa-hand-point-down" id="hand-icon"> </i> </h3>   

    		 <span class="h1"> Item Name : </span> 
    		 <span class="t1"> <?php echo $cname ; ?>  </span>
    		<br>
    	

    		<span class="h1"> Total Quantity: </span>
    		<span class="t1"> <input type="number" class="input-fields" name="qty" required> </span>
    		<br>
    		

    		<span class="h1"> Indent No: </span>
    		<span class="t3"> <input type="number" class="input-fields" name="i_no" > </span>
    		<br>
    		

    		<span class="h1"> Indent Date: </span>
    		<span class="t4"> <input type="date" class="input-fields" name="i_date" > </span>
    		<br>
    		

    		<span class="h1"> Book Value: </span>
    		<span class="t5"> <input type="number" class="input-fields" name="b_value"> </span>
    		<br>
    	

    		<span class="h1"> Working Quantity: </span>
    		<span class="t6"> <input type="number" class="input-fields" name="w_qty" required> </span>
    		<br>
    		

    		<span class="h1"> Non-Working Quantity: </span>
    		<span class="t7"> <input type="number" class="input-fields" name="n_qty" required> </span>
    		<br>
    

    		<span class="h1"> Remarks: </span>
    		<span class="t8"> <input type="text" class="input-fields" name="re_marks"> </span>
    		<br>
    	


    		<input type="submit" class="input-field2" name="submit1" value="submit">
    		<br>
    		<br>

				<p class="msg">
    		<?php 
	    		if($sucess_msg1)
	    		{
	    			echo $sucess_msg1;
	    		}
	    		if($error_msg1)
	    		{
	    			echo $error_msg1;
	    		}
	    		if($error_msg2)
	    		{
	    			echo $error_msg2;
	    		}
	    	?>
	    </p>
    	</center>


    </form>

<br>
<br>

</body>
</html>