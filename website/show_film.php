<?php include "layouts/header.php"; ?>
<?php if (isset($_GET['id'])) {
    include "../database/db.php";
    $film_id = $_GET['id'];

    $sql = "SELECT * FROM `films` WHERE `id`='$film_id'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
    }
}
?>

<div id="filmcontent">
    <div style="text-align: center; margin-top: 20px;">
        <label style="font-size: 24px; font-weight: bold;">
            <?php echo $data['name'] ?>
        </label>
        <fieldset style="border: none;">
            <video style="width: 1000px;" src="../dashboard/uploads/videos/<?php echo $data['film_url'] ?>"
                controls></video>
        </fieldset>
    </div>
</div>
<?php include "layouts/footer.php"; ?>