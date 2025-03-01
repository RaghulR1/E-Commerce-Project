<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>    
    
</body>
</html>

<?php
include "authguard.php";
include "menu.html";
include "../shared/connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $vendorId = $_SESSION['userid']; 
    $total = isset($_POST['total']) ? floatval($_POST['total']) : 0; 

    if ($total > 0) {

        $insertQuery = "INSERT INTO orders (vendor_id, total_amount, userid) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($conn, $insertQuery);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "idi", $vendorId, $total, $vendorId);

            if (mysqli_stmt_execute($stmt)) {
                echo "Order placed successfully";
                exit();
            } else {
                echo "Failed to place the order.";
            }

            mysqli_stmt_close($stmt);
        } else {
            echo "Failed to prepare the statement.";
        }
    } else {
        echo "Invalid total amount.";
    }
} else {
    echo "Invalid request.";
}
?>


