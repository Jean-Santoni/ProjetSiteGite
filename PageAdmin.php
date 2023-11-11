<!DOCTYPE html>
<html lang="fr" xmlns="http://www.w3.org/1999/html">
<?php
include_once("./HTML/header.php");
if (!isset($_SESSION['user'])) {
  echo '<script>window.location="Login.php"</script>';
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
                paragraphe.innerHTML += "{ title: '"+ event.title+"', start: '" + event.startStr+"', end: '" + event.endStr+"', display: '" + event.display+"', backgroundColor: '" + event.backgroundColor+"' }, " ;
              }
            }
            else{
              paragraphe.innerHTML += "{ title: '"+ event.title+"', start: '" + event.startStr+"', end: '" + event.endStr+"', display: '" + event.display+"', backgroundColor: '" + event.backgroundColor+"' }, " ;
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

      document.getElementById('addEventButton').addEventListener('click', function() {
        var startDate = document.getElementById('startDate').value;
        var endDate = document.getElementById('endDate').value;
        var eventStatus = document.getElementById('eventStatus').value;

        let dateFin = new Date(endDate);
        dateFin.setDate(dateFin.getDate() + 1);
        var eventTitle = eventStatus === 'non-disponible' ? 'Non disponible' : 'Réservé';

        var newEvent = {
          title: eventTitle,
          id: eventTitle,
          start: startDate,
          end: dateFin.toISOString().split('T')[0],
          display: 'background',
          backgroundColor: colors[eventTitle]
        };
        calendar.addEvent(newEvent);

        document.getElementById('startDate').value = '';
        document.getElementById('endDate').value = '';
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
  </div>
  <input name="imageInput" type="file" accept="image/*" id="imageInput"><br><br>
  <button id="uploadImage" type="button">Télécharger l'image</button>
  <br><br>
</form>
<form action="./EnregistrementXML.php" method="post">
  <label for="description">Description :</label><br>
  <textarea id="description" name="description" required></textarea>
  <br><br>
  <label for="descriptionDetail">Description détaillée :</label><br>
  <textarea id="descriptionDetail" name="descDetail" required></textarea>
  <br><br>
  <div class="lignesFlex">
  <div>
    <label for="prixNuitMoy">Prix nuitée moyenne saison :</label><br>
    <input type="number" id="prixNuitMoy" name="prixNuitMoy" required><br><br>
  </div>
  <div>
    <label for="prixNuitHaut">Prix nuitée haute saison :</label><br>
    <input type="number" id="prixNuitHaut" name="prixNuitHaut" required><br><br>
  </div>
  <div>
    <label for="prixSemMoy">Prix semaine moyennes saison :</label><br>
    <input type="number" id="prixSemMoy" name="prixSemMoy" required><br><br>
  </div>
  <div>
    <label for="prixSemHaut">Prix semaine haute saison :</label><br>
    <input type="number" id="prixSemHaut" name="prixSemHaut" required><br><br>
  </div>
  </div>
  <br><br>
  <div class="lignesGrid">
  <div>
    <label for="prixAnimaux">Prix animaux :</label><br>
    <input type="number" id="prixAnimaux" name="prixAnimaux" required><br><br>
  </div>
  <div>
    <label for="prixMenage">Prix ménage :</label><br>
    <input type="number" id="prixMenage" name="prixMenage" required><br><br>
  </div>
  <div>
    <label for="prixLocation">Prix location de linge :</label><br>
    <input type="number" id="prixLocation" name="prixLocation" required><br><br>
  </div>
  </div>
  <br><br>
<div class="lignesGrid">
  <div>
  <label for="nombrePersonne">Nombre de personnes :</label><br>
  <input type="number" id="nombrePersonne" name="nombrePersonne" required><br><br>
  </div>
  <div>
  <label for="nombreChambre">Nombre de chambre :</label><br>
  <input type="number" id="nombreChambre" name="nombreChambre" required><br><br>
  </div>
  <div>
  <label for="nombrePersonneMax">Nombre de personnes maximum :</label><br>
  <input type="number" id="nombrePersonneMax" name="nombrePersonneMax" required><br><br>
  </div>
</div>
  <br><br>
  <input id="uploadText" type="button" value="Valider les textes">
  <br><br>
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
      <strong>Glissez les évènements</strong>
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
  <textarea id="EventsCalendar" name="EventsCalendar"></textarea>
  <input type="button" id="uploadCalendar" value="Valider le calendrier">
</form>
<br><br>
<?php
include_once ("./HTML/footer.html");
?>
</body>
</html>
