// Mobile navigation
const mobileNavButtonOpen = document.querySelector('.mobile-nav-button--open');
const mobileNav = document.querySelector('.mobile-nav--closed');
const mobileNavButtonClose = document.querySelector(
  '.mobile-nav-button--close'
);

mobileNavButtonOpen.addEventListener('click', openHamburger);
mobileNavButtonClose.addEventListener('click', openHamburger);

function openHamburger() {
  if (mobileNav.classList.contains('mobile-nav--closed')) {
    mobileNav.classList.remove('mobile-nav--closed', 'hidden');
    mobileNav.classList.add(
      'mobile-nav--open',
      'md:flex',
      'md:flex-row',
      'items-center',
      'flex',
      'flex-col',
      'w-full',
      'bg-bigWaves-900',
      'absolute',
      'top-0',
      'bottom-0',
      'left-0',
      'right-0',
      'py-10',
      'space-y-4',
      'z-30',
      'justify-center'
    );
  } else {
    mobileNav.classList.add('mobile-nav--closed', 'hidden');
    mobileNav.classList.remove(
      'mobile-nav--open',
      'md:flex',
      'md:flex-row',
      'items-center',
      'flex',
      'flex-col',
      'w-full',
      'bg-bigWaves-900',
      'absolute',
      'top-0',
      'bottom-0',
      'left-0',
      'right-0',
      'py-10',
      'space-y-4',
      'z-30',
      'justify-center'
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
