<?php include "layouts/header.php";?>
    <!---WELCOME REGION-->
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
            <?php if(isset ($_GET['error'])) { ?>
            <div class="error"><?php echo $_GET['error'];?></div>
            <?php }?>
        </form>
    </div>
</body>

</html>