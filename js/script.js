let slideIndex = 0;
const TEMPS_SLIDE = 8000;
/*AfficherSlide(slideIndex);*/
AutoSlide();
let timer = setInterval(AutoSlide, TEMPS_SLIDE);
let introText = document.getElementById('introText');

let affButtonIntroDown = document.getElementById('affButtonIntroDown');
affButtonIntroDown.style.display='block';

let affButtonServiceDown = document.getElementById('affButtonServiceDown');
affButtonServiceDown.style.display='block';
let allServices = document.getElementById('allServices');


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

function toggleExpendIntro(){
  let isExpanded = introText.classList.contains("expended");
  if (isExpanded){
    introText.classList.remove("expended")

    affButtonIntroDown.style.rotate="360deg";
  }else
  {
    introText.classList.add("expended")

    affButtonIntroDown.style.rotate="180deg";
  }
}
function toggleExpendService(){
  let isExpanded = allServices.classList.contains("expended");
  if (isExpanded){
    allServices.classList.remove("expended")

    affButtonServiceDown.style.rotate="360deg";
  }else
  {
    allServices.classList.add("expended")

    affButtonServiceDown.style.rotate="180deg";
  }
}

