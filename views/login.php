<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <style>
      * {
        margin: 0;
        padding: 0;
      }
      body {
        background-color: black;
        font-family: sans-serif;
      }
      .container {
        width: 100%;
        height: 100vh;
        display: flex;
      }
      .left {
        width: 60%;
        min-width: 300px;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .right {
        position: absolute;
        right: 0;
        bottom: 0;
        top: 0;
        width: 30%;
        overflow: hidden;
        border-top-left-radius: 1rem;
        border-bottom-left-radius: 1rem;
        padding: 2rem;
        background: linear-gradient(to bottom, #872F2F, #E22929);
      }
      .sign-in {
        position: relative;
        top: 10rem;
        width: 100%;
      }
      .sign-in > form > h2 {
        margin-bottom: 2rem;
        font-size: 3rem;
      }
      .sign-up {
        position: relative;
        top: 41rem;
        width: 100%;
      }
      .sign-up > form > h2 {
        margin-bottom: 2rem;
        font-size: 3rem;
      }
      
      label {
        display: block;
        margin: 0.5rem 0 0.5rem 0;
        color: white;
      }
      input {
        padding: 10px;
        width: 100%;
        color: #000000;
        border: none;
        border-radius: 4px;
      }
      input:focus {
        outline: none;
      }
      .button {
        margin: 1rem 0 0.5rem 0.7rem;
        background-color: #760000;
        color: #000000;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        font-size: 1.2rem;
      }
      .sign-in > form > p,
      .sign-up > form > p {
        color: white;
      }
      .sign-in > form > p > span,
      .sign-up > form > p > span {
        color: #59AFFF;
;
        cursor: pointer;
      }
      </style>
  </head>
  <body>
    <div class="container">
      <div class="left"><img src="../images/horrorflix.png" alt="">
      </div>
      <div class="right">
        <div class="sign-in">
          <form action="../function/loginProcess.php" method="post">
            <h2>Sign In</h2>
            <label for="username">Email</label>
            <input type="text" name="email" placeholder="email" required id="email" />
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" required id="password" />
            <input class="button" type="submit" name="login" value="Log In" />
            <p>Dont have an account? <span class="in" onclick="changeI()">Sign Up here</span></p>
          </form>
        </div>
        <div class="sign-up">
          <form action="../function/regisProcess.php" method="post">
            <h2>Sign Up</h2>
            <label for="username">Name</label>
            <input type="text" name="name" required placeholder="Name"/>
            <label for="email">Email</label>
            <input type="email" name="email" required id="email" placeholder="example@xxx.com" />
            <label for="password">Password</label>
            <input type="password" name="password" required placeholder="Password" />
            <input class="button" type="submit" name="login" value="Create Account" />
            <p>Already have an account? <span class="up" onclick="changeU()">Sign In</span></p>
          </form>
        </div>
      </div>
    </div>
    
    <script>
      const signIn = document.querySelector(".sign-in");
      const signUp = document.querySelector(".sign-up");
      /* top: -9rem; */
      /* top: -21rem; */
      function changeI() {
        signIn.style.top = "-21rem";
        signIn.style.transition = ".5s";
        signUp.style.top = "-9rem";
        signUp.style.transition = ".5s";
      }
      function changeU() {
        signIn.style.top = "10rem";
        signIn.style.transition = ".5s";
        signUp.style.top = "41rem";
        signUp.style.transition = ".5s";
      }
      </script>
  </body>
  </html>
  