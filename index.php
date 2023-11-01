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
        echo "<div class='custom-image fade'>
            <img class='slide-img' src='img/Carousel/$file'  loading='lazy'>
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
<br>
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
  <div>
    <div id="Tarifs"></div>
    <br>
    <h2  class="sousTitre"> Les différents types de tarifs </h2>
    <table class="tab">
      <tr>
        <th></th>
        <th>Moyenne saison</th>
        <th>Hautes saison</th>
      </tr>
      <tr>
        <td>Nuit</td>
        <td>85 €</td>
        <td>110 €</td>
      </tr>
      <tr>
        <td>Semaine</td>
        <td>550 €</td>
        <td>650 €</td>
      </tr>
      <tr>
        <td>Animaux</td>
        <td colspan="2" class="center">1000 €</td>
      </tr>
      <tr>
        <td>Ménage</td>
        <td colspan="2" class="center">560 €</td>
      </tr>
      <tr>
        <td>Location de linge</td>
        <td colspan="2" class="center">560 €</td>
      </tr>
    </table>
  </div>
  </br>
  <h2 class="sousTitre"> Capacités </h2>
  <div  class="ligne">
    <p> Personnes : 4</p>
    <p> Chambre : 2</p>
    <p> Personnes(Maximum) :4</p>

  </div>
  </br>
  <h2 class="sousTitre">Moyen de Paiement</h2>
  <div class="ligne">
    <div class ="iconIndex">
      <img class ="iconIndex" src="./img/iconeCheque_x50.png" alt="Icône" loading="lazy">
      <p> Chèques</p>
    </div>
    <div class ="iconIndex">
      <img class ="iconIndex" src="./img/iconeEspece_x50.png" alt="Icône" loading="lazy">
      <p> Espece</p>
    </div>

    <div class ="iconIndex">
      <img class ="iconIndex" src="./img/iconeVirement_x50.png" alt="Icône" loading="lazy">
      <p>Virement</p>
    </div>

  </div>
  </br></br>  </br></br>  </br></br>

<?php
include_once ("./HTML/footer.html");
?>
</body>
</html>
