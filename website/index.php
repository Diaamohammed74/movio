<?php include "../database/db.php";?>
<?php
    $sql = "SELECT *from `films`";
    $result = mysqli_query($connection, $sql);
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
    <div id="filmcontent">
        <fieldset>
            <legend id="legend">Choose your desired Film </legend>
            <ul>
                <?php while ($data = mysqli_fetch_array($result)) { ?>
                    <li>
                        <p class="pp">
                            <?php echo $data['name']; ?>
                        </p>
                        <a href="film.html"> <img
                                src="../dashboard/uploads/images/<?php echo $data['film_img'];?>"></img></a>
                        <p>
                            <?php echo $data['desc']; ?>
                        </p>
                        <a href="show_film.php?id=<?php echo $data['id']?>"><button>Watch Film</button></a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </fieldset>
    </div>
</body>
</html>