<?php
session_start();
include "../../layouts/header.php";
$errors=[];
if (isset($_POST['submit'])&& $_SERVER['REQUEST_METHOD']=="POST") {
    include "../../../validation/validation.php";
    include "../../../database/db.php";
    //get
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
        $sql= " INSERT into `categories`(`name`) value ('$name')";
        $result=mysqli_query($connection,$sql);
        if ($result) 
        {
            $_SESSION['success']=['Data added successfuly'];
        }
        else
        {
            $_SESSION['errors']=['Data Does not added'];
        }
        header("location:".VIEWS."category/category_create.php");
        
    }
    else
    {
        $_SESSION['name']=$name;
        $_SESSION['errors']=$errors;
        header("location:".VIEWS."category/category_create.php");
    }
    }


?>