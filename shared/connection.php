<?php
    $conn=new mysqli("localhost","root","","rock");
   if($conn->connect_error){
        echo "SQL Connection Failed";
        die;
   }
?>