<?php
include "authguard.php";
 include "menu.html";
include "../shared/connection.php";

$userid=$_SESSION['userid'];
$sql_result=mysqli_query($conn,"select*from orders");

while($row=mysqli_fetch_assoc($sql_result)){
    echo "<div class='card-box'>
        <div class='orderid'>$row[orderid]</div>
        <div class='vendorid'>$row[vendor_id]</div>
        <div class='amount'>$row[total_amount]</div>

    </div>";
    
}

?>




