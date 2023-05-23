<?php
session_start();
include "../database/db.php";
$email = $_POST['email'];
$pass = $_POST['password'];
session_start();
session_unset();
session_destroy();
header("location:bye.php?echo=You have succesfully Signed Out!");
?>