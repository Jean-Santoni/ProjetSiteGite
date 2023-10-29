<!DOCTYPE html>
<html lang='fr'>
<head>
  <meta charset='utf-8' />
  <title>Gîte Figuiès Calendrier</title>
  <link rel="icon" href="./img/Logo_x32.png" type="image/png">

  <link rel="stylesheet" href="css/main.css">
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
  <script>

    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        headerToolbar: {
          left: '',
          center: 'title',
          right: 'prev,next today'
        },
        buttonText: {
          today: 'Aujourd\'hui'
        },
        locale: 'fr',
        firstDay: 1
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
<body>
<?php
include_once("./HTML/header.php");
?>
<div id='calendar'></div>
<?php
include_once ("./HTML/footer.html");
?>
</body>
</html>
