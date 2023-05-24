<?php session_start();
?>
<?php
include "../database/db.php";

    $nameOne = mysqli_real_escape_string($connection, $_POST['first_name']);
    $nameTwo = mysqli_real_escape_string($connection, $_POST['second_name']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $comfirmEmail = mysqli_real_escape_string($connection, $_POST['comfirmEmail']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $comfirmPassword = mysqli_real_escape_string($connection, $_POST['comfirmPassword']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $age = mysqli_real_escape_string($connection, $_POST['age']);


    if (!$connection) {
        exit('An error occoured while trying to establish a connection to database' . mysqli_connect_error());
    } else {
        //sql query to fetch data related to input
        $sqlStatement = "SELECT * FROM users WHERE email='$email'";
        $sqlStatement2 = "SELECT * FROM users WHERE phone='$phone'";

        //storing result data
        $result = mysqli_query($connection, $sqlStatement);
        $result2 = mysqli_query($connection, $sqlStatement2);


        if (mysqli_num_rows($result) > 0) {
            header("location:register.php?error=Email is Already in Use!");
            exit();
        } else if (mysqli_num_rows($result2) > 0) {
            header("location:register.php?error=Phone Number is Already in Use!");
            exit();
        } else if ($password != $comfirmPassword) {
            header("location:register.php?error=Passwords Not Matching!");
            exit();
        } else if ($email != $comfirmEmail) {
            header("location:register.php?error=Email Not Matching!");
            exit();
        } else {
            $statement = "INSERT into `users`(`first_name`, `second_name`, `email`, `password`, `phone`, `age`)values ('$nameOne','$nameTwo','$email','$password','$phone','$age')";
            $result = mysqli_query($connection, $statement);
            if ($result) {
                header("location:welcome.php?msg=Welcome $nameOne You have succesfully Signed In !");
                $connection->close();
            } else {
                header("location:register.php?error=Error happened");
            }
        }
    }


?>