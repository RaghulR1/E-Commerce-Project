<?php

session_start();

if(!isset($_SESSION['login_status'])){
    echo "Login Skipped,Please Login First!!";
    die;
}

//if($_SESSION('login_status')==false){
   // echo "Forbidden Access,Login First";
   // die;
//}

if($_SESSION['usertype']!="Customer"){
    echo "Only Customers can access this page";
    die;
}

echo "<div class='d-flex justify-content-evenly bg-primary text-white p-3'>

    <div>#$_SESSION[userid]</div>
    <div>$_SESSION[username]</div>
    <div>$_SESSION[usertype]</div>

    <div>
        <a href='../shared/logout.php'>
        <button class='btn btn-warning'>Logout</button>
        </a>
    </div>

    </div>";
 
 
?>