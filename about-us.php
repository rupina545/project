<?php
session_start();
include_once('../database/conn.php');

if(isset($_SESSION['ruser']))
{
$email= $_SESSION['remail'];
}
?>


<html>
<head>
<title> about us</title>
  <link rel="stylesheet" type="text/css" href="../css/about-us-page.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
</head>
<body class="main">
	<div class="h1"> Government Polytechnic College Hamirpur </div>
	<a href="after-teacher-login.php"> <i class="fas fa-reply-all" style="font-size:60px; margin-left:1246px; margin-top:-50px;" ></i> </a>
	<div class="row">
    <div class="column">
    
          <img src = "../images/download (1).jpg"alt="Image" style="width:458px;height:353px;">
    </div>
        <div class="column1">
              <h3><i>  Govt. Polytechnic college  Hamirpur is arguably among the best polytechnics of Himachal Pradesh. The institute has good infrastructural facilities by way of buildings, equipments, state-of-the-art laboratories and workshops, spacious and well-ventilated classrooms, playground, hostels, residences, bank, post office, canteen, auditorium and guest house etc. The institute is affiliated to
              	<a  class="gf" href="https://www.hptechboard.com/"> H.P. Takniki Shiksha Board Dharamshala</a>. GP Hamirpur is committed to constantly enhancing the infrastructure and facilities to the students and faculty to provide an environment for learning. We invite you to share with us the experience and are confident that institute will benefit from it.
              The campus is situated at Baru in Hamirpur District of Himachal Pradesh and is 3 Kms from Hamirpur bus stand.
          The curriculum lays emphasis on theoretical technical knowledge as well as on practical hands on experience. 
      The Polytechnic is also committed to  its social liability. Along with  Full time and Part time Formal Courses, the Polytechnic also runs Free  Non-Formal, Job- oriented Short term courses for the under privileged section of society and school dropouts under the Community Development Through Polytechnics(CDTP) Scheme  of MHRD.</i>
           </div>
       </h3>
   </div>
</div>
<div>
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13581.393975274646!2d76.51681352482986!3d31.679039661719443!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3904d5d22e29d7d3%3A0x850bcd67f198612b!2sGovernment%20Polytechnic%20Hamirpur%20(Baru)!5e0!3m2!1sen!2sin!4v1619111970337!5m2!1sen!2sin" width="100%" height="450px" style="border:0; margin-top:50px;" allowfullscreen="" ></iframe>
            
	</iframe>
</div>
<div class="shape"><div class="hh">
	<i class="fas fa-address-card"> 
	Address: H.P.Takniki Shiksha Board, Dharamshala -176057</i>
	<br>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
	<br>

<i class="fas fa-phone">Phone No: 01892-222662, 01892-229054</i>
<br>

</div>
	</div>
	</body>
</html>


