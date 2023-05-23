<?php

$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'movio';

$nameOne = $_POST ['first_name'];
$nameTwo = $_POST ['second_name'];
$email = $_POST ['email'];
$comfirmEmail = $_POST ['comfirmEmail'];
$password = $_POST ['password'];
$comfirmPassword = $_POST ['comfirmPassword'];
$phone = $_POST ['phone'];
$age = $_POST ['age'];

$connection = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);

if (!$connection) {
    exit('An error occoured while trying to establish a connection to database'. mysqli_connect_error());
} else {
    //sql query to fetch data related to input
    $sqlStatement = "SELECT * FROM users WHERE email='$email'";
    $sqlStatement2 = "SELECT * FROM users WHERE phone='$phone'";

    //storing result data
    $result = mysqli_query($connection, $sqlStatement);
    $result2 = mysqli_query($connection, $sqlStatement2);

    

    if (mysqli_num_rows($result)>0) {
        header("location:register.php?error=Email is Already in Use!");
        close();
    } else if (mysqli_num_rows($result2)>0) {
        header("location:register.php?error=Phone Number is Already in Use!");
        close();
    } else if($password != $comfirmPassword) {
        header("location:register.php?error=Passwords Not Matching!");
        close();
    } else if($email != $comfirmEmail) {
        header("location:register.php?error=Email Not Matching!");
        close();
    } else {
        $statement = $connection->prepare("insert into users(first_name, second_name, email, password, phone, age)values (?,?,?,?,?,?)");
        $statement -> bind_param("ssssii", $nameOne, $nameTwo, $email, $password, $phone, $age);
        $statement -> execute();
        header("location:welcome.php?echo=You have succesfully Signed In!");
        $statement -> close();
        $connection -> close();
    }
}
?>