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
    <style>
        * {
            padding: 0;
            margin: 0;
        }
      body {
        font-family: sans-serif;
      }
      nav {
        height: 5rem;
        padding: 0.5rem;
        background-color: black;
        display: flex;
        justify-content: space-between;
        position: fixed;
        width: 100%;
      }
      nav > a {
        display: flex;
        align-items: center;
      }
      .navbar {
        padding: 1rem 2rem 1rem 1rem;
        display: flex;
        width: 45vw;
        justify-content: end;
      }
      .nav-avatar {
        margin-left: 2rem;
        display: flex;
        align-items: center;
        justify-content: end;
      }
      .avatar {
        cursor: pointer;
      }
      .popup {
        position: absolute;
        bottom: -3.5rem;
        right: 3rem;
        background-color: #686868;
        display: flex;
        list-style: none;
        padding: 0.5rem 2rem 0.5rem 1rem;
        box-sizing: border-box;
      }
      li {
        box-sizing: border-box;
        margin: 0.5rem 0;
      }
      .popup a:hover {
        color: #ff0000;
      }
      .popup a {
        text-decoration: none;
        font-weight: bold;
        transition-duration: 300ms;
        color: white;
      }
      .block {
        display: block;
      }
      .hidden {
        display: none;
      }

      main {
        box-sizing: border-box;
        background-color: black;
        padding: 14rem 0 0rem 15rem;
        height: 100vh;
      }
      .container {
        width: 50%;
        padding: 1rem 1rem 4rem 3rem;
        border-radius: 1rem;
        background-color: #080808;
        position: relative;
;
      }
      h1 {
        color: white;
      }
      p {
        color: white;
      }
      hr {
        margin-bottom: 1rem;
      }
      form {
        box-sizing: border-box;
        padding: 0 2rem;
      }
      .nama, .email, .password {
        display: flex;
        margin-bottom: 1rem;
        justify-content: space-between;
      }
      label {
        color: white;
        font-weight: bold;
        width
    }
    input[type='text'] {
        font-weight: bold;
        display: block;
        padding: 0.2rem 0.5rem;
        border-radius: 0.5rem;
        width: 80%;
        border: none;
        background-color: rgb(77, 77, 77);
        box-sizing: border-box;
    }
    input[type='text']:focus {
        outline: none;
    }
    input[type='password'] {
        display: block;
        padding: 0.2rem 0.5rem;
        border-radius: 0.5rem;
        width: 80%;
        border: none;
        background-color: rgb(77, 77, 77);
        box-sizing: border-box;
    }
    .buttons {
        margin-left: 7.3rem;
    }
    input[type='submit'] {
        padding: 0.2rem 1rem;
        border-radius: 0.5rem;
        border: none;
        color: black;
        font-weight; bold;
        background-color: rgb(114, 0, 0);
        font-weight: bold;
        cursor: pointer;
      }
      input[type='submit']:hover {
        background-color: #c00000;
      }
    .button {
        margin-top: 3rem;
        padding: 0.2rem 1rem;
        border-radius: 0.5rem;
        border: none;
        color: black;
        font-weight: bold;
        background-color: rgb(114, 0, 0);
        font-weight: bold;
        cursor: pointer;
        font-size: 0.9rem;
        text-decoration: none;
        position: absolute;
        left: 18rem;
        bottom: 4rem;
    }
    .button:hover {
        background-color: #c00000;
    }
    </style>
</head>
<body>
    <nav>
        <a href="landing.php">
              <img src="../images/horrorflix.png" alt="icon" width="200px" />
        </a>
        <div class="navbar">
            <div class="nav-avatar">
                <span class="avatar">
                    <svg width="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.72222 7.77778C9.72222 5.71498 10.5417 3.73667 12.0003 2.27806C13.4589 0.819442 15.4372 0 17.5 0C19.5628 0 21.5411 0.819442 22.9997 2.27806C24.4583 3.73667 25.2778 5.71498 25.2778 7.77778C25.2778 9.84057 24.4583 11.8189 22.9997 13.2775C21.5411 14.7361 19.5628 15.5556 17.5 15.5556C15.4372 15.5556 13.4589 14.7361 12.0003 13.2775C10.5417 11.8189 9.72222 9.84057 9.72222 7.77778ZM9.72222 19.4444C7.14373 19.4444 4.67084 20.4687 2.84757 22.292C1.0243 24.1153 0 26.5882 0 29.1667C0 30.7138 0.614582 32.1975 1.70854 33.2915C2.80251 34.3854 4.28624 35 5.83333 35H29.1667C30.7138 35 32.1975 34.3854 33.2915 33.2915C34.3854 32.1975 35 30.7138 35 29.1667C35 26.5882 33.9757 24.1153 32.1524 22.292C30.3292 20.4687 27.8563 19.4444 25.2778 19.4444H9.72222Z" fill="white"/>
                    </svg>
                </span>
            </div>
            <ul class="popup hidden">
                <li>
                    <a href="profile.php">Profile</a>
                </li>
                <li>
                    <a href="../function/logout.php">Log out</a>
                </li>
            </ul>
      </div>
    </nav>
    <main>
        <div class="container">
            <div class="top">
                <h1>My Profile</h1>
                <p>Manage your profile information to control, protect, and secure your account</p>
            </div>
            <hr>
            <form method="post" action="profile.php">
                <div class="nama">
                    <label for="nama">Nama</label>
                    <input type="text" name="name" id="nama" required value="<?= $user['name'] ?>">
                </div>
                <div class="email">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?= $user['email'] ?>" disabled>
                </div>
                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" value="<?= substr($user['password'], 0, 6) ?>" maxlength="10" disabled>
                </div>
                <div class="buttons">
                    <input type="submit" value="Submit"></input>
                </div>          
            </form>
                    <a href="landing.php" class="button">Return
                    </a>
        </div>
    </main>


    <script>
      const avatar = document.querySelector('.avatar');
      avatar.addEventListener('click', function () {
        const popup = document.querySelector('.popup');
        popup.classList.toggle('hidden');
        popup.classList.toggle('block');
      });
    </script>
</body>
</html>
