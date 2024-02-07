<?php
include('../database/conn.php');
session_start();

    if (isset($_REQUEST['rsignin']))
    {
        $remail=mysqli_real_escape_string($conn,trim($_REQUEST['remail']));
        $rpassword=mysqli_real_escape_string($conn,trim($_REQUEST['rpassword']));
        $sql="select * from adminlogin where email='$remail' and password='$rpassword' ";
        $result= mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0)
        {

       
                while($res = mysqli_fetch_array($result))

                {

                    $_SESSION['login_id'] = $res['login_id'];
                    $_SESSION['radmin']=true;
                    $_SESSION['remail'] = $remail;
                    echo  "<script>location.href='after-admin-login.php';</script>";
                    exit;
                }  
        } 
    

        else
        {
            $msg="Enter valid email and password";
        } 
}





?>


<!DOCTYPE html>
<html>
<head>
    <title> Lab Management </title>
    <link rel="stylesheet" type="text/css" href="../css/admin-login-page.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
 <a href="../index.php"> <i class="fas fa-users" id="i11"> </i> </a>
<body class="main">

    <h1 class="ll"> Lab Management</h1>

<div class="row">
    <div class="column">
        <i class="fa fa-user" style="font-size:300px;"> </i>
    </div>
        <div class="column1">
           
<p class="e-msg1">
                    <?php if(isset($msg))
                    {
                        echo  $msg;
                    }
                         ?>
                     </p>
            <form action="" method="POST">
                <div class="shape">
                    <p> <h2> Admin Login</h2></p>
                    
               <div class="id-icon"> 
                <i class="fa fa-id-badge" id="id-icon" aria-hidden="true"></i> 
                <input type="text" placeholder="Enter You Email-Id" name="remail"class="text-box">
            </div> 
            <div class="id-icon2"> 
                <i class="fa fa-key" id="id-icon2" aria-hidden="true"></i>
                <input type="password" placeholder=" Enter Your Password" name="rpassword" class="text-box">
            
            </div>
           
            <div class="center"> 
                <div class="outer button">
                   <button name="rsignin"> Log-In </button>

                   
        
                    <span> </span>
                </div>
                
            </div>

        </div>

    </form>
</div>

</div>


</body>
</html>