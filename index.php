<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta property="og:title" content="">
  <meta property="og:type" content="">
  <meta property="og:url" content="">
  <meta property="og:image" content="">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <!--<link rel="stylesheet" href="css/normalize.css">-->
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body>
<header>
  <?php
  include_once ("./HTML/header.html");
  ?>
</header>
<div class="slide-container">
  <div class="custom-slider fade">
    <div class="slide-index">1 / 4</div>
    <img class="slide-img" src="img/Table1.png">
    <!--<div class="slide-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</div>-->
  </div>
  <div class="custom-slider fade">
    <div class="slide-index">2 / 4</div>
    <img class="slide-img" src="img/Table2.png">
    <!--<div class="slide-text">Nullam luctus aliquam ornare. </div>-->
  </div>
  <div class="custom-slider fade">
    <div class="slide-index">3 / 4</div>
    <img class="slide-img" src="img/Table3.png">
    <!--<div class="slide-text">Praesent lobortis libero sed egestas suscipit.</div>-->
  </div>
  <div class="custom-slider fade">
    <div class="slide-index">4 / 4</div>
    <img class="slide-img" src="img/Fond_menu.png">
    <!--<div class="slide-text">Praesent lobortis libero sed egestas suscipit.</div>-->
  </div>
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>
<div class="slide-dot">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
</div>
<script src="js/script.js"></script>
  <!-- Add your site or application content here -->
  <p>Yo c'est le gite fsdf </p>
  <script src="js/vendor/modernizr-3.11.2.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID.
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'anonymizeIp', true); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>-->
</body>

</html>
