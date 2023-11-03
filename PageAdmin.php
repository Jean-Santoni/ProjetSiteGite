<!DOCTYPE html>
<html lang="fr">
<?php
include_once("./HTML/header.php");
if (!isset($_SESSION['user'])) {
  echo '<script>window.location="login.php"</script>';
  exit;
}
?>
<head>
  <meta charset="UTF-8">
  <title>Gîte Figuiès Admin</title>
  <link rel="icon" href="./img/Logo_x32.png" type="image/png">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/main.css">
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./js/pageAdminScript.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var Calendar = FullCalendar.Calendar;
      var Draggable = FullCalendar.Draggable;

      var containerEl = document.getElementById('external-events');
      var calendarEl = document.getElementById('calendar');

      let idCont = -1;

      let colors = {};
      colors['Réservé'] = 'rgb(255,0,0,0.5)';
      colors['Non disponible'] = 'rgb(25,25,25,0.5)';

      new Draggable(containerEl, {
        itemSelector: '.fc-event',
        eventData: function(eventEl) {
          idCont += 1;
          return {
            title: eventEl.innerText,
            id: eventEl.innerText,
            display: 'background',
            backgroundColor: colors[eventEl.innerText]
          };
        }
      });
      var calendar = new Calendar(calendarEl, {
        headerToolbar: {
          left: '',
          center: 'title',
          right: 'prev,next today'
        },
        buttonText: {
          today: 'Aujourd\'hui'
        },
        locale: 'fr',
        firstDay: 1,
        editable: true,
        eventReceive: function(info) {
          let newEventDate = info.event.start.toDateString();
          var paragraphe = document.getElementById("EventsCalendar");
          paragraphe.innerHTML = ", events: [ ";
          this.getEvents().forEach(function (event) {
            let oldEventDate = event.start.toDateString();
            if (oldEventDate === newEventDate) {
              if(info.event.id === "Supprimer"){
                event.remove();
              }
              else if(event.id !== info.event.id){
                event.remove();
              }
              else{
                paragraphe.innerHTML += "{ title: '"+ event.title+"', start: '" + event.startStr+"', display: '" + event.display+"', backgroundColor: '" + event.backgroundColor+"' }, " ;
              }
            }
            else{
              paragraphe.innerHTML += "{ title: '"+ event.title+"', start: '" + event.startStr+"', display: '" + event.display+"', backgroundColor: '" + event.backgroundColor+"' }, " ;
            }
          });
          paragraphe.innerHTML = paragraphe.innerHTML.substring(0,paragraphe.innerHTML.length-2) + " ]";
        },
        eventAdd: function(info) {
          let newEventDate = info.event.start.toDateString();
          var paragraphe = document.getElementById("EventsCalendar");
          paragraphe.innerHTML = ", events: [ ";
          this.getEvents().forEach(function (event) {
            let oldEventDate = event.start.toDateString();
            if (oldEventDate === newEventDate) {
              if(info.event.id === "Supprimer"){
                event.remove();
              }
              else if(event.id !== info.event.id){
                event.remove();
              }
              else{
                paragraphe.innerHTML += "{ title: '"+ event.title+"', start: '" + event.startStr+"', end: '" + event.endStr+"', display: '" + event.display+"', backgroundColor: '" + event.backgroundColor+"' }, " ;
              }
            }
            else{
              paragraphe.innerHTML += "{ title: '"+ event.title+"', start: '" + event.startStr+"', end: '" + event.endStr+"', display: '" + event.display+"', backgroundColor: '" + event.backgroundColor+"' }, " ;
            }
          });
          paragraphe.innerHTML = paragraphe.innerHTML.substring(0,paragraphe.innerHTML.length-2) + " ]";
        }
        <?php
        $xml = new DOMDocument();
        $xml->load("./DonneesAffichees.xml");
        $elements = $xml->getElementsByTagName('CALENDAR');
        foreach ($elements as $element) {
          echo $element->nodeValue;
        }
        ?>
      });

      $('#addEventButton').click(function() {
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();
        var eventStatus = $('#eventStatus').val();

        let dateFin = new Date(endDate)
        dateFin.setDate(dateFin.getDate() +1);

        // Créez un nouvel événement pour le calendrier avec le titre basé sur le statut sélectionné
        var eventTitle = eventStatus === 'non-disponible' ? 'Non disponible' : 'Réservé';

        // Créez un nouvel événement pour le calendrier
        var newEvent = {
          title: eventTitle,
          id: eventTitle,
          start: startDate,
          end: dateFin.toISOString().split('T')[0],
          display: 'background',
          backgroundColor: colors[eventTitle]
        };

        // Ajoutez l'événement au calendrier FullCalendar
        calendar.addEvent(newEvent);

        // Réinitialisez les champs de saisie de date
        $('#startDate').val('');
        $('#endDate').val('');
      });

      calendar.render();
    });
  </script>


</head>
<body class="bodyAdmin">
<h1>Page Admin</h1>
<form id="imageUploadForm" action="./PageAdmin.php" method="post" enctype="multipart/form-data">
  <label for="imageInput">Image Carousel :</label><br>
  <div class="ListImage" id="ListImage">
    <?php
    $directory = './img/Carousel'; // Remplacez ceci par le chemin du dossier que vous souhaitez lister.

    // Utilisez scandir() pour lister les éléments du dossier.
    $files = scandir($directory);

    // Parcourez les éléments et affichez-les.
    foreach ($files as $file) {
      if ($file != '.' && $file != '..') {
        echo "<div>$file <button type='button' class='delete-button' data-file='$file'>X</button></div>";
      }
    }
    ?>
  </div>
  <input name="imageInput" type="file" accept="image/*" id="imageInput"><br><br>
  <button id="uploadButton" type="button">Télécharger l'image</button>
</form>
<form action="./EnregistrementXML.php" method="post">
  <label for="description">Description :</label><br>
  <textarea id="description" name="description" required><?php
    $xml = new DOMDocument();
    $xml->load("./DonneesAffichees.xml");
    $elements = $xml->getElementsByTagName('DESCRIPTION');
    foreach ($elements as $element) {
      echo preg_replace('<br />', '', $element->nodeValue);
    }
    ?>
  </textarea><br><br>

  <label for="descriptionDetail">Description détaillée :</label><br>
  <textarea id="descriptionDetail" name="descDetail" required><?php
    $xml = new DOMDocument();
    $xml->load("./DonneesAffichees.xml");
    $elements = $xml->getElementsByTagName('DESCDETAIL');
    foreach ($elements as $element) {
      echo $element->nodeValue;
    }
    ?>
  </textarea><br><br>
<!--  ////////////////////////////////////////////////TABLEAUX//////////////////////////////////////////////////////////////////-->
  <div class="ligne">
  <div>
    <label for="prixNuitMoy">Prix nuit moyenne saison :</label><br>
    <input type="number" id="prixNuitMoy" name="prixNuitMoy" value='<?php
    $xml = new DOMDocument();
    $xml->load("./DonneesAffichees.xml");
    $elements = $xml->getElementsByTagName('PNM');
    foreach ($elements as $element) {
      echo $element->nodeValue;
    }
    ?>' required><br><br>
  </div>
  <div>
    <label for="prixNuitHaut">Prix nuit haute saison :</label><br>
    <input type="number" id="prixNuitHaut" name="prixNuitHaut" value='<?php
    $xml = new DOMDocument();
    $xml->load("./DonneesAffichees.xml");
    $elements = $xml->getElementsByTagName('PNH');
    foreach ($elements as $element) {
      echo $element->nodeValue;
    }
    ?>' required><br><br>
  </div>
  <div>
    <label for="prixSemMoy">Prix semaine moyennes saison :</label><br>
    <input type="number" id="prixSemMoy" name="prixSemMoy" value='<?php
    $xml = new DOMDocument();
    $xml->load("./DonneesAffichees.xml");
    $elements = $xml->getElementsByTagName('PSM');
    foreach ($elements as $element) {
      echo $element->nodeValue;
    }
    ?>' required><br><br>
  </div>
  <div>
    <label for="prixSemHaut">Prix semaine haute saison :</label><br>
    <input type="number" id="prixSemHaut" name="prixSemHaut" value='<?php
    $xml = new DOMDocument();
    $xml->load("./DonneesAffichees.xml");
    $elements = $xml->getElementsByTagName('PSH');
    foreach ($elements as $element) {
      echo $element->nodeValue;
    }
    ?>' required><br><br>
  </div>
  </div>

  <div class="lignes">
  <div>
    <label for="prixAnimaux">Prix animaux :</label><br>
    <input type="number" id="prixAnimaux" name="prixAnimaux" value='<?php
    $xml = new DOMDocument();
    $xml->load("./DonneesAffichees.xml");
    $elements = $xml->getElementsByTagName('PXA');
    foreach ($elements as $element) {
      echo $element->nodeValue;
    }
    ?>' required><br><br>
  </div>
  <div>
    <label for="prixMenage">Prix ménage :</label><br>
    <input type="number" id="prixMenage" name="prixMenage" value='<?php
    $xml = new DOMDocument();
    $xml->load("./DonneesAffichees.xml");
    $elements = $xml->getElementsByTagName('PXM');
    foreach ($elements as $element) {
      echo $element->nodeValue;
    }
    ?>' required><br><br>
  </div>
  <div>
    <label for="prixLocation">Prix location de linge :</label><br>
    <input type="number" id="prixLocation" name="prixLocation" value='<?php
    $xml = new DOMDocument();
    $xml->load("./DonneesAffichees.xml");
    $elements = $xml->getElementsByTagName('PXL');
    foreach ($elements as $element) {
      echo $element->nodeValue;
    }
    ?>' required><br><br>
  </div>
  </div>
  <!--  //////////////////////////////////////////////SERVICE////////////////////////////////////////////////////////////////////-->
<div class="lignes">
  <div>
  <label for="nombrePersonne">Nombre de personnes :</label><br>
  <input type="number" id="nombrePersonne" name="nombrePersonne" value='<?php
  $xml = new DOMDocument();
  $xml->load("./DonneesAffichees.xml");
  $elements = $xml->getElementsByTagName('NBPERS');
  foreach ($elements as $element) {
    echo $element->nodeValue;
  }
  ?>' required><br><br>
  </div>
  <div>
  <label for="nombreChambre">Nombre de chambre :</label><br>
  <input type="number" id="nombreChambre" name="nombreChambre" value='<?php
  $xml = new DOMDocument();
  $xml->load("./DonneesAffichees.xml");
  $elements = $xml->getElementsByTagName('NBCHAMB');
  foreach ($elements as $element) {
    echo $element->nodeValue;
  }
  ?>' required><br><br>
  </div>
  <div>
  <label for="nombrePersonneMax">Nombre de personnes maximum :</label><br>
  <input type="number" id="nombrePersonneMax" name="nombrePersonneMax" value='<?php
  $xml = new DOMDocument();
  $xml->load("./DonneesAffichees.xml");
  $elements = $xml->getElementsByTagName('NBPERSMAX');
  foreach ($elements as $element) {
    echo $element->nodeValue;
  }
  ?>' required><br><br>
  </div>
</div>
  <input type="submit" value="Valider">
</form>
<form id="eventForm">
  <label for="startDate">Date de début :</label>
  <input type="date" id="startDate" name="startDate">

  <label for="endDate">Date de fin :</label>
  <input type="date" id="endDate" name="endDate">

  <label for="eventStatus">Statut :</label>
  <select id="eventStatus" name="eventStatus">
    <option value="non-disponible">Non disponible</option>
    <option value="reserve">Réservé</option>
  </select>

  <input type="button" value="Ajouter Événement" id="addEventButton">
</form>
<form action="./EnregistrementXML.php" method="post">
  <div id='external-events'>
    <p>
      <strong>Draggable Events</strong>
    </p>

    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
      <div class='fc-event-main'>Réservé</div>
    </div>
    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
      <div class='fc-event-main'>Non disponible</div>
    </div>
    <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
      <div class='fc-event-main'>Supprimer</div>
    </div>
  </div>



  <div id='calendar-container'>
    <div id='calendar'></div>
  </div>
  <textarea id="EventsCalendar" name="EventsCalendar">
        <?php
        $xml = new DOMDocument();
        $xml->load("./DonneesAffichees.xml");
        $elements = $xml->getElementsByTagName('CALENDAR');
        foreach ($elements as $element) {
          echo $element->nodeValue;
        }
        ?>
  </textarea>
  <input type="submit" value="Valider">
</form>
<?php
include_once ("./HTML/footer.html");
?>
</body>
</html>
