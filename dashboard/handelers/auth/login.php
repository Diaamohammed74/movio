<?php
session_start();
include "../../layouts/header.php";
$errors=[];
if (isset($_POST['submit'])&& $_SERVER['REQUEST_METHOD']=="POST") {
    include "../../../validation/validation.php";
    include "../../../database/db.php";
    //get
    $email=sanitize_input($_POST['email']);
    $password=sanitize_input($_POST['password']);
    //validation
    if (emptyinput($email)) {
        $errors[]="Email field is required";
    }elseif(!validinput($email)){
        $errors[]="Enter a valid email";
    }
    //password
    if(emptyinput($password)){
        $errors[]="Password Field is required";
    }elseif (mininput($password,6)) {
        $errors[]="password must be greater than 6 chars";
    }elseif (maxinput($password,50)) {
        $errors[]="password must be less than 50 chars";
    }

    // check duplicated email
    $password=sha1($password);
    $sql= "SELECT * from `admins` where `email`='$email'";
    $result=mysqli_query($connection,$sql);
    $row=mysqli_fetch_assoc($result);

    if ($row['email']!=$email || $password!==$row['password'])
    {
        $errors[]="These credintials doesn`t match our records";
    }
    if(empty($errors))
    {
        $_SESSION['success']=['Logged in Successfuly'];
        $_SESSION['login']=true;
        $_SESSION['username']=$row['name'];
        $_SESSION['uesr_id']=$row['id'];
        header("location:".DASHBOARD);
    }
    else
    {
        $_SESSION['email']=$email;
        $_SESSION['errors']=$errors;
        header("location:".VIEWS."auth/login.php");
    }
}

?>