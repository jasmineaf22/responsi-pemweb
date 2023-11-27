<?php
include 'connect.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $submovie = $_POST['submovie'];
    $year = $_POST['year'];
    $duration = $_POST['duration'];
    $ratings = $_POST['ratings'];
    $synopsis = $_POST['synopsis'];

    if (isset($_GET['edit'])) {
        $id_movie = $_GET['edit'];

        if ($_FILES["poster"]["size"] > 0) {
            $target_dir = "../images/poster/" . (($submovie == 'west') ? 'west/' : 'indo/');
            $target_file = $target_dir . basename($_FILES["poster"]["name"]);

            $check = getimagesize($_FILES["poster"]["tmp_name"]);
            if ($check !== false) {
                if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) {
                    $poster = basename($_FILES["poster"]["name"]);
                    $sql = "UPDATE movie SET name='$name', image='$poster', submovie='$submovie', year='$year', duration='$duration', star='$ratings', synopsis='$synopsis' WHERE id_movie='$id_movie'";
                } else {
                    echo "Error uploading file.";
                    exit;
                }
            } else {
                echo "File is not an image.";
                exit;
            }
        } else {
            $sql = "UPDATE movie SET name='$name', submovie='$submovie', year='$year', duration='$duration', star='$ratings', synopsis='$synopsis' WHERE id_movie='$id_movie'";
        }
    } else {
        $target_dir = "../images/poster/" . (($submovie == 'west') ? 'west/' : 'indo/');
        $target_file = $target_dir . basename($_FILES["poster"]["name"]);

        $check = getimagesize($_FILES["poster"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) {
                $poster = basename($_FILES["poster"]["name"]);
                $sql = "INSERT INTO movie (name, image, submovie, star, synopsis, year, duration) 
                        VALUES ('$name', '$poster','$submovie', '$ratings', '$synopsis', '$year', '$duration')";
            } else {
                echo "Error uploading file.";
                exit;
            }
        } else {
            echo "File is not an image.";
            exit;
        }
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../views/landing.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "User not logged in.";
}
?>