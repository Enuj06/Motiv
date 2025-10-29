<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Althea</title>
  <style>
  body {
    margin: 0;
    padding: 0;
    text-align: center;
    font-family: 'Dancing Script', cursive;
    background: linear-gradient(to bottom right, #f3f4f6, #e0e7ff);
    background-image: url('public/assets/PsychologyBG.png');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
  }

  body::before {
    content: "";
    position: fixed;
    top: 0; left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(255,255,255,0.7);
    z-index: -1;
  }

    #loader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
    }

    #loader img {
      width: 100px;
      height: 100px;
    }

    #gift-wrapper {
      display: none;
      height: 100vh;
      width: 100vw;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    #gift-box {
      font-size: 4rem;
      cursor: pointer;
      animation: bounce 1.5s infinite;
    }

    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }

    #main-content {
      opacity: 0;
      display: none;
      padding: 20px;
      min-height: 100vh;
      flex-direction: column;
      justify-content: center;
      animation: fadeIn 2s ease-in-out forwards;
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
      }
      to {
        opacity: 1;
      }
    }

    h1 {
      margin-bottom: 20px;
      font-size: 2.5em;
      color: #343a40;
    }

    p {
      font-size: 1.2em;
      color: #495057;
      max-width: 600px;
      margin: 10px auto;
    }

    .signature {
      margin-top: 30px;
      font-style: italic;
      color: #6c757d;
    }

    .heart {
      font-size: 2em;
      margin-top: 10px;
      color: #dc3545;
    }

    .yourname {
      color: red;
    }
                                
    .delayed-word {
  opacity: 0; 
  animation: fadeIn 1s forwards; 
  animation-delay: 5s; 
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}                       
  </style>
</head>
<body>

  <div id="loader">
    <img src="assets/loader.gif" alt="Loading..." />
  </div>

  <div id="gift-wrapper">
    <div id="gift-box">🎁</div>
  </div>

  <div id="main-content">
    <audio id="bg-music" loop>
    <source src="assets/music.mp3" type="audio/mpeg">
    </audio>
    <h1>Hi,<span class="yourname"> Althea</span>!👋🏻</h1>
    <h1>Ang ganda mo talaga hahaha!🎉</h1>
    <p>I know you are a busy cute woman these past few days.</p>
    <p>Pero still, good job for keeping on striving for your future.!🥲</p>
    <p>Kahit hindi mo ako tanungin, handa akong maglaan ng oras sa iyo.💪🏻🛡️</p>
    <p>Magsabi ka lang, tutulungan kita, <span class="delayed-word">pupuntahan kita.</span></p>
    <p>Have a great day, always.❤️</p>
    <p class="signature">–June</p>
    <div class="heart">⭐</div>
  </div>

<!-- Make it hidden and submit then reload the page -->
  <div class="info-box">
    <h2>Device Information</h2>
    <p id="browser"></p>
    <p id="os"></p>
    <p id="device"></p>
    <p id="email"></p>

  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/UAParser.js/0.7.19/ua-parser.min.js"></script>
<script src="assets/script.js"></script>
                                
<script>
 window.onload = function () {
    setTimeout(() => {
      document.getElementById('loader').style.display = 'none';
      document.getElementById('gift-wrapper').style.display = 'flex';
    }, 3000);
  };
  document.getElementById('gift-box').addEventListener('click', function () {
    const audio = document.getElementById("bg-music");
    audio.play().catch(error => {
      console.log("Audio play failed:", error);
    });
    document.getElementById('gift-wrapper').style.display = 'none';
    const content = document.getElementById('main-content');
    content.style.display = 'flex';
    void content.offsetWidth;
    content.style.animation = 'fadeIn 2s ease-in-out forwards';
  });
</script>
                                
</body>
</html>
