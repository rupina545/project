<?php
	include('../database/conn.php');


        $tuname= "s@gmail.com";




			 $q3 = "SELECT * FROM alloted_labs WHERE t_uname='$tuname' ";
                $query3 = mysqli_query($conn,$q3);


                $result3=mysqli_fetch_array($query3);


                if($result3)
                {
                    echo $result3['lab_name'];
                }
                else{
                    mysqli_error($conn);
                }
?>