function _(id) {
	return document.getElementById(id);
}

window.onscroll = function() {myFunction()};

var nav = _("nav");
var sticky = nav.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    nav.classList.add("sticky")
  } else {
    nav.classList.remove("sticky");
  }
}

function showSideNav() {
	_('side-nav').style.display = "block";
}

function hideSideNav() {
	_('side-nav').style.display = "none";
}

function search() {
	_('submit').click();
}

function addToCart(id) {
	_(id).click();
}