<?php
include '../function/connect.php';
include '../function/validateSession.php';

$reviewIdToEdit = isset($_GET['edit']) ? $_GET['edit'] : null;

if (!isset($_GET['mov']) && !isset($_GET['edit']) && !isset($_GET['del'])) {
    header('Location: landing.php');
    exit();
}

if (isset($_GET['mov']) && $_GET['mov'] !== '') {
    $movieId = $_GET['mov'];


    if (isset($_GET['del'])) {
        $reviewIdToDelete = $_GET['del'];
        $deleteQuery = "DELETE FROM review WHERE id_review = $reviewIdToDelete";
        $deleteResult = $conn->query($deleteQuery);

        if ($deleteResult) {
            header("Location: review.php?mov=$movieId");
            exit();
        } else {
            die('Error in delete query: ' . $conn->error);
        }
    }


    $query = "SELECT * FROM movie WHERE id_movie = $movieId";
    $result = $conn->query($query);

    if ($result) {
        $movie = $result->fetch_assoc();
        $querycast = "SELECT * FROM cast WHERE id_movie = $movieId";
        $resultcast = mysqli_query($conn, $querycast);
        
        if ($resultcast && mysqli_num_rows($resultcast) > 0) {
            $castData = mysqli_fetch_all($resultcast, MYSQLI_ASSOC);
            mysqli_free_result($resultcast);
        }

        $queryReviews = "SELECT review.*, user.name AS name FROM review JOIN user ON review.id_user = user.id WHERE review.id_movie = $movieId";
        $resultReviews = $conn->query($queryReviews);

        if ($resultReviews) {
            if ($resultReviews->num_rows > 0) {
                $reviewsData = $resultReviews->fetch_all(MYSQLI_ASSOC);
                $resultReviews->free_result();
            } else {
                $reviewsData = array();
            }
        } else {
            die('Error in query: ' . $conn->error);
        }

        $result->close();
    } else {
        die('Error in query: ' . $conn->error);
    }
} else {
    die('Invalid movie ID.');
}
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Review Page</title>
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
        background-color: rgb(41, 41, 41);
        padding: 7rem 0 2rem 5rem;
      }
      .container {
        display: flex;
      }
      .left {
        max-width: 40%;
      }
      .card {
        border-radius: 1rem;
        overflow: hidden;
        background-image: url(../images/poster/<?php echo ($movie['submovie'] == 'west') ? 'west' : 'indo'; 
        echo "/";
        echo $movie['image']; ?>);

        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        height: 35rem;

        display: flex;
        justify-items: end;
        align-items: end;
      }

      .information {
        background: rgba(26, 25, 25, 0.5);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        padding: 0.5rem 1.5rem;
      }
      .information > h4,
      .information > span,
      .information > p {
        color: white;
      }
      .information > h4 {
        font-size: xx-large;
        padding-left: 0.5rem;
      }
      .information > span {
        padding: 0.5rem;
      }
      .information > p {
        padding: 0.5rem;
      }
      .right {
        width: 100%;
      }
      .cast {
        width: 80%;
        display: flex;
        flex-direction: column;
        margin: 0 auto;
      }
      .cast-top {
        display: flex;
        justify-content: space-between;
      }
      .cast-top > h4 {
        font-size: xx-large;
        color: white;
      }
      .cast-top > a {
        display: flex;
        align-items: center;
        text-decoration: none;
      }
      .cast-top > a > button {
        background-color: #760000;
        color: black;
        font-size: medium;
        font-weight: bold;
        border-radius: 1rem;
        border: none;
        padding: 0.3rem 1.5rem;
        cursor: pointer;
      }
      .cast-top > a > button:hover {
        background-color: #ff0000;
      }
      .collom {
        background-color: black;
        border-radius: 0.6rem;
        padding: 0.5rem 1rem;
        display: flex;
        overflow-x: auto;
        margin-bottom: 0.5rem;
      }
      .collom::-webkit-scrollbar {
        height: 0.4rem;
      }
      .collom::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 6px;
      }
      .cast-card {
        width: 100px;
        text-align: center;
        margin: 0 0.3rem;
      }
      .cast-card > h4 {
        color: white;
        font-size: small;
      }
      .cast-card > h5 {
        color: white;
        font-weight: lighter;
      }
      .reviews {
        margin: 0 auto;
        width: 80%;
      }
      .reviews > h4 {
        color: white;
        font-size: xx-large;
        margin-bottom: 0.5rem;
      }
      .review {
        background-color: black;
        padding: 1rem 1rem;
        margin-bottom: 0.5rem;
        border-bottom-left-radius: 1rem;
        border-top-left-radius: 1rem;
        overflow-y: auto;
        height: 20rem;
      }
      .review::-webkit-scrollbar {
        width: 0.4rem;
      }
      .review::-webkit-scrollbar-thumb {
        background-color: #888;
      }
      .review-card {
        display: flex;
        padding-bottom: 0.5rem;
        margin-bottom: 0.5rem;
        border-bottom: solid white 1px;
      }
      .review-comment {
        padding-left: 1rem;
      }
      .review-comment > h5 {
        color: white;
        font-size: medium;
      }
      .review-comment > span {
        color: rgb(77, 77, 77);
      }
      .review-comment > p {
        color: white;
      }
      .comment {
        margin: 0 auto;
        width: 80%;
      }
      .comment > h4 {
        color: white;
        font-size: xx-large;
        margin-bottom: 0.5rem;
      }
      .comment-box {
        background-color: black;
        padding: 1rem 1rem;
        border-radius: 1rem;
      }
      label {
        display: block;
        color: white;
        margin: 0.5rem 0;
        font-size: larger;
      }
      input[type='text'] {
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
      input:focus {
        outline: none;
        border: none;
      }
      input[type='submit'] {
        margin-top: 1rem;
        padding: 0.3rem 1rem;
        border-radius: 1rem;
        background-color: rgb(114, 0, 0);
        font-weight: bold;
        cursor: pointer;
        border: none;
      }
      input[type='submit']hover {
        background-color: #c00000;
      }
      .exit {
        width: 80%;
        text-align: end;
        padding: 2rem;
        margin: 0 auto;
      }
      .exit > a > button {
        background-color: black;
        color: white;
        font-size: large;
        font-weight: bold;
        border-radius: 1rem;
        border: none;
        padding: 1rem 2rem;
        cursor: pointer;
      }
      .exit > a > button:hover {
        background-color: #ff0000;
      }
    </style>
  </head>
  <body>
    <nav>
      <a href="landing.php">
        <div class="icon">
          <img src="../images/horrorflix.png" alt="icon" width="200px" />
        </div>
      </a>
      <div class="navbar">
        <div class="nav-avatar">
          <a class="avatar" href="#">
            <svg width="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                fill-rule="evenodd"
                clip-rule="evenodd"
                d="M9.72222 7.77778C9.72222 5.71498 10.5417 3.73667 12.0003 2.27806C13.4589 0.819442 15.4372 0 17.5 0C19.5628 0 21.5411 0.819442 22.9997 2.27806C24.4583 3.73667 25.2778 5.71498 25.2778 7.77778C25.2778 9.84057 24.4583 11.8189 22.9997 13.2775C21.5411 14.7361 19.5628 15.5556 17.5 15.5556C15.4372 15.5556 13.4589 14.7361 12.0003 13.2775C10.5417 11.8189 9.72222 9.84057 9.72222 7.77778ZM9.72222 19.4444C7.14373 19.4444 4.67084 20.4687 2.84757 22.292C1.0243 24.1153 0 26.5882 0 29.1667C0 30.7138 0.614582 32.1975 1.70854 33.2915C2.80251 34.3854 4.28624 35 5.83333 35H29.1667C30.7138 35 32.1975 34.3854 33.2915 33.2915C34.3854 32.1975 35 30.7138 35 29.1667C35 26.5882 33.9757 24.1153 32.1524 22.292C30.3292 20.4687 27.8563 19.4444 25.2778 19.4444H9.72222Z"
                fill="white"
              />
            </svg>
          </a>
        </div>
        <div class="popup hidden">
          <p><a href="../function/logout.php">Log out</a></p>
        </div>
      </div>
    </nav>
    <main>
      <div class="container">
        <div class="left">
          <div class="card">
            <div class="information">
            <h4><?php echo $movie['name']; ?></h4>
                        <span><?php echo $movie['star']; ?>⭐ | <?php echo $movie['year']; ?> | <?php echo $movie['duration'].' minutes'; ?></span>
                        <p><?php echo $movie['synopsis']; ?></p>
            </div>
          </div>
        </div>
        <div class="right">
<?php
if(!empty($castData)){
    echo '<div class="cast">';
    echo '<div class="cast-top">';
    echo '<h4>Cast</h4>';
    if($user['isAdmin'] == 1){
    echo '<a href="addCast.php?mov=' . $movieId . '">';
    echo '<button>Add Cast</button>';
    echo '</a>';
    echo '<a href="addMovie.php?edit=' . $movieId . '">';         #benerin CSS nya
    echo '<button>Edit Movie</button>';
    echo '</a>';
    }
    echo '</div>';
    echo '<div class="collom">';
    

    foreach ($castData as $cast) {
        echo '<div class="cast-card">';
        echo '<img src="../images/cast/' . $cast['foto'] . '" alt="picture" width="60px" />';
        echo '<h4>' . $cast['nama_cast'] . '</h4>';
        echo '<h5><em>' . $cast['nama_tokoh'] . '</em></h5>';
        echo '</div>';
    }
    
    echo '</div>';
    echo '</div>';}
else{
    echo '<div class="cast">';
    echo '<div class="cast-top">';
    echo '<h4>Cast</h4>';
    if($user['isAdmin'] == 1){
    echo '<a href="addCast.php?mov=' . $movieId . '">';
    echo '<button>Add Cast</button>';
    echo '</a>';
    echo '<a href="addMovie.php?edit=' . $movieId . '">';         #BENERIN CSSNYA 
    echo '<button>Edit Movie</button>';
    echo '</a>';}
    echo '</div>';
    echo '<div class="collom">';
    echo '<p style="color: white;">No cast available.</p>';
    echo '</div>';
    echo '</div>';
}

?>



          <div class="reviews">
            <h4>Review</h4>
            <div class="review">
            <?php
    if (!empty($reviewsData)) {
        foreach ($reviewsData as $review) {
            echo '<div class="review-card">';
            echo '<div class="pp">';
            echo '<svg width="42px" viewBox="0 0 42 42" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              fill-rule="evenodd"
              clip-rule="evenodd"
              d="M20.8334 4.16667C17.9183 4.16613 15.054 4.93018 12.5265 6.38256C9.999 7.83493 7.89662 9.92483 6.42922 12.4437C4.96183 14.9625 4.18073 17.8221 4.16391 20.7372C4.14709 23.6522 4.89513 26.5207 6.33336 29.0562C7.30546 27.7929 8.55509 26.77 9.98562 26.0666C11.4162 25.3633 12.9893 24.9983 14.5834 25H27.0834C28.6774 24.9983 30.2506 25.3633 31.6811 26.0666C33.1116 26.77 34.3612 27.7929 35.3334 29.0562C36.7716 26.5207 37.5196 23.6522 37.5028 20.7372C37.486 17.8221 36.7049 14.9625 35.2375 12.4437C33.7701 9.92483 31.6677 7.83493 29.1402 6.38256C26.6127 4.93018 23.7484 4.16613 20.8334 4.16667ZM37.3813 33.4917C40.1667 29.8603 41.6734 25.4099 41.6667 20.8333C41.6667 9.32708 32.3396 0 20.8334 0C9.32711 0 2.34443e-05 9.32708 2.34443e-05 20.8333C-0.00685455 25.41 1.49983 29.8604 4.28544 33.4917L4.27502 33.5292L5.01461 34.3896C6.96853 36.674 9.39457 38.5075 12.1255 39.7638C14.8564 41.0201 17.8273 41.6693 20.8334 41.6667C25.057 41.6744 29.1821 40.3915 32.6563 37.9896C34.1374 36.9663 35.4804 35.7563 36.6521 34.3896L37.3917 33.5292L37.3813 33.4917ZM20.8334 8.33333C19.1758 8.33333 17.586 8.99181 16.4139 10.1639C15.2418 11.336 14.5834 12.9257 14.5834 14.5833C14.5834 16.2409 15.2418 17.8306 16.4139 19.0028C17.586 20.1749 19.1758 20.8333 20.8334 20.8333C22.491 20.8333 24.0807 20.1749 25.2528 19.0028C26.4249 17.8306 27.0834 16.2409 27.0834 14.5833C27.0834 12.9257 26.4249 11.336 25.2528 10.1639C24.0807 8.99181 22.491 8.33333 20.8334 8.33333Z"
              fill="white"
            />
          </svg>';
            echo '</div>';
            echo '<div class="review-comment">';
            echo '<h5>' . $review['name'] . '</h5>';
            echo '<span>' . $review['timestamp'] . '</span>'; #BENERIN CSSNYA
            if ($user['id'] == $review['id_user']) { ?>
              <p>
                  <a href='review.php?mov=<?= $movieId ?>&edit=<?= $review['id_review'] ?>'> Edit </a> |
                  <a href='review.php?mov=<?= $movieId ?>&del=<?= $review['id_review'] ?>'> Delete </a>
              </p>
          <?php
          }
            echo '<p>' . $review['review'] . '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p style="color: white;">No Reviews available.</p>';
    }
    ?>
            </div>
          </div>
          <div class="comment">
            <h4>Add Review</h4>
            <div class="comment-box">
            <form action="../function/reviewProcess.php?mov=<?= $movieId ?>&action=<?= $reviewIdToEdit ? 'edit&editId=' . $reviewIdToEdit : 'add' ?>" method="post">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Name" value='<?= $user['name'];?>' disabled/>
                <label for="comment">Review</label>
                <input type="text" name="review" id="comment" placeholder="Comment" value="<?= isset($_GET['edit']) ? $review['review'] : '' ?>" required />
                <input type="submit" value="Add" />
              </form>
            </div>
          </div>



<!--  -->

          <div class="exit">
            <a href="landing.php">
              <button>Return</button>
            </a>
          </div>
        </div>
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

