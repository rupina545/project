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


<?php

    include '../database/conn.php';


    $L_name= $_GET['lname'];

     

        


    echo $L_name;
        $file = $_FILES['photo'];
        $itemname = $_POST['ItemName'];

       
        $filename = $file['name'];
        $filepath= $file['tmp_name'];
        $fileerror = $file['error'];
        
        $destfile = 'uploads/'.$filename;
        move_uploaded_file($filepath, $destfile);

        
        $sql1 = "SELECT * FROM items_category WHERE lab_name= '$L_name' AND item_name = '$itemname' ";

        $query1 = mysqli_query($conn,$sql1);
       
        if(mysqli_num_rows($query1)>0){
           
            echo "Item ALready Exists";
        }
        else{

            $q3 = "SELECT * FROM tbl_lab WHERE lab_name='$L_name' ";
            $query3 = mysqli_query($conn,$q3);


            $result3=mysqli_fetch_array($query3);


            $labid= $result3['lab_id'];  
            echo $labid;
        
            $sql = "INSERT into items_category (item_image,item_name,lab_id,lab_name) values('$destfile','$itemname','$labid','$L_name') ";

            $query = mysqli_query($conn,$sql);
            
            if($query){
               
                echo "Item Added Successfully".;
            }
            else{
                echo "Something Went Wrong".mysqli_error($conn);
            }




           

        }





    


?>





