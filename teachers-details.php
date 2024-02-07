
<?php


include('../database/conn.php');




if (isset($_REQUEST["rsignup"]))


{
  if(($_REQUEST["rname"]=="") ||($_REQUEST["rcollage"]=="") || ($_REQUEST["remail"]=="") || ($_REQUEST["rnumber"]==""))
  {
    $msg="All Field Are Require";
  }
  else
  {
    $rpassword=trim($_REQUEST['rpassword']);
    $rpassword1=trim($_REQUEST['rpassword1']);
      if(!empty($rpassword))
      {
          if($rpassword!==$rpassword1)
          {
            $msg="Your Two Passwords Did Not Matced";
          }
          $rname=$_POST['rname'];
         if (ctype_alpha(str_replace(' ', '', $rname)) === false) {
            $errors = 'Name must contain letters and spaces only';
          }
          else
          {
            $sql="select email from user where email='".$_REQUEST['remail']."'";
            $result=$conn->query($sql);
              if ($result->num_rows==1)
              {
                $msg="Account Already Exist";
              }
              else
              {
                  $rname=$_REQUEST['rname'];
                  $rgender=$_REQUEST['rgender'];
                  $rcollage=$_REQUEST['rcollage'];
                  $remail=$_REQUEST['remail'];
                  $rnumber=$_REQUEST['rnumber'];
                  $rpassword=$_REQUEST['rpassword'];
                  $sql="insert into user(name,gender,collage,email,mob,password) VALUES
                   ('$rname','$rgender','$rcollage','$remail','$rnumber','$rpassword')";
                   if($conn->query($sql) == TRUE)
                   {
                   $msg1="Account Created Successfully";
                 
                   }
                   else{
                     $msg="Unable To Create Account";
                   }
              }

          }
      }
      else{
        $msg="Password Field Is Empty";
        }
  }
  
}
?>



<!DOCTYPE html>
<html>
<head>
    <title> Lab Management </title>
    <link rel="stylesheet" type="text/css" href="../css/teacher-details.css">
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body>
    <form method="POST">
    <a href="after-admin-login.php"> <i class="fas fa-undo" id="back-icon"></i> </a> <br>
    <button class="add-teacher-button" onclick="redirect1()" type="button"> <i class="fas fa-user-plus" id="add-icon"></i>  &nbspAdd Teacher </button>
        <div id="popup1" class="overlay">
            <div class="popup">
                <a class="close" href="#">&times;</a>
                    <div class="text-1">
                        Enter Teacher Details
                    </div>
                    <div class="div-field-1">
                        <i class="fas fa-user mr-2" id="popup-icons"> </i>
                        <label for="name">Name </label>
                        <input type="text"  class="field1" placeholder="Enter Name" name="rname">
                    </div>

              

                   


                    <br>
                    <div class="div-field-2">
                        <i class="fas fa-user mr-2" id="popup-icons"> </i>
                        <label for="gender">Gender</label>
                        <select class="field2" name="rgender" id="rgender">
                            <option value="Male">Male</option>
                            <option value="female">female</option>
                        </select>
                    </div>
                    <br>
                    <div class="div-field-3">
                        <i class="fas fa-school mr-2" id="popup-icons"> </i>
                        <label for="clg-name">College</label>
                        <input class="field3" type="text" name="rcollage" placeholder="Enter collage name">
                    </div>
                    <br>
                    <div class="div-field-4">
                        <i class="fas fa-envelope" id="popup-icons"></i>
                        <label for="email">Email</label>
                        <input type="text" class="field4" name="remail" placeholder="Enter your Email">
                    </div>
                    <br>
                    <div class="div-field-5"> 
                        <i class="fas fa-phone mr-2" id="popup-icons"> </i>
                        <label for="mobile-number">Phn-no</label>
                        <input type="text" class="field5" name="rnumber" maxlength="10" placeholder="Enter Mobile Number" required>
                    </div>
                    <br>
                    <div class="div-field-6"> 
                        <i class="fas fa-key mr-2" id="popup-icons"> </i>
                        <label for="password">pass</label>
                        <input type="password" name="rpassword" class="field6" placeholder="Enter your password">
                    </div>
                    <br>
                    <div class="div-field-7"> 
                        <i class="fas fa-key mr-2" id="popup-icons"> </i>
                        <label for="password">cnf-pass</label>
                        <input type="password" class="field7" name="rpassword1" placeholder="confirm-password">
                    </div>

                    
                        <button name="rsignup" type="submit" class="submit-button"> Submit </button>
                        <p class="alert-message"> <?php if(isset($msg)) echo $msg ?> </p>
                           <p class="alert-message1"> 
                            <?php 
                            if(isset($msg1)) echo $msg1;
                            if(isset($errors))  echo $errors; ?> </p>
                           

            </div>
        </div>

    <p class="text1">  List of Teachers </p>
</form>

</body>
</html>

<?php


  echo' <div class="div1">';

//table
$sql="select * from user";
$result=$conn->query($sql);
if ($result->num_rows>0)
{
    echo '<table class="table">
    <tbody>
    <tr>
    <th>Id</th>
    <th>Name</th>
    <th>College</th>
    <th>Email</th>
    <th>Mobile</th>
     <th>Action</th>
    </tr>
    ';
    $c=1;
    while($row=$result->fetch_assoc())
    {
     echo '<tr>
     <th>'.$c++.'</th>
     <td>'.$row["name"].'</td>
     <td>'.$row["collage"].'</td>
     <td>'.$row["email"].'</td>
     <td>'.$row["mob"].'</td>
     <td> <a title="Delete user" class="btn btn-dark ml-5" href="delete-teacher.php?uemail='.$row["email"].'"><i class="far fa-trash-alt" id="delete-icon"></i></a> </td>
     </tr>';
    } 
    echo '<tbody>
    </table>
     ';  
}
?>


<script>
    function redirect1() {
      window.location.href = "#popup1";
    }
</script>   


