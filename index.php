<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/main.css">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <link rel="icon" href="./img/LOGO-final-fond-transparent.png" type="image/png">
</head>

<body>
<?php
include_once("./HTML/header.php");
?>
<div class="carrousel">
  <div class="custom-image fade">
    <img class="slide-img" src="img/Carousel/figuies-1.jpg">
  </div>
  <div class="custom-image fade">
    <img class="slide-img" src="img/Carousel/figuies.jpg">
  </div>
  <div class="custom-image fade">
    <img class="slide-img" src="img/Carousel/figuies-2.jpg">
  </div>
  <div class="custom-image fade">
    <img class="slide-img" src="img/Carousel/figuies-gr62_w2000.jpg">
  </div>
  <div class="custom-image fade">
    <img class="slide-img" src="img/Carousel/salles-la-source-cascade-de-la-crouzie_w2000.jpg">
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
  <span class="dot" onclick="currentSlide(5)"></span>
</div>

<div>
  <h1>Figuiès</h1>
  <p>
    <?php
    $xml = new DOMDocument();
    $xml->load("./DonneesAffichees.xml");
    $elements = $xml->getElementsByTagName('DESCRIPTION');
    foreach ($elements as $element) {
      echo nl2br($element->nodeValue);
    }
    ?>
  </p>
  <div class="indexButton" >
      <img id="affButtonIntroDown" class="iconArrow" src="./img/btnArrowDown.png" alt="Icone">
  </div>
  <p id="introText">
    <?php
    $xml = new DOMDocument();
    $xml->load("./DonneesAffichees.xml");
    $elements = $xml->getElementsByTagName('DESCDETAIL');
    foreach ($elements as $element) {
      echo nl2br($element->nodeValue);
    }
    ?>
  </p>
  <div class="indexButton" >
    <img id="affButtonIntroUp" class="iconArrow" src="./img/btnArrowUp.png" alt="Icone">
  </div>
</div>
<div id="Service">
  <h1> Equipements et Services </h1>
  <div class="ligne">
    <div class ="iconIndex">
    <img class ="iconIndex" src="./img/iconeChien.png" alt="Icône">
      <p> Animaux acceptés</p>
    </div>
    <div class ="iconIndex">
    <img class ="iconIndex" src="./img/iconeVoiture.png" alt="Icône">
      <p> Parking privé</p>
    </div>

    <div class ="iconIndex">
      <img class ="iconIndex" src="./img/iconeTerrasse.png" alt="Icône">
      <p>Terrasse</p>
    </div>
    <div class ="iconIndex">
      <img class ="iconIndex" src="./img/iconeTv.png" alt="Icône">
      <p>Télévision</p>
    </div>
  </div>
  <div class="indexButton" >
    <img id="affButtonServiceDown" class="iconArrow" src="./img/btnArrowDown.png" alt="Icone">
  </div>
  <div id="allServices" class="grid-container">
    <div class="grid-item">- Abris pour vélo ou VTT</div>
    <div class="grid-item">- Barbecue</div>
    <div class="grid-item">- Cuisine équipée</div>
    <div class="grid-item">- Habitation indépendante</div>
    <div class="grid-item">- Jardin</div>
    <div class="grid-item">- Local matériel fermé</div>
    <div class="grid-item">- Parking privé</div>
    <div class="grid-item">- Salon de jardin</div>
    <div class="grid-item">- Terrain non clos</div>
    <div class="grid-item">- Terrasse</div>
    <div class="grid-item">- Animaux acceptés (Payant)</div>
    <div class="grid-item">- Location de linge (Payante)</div>
    <div class="grid-item">- Ménage (Payant)</div>
    <div class="grid-item">- Climatisation</div>
    <div class="grid-item">- Cheminée</div>
    <div class="grid-item">- Lave vaisselle</div>
    <div class="grid-item">- Sèche cheveux</div>
    <div class="grid-item">- Télévision</div>
    <div class="grid-item">- Escalade à 5km</div>
    <div class="grid-item">- VTT - Vélo</div>
    <div class="grid-item">- Musée à 3km</div>
    <div class="grid-item">- Randonnée pédestre</div>
  </div>
  <div class="indexButton" >
    <img id="affButtonServiceUp" class="iconArrow" src="./img/btnArrowUp.png" alt="Icone">
  </div>
</div>

<div id="map" class="map">
  <script src="js/map.js"></script>
</div>
<script src="js/script.js"></script>

<?php
include_once ("./HTML/footer.html");
?>
</body>
</html>
