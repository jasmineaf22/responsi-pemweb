<?php
include '../function/connect.php';
include '../function/validateSession.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newName = $_POST['name'];

    $_SESSION['user']['name'] = $newName;

    $userId = $user['id']; 
    $updateQuery = "UPDATE user SET name = '$newName' WHERE id = $userId";
    mysqli_query($conn, $updateQuery);

    header("Location: profile.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <form method="post" action="profile.php">
        nama: <br>
        <input type="text" name="name" id="nama" required value="<?= $user['name'] ?>"><br>
        email: <br>
        <input type="text" name="email" id="email" value="<?= $user['email'] ?>" disabled><br>
        password: <br>
        <input type="password" name="password" id="password" value="<?= substr($user['password'], 0, 6) ?>" maxlength="10" disabled><br>
        <button type="submit">Submit</button>
    </form>
    <button>return</button>
</body>
</html>
