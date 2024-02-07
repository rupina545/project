<?php
include('database/conn.php');
session_start();
if(!isset($_SESSION['ruser']))
{
if (isset($_REQUEST['rsignin']))
{
    $remail=mysqli_real_escape_string($conn,trim($_REQUEST['remail']));
    $rpassword=mysqli_real_escape_string($conn,trim($_REQUEST['rpassword']));
    $sql="select email,password from user where email='".$remail."' and password='".$rpassword."' limit 1";
    $result=$conn->query($sql);
    if($result->num_rows==1)
    {
        $_SESSION['ruser']=true;
        $_SESSION['remail'] = $remail;
        echo "<script> location.href='teacher/after-teacher-login.php'; </script>";
        exit;
    }
    
   
    else
        {
            $msg="Enter valid email and password";
        }      
}
}
else{
    echo "<script> location.href='teacher/after-teacher-login.php'; </script>";
}
?>





<html>
<head>
<link rel="stylesheet" type="text/css" href="css/index-file.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

</head>

    
<body class="main">
    <form action="" method="POST"> <br>
        <a href="admin/admin-login-page.php"> <i class="fas fa-user-shield" id="i1"> </i> </a>
            <h1>Lab Management</h1>



     <div class="section1"> 
         <div class="part1">
            <i class="fa fa-users" id="icon" aria-hidden="true"></i>
         </div>
        <div class="part2">
            <a href="index.php"> <h2> Log-In Here ! </h2> </a>
            <div class="id-icon"> 
                <i class="fa fa-id-badge" id="id-icon" aria-hidden="true"></i> 
                <input type="text" placeholder="Enter You Email-Id" name="remail"class="text-box">
            </div> 
            <div class="id-icon2"> 
                <i class="fa fa-key" id="id-icon2" aria-hidden="true"></i>
                <input type="password" placeholder=" Enter Your Password" name="rpassword" class="text-box">
            </div> </br> </br>
            <div class="center"> 
                <div class="outer button">
                    <button name="rsignin"> Log-In </button>
                    <span> </span>
                </div>
            </div>
                <div class="alert" id="message"><?php if(isset($msg)) { echo $msg;} ?> </div>
        </div>

    </div>
</form>
</body>
</html>