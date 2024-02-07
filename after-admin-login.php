<?php
session_start(); 
include('../database/conn.php');

if(!isset($_SESSION['radmin']))
{
    header("location: admin-login-page.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title> Lab management</title>
	<link rel="stylesheet" type="text/css" href="../css/after-admin-login.css">
</head>
<body>
	
	<form action="" method="POST">

		<div class="button">
			<button class="button1"> Home </button> 
				<button class="button3" type="button" id="buttons" onclick="pageredirect()" > Branch</button> 
				<button onclick="pageredirect2()" type="button" class="button5"> Alloted Labs </button>
				<button class="button6" type="button" onclick="pageredirect3()"> My Profile </button>
			<br>
			<button class="button2" type="button" onclick="popupRedirect()"> Teachers</button> 
			<button class="button4" type="button" onclick="pageredirect1()"> View Labs </button>
			  <button onclick="location.href='logout.php'" class="button7"> Log-Out </button>
			   
			 
		</div>

		<div class="welcome-message1">
			Welcome
		</div>
		<div class="welcome-message2">
			To
		</div>
		<div class="welcome-message3">
			Admin Panel
		</div>

	</form>

</body>
</html>

<script>
    function popupRedirect() {
      window.location.href = "teachers-details.php";
    }
     function pageredirect() {
      window.location.href = " branch-details.php";
    }
     function pageredirect1() {
      window.location.href = "labs-details.php";
    }
     function pageredirect2() {
      window.location.href = "alloted-labs.php";
    }
    function pageredirect3() {
      window.location.href = "update-profile.php";
    }
</script>