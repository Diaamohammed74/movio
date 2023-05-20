<?php
session_start();
include "../../layouts/header.php";
$errors=[];
if (isset($_GET['id'])&& isset($_GET['img_name'])) {
    $id=$_GET['id'];
    $img_name=$_GET['img_name'];
    $video_name=$_GET['video_name'];
    include "../../../database/db.php";
    if (file_exists("../../uploads/images/$img_name") && file_exists("../../uploads/videos/$video_name")) {
        unlink("../../uploads/images/$img_name");
        unlink("../../uploads/videos/$video_name");
        $sql="DELETE FROM `films` where `id`='$id'";
        $result=mysqli_query($connection,$sql);
        if ($result) 
        {
            $_SESSION['success']=['Data deleted successfuly'];
        }
        else
        {
            $_SESSION['errors']=['Data Does not deleted'];
        }
    }else {
        $sql="DELETE FROM `films` where `id`='$id'";
        $result=mysqli_query($connection,$sql);
        if ($result) 
        {
            $_SESSION['success']=['Data deleted successfuly'];
        }
        else
        {
            $_SESSION['errors']=['Data Does not deleted'];
        }
    }

    header("location:".VIEWS."film/film_index.php");
}
?>