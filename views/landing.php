<?php include '../function/connect.php';?>
<?php include '../function/validateSession.php';?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Landing Page</title>
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
        nav>a {
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
        .nav-search {
          display: flex;
          fill:  rgb(205, 205, 205);
          position: relative;
          align-items: center;
        }
        .nav-search > input {
          font-weight: bold;
          font-size: 1rem;
          padding: 10px;
          width: 30vw;
          color: white;
          background-color: rgb(61, 61, 61);
          border: none;
          border-radius: 4px;
        }
        .nav-search > input:focus {
          outline: none;
          border: none;
        }
        .nav-search > svg {
          position: absolute;
          right: 6px;
        }
        .nav-avatar {
          margin-left: 2rem;
          /* background-color: aliceblue; */
          display: flex;
          align-items: center;
          justify-content: end;
        }
        main {
          box-sizing: border-box;
          background-color: black;
          padding: 7rem 0 2rem 5rem;
        }

        .hero {
            overflow: hidden; /* Prevent horizontal scrollbar */
        }

        .slide-wrapper {
            max-width: 60rem;
            height: 20rem;
            margin: 0 auto;
            overflow: hidden; /* Hide overflowing content */
            position: relative;
        }

        .slider {
            display: flex;
            width: fit-content; /* Adjust width to fit content */
            box-shadow: 0 1.5rem 3rem -0.75rem hsla(0, 0%, 0%, 0.25);
            border-radius: 0.5rem;
            scroll-snap-type: x mandatory;
            animation: slideAnimation 12s infinite; /* Adjust duration as needed */
        }

        .slider::-webkit-scrollbar {
          height: 0.4rem;
        }

        .slider::-webkit-scrollbar-thumb {
          background-color: #888;
          border-radius: 6px;
        }
        .slider img {
            flex: 0 0 auto; /* Adjust flex properties */
            scroll-snap-align: start;
            max-width: 100%;
        }
        .slider-container {
            overflow: hidden;
            position: relative;
        }

        @keyframes slideAnimation {
            0% {
                transform: translateX(0);
            }
            25% {
                transform: translateX(-100%);
            }
            50% {
                transform: translateX(-200%);
            }
            75% {
                transform: translateX(-300%);
            }
            100% {
                transform: translateX(0);
            }
        }

        .region>h1 {
          color: white;
          font-size: 3rem;
        }
        .region {
          display: flex;
          justify-content: space-between;
        }
        .region>p {
          display: flex;
          align-items: center;
        }
        .region>p>a {
          margin-right: 1rem;
          font-weight: bold;
          font-size: 1.5rem;
          background-color: rgb(114, 0, 0);
          border-radius: 0.7rem;
          padding: 0.5rem 1.7rem;
          color: black;
        }
        .region>p>a:hover {
          background-color: #c00000;
        }
        .wrapper {
          width: 100%;
        }
        .wrap-west, .wrep-indonesian {
          margin-bottom: 2rem;
        }
        .wrapper-scroll {
          height: 20rem;
          display: flex;
          align-items: center;
          overflow-x: auto;
          border-bottom: solid white 2px;
        }
        .wrapper-scroll::-webkit-scrollbar {
          width: 0;
        }
        a {
          text-decoration: none;
        }
        .wrapper-scroll>a:hover {
          transform: scale(110%);
        }
        .items {
          height: 13rem;
          width: 12rem;
          margin: 0 2rem 0 0.7rem;
        }
        .images {
          width: 100%;
          border-radius: 0.8rem;
          overflow: hidden;
        }
        .images>img {
          max-width: 100%;
          height: auto;
          display: block;
        }
        .title>h3 {
          color: white;
        }
        footer {
          background-color: black;
          color: white;
          padding-bottom: 1rem;
          text-align: center;
        }
    </style>

  </head>
  <body>
  <nav>
      <a href="landing.html">
        <div class="icon">
            <img src="../images/horrorflix.png" alt="icon" width="200px" />
        </div>
      </a>
      <div class="navbar">
        <div class="nav-search">
          <input type="text" name="search" placeholder="Search..." />
          <svg xmlns="http://www.w3.org/2000/svg" width="1.3rem" viewBox="0 0 512 512"><path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/></svg>
        </div>
        <div class="nav-avatar">
          <a class="avatar" class="avatar" href="#">
            <svg width="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M9.72222 7.77778C9.72222 5.71498 10.5417 3.73667 12.0003 2.27806C13.4589 0.819442 15.4372 0 17.5 0C19.5628 0 21.5411 0.819442 22.9997 2.27806C24.4583 3.73667 25.2778 5.71498 25.2778 7.77778C25.2778 9.84057 24.4583 11.8189 22.9997 13.2775C21.5411 14.7361 19.5628 15.5556 17.5 15.5556C15.4372 15.5556 13.4589 14.7361 12.0003 13.2775C10.5417 11.8189 9.72222 9.84057 9.72222 7.77778ZM9.72222 19.4444C7.14373 19.4444 4.67084 20.4687 2.84757 22.292C1.0243 24.1153 0 26.5882 0 29.1667C0 30.7138 0.614582 32.1975 1.70854 33.2915C2.80251 34.3854 4.28624 35 5.83333 35H29.1667C30.7138 35 32.1975 34.3854 33.2915 33.2915C34.3854 32.1975 35 30.7138 35 29.1667C35 26.5882 33.9757 24.1153 32.1524 22.292C30.3292 20.4687 27.8563 19.4444 25.2778 19.4444H9.72222Z" fill="white"/>
              </svg>
          </a>
        </div>
        <div class="popup hidden">
          <p><a href="../function/logout.php">Log out</a></p>
        </div>
      </div>
    </nav>

    <main>
    <section class="hero">
        <div class="slide-wrapper">
            <div class="slider-container">
                <div class="slider">
                    <img id="slide-1" src="../images/one.jpg" alt="pict">
                    <img id="slide-2" src="../images/two.jpg" alt="pict">
                    <img id="slide-3" src="../images/three.jpg" alt="pict">
                    <img id="slide-4" src="../images/four.jpg" alt="pict">
                </div>
            </div>
        </div>
    </section>
      

      <div class="wrapper">
        <div class="wrap-west">
          <div class="region">
            <h1>West Movie</h1>
            <?php if($user['isAdmin'] == 1){ echo '
            <p><a href="addMovie.php">Add Movie</a></p>'; } ?>
          </div>
          <div class="wrapper-scroll">
            <?php
            $sql = "SELECT id_movie, name, image, year FROM movie where submovie = 'west'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo '<a href="review.php?mov='.$row["id_movie"].'">
                        <div class="items">
                          <div class="images"><img src="../images/poster/west/' . $row["image"] . '" alt="' . $row["name"] . '"></div>
                          <div class="title"><h3>' . $row["name"] . ' (' . $row["year"] . ')</h3></div>
                        </div>
                      </a>';}
            ?>
          </div>
        </div>  
        <div class="wrep-indonesian">
          <div class="region">
            <h1>Indonesian Movie</h1>
            <?php if($user['isAdmin'] == '1'){ echo '
            <p><a href="addMovie.php">Add Movie</a></p>'; } ?>
          </div>
          <div class="wrapper-scroll">
          <?php
            $sql = "SELECT id_movie, name, image, year FROM movie where submovie = 'indo'";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                echo '<a href="review.php?mov='.$row["id_movie"].'">
                        <div class="items">
                          <div class="images"><img src="../images/poster/indo/' . $row["image"] . '" alt="' . $row["name"] . '"></div>
                          <div class="title"><h3>' . $row["name"] . ' (' . $row["year"] . ')</h3></div>
                        </div>
                      </a>';}
            ?>
          </div>
        </div>  
      </div>
    </main>

    <footer>
      <h3>Copyright</h3>
    </footer>

    <script>
      const avatar = document.querySelector('.avatar');
      avatar.addEventListener('click', function() {
      const popup = document.querySelector('.popup');
      popup.classList.toggle('hidden')
      popup.classList.toggle('block')
      })
    </script>
    <script>
        // Auto slide script
        const slider = document.querySelector('.slider');
        let isAutoSliding = true;

        function autoSlide() {
            if (isAutoSliding) {
                const firstSlide = document.getElementById('slide-1');
                const cloneSlide = firstSlide.cloneNode(true);
                slider.appendChild(cloneSlide);
                slider.scrollLeft += firstSlide.offsetWidth;

                setTimeout(() => {
                    slider.scrollLeft += firstSlide.offsetWidth;
                    slider.removeChild(firstSlide);
                }, 1000); // Adjust the duration as needed

                setTimeout(autoSlide, 3000); // Adjust the interval as needed
            }
        }

        // Start auto slide on page load
        document.addEventListener('DOMContentLoaded', autoSlide);

        // Stop auto slide when mouse enters the slider area
        slider.addEventListener('mouseenter', () => {
            isAutoSliding = false;
        });

        // Resume auto slide when mouse leaves the slider area
        slider.addEventListener('mouseleave', () => {
            isAutoSliding = true;
            autoSlide();
        });
    </script>
    
  </body>
</html>
