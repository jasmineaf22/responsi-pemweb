<?php
include '../function/connect.php';
include '../function/validateSession.php';

if ($user['isAdmin'] != 1) {
    header("Location: ../views/landing.php");
    exit;
}

$editMode = false;
$movieData = array();

if (isset($_GET['edit'])) {
    $editMode = true;
    $id_movie = $_GET['edit'];
    $query = "SELECT * FROM movie WHERE id_movie='$id_movie'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $movieData = mysqli_fetch_assoc($result);
    } else {
        echo "Error: " . mysqli_error($conn);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Movie</title>
    <link rel="stylesheet" href="style.css" />
    <style>
      * {
        margin: 0;
        padding: 0;
      }
      html::-webkit-scrollbar {
        width: 0.4rem;
      }
      html::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 6px;
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
        z-index: 999;
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
      .popup {
        position: absolute;
        bottom: -2rem;
        right: 3rem;
      }
      .block {
        display: block;
      }
      .hidden {
        display: none;
      }
      .popup p a {
        text-decoration: none;
      }
      .popup > p {
        display: flex;
        align-items: center;
      }
      .popup > p > a {
        margin-right: 1rem;
        font-weight: bold;
        font-size: 1.5rem;
        background-color: rgb(114, 0, 0);
        border-radius: 0.7rem;
        padding: 0.5rem 1.7rem;
        color: black;
      }
      .popup > p > a:hover {
        background-color: #c00000;
      }
      .nav-avatar {
        margin-left: 2rem;
        display: flex;
        align-items: center;
        justify-content: end;
      }
      main {
        box-sizing: border-box;
        background-color: black;
        padding: 7rem 0 2rem 5rem;
        height: 140vh;
      }
      h1 {
        color: #760000;
      }
      .container {
        width: 90%;
      }
      label {
        display: block;
        color: white;
        margin-bottom: 0.6rem;
      }
      form {
        padding: 1rem;
      }
      #name,
      #duration {
        box-sizing: border-box;
        margin-bottom: 0.6rem;
        padding: 0.5rem;
        border-radius: 0.6rem;
        border: none;
        background-color: rgb(77, 77, 77);
        display: block;
        width: 100%;
        font-weight: bold;
        color: rgb(136, 136, 136);
      }
      #sub-movie {
        margin-bottom: 0.6rem;
        padding: 0.5rem;
        border-radius: 0.6rem;
        border: none;
        background-color: rgb(77, 77, 77);
        display: block;
        width: 100%;
        font-weight: bold;
        color: rgb(136, 136, 136);
      }
      #year {
        margin-bottom: 0.6rem;
        padding: 0.5rem;
        border-radius: 0.6rem;
        border: none;
        background-color: rgb(77, 77, 77);
        display: block;
        width: 80px;
        font-weight: bold;
        color: rgb(136, 136, 136);
      }
      #ratings {
        margin-bottom: 0.6rem;
        padding: 0.5rem;
        border-radius: 0.6rem;
        border: none;
        background-color: rgb(77, 77, 77);
        display: block;
        font-weight: bold;
        color: rgb(136, 136, 136);
      }
      #synopsis {
        margin-bottom: 0.6rem;
        padding: 0.5rem;
        border-radius: 0.6rem;
        border: none;
        background-color: rgb(77, 77, 77);
        display: block;
        height: 6rem;
        width: 100%;
        font-weight: bold;
        color: rgb(136, 136, 136);
      }
      #save {
        padding: 0.5rem;
        padding: 0.2rem 3.1rem;
        border-radius: 1rem;
        border: none;
        background-color: rgb(114, 0, 0);
        font-weight: bold;
        cursor: pointer;
      }
      #save:hover {
        background-color: #c00000;
      }
      .label {
        width: 5rem;
        padding: 0.7rem 1.5rem;
        border-radius: 0.6rem;
        text-align: center;
        background-color: rgb(77, 77, 77);
      }
      .label:hover {
        cursor: pointer;
      }

      option {
        font-weight: bold;
        padding: 2rem 0;
      }
      input[type='file'] {
        display: none;
      }

      input:focus,
      select:focus,
      textarea:focus {
        outline: none;
        border: none;
      }
    </style>
  </head>
  <body>
    <nav>
      <div class="icon">
        <img src="../images/horrorflix.png" alt="icon" width="200px" />
      </div>
      <div class="navbar">
        <div class="nav-avatar">
          <a href="#"
            ><svg xmlns="http://www.w3.org/2000/svg" width="1.7rem" viewBox="0 0 448 512">
              <path d="M224 256A128 128 0 1 0 224 0a128 128 0 1 0 0 256zm-45.7 48C79.8 304 0 383.8 0 482.3C0 498.7 13.3 512 29.7 512H418.3c16.4 0 29.7-13.3 29.7-29.7C448 383.8 368.2 304 269.7 304H178.3z" /></svg></a>
        </div>
      </div>
    </nav>
    <main>
      <h1>Add Movie</h1>
      <div class="container">
      <form action="../function/movieProcess.php<?= $editMode ? "?edit=$id_movie" : "" ?>" method="post" enctype="multipart/form-data">
      <label for="name">Name of movie</label>
        <input type="text" name="name" id="name" autocomplete="off" placeholder="Name of movie" required value="<?= $editMode ? $movieData['name'] : '' ?>"/>
          <label for="sub-movie">Sub-movie</label>
          <select id="sub-movie" name="submovie" required>
          <option value="default" disabled>Sub-movie</option>
          <option value="west" <?= ($editMode && $movieData['submovie'] == 'west') ? 'selected' : '' ?>>West Movie</option>
          <option value="indo" <?= ($editMode && $movieData['submovie'] == 'indo') ? 'selected' : '' ?>>Indonesian Movie</option>
          </select>
          <label for="year">Years of movie</label>
          <input type="datetime" name="year" id="year" autocomplete="off" placeholder="yyyy" required value="<?= $editMode ? $movieData['year'] : '' ?>" />
          <label for="duration">Duration (minutes)</label>
          <input type="text" name="duration" id="duration" autocomplete="off" required placeholder="Duration of movie" value="<?= $editMode ? $movieData['duration'] : '' ?>"/>
          <label>Ratings</label>
          <select id="ratings" name="ratings" required>
          <option value="default">Ratings</option>
          <option value="1" <?= ($editMode && $movieData['star'] == '1') ? 'selected' : '' ?>>⭐</option>
          <option value="2" <?= ($editMode && $movieData['star'] == '2') ? 'selected' : '' ?>>⭐⭐</option>
          <option value="3" <?= ($editMode && $movieData['star'] == '3') ? 'selected' : '' ?>>⭐⭐⭐</option>
          <option value="4" <?= ($editMode && $movieData['star'] == '4') ? 'selected' : '' ?>>⭐⭐⭐⭐</option>
          <option value="5" <?= ($editMode && $movieData['star'] == '5') ? 'selected' : '' ?>>⭐⭐⭐⭐⭐</option>
          </select>
          <label for="synopsis">Synopsis</label>
          <textarea name="synopsis" id="synopsis"><?= $editMode ? $movieData['synopsis'] : '' ?></textarea>
          <label for="poster">Movie Poster</label>
          <input type="file" name="poster" id="poster" accept="image/*" />
          <label for="file">
            <div class="label">
            <svg width="40" height="auto" viewBox="0 0 50 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M0.00634766 6.375C0.00634766 4.7174 0.664828 3.12769 1.83693 1.95558C3.00903 0.78348 4.59874 0.125 6.25635 0.125H43.7563C45.414 0.125 47.0037 0.78348 48.1758 1.95558C49.3479 3.12769 50.0063 4.7174 50.0063 6.375V37.625C50.0063 39.2826 49.3479 40.8723 48.1758 42.0444C47.0037 43.2165 45.414 43.875 43.7563 43.875H6.25635C4.59874 43.875 3.00903 43.2165 1.83693 42.0444C0.664828 40.8723 0.00634766 39.2826 0.00634766 37.625V6.375ZM3.13135 34.5V37.625C3.13135 38.4538 3.46059 39.2487 4.04664 39.8347C4.63269 40.4208 5.42755 40.75 6.25635 40.75H43.7563C44.5851 40.75 45.38 40.4208 45.9661 39.8347C46.5521 39.2487 46.8813 38.4538 46.8813 37.625V26.6875L35.0782 20.6031C34.7852 20.4563 34.4534 20.4054 34.1298 20.4576C33.8062 20.5097 33.5072 20.6623 33.2751 20.8937L21.6813 32.4875L13.3688 26.95C13.0687 26.7502 12.7087 26.6603 12.3499 26.6956C11.9911 26.7309 11.6555 26.8893 11.4001 27.1437L3.13135 34.5ZM18.7563 14.1875C18.7563 12.9443 18.2625 11.752 17.3834 10.8729C16.5043 9.99386 15.312 9.5 14.0688 9.5C12.8256 9.5 11.6334 9.99386 10.7543 10.8729C9.87521 11.752 9.38135 12.9443 9.38135 14.1875C9.38135 15.4307 9.87521 16.623 10.7543 17.5021C11.6334 18.3811 12.8256 18.875 14.0688 18.875C15.312 18.875 16.5043 18.3811 17.3834 17.5021C18.2625 16.623 18.7563 15.4307 18.7563 14.1875Z"
                  fill="#FFFEFE"
                />
              </svg>
              <p style="margin-top: 10px; color: rgb(136, 136, 136)">Upload here</p>
            </div>
          </label>

          <input type="submit" id="save" name="save" value="Save" />
        </form>
        <button>return</button>
      </div>
    </main>
  </body>
</html>
