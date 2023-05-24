<?php
session_start(); ?>
<?php
include "../database/db.php";
$vemail = mysqli_real_escape_string($connection, $_POST['email']);
$vpass = mysqli_real_escape_string($connection, $_POST['password']);

if (isset($email) && isset($pass)) {


    //sql query to fetch data related to input
    $sqlStatement = "SELECT * FROM `users` WHERE `email`='$vemail' AND password='$vpass'";

    //storing result data
    $result = mysqli_query($connection, $sqlStatement);

    if (mysqli_num_rows($result) === 1) {
        header("location:index.php");
    } else {
        header("location: login.php");
        exit();
    }
} else {
    header("location: login.php?error=Incorrect Email or Password");
    exit();
}

?>