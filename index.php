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

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
</head>

<body>
<header>
  <?php
  include_once ("./HTML/header.html");
  ?>
</header>
<div class="carrousel">
  <div class="custom-image fade">
    <div class="slide-index">1 / 4</div>
    <img class="slide-img" src="img/Table1.png">
  </div>
  <div class="custom-image fade">
    <div class="slide-index">2 / 4</div>
    <img class="slide-img" src="img/Table2.png">
  </div>
  <div class="custom-image fade">
    <div class="slide-index">3 / 4</div>
    <img class="slide-img" src="img/Table3.png">
  </div>
  <div class="custom-image fade">
    <div class="slide-index">4 / 4</div>
    <img class="slide-img" src="img/Fond_menu.png">
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

<div id="map" style="width: 600px; height: 400px;"></div>

<script src="js/script.js"></script>
<script src="js/map.js"></script>

  <!-- Add your site or application content here -->
  <p>Yo c'est le gite fsdf </p>

<footer>
  <?php
  include_once ("./HTML/footer.html");
  ?>
</footer>
</body>

</html>
