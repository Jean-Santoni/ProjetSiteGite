<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">

  <link rel="stylesheet" href="css/main.css">

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  <link rel="icon" href="./img/LOGO-final-fond-transparent.png" type="image/png">
</head>

<body>
  <?php
  include_once ("./HTML/header.html");
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
    À partir de 550€ / semaine</br> </br>

    Notre maison en pierre, située sur les hauteurs, entre vignes, falaises et le causse vous séduira par sa vue magnifique et son environnement agréable.
  </p>
  <div class="indexButton" >
    <button id="affButtonIntro" >Afficher/Cacher</button>
  </div>
  <p id="introText">
    A 20 mn de Rodez, 10 mn de Marcillac et 30 mn de Conques, vous êtes idéalement situés pour visiter quelques un des sites naturels ou culturels remarquables de l'Aveyron.</br></br></br>

    Figuies est un hameau charmant, que l'on visite à pied. Une belle balade par un chemin, vous mènera de la cascade de la Roque, à celles de Salles-la source, en profitant de nombreux points de vue sur le paysage. On adore aussi le sentier à flanc de versant avec des passages en encorbellement creusé dans la roche ! Il nous fait pénétrer dans le paysage des falaises calcaires avec de beaux points de vue sur la vallée.  Vous êtes sur le GR 62 de Rodez à Conques.</br></br></br>

    Le gîte de Figuies,  d'une superficie de 75 m² sur deux niveaux, a été entièrement rénové en 2021. Une agréable décoration allie un style contemporain et des matériaux naturels comme le bois et le rotin.</br></br></br>

    Il se compose, au rez-de-chaussée d'une pièce lumineuse ouverte sur le paysage grâce à une grande baie vitrée.  De 35 m² et climatisée, cet espace offre une cuisine moderne bien équipée, un séjour et un coin salon chaleureux et cosys.</br></br></br>

    La terrasse plein sud, offre une vue imprenable sur la vallée que l'on peut contempler en prenant ses repas. Vous pourrez même admirer de superbes couchers du soleil.</br></br></br>

    A l'étage, vous disposerez de deux chambres mansardées et confortables. L'une avec un lit en 140/190 et l'autre avec deux lits en 90/190. Vous y trouverez aussi la salle de bain avec son WC.</br></br></br>

    Le jardin, très agréable, est non clos. Pourvu d'un bar extérieur, d'un barbecue, d'un évier et de mobilier de jardin, vous pourrez y prendre vos repas ou vous reposer à l'ombre de la glycine. Un WC et une douche complètent l'équipement.</br></br></br>

    Pour des vacances authentiques et au grand air, dans un lieu paisible à l'écart de la circulation, vous vous sentirez chez vous tout en étant dépaysé.</br></br>
  </p>
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
    <button id="affButtonService" >Afficher/Cacher</button>
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
</div>

<div id="map" class="map">
<script src="js/script.js"></script>
<script src="js/map.js"></script>
</div>

<?php
include_once ("./HTML/footer.html");
?>
</body>
</html>
