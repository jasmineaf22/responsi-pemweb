<?php
session_start();

include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM user WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION['user'] = $row;

            header("Location: ../views/landing.php");
            exit;
        } else {
            echo "<script>alert('Password salah. Silakan coba lagi.');
            window.location.href='../views/login.php';</script>";
        }
    } else {
        echo "<script>alert('User dengan email '$email' tidak ditemukan.');
        window.location.href='../views/login.php';</script>";
    } 
}

$conn->close();
?>
