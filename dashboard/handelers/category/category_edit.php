<?php
session_start();
include "../../layouts/header.php";
$errors=[];
if (isset($_POST['submit'])&&isset($_GET['id']))
{
    include "../../../validation/validation.php";
    include "../../../database/db.php";
    //get
    $id=$_GET['id'];
    $name=sanitize_input($_POST['name']);
    //validation
    if (emptyinput($name))
    {
        $errors[]="Category name field is required";
    }elseif(mininput($name,3))
    {
        $errors[]="Category name must be greater than 3 chars";
    }

    if(empty($errors))
    {
        $sql= " UPDATE `categories` SET `name`='$name' where `id`='$id'";
        $result=mysqli_query($connection,$sql);
        if ($result) 
        {
            $_SESSION['success']=['Data updated successfuly'];
        }
        else
        {
            $_SESSION['errors']=['Data Does not updated'];
        }
        header("location:".VIEWS."category/category_index.php");
        
    }
    else
    {
        $_SESSION['name']=$name;
        $_SESSION['errors']=$errors;
        header("location:".VIEWS."category/category_edit.php?id=$id");
    }
}


?>