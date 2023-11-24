<?php include '../function/connect.php';?>

<?php
session_start();
if (isset($_SESSION['user'])) {
  header("Location: landing.php");
      exit;}

?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <style>
      * {
        margin: 0;
        padding: 0;
      }
      body {
        font-family: sans-serif;
      }
      nav {
        padding: 0.5rem;
        background-color: transparent;
        position: fixed;
        width: 100%;
        z-index: 999;
        position: fixed;
    }
    .top {
        display: flex;
        justify-content: space-between;
      }
      nav > a {
        padding: 4rem 0;
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
      .nav-avatar a {
        text-decoration: none;
      }
      .nav-avatar a p:hover {
        background-color: #c00000;
      }
      .nav-avatar a p {
        background-color: #760000;
        color: black;
        font-size: x-large;
        font-weight: bold;
        border-radius: 1.5rem;
        padding: 1rem 2rem;
      }

      .container {
        z-index: -1;
      }
      .slider {
        position: relative;
        width: 100vw;
        overflow: hidden;
      }
      .slider ul {
        position: relative;
        list-style: none;
        height: 100vh;
        width: 10000%;
        padding: 0;
        margin: 0;
        transition: all 750ms ease;
        left: 0;
      }
      .slider ul li {
        position: relative;
        height: 100%;
        float: left;
      }
      .slider ul li img {
        width: 100vw;
        height: 100vh;
      }
      .text {
        width: 60%;
      }
      .text h1 {
        padding: 10rem 2rem;
        color: aliceblue;
        font-size: 4rem;
      }
    </style>
  </head>
  <body>
    <nav>
        <div class="top">
            <a href="landing.php">
              <div class="icon">
                <img src="../images/horrorflix.png" alt="icon" width="550px" />
              </div>
            </a>
            <div class="navbar">
              <div class="nav-avatar">
                <a href="login.php">
                  <p>Sign In</p>
                </a>
              </div>
            </div>
        </div>
      <div class="text">
        <h1>Honest and in-depth film reviews, to help you choose the right movie.</h1>
    </div>
    </nav>
    <section class="container">
      <div class="slider">
        <ul class="slider-wrap">
          <li><img id="slide-1" src="../images/cover1.jpg" alt="Image 1" /></li>
          <li><img id="slide-2" src="../images/cover2.jpg" alt="Image 2" /></li>
          <li><img id="slide-3" src="../images/cover3.jpg" alt="Image 3" /></li>
          <li><img id="slide-4" src="../images/cover4.jpg" alt="Image 4" /></li>
        </ul>
      </div>
    </section>
    <script>
      var slider = document.querySelector('.slider');
      var sliderWidth = slider.offsetWidth;
      var slideList = document.querySelector('.slider-wrap');
      var count = 1;
      var items = slideList.querySelectorAll('li').length;

      window.addEventListener('resize', function () {
        sliderWidth = slider.offsetWidth;
      });
      var nextSlide = function () {
        if (count < items) {
          slideList.style.left = '-' + count * sliderWidth + 'px';
          count++;
        } else if ((count = items)) {
          slideList.style.left = '0px';
          count = 1;
        }
      };
      setInterval(function () {
        nextSlide();
      }, 2500);
    </script>
  </body>
</html>
