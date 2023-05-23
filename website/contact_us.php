<?php include "../database/db.php"; ?>
<?php
session_start();
if (isset($_POST['submit'])) {

    /* name email phone msg */
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $msg = mysqli_real_escape_string($connection, $_POST['msg']);
    $sql = "INSERT into `contact_us`( `name` ,`email`,`phone`,`msg`) values('$name','$email','$phone','$msg')";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "submitted";

        header("location: contact_us.php");
    } else {
        echo "error";
        header("location: contact_us.php");
    }
}
?>
<!DOCTYPE html>
<html>
<main>
    <title>Movio</title>
    <link rel="stylesheet" href="style/style.css">
    </link>
</main>

<body id=background>
    <!---UPPER REGION-->
    <div id=upper>
        <div id="logo">
            <img src="images/logo.png" width="200px" height="auto">
        </div>
        <ul id="nav">
            <li id="main"><a href="index.php" class="navi">HOME</a></li>
            <li id="about"><a href="contact_us.php" class="navi">CONTACT US</a></li>
        </ul>
        <div id="acc">
            <a href=login.php id=log>LOG IN</a>
            <a href=Register.php id=reg>REGISTER</a>
        </div>
    </div>
    <!---WELCOME REGION-->
    <div id="content">
        <div id="formtitle">
            <p>Contact Us</p>
        </div>
        <div id="formcontent">
            <form method="post" action="contact_us.php">
                <input type="text" name="name" placeholder="Name" />
                <input type="text" name="phone" placeholder="Phone" />
                <input type="text" name="email" placeholder="E-mail" />
                <textarea name="msg" placeholder="Enter your complaint"></textarea>
                <input type="submit" name="submit" value="Send" />
            </form>
        </div>
</body>

</html>