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
if(isset($_REQUEST['update']))
{
    $rname=$_REQUEST['rname'];
    $rgender=$_REQUEST['rgender'];
    $rcollage=$_REQUEST['rcollage'];
    $rnumber=$_REQUEST['rnumber'];
    $rpassword=$_REQUEST['rpassword'];
    $sql="update user set name= '$rname',gender='$rgender',collage='$rcollage',mob='$rnumber',password='$rpassword' where email='$email'";
    if($conn->query($sql) == TRUE)
    {
        $msg1=" Profile Updated Successfully";
        
    }
    else{
      $msg2="failed to updated";
    }   
}
$sql=mysqli_query($conn,"select * from user where email='$email'");
while($row=mysqli_fetch_array($sql))
{
    $name=$row['name'];
    $gender=$row['gender'];
    $collage=$row['collage'];
    $mobile=$row['mob'];
    $password=$row['password'];
}


?>

<!DOCTYPE html>
<html>
<head>
	<title> Lab Management </title>
	<link rel="stylesheet" type="text/css" href="../css/after-teacher-login.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	
</head>

<body>
	<form>
	<div    id="user_welcome">   <b class="welcome"> Welcome <?php echo $name ; ?>   </b>        </div>
	<div class="horizontal-line"> 
		<div class="vertical-line1">
			<div class="vertical-line2"> 
				<div class="vertical-line3"> 
					<div class="vertical-line2"> 
						<div class="vertical-line3">
						<div class="vertical-line2"> 
						</div> 
						<div class="circle6">
							<br>
							<a href="logout.php"> <b class="button6"> Log- &nbsp &nbsp &nbsp Out </b> </a>
				</div>
				</div>
				<div class="circle5">
					<br>
					<b class="button5" type="button" onclick="popupRedirect()"> My &nbsp &nbspProfile </b> 
						<div id="popup1" class="overlay">
							<div class="popup">
								<a class="close" href="#">&times;</a>
									
 							 <form action="" method="POST">
 							 	<div class="update-message">
 							 		Update Profile
 							 	</div>
           						 <div>
            					  <i class="fas fa-user mr-2" style="color: blue";> </i> 
            					  <label for="name"> Name </label>
            					  <input type="name" class="input1" placeholder="Name" name="rname" value="<?php echo $name ?>">
           						 </div>

           						 <div>
           						    <i class="fas fa-user mr-2" style="color: blue";> </i> 
            						<label for="gender"> Gender </label>
              						<input type="text" class="input2" name="rgender" placeholder="Enter your Gender" value="<?php echo $gender ?>">
          						</div>

            					<div>
             						<i class="fas fa-school mr-2" style="color: blue";> </i>
              						<label for="clg-name">Collage</label>
            						<input type="text" class="input3" name="rcollage" placeholder="Enter your collage name" value="<?php echo $collage ?>">
            					</div>

            					<div> 
            						<i class="fas fa-phone mr-2" style="color: blue";> </i>
            						<label for="mobile-number">Phn-No</label>
            						<input type="text" class="input4" name="rnumber" placeholder="Enter your Mobile Number" value="<?php echo $mobile ?>">
            					</div>

            					<div> 
              						<i class="fas fa-key mr-2" style="color: blue";> </i>
              						<label for="password">password</label>
              						<input class="input5" type="password" name="rpassword" placeholder="Enter your password" value="<?php echo $password ?>">
            					</div>
            					<br>
            					<div class="submit_button">
            						<button type="submit" class="submit-button" name="update"> update </button>
            						<p class="msg1"> <?php if(isset($msg1)) echo $msg1 ?></p>
            						<p> <?php if(isset($msg2)) echo $msg2 ?></p>
            					</div>

  
							</div>
						</div>
				</div>
					</div>
					<div class="circle4">
						<br>
				<a href="mylab.php">	<b class="button4"> My &nbsp &nbsp &nbsp &nbsp Lab </b> </a>
				</div>
			</div>
			<div class="circle3">
				<br>
				<br>
				<a href="displaying-branch.php">	<b class="button3"> Labs </b> </a>
				</div>
			</div> 
				<div class="circle2">
					<br>
					<a href="about-us.php"> <b class="button2"> About &nbsp &nbsp Us </b> </a>
				</div>
		</div>
		<div class="circle1">
			<br>
			<br>
			<b class="button1"> Home</b>
		</div>
	</div>
</form>
</body>

</html>

<script>
    function popupRedirect() {
      window.location.href = "#popup1";
    }
</script>

<?php
include('../database/conn.php');


?>