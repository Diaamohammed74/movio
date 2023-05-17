<?php session_start();?>
<?php include "../../layouts/header.php";?>
<?php 
if (!isset($_SESSION['login']))
{
    header("location:".VIEWS."auth/login.php");
}
?>
<?php $_SESSION['title']='Add Category';?>
<?php include "../../alerts/alerts.php"; ?>
<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="alert alert-info" role="alert" style="text-align: center;">
                <h3>Add Category</h3>
            </div>
            <?php if (isset($_SESSION['errors'])):?>
            <?php alert_message('errors','danger')?>
            <?php endif;?>
            <?php if (isset($_SESSION['success'])):?>
            <?php alert_message('success','success')?>
            <?php endif;?>
            <div class="d-flex mb-2" >
            <a class="btn btn-primary" href="<?= VIEWS?>category/category_index.php">Show Categories</a>
            </div>
            <form class="border p-4" action="<?= HANDELERS?>category/category_create.php" method="post">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Category name</label>
                    <input type="name" name="name" class="form-control" value="<?= isset($_SESSION['name']) ? $_SESSION['name'] : ' ';?>">
                </div>
                <?php unset($_SESSION['errors']);?>
                <?php unset($_SESSION['name']);?>
                <div class="mb-3">
                    <button type="submit" name="submit" class="form-control btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "../../layouts/footer.php";?>
