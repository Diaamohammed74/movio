<?php
session_start();
include "../../layouts/header.php";
$errors=[];
if (isset($_GET['id'])) {
    $id=$_GET['id'];
    include "../../../database/db.php";
    $sql="DELETE FROM `categories` where `id`='$id'";
    $result=mysqli_query($connection,$sql);
    if ($result) 
    {
        $_SESSION['success']=['Data deleted successfuly'];
    }
    else
    {
        $_SESSION['errors']=['Data Does not deleted'];
    }
    header("location:".VIEWS."category/category_index.php");
}
?>