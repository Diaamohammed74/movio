<?php
session_start();
include "../database/db.php";
$email = $_POST['email'];
$pass = $_POST['password'];

if (isset($email) && isset($pass)) {

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $vemail = validate($email);
    $vpass = validate($pass);


    if (empty($vemail)) {
        header("location: login.php?error=Email Required");
        exit();

    } else if (empty($pass)) {
        header("location: login.php?error=Password Required");
        exit();

    } else {
        //sql query to fetch data related to input
        $sqlStatement = "SELECT * FROM users WHERE email='$vemail' AND password='$vpass'";

        //storing result data
        $result = mysqli_query($connection, $sqlStatement);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);
            if ($row['email'] === $vemail && $row['password'] === $vpass) {
                echo "welcome back!";
                $_SESSION['email'] = $row['email'];
                $_SESSION['password'] = $row['password'];
                header("location:index.php");
                exit();
            } else {
                header("location: login.php");
                exit();
            }
        }
        header("location: login.php?error=Incorrect Email or Password");
        exit();
    }
}
?>