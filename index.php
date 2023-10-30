<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title>Gîte Figuiès</title>
  <link rel="icon" href="./img/Logo_x32.png" type="image/png">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
</head>

<body>

  <?php
  include_once("./HTML/header.php");
  ?>
  <div class="carrousel">
    <?php
    $directory = './img/Carousel'; // Remplacez ceci par le chemin du dossier que vous souhaitez lister.

    // Utilisez scandir() pour lister les éléments du dossier.
    $files = scandir($directory);

    // Parcourez les éléments et affichez-les.
    foreach ($files as $file) {
      if ($file != '.' && $file != '..') {
        echo "<div class=\"custom-image fade\">
            <img class=\"slide-img\" src=\"img/Carousel/$file\"  loading=\"lazy\">
            </div>";
      }
    }
    ?>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
<br>
<div class="slide-dot">
  <?php
  $directory = './img/Carousel'; // Remplacez ceci par le chemin du dossier que vous souhaitez lister.

  // Utilisez scandir() pour lister les éléments du dossier.
  $files = scandir($directory);
  $fileCount = 0;

  // Parcourez les éléments et affichez-les.
  foreach ($files as $file) {
    if ($file != '.' && $file != '..') {
      $fileCount ++;
      echo "<span class=\"dot\" onclick=\"currentSlide($fileCount)\"></span>";
    }
  }
  ?>
</div>

  <div class="textIndex">
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

  <p id="introText" class="introText">
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
      <img id="affButtonIntroDown" class="iconArrow" src="./img/btnArrowDown_x50.png" alt="Icone" loading="lazy" onclick="toggleExpendIntro()">
    </div>
  </div>
  <div id="Service"></div>
<div>
  <h1> Equipements et Services </h1>
  <div class="ligne">
    <div class ="iconIndex">
    <img class ="iconIndex" src="./img/iconeChien_x50.png" alt="Icône" loading="lazy">
      <p> Animaux acceptés</p>
    </div>
    <div class ="iconIndex">
    <img class ="iconIndex" src="./img/iconeVoiture_x50.png" alt="Icône" loading="lazy">
      <p> Parking privé</p>
    </div>

    <div class ="iconIndex">
      <img class ="iconIndex" src="./img/iconeTerrasse_x50.png" alt="Icône" loading="lazy">
      <p>Terrasse</p>
    </div>
    <div class ="iconIndex">
      <img class ="iconIndex" src="./img/iconeTv_x50.png" alt="Icône" loading="lazy">
      <p>Télévision</p>
    </div>
  </div>

  <div id="allServices" class=" allServices ">
    <table class="tabService">
      <tr>
        <td>Abris pour vélo ou VTT</td>
        <td>Barbecue</td>
        <td>Cuisine équipée</td>
      </tr>
      <tr>
        <td>Habitation indépendante</td>
        <td>Jardin</td>
        <td>Local matériel fermé</td>
      </tr>
      <tr>
        <td>Cuisine équipée</td>
        <td>Parking privé</td>
        <td>Salon de jardin</td>
      </tr>
      <tr>
        <td>Terrain non clos</td>
        <td>Terrasse</td>
        <td>Animaux acceptés (Payant)</td>
      </tr>
      <tr>
        <td>Location de linge (Payante)</td>
        <td>Ménage (Payant)</td>
        <td>Climatisation</td>
      </tr>
      <tr>
        <td>Cheminée</td>
        <td>Lave vaisselle</td>
        <td>Sèche cheveux</td>
      </tr>
      <tr>
        <td>Télévision</td>
        <td>Escalade à 5km</td>
        <td>VTT - Vélo</td>
      </tr>
      <tr>
        <td>Musée à 3km</td>
        <td>Randonnée pédestre</td>
      </tr>

    </table>

  </div>
  <div class="indexButton" >
    <img id="affButtonServiceDown" class="iconArrow" src="./img/btnArrowDown_x50.png" alt="Icone" loading="lazy" onclick=" toggleExpendService()">
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
