<?php
    include "authguard.php";

   $pid=$_GET['pid'];
   $userid=$_SESSION['userid'];

   include "../shared/connection.php";

   $status=mysqli_query($conn,"insert into cart(userid,pid)values($userid,$pid)");
   if($status){
      header("location:viewcart.php");
   }
   else{
    echo "Error while adding to cart";
    mysqli_error($conn);
   }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>