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

    <link rel="stylesheet" type="text/css" href="../css/view-items.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <style>
        #myInput
            {
              box-sizing: border-box;
              border: 3px solid black;
              border-radius: 20px;
              font-size: 16px;
              background-color: white;
              background-image: url('searchicon.png');
              background-position: 10px 10px; 
              background-repeat: no-repeat;
              padding: 8px 20px 8px 40px;
              -webkit-transition: width 0.4s ease-in-out;
              transition: width 0.4s ease-in-out;
              margin-left: 1000px;
              width: 16%;
            } 

            #myInput:focus
            {
              outline: none;
            }

            input.myInput
            {
              padding: 7px 20px 7px 20px;
              font-weight: bold;
              font-family: "Comic Sans MS", "Comic Sans", cursive;
              color: black;
            }

    </style>

</head>
<body>

    <?php 
        $labname =  $_GET['l_name'];
        $branchName = $_GET['branchname'];
        

    echo " <a href='display-labs.php?l_name = $labname & branchname=$branchName'> <i class='fas fa-undo' id='back-icon'></i> </a> <br> ";
    ?>

    
  
   


        <?php
        echo" <a href='pdf-view.php?l_name=$labname'> <input type='submit' value='View Overall Report' class='overall-button'> </a>";
        ?>
         
         
         <form>
<input type="text" class="myInput" id="myInput" onkeyup="myFunction()" placeholder="Search Item Name....." title="Type in a name">
   </form> 

    


<?php 
    if(isset($_POST['submit1']))
    {
        include '../database/conn.php';
        
                
        $file = $_FILES['photo'];
        $itemname = $_POST['ItemName'];

                   
        $filename = $file['name'];
        $filepath= $file['tmp_name'];
        $fileerror = $file['error'];
                    
        $destfile = 'uploads/'.$filename;
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
                
                echo " <td> <a href='view-items-details-1.php?l_name=$labname & c_id=$c_id & c_name=$c_name & branchname=$branchName'> <button class='view-button'> View Item Details </button> </a></td> 

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
