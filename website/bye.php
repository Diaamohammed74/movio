<!DOCTYPE html>
<html>
    <main>
        <title>Movio</title>
        <!--<meta http-equiv="refresh" content="5" >-->
        <link rel="stylesheet" href="style.css"></link>
    </main>

    <body id=background>


        <!---UPPER REGION-->


        <div id=upper>
        <div id="logo">
                <img src="logo.png" width="200px" height="auto">
            </div>
            <ul id="nav">
                <li id="main"><a href="index.php" class="navi">HOME</a></li>
                <li id="store"><a href="store.php" class="navi">LIBRARY</a></li>
                <li id="about"><a href="about.php" class="navi">CONTACT US</a></li>
            </ul>
            <div id="acc">
                <a href=login.php id=log>LOG IN</a>
                <a href=Register.php id=reg>REGISTER</a>
            </div>
        </div>


        <!---WELCOME REGION-->


        <div id="site">
            <div id="construction"><?php if(isset ($_GET['echo'])) { ?>
                    <div class="echo"><?php echo $_GET['echo'];?></div>
                <?php }?></div>
                <br>
            <a href=store.html id=join_site>Browse the Store</a>
        </div>


    </body>
</html>