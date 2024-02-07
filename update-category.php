<?php
session_start();
error_reporting(0);
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


<html>
    <head>
        <title> Lab Management </title>
        
    <link rel="stylesheet" type="text/css" href="../css/update-category.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>

    </head>
<body>
    <?php

    $cat_id = $_GET['c_id'];

    $labname = $_GET['l_name'];

    $cname = $_GET['c_name'];
    

   echo" <a href='view-category.php?l_name=$labname'> <i class='fas fa-undo' id='back-icon'></i> </a> ";
    ?>

<?php
    include '../database/conn.php';

    $I_id  = $_GET['i_id'];
    $cat_name = $_GET['cname'];
    
    $L_name = $_GET['l_name'];

    $sql1 = " SELECT * FROM items_category WHERE item_id = '$I_id' ";

    $sql2 = mysqli_query($conn,$sql1);

    if(mysqli_num_rows($sql2)>0){
           foreach($sql2 as $row){

                $Item_id = $row['item_id'];
                $Item_image = $row['item_image'];
                $Item_name = $row['item_name'];


               ?>
        <form method="POST" enctype="multipart/form-data">
            <center>
              
                
                <b class="text1"> Update Category Details </b> <br>
                
                <br>
                <br>

                <span class="heading-1"> Old Image: 
                 <i class="far fa-hand-point-down" id="hand-icon"> </i>  
                </span> <br>
                <img src="<?php echo $Item_image; ?>" class="img-1"> 

               

                <label class="label-1"> Select Image For Category </label> <br>  
                <input type="file" name="new_photo" class="file-1">  <br> <br>

                <label class="label-1"> Enter Category Name </label> <br>
                <input type="text" class="input-field1" name="ItemName" value="<?php echo $row['item_name']; ?>" required> <br> <br>


                <input type="submit" class="input-field2" name="update_submit" value="update" required>
                <br>
                <br>
               <p class="msg">
               <?php

               if(isset($_POST['update_submit']))
               {
                  
                    
                        if(!$result4)
                            {
                                echo "Category Updated Successfully" ;
                            } 
                
                
            }
            
?> </p>
            </center>
        </form>
               
               <?php
           }
    }
    else{
        echo "No Record Found";
    }



        //updating item details

        if(isset($_POST['update_submit']))
        {
            $new_image = $_FILES['new_photo'] ['name'];
            $newname = $_POST['ItemName'];

            
                $file = $_FILES['new_photo'];

                
                $filename = $file['name'];
                $filepath= $file['tmp_name'];
                $fileerror = $file['error'];



                
                $destfile = 'uploads/'.$filename;
              
                move_uploaded_file($filepath, $destfile);

                
                $sql3 = "UPDATE items_category SET item_image='$destfile' , item_name='$newname' WHERE item_id='$I_id' ";

                $result3 = mysqli_query($conn,$sql3);

              
                $sql4 = "UPDATE items_details SET category_name='$newname' WHERE category_name='$cat_name' AND lab_name='$L_name' ";


                $result4 = mysqli_query($conn,$sql4);
                
            

        }


?>



    
</body>
</html>