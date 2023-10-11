<!DOCTYPE html>
<html lang='fr'>
<head>
  <meta charset='utf-8' />
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
