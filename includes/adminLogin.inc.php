<?php

if (isset($_POST["submit"])){
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $pwd) !== false){
        header("location: ../adminLogin.php?error=emptyinput");
        exit();
    }
    loginAdmin($conn, $username, $pwd);
    header("location: ../adminLogin.php?error=none");
}
else {
    header("location: ../adminLogin.php");
    exit();
}
?>
