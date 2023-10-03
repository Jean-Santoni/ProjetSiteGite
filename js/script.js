let slideIndex = 0;
/*AfficherSlide(slideIndex);*/
AutoSlide();
let timer = setInterval(AutoSlide, 3000);

function plusSlides(n) {
  AfficherSlide(slideIndex += n);
  clearInterval(timer)
  timer = setInterval(AutoSlide, 3000);
}

function currentSlide(n) {
  AfficherSlide(slideIndex = n);
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
