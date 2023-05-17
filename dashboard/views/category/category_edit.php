<?php session_start();?>
<?php include "../../layouts/header.php";?>
<?php 
if (!isset($_SESSION['login']))
{
    header("location:".VIEWS."auth/login.php");
}
?>
<?php 
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    include "../../../database/db.php";
    $sql="SELECT `name` FROM `categories` where `id` ='$id' ";
    $result=mysqli_query($connection,$sql);
    $row=mysqli_fetch_assoc($result);
}
?>
<?php $_SESSION['title']='Edit Category';?>
<?php include "../../alerts/alerts.php"; ?>
<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="alert alert-info" role="alert" style="text-align: center;">
                <h3>Edit Category</h3>
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
            <form class="border p-4" action="<?= HANDELERS?>category/category_edit.php?id=<?= $id?>" method="post">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Category name</label>
                    <input type="name" name="name" class="form-control" value="<?= $row['name']?>">
                </div>
                <div class="mb-3">
                    <button type="submit" name="submit" class="form-control btn btn-success">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "../../layouts/footer.php";?>