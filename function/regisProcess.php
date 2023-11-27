<?php 
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $isAdmin = 0;

    $sql = "INSERT INTO user (name, email, password, isAdmin)
            VALUES ('$name', '$email', '$password', '$isAdmin')";
            
    if ($conn->query($sql) === TRUE) {

        header("Location: ../views/login.php");

        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>