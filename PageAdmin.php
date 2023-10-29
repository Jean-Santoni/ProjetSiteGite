<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Gîte Figuiès Admin</title>
  <link rel="icon" href="./img/Logo_x32.png" type="image/png">

  <link rel="stylesheet" href="css/main.css">
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var Calendar = FullCalendar.Calendar;
      var Draggable = FullCalendar.Draggable;

      var containerEl = document.getElementById('external-events');
      var calendarEl = document.getElementById('calendar');

      let idCont = -1;

      let colors = {};
      colors['Réservé'] = 'rgb(0,255,0,0.5)';
      colors['Non disponible'] = 'rgb(255,0,0,0.5)';

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
          if (paragraphe.innerHTML.toString().includes('start')){
            paragraphe.innerHTML = paragraphe.innerHTML.substring(0,paragraphe.innerHTML.length-2) + " ]";
          }else{
            paragraphe.innerHTML = '';
          }
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
      calendar.render();
    });
  </script>

</head>
<body class="bodyAdmin">
<?php
include_once("./HTML/header.php");
if (!isset($_SESSION['user'])) {
  echo '<script>window.location="login.php"</script>';
  exit;
}
?>
<h1>Page Admin</h1>
<form action="./EnregistrementXML.php" method="post" enctype="multipart/form-data">
  <label for="imageCarousel">Image Carousel :</label><br>
  <input name="imageCarousel" type="file" accept="image/*" id="imageCarousel"><br><br>

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
