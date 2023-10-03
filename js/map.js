
var latitude = 44.449001;
var longitude = 2.493300;

var map = L.map('map').setView([latitude, longitude], 11);

var layer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

var marker = L.marker([latitude, longitude])
  .addTo(map)
  .bindPopup("<b>Gîte Figuiès</b><br>140 rue de Figuiès<br>12330 Salles-la-Source");
