<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
      body {
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(#203075, #233581);
        color: #fff;
        font-family: "Varela Round", Sans-serif;
        text-shadow: 0 30px 10px rgba(0, 0, 0, 0.15);
      }

      .main {
        text-align: center;
        z-index: 5;
        position: absolute;
        top: 30vh;
        bottom: 0;
      }
      p {
        font-size: 18px;
        margin-top: 0;
      }
      h1 {
        font-size: 15vmax;
        margin: 0;
      }
      button {
        background: linear-gradient(#ec5dc1, #d61a6f);
        padding: 10px 50px;
        border: none;
        border-radius: 20px;
        box-shadow: 0 30px 15px rgb(0 0 0 / 15%);
        outline: none;
        color: #fff;
        font: 400 20px Nunito, "Varela Round", Sans-serif;
        text-transform: uppercase;
        cursor: pointer;
      }
      .bubble {
        background: linear-gradient(#ec5dc1, #d61a6f);
        border-radius: 50%;
        box-shadow: 0 30px 15px rgba(0, 0, 0, 0.15);
        position: absolute;
      }
      .bubble:before,
      .bubble:after {
        content: "";
        background: linear-gradient(#ec5dc1, #d61a6f);
        border-radius: 50%;
        box-shadow: 0 30px 15px rgba(0, 0, 0, 0.15);
        position: absolute;
      }
      .bubble:nth-child(1) {
        top: 15vh;
        left: 15vw;
        height: 22vmin;
        width: 22vmin;
      }
      .bubble:nth-child(1):before {
        width: 13vmin;
        height: 13vmin;
        bottom: -25vh;
        right: -10vmin;
      }
      .bubble:nth-child(2) {
        top: 20vh;
        left: 38vw;
        height: 10vmin;
        width: 10vmin;
      }
      .bubble:nth-child(2):before {
        width: 5vmin;
        height: 5vmin;
        bottom: -10vh;
        left: -8vmin;
      }
      .bubble:nth-child(3) {
        top: 12vh;
        right: 30vw;
        height: 13vmin;
        width: 13vmin;
      }
      .bubble:nth-child(3):before {
        width: 3vmin;
        height: 3vmin;
        bottom: -15vh;
        left: -18vmin;
        z-index: 6;
      }
      .bubble:nth-child(4) {
        top: 25vh;
        right: 18vw;
        height: 18vmin;
        width: 18vmin;
      }
      .bubble:nth-child(4):before {
        width: 7vmin;
        height: 7vmin;
        bottom: -10vmin;
        left: -15vmin;
      }
      .bubble:nth-child(5) {
        top: 60vh;
        right: 18vw;
        height: 28vmin;
        width: 28vmin;
      }
      .bubble:nth-child(5):before {
        width: 10vmin;
        height: 10vmin;
        bottom: 5vmin;
        left: -25vmin;
      }
    </style>
  </head>
  <body>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="bubble"></div>
    <div class="main">
      <h1>404</h1>
      <p>It looks like you're lost...<br />That's a trouble?</p>
      <!-- <button type="button">Go back</button> -->
    </div>
  </body>
</html>
