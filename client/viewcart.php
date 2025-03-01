<?php
    include "authguard.php";
    include "menu.html";
    include "../shared/connection.php";

    $userid=$_SESSION['userid'];

    $result=mysqli_query($conn,"select * from cart join product on cart.pid=product.pid where userid=$userid");
    $total=0;
    while($row=mysqli_fetch_assoc($result)){

        $total+=$row['price'];
        echo "<div class='card-box'>
        <div class='name'>$row[name]</div>
        <div class='price'>$row[price]</div>
        <div class='pdt-img'>
            <img src='$row[impath]'>
        </div>
        <div class='detail'>$row[detail]</div>
        <hr>
        <div class='action'>
            <a href='deletepdt.php?pid=$row[pid]'
            <button class='btn btn-danger'>Remove from cart</button>
            </a>
        </div>
    
    </div>";
    }
    echo "<div>
    <h1>Place Order</h1>
        <form method='post' action='place_order.php'> 
            <input type='hidden' name='total' value='$total'>
            <button type='submit' name='place_order'>Pay $total</button>
        </form>
    </div>";

?>
<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
</body>
</html>