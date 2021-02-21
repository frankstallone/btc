// Roughed in mobile nav
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
