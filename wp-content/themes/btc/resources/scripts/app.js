// Mobile navigation
const mobileNavButtonOpen = document.querySelector('.mobile-nav-button--open');
const mobileNavContainer = document.querySelector('.mobile-nav--closed');
const mobileNavButtonClose = document.querySelector(
  '.mobile-nav-button--close'
);

mobileNavButtonOpen.addEventListener('click', openHamburger);
mobileNavButtonClose.addEventListener('click', openHamburger);

function openHamburger() {
  if (mobileNavContainer.classList.contains('mobile-nav--closed')) {
    mobileNavContainer.classList.remove('mobile-nav--closed', 'hidden');
    mobileNavContainer.classList.add(
      'mobile-nav--open',
      'w-full',
      'flex',
      'flex-col',
      'items-center',
      'justify-center',
      'absolute',
      'top-0',
      'bottom-0',
      'left-0',
      'right-0',
      'bg-bigWaves-900',
      'py-10',
      'z-30'
    );
  } else {
    mobileNavContainer.classList.add('mobile-nav--closed', 'hidden');
    mobileNavContainer.classList.remove(
      'mobile-nav--open',
      'w-full',
      'flex',
      'flex-col',
      'items-center',
      'justify-center',
      'absolute',
      'top-0',
      'bottom-0',
      'left-0',
      'right-0',
      'bg-bigWaves-900',
      'py-10',
      'z-30'
    );
  }
}

// Toggle mobile navigation with escape key
document.onkeydown = function (e) {
  e = e || window.event;
  var isEscape = false;
  if ('key' in e) {
    isEscape = e.key === 'Escape' || e.key === 'Esc';
  } else {
    isEscape = e.keyCode === 27;
  }
  if (isEscape) {
    openHamburger();
  }
};

// Dropdown menu
const menuItemHasChildren = document.querySelector('.menu-item-has-children a');
const showThisMenu = document.querySelector(
  '.menu-item-has-children .sub-menu'
);

menuItemHasChildren.addEventListener('click', toggleMenu);

function toggleMenu(e) {
  e.preventDefault();
  showThisMenu.classList.toggle('grid');
  return;
}
