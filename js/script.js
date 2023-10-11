let slideIndex = 0;
const TEMPS_SLIDE = 3000;
/*AfficherSlide(slideIndex);*/
AutoSlide();
let timer = setInterval(AutoSlide, TEMPS_SLIDE);

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

window.onscroll = function() {StickyNav()};

var navlist = document.getElementById("navlist");
var sticky = navlist.offsetTop;

/* Function to stick the nav bar */
function StickyNav() {
  if (window.pageYOffset >= sticky) {
    navlist.classList.add("sticky")
  }
  else {
    navlist.classList.remove("sticky");
  }
}
document.getElementById('affButtonIntro').addEventListener('click', function() {
  var content = document.getElementById('introText');
  if (content.style.display === 'none') {
    content.style.display = 'block';
  } else {
    content.style.display = 'none';
  }
});
document.getElementById('affButtonService').addEventListener('click', function() {
  var content = document.getElementById('allServices');
  if (content.style.display === 'none') {
    content.style.display = 'grid';
  } else {
    content.style.display = 'none';
  }
});
