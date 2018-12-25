// Navbar collapse
function navbarCollapse() {
	var navbar = document.querySelector('.navbar');
	var header = document.querySelector('.header');
	
	var obj = header.getBoundingClientRect();
	  
  if (obj.top < -100) {
  	navbar.classList.add('navbar-shrink');
  } else {
  	navbar.classList.remove('navbar-shrink');
  }
}

navbarCollapse();
window.onscroll = navbarCollapse;

$(document).ready(function() {
  //$('a[href^="#"]').on('click', function(event) {
  $('[href*="#"]:not([href="#"]').on('click', function(event) {
    event.preventDefault();
    var id = $(this).attr("href"),
        top = $(id).offset().top;
     
    $('html, body').animate({scrollTop: top}, 1000);
  });
});

//Navbar scrollspy
$('body').scrollspy({
  target: '#mainNav',
  offset: 57
});
