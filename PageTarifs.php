<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Gîte Figuiès Tarifs</title>
  <link rel="icon" href="./img/Logo_x32.png" type="image/png">

  <link rel="stylesheet" href="css/main.css">

</head>
<body class="tarif">
    <?php
    include_once("./HTML/header.php");
    ?>
  <h1 class=" titrePage" >Pages des tarifs</h1>

  <div>
    <h2 class="sousTitre"> Les différents types de tarifs </h2>
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
        <img class ="iconIndex" src="./img/iconeCheque.png" alt="Icône">
        <p> Chèques</p>
      </div>
      <div class ="iconIndex">
        <img class ="iconIndex" src="./img/iconeEspece.png" alt="Icône">
        <p> Espece</p>
      </div>

      <div class ="iconIndex">
        <img class ="iconIndex" src="./img/iconeVirement.png" alt="Icône">
        <p>Virement</p>
      </div>

    </div>
    </br></br>  </br></br>  </br></br>

<?php
include_once ("./HTML/footer.html");
?>
</body>
</html>
