window.onscroll = function() {StickyNav()};

var navlist = document.getElementById("navlist");
var burgerlist = document.getElementById("burgerlist");
var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

/* Function to stick the nav bar */
function StickyNav() {
  if (window.scrollY >= sticky) {
    //navlist.classList.add("sticky");
    //burgerlist.classList.add("sticky");
    navbar.classList.add("sticky");
  }
  else {
    //navlist.classList.remove("sticky");
    //burgerlist.classList.remove("sticky");
    navbar.classList.remove("sticky");
  }
}
function toggleMenu() {
  navlist.classList.toggle("enabled");
}
