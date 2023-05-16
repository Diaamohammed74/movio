<?php 
session_start();
?>
<?php include "../../layouts/header.php";?>
<?php 
$_SESSION['title']="login";
?>
<?php include "../../alerts/alerts.php"; ?>
<div class="container pt-5">
    <div class="row">
        <div class="col-8 mx-auto">
        <div class="alert alert-primary" role="alert" style="text-align: center;">
                <h3>ADMIN LOGIN</h3>
            </div>
            <?php if (isset($_SESSION['errors'])): ?>
            <?php  alert_message('errors','danger'); ?>
            <?php endif; ?>
            <form class="border p-4" action="<?= DASHBOARD?>handelers/auth/login.php" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" 
                value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : ' '; ?>">
                <div id="emailHelp" class="form-text">

                </div>
            </div>
            <?php unset($_SESSION['email']);?>
            <?php unset($_SESSION['errors']);?>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <button type="submit" name="submit" class="form-control btn btn-primary">LOGIN</button>
            </form>
        </div>
    </div>
</div>
<?php include "../../layouts/footer.php";?>