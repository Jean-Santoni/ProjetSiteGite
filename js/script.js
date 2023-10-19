let slideIndex = 0;
const TEMPS_SLIDE = 3000;
/*AfficherSlide(slideIndex);*/
AutoSlide();
let timer = setInterval(AutoSlide, TEMPS_SLIDE);
let introText = document.getElementById('introText');
introText.style.display = 'none';
let affButtonIntroUp = document.getElementById('affButtonIntroUp');
affButtonIntroUp.style.display='none';
let affButtonIntroDown = document.getElementById('affButtonIntroDown');
affButtonIntroDown.style.display='block';
let affButtonServiceUp = document.getElementById('affButtonServiceUp');
affButtonServiceUp.style.display='none';
let affButtonServiceDown = document.getElementById('affButtonServiceDown');
affButtonServiceDown.style.display='block';
let allServices = document.getElementById('allServices');
allServices.style.display = 'none';

function plusSlides(n) {
  AfficherSlide(slideIndex += n);
  ResetTimer();
}

function currentSlide(n) {
  AfficherSlide(slideIndex = n);
  ResetTimer();
}

function AfficherSlide(index) {
  let i;
  let images = document.getElementsByClassName("custom-image");
  let points = document.getElementsByClassName("dot");
  if (index > images.length) {slideIndex = 1}
  if (index < 1) {slideIndex = images.length}
  for (i = 0; i < images.length; i++) {
    images[i].style.display = "none";
  }
  for (i = 0; i < points.length; i++) {
    points[i].className = points[i].className.replace(" active", "");
  }
  images[slideIndex-1].style.display = "block";
  points[slideIndex-1].className += " active";
}

function AutoSlide(){
  AfficherSlide(slideIndex +=1);
}

function ResetTimer(){
  clearInterval(timer)
  timer = setInterval(AutoSlide, TEMPS_SLIDE);
}

document.getElementById('affButtonIntroDown').addEventListener('click', function() {
  if (introText.style.display === 'none') {
    introText.style.display = 'block';
    affButtonIntroUp.style.display = "block";
    affButtonIntroDown.style.display='none';
  }
});
document.getElementById('affButtonIntroUp').addEventListener('click', function() {
  if (introText.style.display === 'block') {
    introText.style.display = 'none';
    affButtonIntroUp.style.display = "none";
    affButtonIntroDown.style.display='block';
  }
});
document.getElementById('affButtonServiceDown').addEventListener('click', function() {
  if (allServices.style.display === 'none') {
    allServices.style.display = 'grid';
    affButtonServiceUp.style.display = "block";
    affButtonServiceDown.style.display='none';
  }
});
document.getElementById('affButtonServiceUp').addEventListener('click', function() {
  if (allServices.style.display === 'grid') {
    allServices.style.display = 'none';
    affButtonServiceUp.style.display = "none";
    affButtonServiceDown.style.display='block';

  }

});
document.getElementById('login').addEventListener('submit', function(event) {
  event.preventDefault();
  alert('Tous les champs doivent être remplis.');
  var param1 = document.querySelector('input[name="username"]').value;
  var param2 = document.querySelector('input[name="password"]').value;

  // Ici, vous pouvez effectuer la validation des données si nécessaire

  // Simuler la requête POST
  if (param1 === '' || param2 === '') {
    // Afficher la pop-up en cas d'erreur

  } else {
    // Envoyer les données (simulées) au serveur
    // Si tout va bien, vous pouvez ajouter votre code ici pour traiter la réponse
  }
});
