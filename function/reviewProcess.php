<?php
include 'connect.php';
session_start();
$user = $_SESSION['user'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $user['id'];
    $review = $_POST['review'];
    $timezone = new DateTimeZone('Asia/Bangkok');
    $datetime = new DateTime('now', $timezone);
    $timestamp = $datetime->format('Y-m-d H:i:s');
    $id_movie = $_GET['mov'];
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    if ($action == 'edit') {
        $reviewIdToEdit = isset($_GET['editId']) ? $_GET['editId'] : null;
        $sql = "UPDATE review SET review = '$review' WHERE id_review = $reviewIdToEdit";
    } else {
        $sql = "INSERT INTO review (id_user, review, timestamp, id_movie) 
                VALUES ('$id_user', '$review', '$timestamp', '$id_movie')";
    }

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../views/review.php?mov=$id_movie");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "User not logged in.";
}
?>
