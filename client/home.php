<?php
include "authguard.php";
include "menu.html";
include "../shared/connection.php";

$userid=$_SESSION['userid'];
$sql_result=mysqli_query($conn,"select*from product");

while($row=mysqli_fetch_assoc($sql_result)){
    echo "<div class='card-box'>
        <div class='name'>$row[name]</div>
        <div class='price'>$row[price]</div>
        <div class='pdt-img'>
            <img src='$row[impath]'>
        </div>
        <div class='detail'>$row[detail]</div>
        <hr>
        <div class='action'>
            <a href='addcart.php?pid=$row[pid]'
            <button class='btn btn-danger'>Add to cart</button>
            </a>
        </div>
    
    </div>";
    
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