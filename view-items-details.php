<?php
session_start();
include_once('../database/conn.php');
error_reporting();
if(isset($_SESSION['ruser']))
{
$email= $_SESSION['remail'];
}
else
{
    header("location: ../index.php");
}

	$cat_id = $_GET['c_id'];

	$labname = $_GET['l_name'];

	$cname = $_GET['c_name'];

    
    
    echo "  <a href='view-category.php?l_name=$labname'> <i class='fas fa-undo' id='back-icon'></i> </a> <br>";
   


    



?>




<!DOCTYPE html>
<html>
<head>

	<title> Lab Management </title>

	<link rel="stylesheet" type="text/css" href="../css/view-items-details.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

</head>
<body>


    <form method="POST">





       

            
           

            <?php 

                $sql1 = "SELECT * FROM items_details WHERE category_name = '$cname' AND lab_name='$labname' ";

                $query1 = mysqli_query($conn,$sql1);

                while($res = mysqli_fetch_array($query1))
                {

            ?>

    <center> 
    <h1 class="heading1"> Items Details Are Shown Below: <i class="far fa-hand-point-down" id="hand-icon"> </i> </h1>   
        <table>
        

            <tr> 
                <td> 
                    <span class="h1"> Item Name: </span>
                    <span class="t1"> <?php echo $res['category_name'];  ?> </span>
                </td> 
            </tr> 

            <tr> 
                <td> 
                    <span class="h1"> Total Quantity: </span>
                    <span class="t1"> <?php echo $res['details_qty']; ?> </span>
                </td> 
            </tr>

            <tr> 
                <td> 
                    <span class="h1"> Indent No: </span> 
                    <span class="t2"> <?php echo $res['indent_no']; ?> </span>
                </td>
            </tr>

            <tr>
                <td>
                    <span class="h1"> Indent Date: </span> 
                    <span class="t1"> <?php echo $res['indent_date']; ?> </span>
                </td> 
            </tr>

            <tr>
                <td> 
                    <span class="h1"> Book Value: </span> 
                    <span class="t3"> <?php echo $res['book_value']; ?> </span> 
                </td> 
            </tr>

            <tr> 
                <td> 
                    <span class="h1"> Working: </span> 
                    <span class="t4"> <?php echo $res['working_qty']; ?> </span> 
                </td>
            </tr>

            <tr> 
                <td> 
                    <span class="h1"> Non-Working: </span> 
                    <span class="t5"> <?php echo $res['non_qty']; ?> </span>
                </td> 
            </tr>

            <tr>
                <td> 
                    <span class="h1"> Remarks: </span> 
                    <span class="t6"> <?php echo $res['details_remarks']; ?> </span>
                </td> 
            </tr>

       


            





        </table>

        <br>
         <?php
            echo" <a href='update-items-details.php?lab_name=$labname &c_id=$cat_id & c_name=$cname' class='input-field2'> Update Item Details </a> "; 

            echo" <a href='delete-items-details.php?l_name=$labname &c_id=$cat_id & c_name=$cname' class='input-field3'> delete Item Details </a> "; 
        ?>
        <?php } ?>

    </center>
    	
    	


    </form>
    <br>
    <br>
    <br>

   
    <?php 
    if(mysqli_num_rows($query1)==0)
    {
        echo " <p class='message_1'>Sorry <i class='far fa-frown-open'></i> !! No Record Found. Add Deatils Of Selected Item. </p> ";

        echo "<br>";

    echo" <a href='add-items-details.php?lab_name=$labname &c_id=$cat_id & c_name=$cname' class='input-field4'> add item details </a> " ;
    }


  
    ?>

    


</body>
</html>