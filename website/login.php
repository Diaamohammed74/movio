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
    </div><!---WELCOME REGION-->
<div id="login">
    <form action="loginCode.php" method="POST">
        <h2> Login </h2>
        <h3> Enter your Information </h3>
        <div> Email </div>
        <input type="email" name="email" placeholder="Enter Your email"><br>
        <div> Password </div>
        <input type="password" name="password" placeholder="Enter Your Password"><br>
        <div id="password">Forgot password? </div>
        <input type="submit" value="Login"><br>
        <div id="signuplinker">Not a member? <a href="register.html">Join us Now!</a></div>
        <?php if (isset($_GET['error'])) { ?>
            <div class="error">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
    </form>
</div>
</body>
</html>