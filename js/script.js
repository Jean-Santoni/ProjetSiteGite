/*const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');
const carouselSlide = document.querySelector('.carousel-slide');
const images = document.querySelectorAll('.carousel-slide img');

let counter = 0;
const slideWidth = images[0].clientWidth;

nextButton.addEventListener('click', () => {
  if (counter >= images.length - 1) {
    counter = 0;
  } else {
    counter++;
  }
  updateCarousel();
});

prevButton.addEventListener('click', () => {
  if (counter <= 0) {
    counter = images.length - 1;
  } else {
    counter--;
  }
  updateCarousel();
});

function updateCarousel() {
  carouselSlide.style.transform = `translateX(${-slideWidth * counter}px)`;
}

// Automatiquement changer les images toutes les 3 secondes
function autoSlide() {
  if (counter >= images.length - 1) {
    counter = 0;
  } else {
    counter++;
  }
  updateCarousel();
}

setInterval(autoSlide, 3000);*/

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("custom-slider");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}
