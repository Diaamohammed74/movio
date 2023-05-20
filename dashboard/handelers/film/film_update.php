<?php
session_start();
include "../../layouts/header.php";
$errors = [];

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == "POST") {
    include "../../../validation/validation.php";
    include "../../../database/db.php";

    // Get input data
    $name = sanitize_input($_POST['name']);
    $category = sanitize_input($_POST['category_id']);
    $description = sanitize_input($_POST['desc']);
    $image = $_FILES['image'];
    $video = $_FILES['video'];
    $id = $_GET['id'];

    // Validation
    if (emptyInput($name)) {
        $errors[] = "Movie name field is required";
    }

    if (emptyInput($description)) {
        $errors[] = "Movie description field is required";
    }

    if (emptyInput($category)) {
        $errors[] = "Category field is required";
    }

    if (empty($errors))
    {
        $sql_update_base = "UPDATE `films` SET `films`.`name`='$name',`films`.`desc`='$description',`films`.`category_id`='$category' where `films`.`id`= $id";
        $sql_update_result = mysqli_query($connection, $sql_update_base);
        include "../../handelers/upload/upload_image.php";
        include "../../handelers/upload/upload_video.php";
        $sql_media = "SELECT `films`.`film_img`,`films`.`film_url` from `films` where `films`.`id`= $id";
        $query_media = mysqli_query($connection, $sql_media);
        $result_media = mysqli_fetch_assoc($query_media);
        $old_image = $result_media['film_img'];
        $old_video = $result_media['film_url'];
        if (!empty($image['name'])) {
            if (file_exists("../../uploads/images/$old_image")) {
                unlink("../../uploads/images/$old_image");
            }
            uploadFile("../../uploads/images/", $image, $errors);
            if (isset($_SESSION['image_name'])) {
                $image_name = $_SESSION['image_name'];
                $sql_update = "UPDATE `films` SET `films`.`film_img`='$image_name' where `films`.`id`= $id";
                $sql_update_img = mysqli_query($connection, $sql_update);
            }
        }
        
        if (!empty($video['name']))
        {
            if (file_exists("../../uploads/videos/$old_video")) {
                unlink("../../uploads/videos/$old_video");
            }
            uploadVideo("../../uploads/videos/", $video, $errors);
            if (isset($_SESSION['video_name'])) {
                $video_name = $_SESSION['video_name'];
                $sql_update1 = "UPDATE `films` SET `films`.`film_url`='$video_name' where `films`.`id`= $id";
                $sql_update_video = mysqli_query($connection, $sql_update1);
            }
        }
    } else {
        $_SESSION['name'] = $name;
        $_SESSION['description'] = $description;
        $_SESSION['errors'] = $errors;
        header("location: " . VIEWS . "film/film_edit.php?id=$id");
    }

    if (empty($errors)) {
        $_SESSION['success'] = ['Data Updated successfully'];
        header("location: " . VIEWS . "film/film_index.php");
    }
}
?>
