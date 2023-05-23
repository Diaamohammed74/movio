<?php session_start();?>
<?php include "../../layouts/header.php";?>
<?php 
if (!isset($_SESSION['login']))
{
    header("location:".VIEWS."auth/login.php");
}else {
    include "../../../database/db.php";
    $sql="SELECT * FROM `contact_us`";
    $result=mysqli_query($connection,$sql);
}
?>
<?php $_SESSION['title']='Show Feedbacks';?>
<?php include "../../alerts/alerts.php"; ?>
<div class="container pt-5">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="alert alert-secondary" role="alert" style="text-align: center;">
                <h5>All FeedBacks</h5>
            </div>
            <?php if (isset($_SESSION['errors'])):?>
            <?php alert_message('errors','danger')?>
            <?php endif;?>
            <?php if (isset($_SESSION['success'])):?>
            <?php alert_message('success','success')?>
            <?php endif;?>
            <div class="d-flex mb-2">
                <a class="btn btn-primary" href="<?= VIEWS?>category/category_create.php">Add new</a>
            </div>
        </div>
        <table class="table table-bordered border-primary">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Feedback</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows == 0): ?>
                <tr>
                    <td colspan="6">
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
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['email'] ?></td>
                    <td><?= $item['phone'] ?></td>
                    <td><?= $item['msg'] ?></td>
                    <td>
                        <a href="<?= HANDELERS ?>feedback/feedback_delete.php?id=<?= $item['id'] ?>"
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
<?php include "../../layouts/footer.php";?>