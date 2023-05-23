<?php include "layouts/header.php";?>
    <!---WELCOME REGION-->
    <div id="site">
        <div id="construction">
            <?php if (isset($_GET['echo'])) { ?>
                <div class="echo">
                    <?php echo $_GET['echo']; ?>
                </div>
            <?php } ?>
        </div>
        <br>
        <a href=index.php id=join_site>Browse Films</a>
    </div>
    <?php include "layouts/footer.php"; ?>