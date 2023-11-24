<?php
include 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_movie = htmlspecialchars($_GET['mov']);
    $name = htmlspecialchars($_POST['cast']);
    $chara = htmlspecialchars($_POST['chara']);

    $target_dir = "../images/cast/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $foto = basename($_FILES["file"]["name"]);

            $sql = "INSERT INTO cast (id_movie, nama_cast, nama_tokoh, foto) 
                        VALUES ('$id_movie', '$name','$chara', '$foto')";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                header("Location: ../views/review.php?mov=$id_movie");
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "File is not an image.";
    }
} else {
    echo "User not logged in.";
}
?>
