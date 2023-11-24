<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Succses</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
      #popup {
        position: absolute;
        width: 100%;
        height: 100%;
        display: flex;
        transition: transform 0.5s ease;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        background-color: black;
      }
      #popup > h1 {
        font-size: 6rem;
        color: white;
      }
      #popup > a {
        margin-top: 4rem;
        text-decoration: none;
      }
      #popup > a > p {
        padding: 0.5rem 1.5rem;
        border-radius: 1.2rem;
        background-color: #760000;
        color: black;
        font-size: xx-large;
        font-weight: bold;
      }
      #popup > a > p:hover {
        background-color: #c00000;
      }
    </style>
  </head>
  <body>
    <div id="popup">
      <h1>Sign up Succes !</h1>
      <a href="login.html"><p>Sign In Now</p></a>
    </div>
  </body>
</html>
