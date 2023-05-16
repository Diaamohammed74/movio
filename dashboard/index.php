<?php session_start();?>
<?php include "layouts/header.php";?>
<?php $_SESSION['title']="Home";?>
<?php 
if (!isset($_SESSION['login']))
{
    header("location:".VIEWS."auth/login.php");
}
?>

<?php include "alerts/alerts.php"?>
<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">
            <?php if (isset($_SESSION['success'])): ?>
            <?php   alert_message('success','success'); ?>
            <?php endif; ?>
            <?php welcome_message('username')?>
        </div>
    </div>
</div>

<?php include "layouts/footer.php"?>