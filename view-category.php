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

    
    
    

?>


<html>
<head>
    <title> Lab Management </title>

  <link rel="stylesheet" type="text/css" href="../css/view-category.css">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    
</head>
<body>

    <?php 
        $labname =  $_GET['l_name'];
        
        

    echo " <a href='mylab.php?l_name = $labname '> <i class='fas fa-undo' id='back-icon'></i> </a> <br> ";
    ?>

    <!-- popup  form -->
    <div class="center">
        <input type="checkbox" id="show">

        <label for="show" class="show-btn">
            <i class='fas fa-plus' id="plus-icon"></i> Add New &nbsp &nbsp Category 
        </label>
      
  
   


        <?php
        echo" <a href='pdf-view.php?l_name=$labname'> <input type='submit' value='View-Overall-Report' class='overall-button2'> </a>";
        ?>
         
         
         <form>
            
<input type="text" class="myInput" id="myInput" onkeyup="myFunction()" 
placeholder="Search Item Name..." title="Type in a name">
   </form> 

        <div class="container">
            <label for="show" class="close-btn fas fa-times" title="close"> </label>
                <div class="text">
                    Add New Item
                </div>
        
            <form method="POST" enctype="multipart/form-data">
                <center>
                    <br>
                    <br>
                    <label> Select Image For Category </label>  <br> 
                    <input type="file"  class="file-1" name="photo" >  <br> <br>

                    <label> Enter Category Name </label> <br>
                    <input type="text" name="ItemName" class="item-name-1" required> <br> <br>

                    <input type="submit" class="input-field3" name="submit1" value="submit" required>

            
                </center>
            </form>
        </div>
    </div>
    


<?php 
    if(isset($_POST['submit1']))
    {
        include '../database/conn.php';
        
                
        $file = $_FILES['photo'];
        $itemname = $_POST['ItemName'];

                   
        $filename = $file['name'];

        

        $filepath= $file['tmp_name'];
        $fileerror = $file['error'];
        
        if (!empty($filename))
        {
            $destfile = 'uploads/'.$filename; 
        }
        else
        {
            $destfile = "uploads/default.jpg";
        }
        
        move_uploaded_file($filepath, $destfile);

        

                 
        $sql1 = "SELECT * FROM items_category WHERE lab_name= '$labname' AND item_name = '$itemname' ";

        $query1 = mysqli_query($conn,$sql1);
                   
            if(mysqli_num_rows($query1)>0)
                {
                       
                    $exits_msg =  "Item ALready Exists";
                }
            else{

                
        
                        
                    $sql = "INSERT into items_category (item_image,item_name,lab_name) values('$destfile','$itemname','$labname') ";

                    $query = mysqli_query($conn,$sql);
                       
                }
            

            if($exits_msg)
            {
                           
                echo " <p id='success1'> " .$exits_msg ." </p> "  ;
                            
            }



    }
    
?>
    

</body>
</html>
 
<?php 

     
                
    echo "<p class='text2'> Select Category To See Its Details <i class='far fa-hand-point-down' id='hand-icon'> </i>  </p> ";?>
    
<?php
    echo '<table id="myTable">
        <tr>
            <th> S.No &nbsp </th>
            <th> Category Image &nbsp </th>
            <th> Category Name &nbsp </th>
            <th> Update &nbsp </th>
            <th> Delete &nbsp </th>
            <th> View Items </th>

        </tr>
    ';

        $labname =  $_GET['l_name'];
        $q = "SELECT * FROM items_category WHERE lab_name='$labname' ";

		$query = mysqli_query($conn,$q);

       
		$c=1; 
		
        while($row = mysqli_fetch_array($query))
        {
            $Item_Image=$row['item_image'];

            $c_id = $row['item_id'];


            $c_name = $row['item_name'];


            echo "<tr>
                <td>".$c++."</td>
                <td> <img src='$Item_Image'> </td>
                <td>".$row['item_name']."</td>";
                echo " <td> <a href='update-category.php?i_id= $row[item_id] & cname=$c_name & c_id=$c_id & l_name=$labname & c_name=$c_name' > <i class='fas fa-pencil-alt' id='edit-icon'></i> </a></td>
                <td> <a href='delete-category.php?i_id= $row[item_id] & cname=$c_name & l_name=$labname' > <i class='far fa-trash-alt' id='delete-icon'> </i> </a></td> ";
                echo " <td> <a href='view-items-details.php?l_name=$labname & c_id=$c_id & c_name=$c_name'> <button class='view-button'> View Item Details </button> </a></td> 

                </tr>";
            echo '<tbody>
                   
    '; 
        }
    
    echo "</table>";
?>


<script>
    function popupRedirect() {
      window.location.href = "#popup1";
    }
</script>


<script>
            function myFunction() {
              var input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("myInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("myTable");
              tr = table.getElementsByTagName("tr");
              for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                  txtValue = td.textContent || td.innerText;
                  if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                  } else {
                    tr[i].style.display = "none";
                  }
                }       
              }
            }
        </script>

       

<br>
<br>
<br>
<br>
<br>