
<?php
// create db connection
$conn=new mysqli("localhost","root","","lab_management");
if($conn->connect_error) {
    die("connection failed");
   }

?>