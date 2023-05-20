<?php session_start();?>
<?php include "../../layouts/header.php";?>
<?php 
if (!isset($_SESSION['login']))
{
    header("location:".VIEWS."auth/login.php");
}
?>
<?php $_SESSION['title']='Edit Movie';?>
<?php include "../../alerts/alerts.php"; ?>
<?php 
    if (isset($_SESSION['login'])) {
        include "../../../database/db.php";
        $sql="SELECT * FROM `categories`";
        $result=mysqli_query($connection,$sql);
        $row=mysqli_fetch_assoc($result);

        $id=$_GET['id'];
        $sql1 = "SELECT `films`.*, `categories`.`name` as 'category_name' 
        from `films` join `categories` 
        on `categories`.`id` = `films`.`category_id` 
        WHERE `films`.`id`='$id'";
        $data=mysqli_query($connection,$sql1);
        $row=mysqli_fetch_assoc($data);
    }
?>
<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <div class="alert alert-info" role="alert" style="text-align: center;">
                <h3>Edit Movie</h3>
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
            <form class="border p-4" action="<?= HANDELERS?>film/film_update.php?id=<?= $row['id']?>" method="post"
                enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Movie name</label>
                    <input type="text" name="name" class="form-control"
                        value="<?= $row['name']?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Category</label>
                    <select name="category_id" id="" class="form-select">
                        <?php if(isset($result)): foreach($result as $item):?>
                        <option value="<?= $item['id'];?>" <?php if($item['id']==$row['category_id']):?> selected <?php endif; ?>><?= $item['name'];?></option>
                        <?php endforeach;endif;?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Movie Description</label>
                    <input type="text" name="desc" class="form-control"
                        value="<?= $row['desc']?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Movie Poster</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="mb-3">
                                <img style="height: 50px;" src="<?= "../../uploads/images/"?><?= $row['film_img'] ?>" alt="">
                </div>
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Movie Video</label>
                    <input type="file" name="video" class="form-control">
                </div>
                <div class="mb-3">
                    <video width="320" height="200" controls src="<?= "../../uploads/videos/"?><?= $row['film_url'] ?>"></video>
                </div>
                <div class="mb-3">
                    <button type="submit" name="submit" class="form-control btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include "../../layouts/footer.php";?>