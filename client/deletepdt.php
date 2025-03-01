<?php
    include "authguard.php"; 
    include "../shared/connection.php";

    if(isset($_GET['pid'])){
        $pid = $_GET['pid'];
        $userid = $_SESSION['userid'];

        $deleteQuery = "delete from cart where pid = $pid and userid = $userid";
        $result = mysqli_query($conn, $deleteQuery);

        if($result){
            header("location:viewcart.php");
            exit();
        } else {
            echo "Failed to remove product from cart.";
        }
    } else {
        echo "Invalid product ID.";
    }
?>
