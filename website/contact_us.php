<?php include "../database/db.php"; ?>
<?php
session_start();
if (isset($_POST['submit'])) {

    /* name email phone msg */
    $name    = mysqli_real_escape_string($connection, $_POST['name']);
    $phone   = mysqli_real_escape_string($connection, $_POST['phone']);
    $email   = mysqli_real_escape_string($connection, $_POST['email']);
    $msg     = mysqli_real_escape_string($connection, $_POST['msg']);

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
<?php include "layouts/header.php"; ?>
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
    <?php include "layouts/footer.php"; ?>