<?php include '../function/connect.php';?>

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
        height: 100vh;
        display: flex;
      }
      .left {
        flex: 2;
        display: flex;
        justify-content: center;
        align-items: center;
      }

      .right {
        flex: 1;
        overflow: hidden;
        border-top-left-radius: 1rem;
        border-bottom-left-radius: 1rem;
        padding: 2rem;
        background: linear-gradient(to bottom, #872f2f, #e22929);
      }
      .sign-in {
        margin-top: 10rem;
      }
      .sign-in > form > h2 {
        margin-bottom: 2rem;
        font-size: 3rem;
      }

      label {
        display: block;
        margin: 0.5rem 0 0.5rem 0;
        color: white;
      }
      input {
        box-sizing: border-box;
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
        margin: 1rem 0 0.5rem 0;
        background-color: #760000;
        color: #000000;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        font-size: 1rem;
      }
      .button:hover {
        background-color: #c00000;
      }
      .sign-in > form > p {
        color: white;
      }
      .sign-in > form > p > a {
        color: #59afff;
        cursor: pointer;
      }
      .password {
        position: relative;
      }
      svg {
        position: absolute;
        right: 0.5rem;
        top: 0.2rem;
        cursor: pointer;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="left"><img src="../images/horrorflix.png" alt="icon"/></div>
      <div class="right">
        <div class="sign-in">
          <form action="../function/loginProcess.php" method="post">
            <h2>Sign In</h2>
            <label for="username">Email</label>
            <input type="text" name="email" placeholder="Email" />
            <label for="password" require>Password</label>
            <div class="password">
              <input type="password" id="password" name="password" placeholder="Password" />
              <svg width="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                  d="M1.60221 0.274912C1.51506 0.187754 1.41159 0.118617 1.29772 0.0714475C1.18385 0.0242779 1.0618 9.18359e-10 0.938552 0C0.815299 -9.18359e-10 0.693254 0.0242779 0.579383 0.0714475C0.465513 0.118617 0.362048 0.187754 0.274895 0.274912C0.187743 0.36207 0.11861 0.465542 0.0714431 0.57942C0.0242764 0.693297 -9.18301e-10 0.81535 0 0.93861C9.18302e-10 1.06187 0.0242764 1.18392 0.0714431 1.2978C0.11861 1.41168 0.187743 1.51515 0.274895 1.60231L6.83647 8.16054C3.58675 10.3772 1.32439 13.769 0.52611 17.621C0.500998 17.7416 0.499869 17.8658 0.522787 17.9868C0.545704 18.1078 0.59222 18.223 0.659678 18.326C0.727136 18.429 0.814215 18.5177 0.915944 18.587C1.01767 18.6563 1.13206 18.7049 1.25257 18.73C1.37308 18.7551 1.49736 18.7563 1.61831 18.7333C1.73926 18.7104 1.85451 18.6639 1.95748 18.5964C2.06045 18.529 2.14913 18.4419 2.21844 18.3402C2.28776 18.2384 2.33636 18.124 2.36148 18.0035C2.71934 16.2721 3.419 14.6294 4.41949 13.1717C5.41998 11.714 6.70121 10.4706 8.18815 9.51418L11.1559 12.4802C10.3824 13.035 9.73889 13.7515 9.27 14.5799C8.80112 15.4083 8.51807 16.3288 8.44049 17.2776C8.36292 18.2263 8.49269 19.1806 8.82078 20.0742C9.14887 20.9678 9.66744 21.7793 10.3405 22.4524C11.0136 23.1255 11.825 23.6441 12.7185 23.9722C13.6121 24.3003 14.5663 24.4301 15.515 24.3525C16.4637 24.2749 17.3841 23.9919 18.2125 23.5229C19.0408 23.054 19.7573 22.4105 20.3121 21.637L28.3978 29.7251C28.5738 29.9011 28.8125 30 29.0614 30C29.3104 30 29.5491 29.9011 29.7251 29.7251C29.9011 29.5491 30 29.3103 30 29.0614C30 28.8125 29.9011 28.5737 29.7251 28.3977L1.60221 0.274912ZM15.2315 11.2559L21.5363 17.561C21.4728 15.9091 20.7882 14.342 19.6193 13.173C18.4504 12.0041 16.8834 11.3194 15.2315 11.2559ZM10.3685 6.39443L11.8739 7.89994C12.8945 7.63483 13.9446 7.50064 14.9991 7.50059C21.0095 7.50059 26.3543 11.8634 27.6348 18.0035C27.6855 18.2472 27.8309 18.4607 28.0391 18.5971C28.2472 18.7335 28.501 18.7817 28.7446 18.731C28.9883 18.6802 29.2018 18.5348 29.3382 18.3267C29.4746 18.1185 29.5227 17.8647 29.472 17.621C28.0153 10.6372 21.9225 5.62574 14.9991 5.62574C13.3962 5.62574 11.8345 5.89384 10.3685 6.39443Z"
                  fill="#767676"
                />
              </svg>
            </div>
            <input class="button" type="submit" name="login" value="Log In" />
            <p>Dont have an account? <a class="in" href="register.php">Sign Up here</a></p>
          </form>
        </div>
      </div>
    </div>

    <script>
      const hide = document.querySelector('svg');
      hide.addEventListener('click', function () {
        var passwordInput = document.getElementById('password');
        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
      });
    </script>
  </body>
</html>