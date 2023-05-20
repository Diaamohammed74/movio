<?php session_start();?>
<?php include "../../layouts/header.php";?>
<?php 
if (!isset($_SESSION['login']))
{
    header("location:".VIEWS."auth/login.php");
}
?>
<?php $_SESSION['title']='Add Movie';?>
<?php include "../../alerts/alerts.php"; ?>
<?php 
    if (isset($_SESSION['login'])) {
        include "../../../database/db.php";
        $sql="SELECT * FROM `categories`";
        $result=mysqli_query($connection,$sql);
        $row=mysqli_fetch_assoc($result);
    }
?>
<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="alert alert-info" role="alert" style="text-align: center;">
                <h3>Add Movie</h3>
            </div>
            <?php if (isset($_SESSION['errors'])):?>
            <?php alert_message('errors','danger')?>
            <?php endif;?>
            <?php if (isset($_SESSION['success'])):?>
            <?php alert_message('success','success')?>
            <?php endif;?>
            <div class="d-flex mb-2">
                <a class="btn btn-primary" href="<?= VIEWS?>film/film_index.php">Show Movies</a>
            </div>
            <form class="border p-4" action="<?= HANDELERS?>film/film_create.php" method="post"
                enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Movie name</label>
                    <input type="text" name="name" class="form-control"
                        value="<?= isset($_SESSION['name']) ? $_SESSION['name'] : ' ';?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Category</label>
                    <select name="category_id" id="" class="form-select">
                        <?php if(isset($result)): foreach($result as $item):?>
                        <option value="<?= $item['id'];?>"><?= $item['name'];?></option>
                        <?php endforeach;endif;?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Movie Description</label>
                    <input type="text" name="desc" class="form-control"
                        value="<?= isset($_SESSION['desc']) ? $_SESSION['desc'] : ' ';?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Movie Poster</label>
                    <input type="file" name="image" class="form-control"
                        value="<?= isset($_SESSION['image']) ? $_SESSION['image'] : ' ';?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Movie Video</label>
                    <input type="file" name="video" class="form-control"
                        value="<?= isset($_SESSION['video']) ? $_SESSION['video'] : ' ';?>">
                </div>
                <?php //unset($_SESSION['errors']);?>
                <?php //unset($_SESSION['name']);?>
                <div class="mb-3">
                    <button type="submit" name="submit" class="form-control btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "../../layouts/footer.php";?>