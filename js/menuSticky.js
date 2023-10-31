window.onscroll = function() {StickyNav()};

var navlist = document.getElementById("navlist");
var sticky = navlist.offsetTop;

/* Function to stick the nav bar */
function StickyNav() {
  if (window.scrollY >= sticky) {
    navlist.classList.add("sticky")
  }
  else {
    navlist.classList.remove("sticky");
  }
}
