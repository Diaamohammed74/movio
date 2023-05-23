<?php session_start(); ?>
<?php include "../../layouts/header.php"; ?>
<?php
if (!isset($_SESSION['login'])) {
    header("location:" . VIEWS . "auth/login.php");
} else {
    include "../../../database/db.php";
    $sql = "SELECT `films`.*, `categories`.`name` as 'category_name' from `films` join `categories` on `categories`.`id` = `films`.`category_id`";
    $result = mysqli_query($connection, $sql);
}
?>
<?php $_SESSION['title'] = 'Show Movies'; ?>
<?php include "../../alerts/alerts.php"; ?>
<div class="container pt-5">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="alert alert-secondary" role="alert" style="text-align: center;">
                <h5>All Movies</h5>
            </div>
            <?php if (isset($_SESSION['errors'])): ?>
                <?php alert_message('errors', 'danger') ?>
            <?php endif; ?>
            <?php if (isset($_SESSION['success'])): ?>
                <?php alert_message('success', 'success') ?>
            <?php endif; ?>
            <div class="d-flex mb-2">
                <a class="btn btn-primary" href="<?= VIEWS ?>film/film_create.php">Add new</a>
            </div>
        </div>
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Description</th>
                    <th scope="col">Poster</th>
                    <th scope="col">Video</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows == 0): ?>
                    <tr>
                        <td colspan="9">
                            <div class="alert alert-warning text-center" role="alert">
                                <div>
                                    <b style="color: black"> There is no data </b>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php else: ?>
                    <?php
                    $counter = 1;
                    foreach ($result as $item):
                        ?>
                        <tr>
                            <th scope="row">
                                <?= $counter ?>
                            </th>
                            <td>
                                <?= $item['id'] ?>
                            </td>
                            <td>
                                <?= $item['name'] ?>
                            </td>
                            <td>
                                <?= $item['category_name'] ?>
                            </td>
                            <td>
                                <?= $item['desc'] ?>
                            </td>
                            <td>
                                <img style="height: 50px;" src="<?= "../../uploads/images/" ?><?= $item['film_img'] ?>" alt="">
                            </td>
                            <td>
                                <video width="320" height="175" controls
                                    src="<?= "../../uploads/videos/" ?><?= $item['film_url'] ?>"></video>
                            </td>
                            <td>
                                <a href="<?= VIEWS ?>film/film_edit.php?id=<?= $item['id'] ?>"
                                    class="btn btn-primary ms-2">Edit</a>
                            </td>
                            <td>
                                <a href="<?= HANDELERS ?>film/film_delete.php?id=<?= $item['id']; ?>&img_name=<?= $item['film_img']; ?>&video_name=<?= $item['film_url']; ?>"
                                    class="btn btn-danger ms-2">Delete</a>
                            </td>
                        </tr>
                        <?php
                        $counter++;
                    endforeach;
                    ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include "../../layouts/footer.php"; ?>