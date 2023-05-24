<?php include "../database/db.php"; ?>
<?php
$sql = "SELECT *from `films`";
$result = mysqli_query($connection, $sql);
?>
<?php include "layouts/header.php"; ?>
<div id="filmcontent">
    <fieldset>
        <legend id="legend">Choose your desired Film </legend>
        <ul>
            <?php while ($data = mysqli_fetch_array($result)) { ?>
                <li>
                    <p class="pp">
                        <?php echo $data['name']; ?>
                    </p>
                    <img src="../dashboard/uploads/images/<?php echo $data['film_img']; ?>"></img>
                    <p>
                        <?php echo $data['desc']; ?>
                    </p>
                    <a href="show_film.php?id=<?php echo $data['id'] ?>"><button>Watch Film</button></a>
                </li>
                <?php
            }
            ?>
        </ul>
    </fieldset>
</div>
<?php include "layouts/footer.php"; ?>