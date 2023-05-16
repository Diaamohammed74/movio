<?php
session_start();
include "../../layouts/header.php";
if (isset($_SESSION['login']))
{
    unset($_SESSION['login']);
    session_destroy();
    session_unset();
}
header("location:".VIEWS."auth/login.php");
?>