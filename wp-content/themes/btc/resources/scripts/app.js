// Roughed in mobile nav
// https://dev.to/linhtch90/responsive-navigation-menu-with-plain-javascript-1fn4
const mobileNavButton = document.querySelector('#nav-mobile-toggle');
const primaryNav = document.querySelector('.nav-primary');
const mobileNavCloseButton = document.querySelector('.nav-mobile-close');

mobileNavButton.addEventListener('click', openHamberger);
mobileNavCloseButton.addEventListener('click', openHamberger);

function openHamberger() {
  primaryNav.classList.toggle('showNav');
  primaryNav.classList.toggle('nav-primary');
  console.log(`ran`);
}

// Toggle menu on escape key
document.onkeydown = function (evt) {
  evt = evt || window.event;
  var isEscape = false;
  if ('key' in evt) {
    isEscape = evt.key === 'Escape' || evt.key === 'Esc';
  } else {
    isEscape = evt.keyCode === 27;
  }
  if (isEscape) {
    openHamberger();
  }
};
