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

    if (empty($errors)) {
        include "../../handelers/upload/upload_image.php";
        include "../../handelers/upload/upload_video.php";
        uploadFile("../../uploads/images/", $image, $errors);
        uploadVideo("../../uploads/videos/", $video, $errors);

        if (isset($_SESSION['image_name']) && isset($_SESSION['video_name'])) {
            $image_name = $_SESSION['image_name'];
            $video_name = $_SESSION['video_name'];
            $sql = "INSERT INTO `films` (`name`, `desc`, `film_img`, `film_url`, `category_id`) VALUES ('$name', '$description', '$image_name', '$video_name', '$category')";
            $result = mysqli_query($connection, $sql);

            if ($result) {
                $_SESSION['success'] = ['Data added successfully'];
                unset($_SESSION['image_name']);
                unset($_SESSION['video_name']);
            } else {
                $_SESSION['errors'] = ['Data was not added'];
            }
            header("location: " . VIEWS . "film/film_create.php");
        } else {
            $_SESSION['errors'] = ['Error uploading image or video'];
            header("location: " . VIEWS . "film/film_create.php");
        }
    } else {
        $_SESSION['name'] = $name;
        $_SESSION['errors'] = $errors;
        header("location: " . VIEWS . "film/film_create.php");
    }
}
?>
